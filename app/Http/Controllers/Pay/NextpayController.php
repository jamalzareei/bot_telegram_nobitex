<?php

namespace App\Http\Controllers\Pay;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Models\Pay;
use App\Models\Request as ModelsRequest;
use App\Models\Status;
use App\Models\User;
use App\Services\FinancialService;
use App\Services\TelegramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NextpayController extends Controller
{
    
    private $apiKey;
    private $currency;
    
    public function __construct()
    {
        # code...
        $this->apiKey = config('telegram.apiNextPay');
        $this->currency = 'IRR';
        $this->telService = new TelegramService();
        $this->FinancialService = new FinancialService();
    }

    public function pay($model, $id, $type_request = null)
    {
        # code...
        $requestModel = ModelsRequest::find($id);
        $user = User::find($requestModel->user_id);
        if( !($user && $requestModel) ){
            return response()->json([
                'error' => 'user or request not set'
            ], 401);
        }
        $payable_type = null;
        switch ($model) {
            case 'Request':
                $payable_type = 'App\Models\Request';
                break;
            
            default:
                # code...
                break;
        }

        $pay = Pay::create([
            'user_id' =>$user->id,
            'payable_type' => $payable_type,
            'payable_id' => $id,
            'amount' => $requestModel->amount,
            'discount' => 0,
            'discount_id' => 0,
            'bank_portal' => '',
            'api_key' => $this->apiKey,            
        ]);

        
        $orderid = $user->id."-".time();
        $amount = $requestModel->amount;
        $callback_uri = route('callback.nextpay', ['pay_id'=> $pay->id, 'type_request' => $type_request]);
        $currency = $this->currency;
        $customer_phone = $user->phone;// '09135368845';
        // $custom_json_fields = '';
        $payer_name = $user->firsname.' '.$user->lastname;// 'test';
        $payer_desc = 'افزایش اعتبار';
        // $auto_verify = 'yes';
        // $allowed_card = '6037697486000216';

        $response = Http::post('https://nextpay.org/nx/gateway/token', [
            'api_key' => $this->apiKey,//کلید مجوز دهی
            'order_id' => $orderid,//شماره سفارش	
            'amount' => $amount,//مبلغ (پیش فرض تومان)	
            'callback_uri' => $callback_uri,//آدرس بازگشت	
            'currency' => $currency,//واحد پولی	IRT یا IRR
            'customer_phone' => $customer_phone,//موبایل پرداخت کننده	
            // 'custom_json_fields' => $custom_json_fields,//اطلاعات دلخواه	{ "productName":"Shoes752" , "id":52 }
            'payer_name' => $payer_name,//نام پرداخت کننده	
            'payer_desc' => $payer_desc,//توضیحات دلخواه	
            // 'auto_verify' => $auto_verify,//تایید خودکار بدون نیاز به فراخوانی وریفای	
            // 'allowed_card' => $allowed_card, //شماره کارت مجاز	
        ]);

        $result = $response->json(); // trans_id, code
        // اگر پارامتر code در پاسخ دارای مقدار 1- باشد، یعنی توکن با موفقیت صادر شده است و trans_id همان توکن مورد نیاز برای مراحل بعدی است.
        
        if($result){

            $code = $result['code'];
            $trans_id = $result['trans_id'];
            $amount = $result['amount'];
            if($code == -1){
                return redirect("https://nextpay.org/nx/gateway/payment/$trans_id");
            }
        }

        return response()->json([
            'error' => 'request not valid!'
        ], 400);

    }

    public function callback($pay_id, $type_request)
    {
        # code...
        // return request()->all();
        $trans_id = request('trans_id');
        $order_id = request('order_id');
        $amount = request('amount');
        $np_status = request('np_status');

        $pay = Pay::find($pay_id);
        $user = User::find($pay->user_id);
        if( !($pay && $user) ){
            return response()->json([
                'error' => 'pay not found!'
            ], 401);
        }

        $response = Http::post('https://nextpay.org/nx/gateway/verify', [
            'api_key' => $this->apiKey,//کلید مجوز دهی
            'trans_id' => $trans_id, //	توکن تراکنش
            'amount' => $amount,//مبلغ (پیش فرض تومان)	
            'currency' => $this->currency,//واحد پولی	IRT یا IRR
        ]);

        $result = $response->json();
        $code = $result['code']; // کد وضعیت تراکنش	uuid	0
        $amount = $result['amount']; // مبلغ (تومان)	
        $order_id = $result['order_id']; // شماره سفارش	
        $card_holder = $result['card_holder']; // کارت پرداخت کننده	
        $customer_phone = $result['customer_phone']; // موبایل پرداخت کننده	
        $Shaparak_Ref_Id = $result['Shaparak_Ref_Id']; //	کد پیگیری شاپرک	
        $custom = $result['custom']; // اطلاعات دلخواه	

        $slugStatus = 'پرداخت-ناموفق';
        if($code == 0){
            $slugStatus = 'پرداخت-موفق';
        }
        $status = Status::where('slug', $slugStatus)->first();
        
        $pay->tracking_code = $Shaparak_Ref_Id;
        $pay->trans_id = $trans_id;
        $pay->order_id = $order_id;
        $pay->code_token = '';
        $pay->code_verify = $code;
        $pay->cart_number = $card_holder;
        $pay->customer_phone = $customer_phone;
        $pay->status_id = $status->id ?? null;
        $pay->details = json_encode($result);
        $pay->save();

        $resTextCode = $this->responseCode($code);
        $bot = Bot::where('chat_id', $user->chat_id)->latest()->first();
        if($code == 0){
            if($type_request == 'telegram'){
                // send message to telegram
            }
            $text = "
            مبلغ پرداختی: $amount ریال

            $resTextCode
            .
            ";

            $this->FinancialService->inventoryIncrease($pay->id); // افزایش موجودی

            $this->telService->sendMessageReply($user->chat_id, $text, $bot->message_id, null);

            return response()->json([
                'status' => 'success',
                'message' => 'pay success',
            ], 200);
        }else{
            
            $text = "
            مبلغ پرداختی: $amount ریال

            $resTextCode
            .
            ";
            $this->telService->sendMessageReply($user->chat_id, $text, $bot->message_id, null);
            return response()->json([
                'status' => 'error',
                'message' => $resTextCode,
                'details' => 'به ربات مراجعه نمایید',
                'data' => [
                    'status'=>$status
                ],

            ], 200);
        }

        //اگر پارامتر code در پاسخ دارای مقدار 0 باشد، یعنی تراکنش (( موفق )) بوده است . هر مقداری غیر از صفر به معنی ناموفق بودن تراکنش است.
        /*
        code	کد وضعیت تراکنش	uuid	0
        amount	مبلغ (تومان)	integer	74250
        order_id	شماره سفارش	string	85NX85s427
        card_holder	کارت پرداخت کننده	string	5022-29**-****-5020
        customer_phone	موبایل پرداخت کننده	numeric	09121234567
        Shaparak_Ref_Id	کد پیگیری شاپرک	string	141196584609
        custom	اطلاعات دلخواه	json	{ "productName":"Shoes752" , "id":52 }
        */
    }

    public function responseCode($code) 
    {
        switch ($code) {
            case '0': return 'پرداخت تکمیل و با موفقیت انجام شده است';break;
            case '-1': return 'منتظر ارسال تراکنش و ادامه پرداخت';break;
            case '-2': return 'پرداخت رد شده توسط کاربر یا بانک';break;
            case '-3': return 'پرداخت در حال انتظار جواب بانک';break;
            case '-4': return 'پرداخت لغو شده است';break;
            case '-20': return 'کد api_key ارسال نشده است';break;
            case '-21': return 'کد trans_id ارسال نشده است';break;
            case '-22': return 'مبلغ ارسال نشده';break;
            case '-23': return 'لینک ارسال نشده';break;
            case '-24': return 'مبلغ صحیح نیست';break;
            case '-25': return 'تراکنش قبلا انجام و قابل ارسال نیست';break;
            case '-26': return 'مقدار توکن ارسال نشده است';break;
            case '-27': return 'شماره سفارش صحیح نیست';break;
            case '-28': return 'مقدار فیلد سفارشی [custom_json_fields] از نوع json نیست';break;
            case '-29': return 'کد بازگشت مبلغ صحیح نیست';break;
            case '-30': return 'مبلغ کمتر از حداقل پرداختی است';break;
            case '-31': return 'صندوق کاربری موجود نیست';break;
            case '-32': return 'مسیر بازگشت صحیح نیست';break;
            case '-33': return 'کلید مجوز دهی صحیح نیست';break;
            case '-34': return 'کد تراکنش صحیح نیست';break;
            case '-35': return 'ساختار کلید مجوز دهی صحیح نیست';break;
            case '-36': return 'شماره سفارش ارسال نشد است';break;
            case '-37': return 'شماره تراکنش یافت نشد';break;
            case '-38': return 'توکن ارسالی موجود نیست';break;
            case '-39': return 'کلید مجوز دهی موجود نیست';break;
            case '-40': return 'کلید مجوزدهی مسدود شده است';break;
            case '-41': return 'خطا در دریافت پارامتر، شماره شناسایی صحت اعتبار که از بانک ارسال شده موجود نیست';break;
            case '-42': return 'سیستم پرداخت دچار مشکل شده است';break;
            case '-43': return 'درگاه پرداختی برای انجام درخواست یافت نشد';break;
            case '-44': return 'پاسخ دریاف شده از بانک نامعتبر است';break;
            case '-45': return 'سیستم پرداخت غیر فعال است';break;
            case '-46': return 'درخواست نامعتبر';break;
            case '-47': return 'کلید مجوز دهی یافت نشد [حذف شده]';break;
            case '-48': return 'نرخ کمیسیون تعیین نشده است';break;
            case '-49': return 'تراکنش مورد نظر تکراریست';break;
            case '-50': return 'حساب کاربری برای صندوق مالی یافت نشد';break;
            case '-51': return 'شناسه کاربری یافت نشد';break;
            case '-52': return 'حساب کاربری تایید نشده است';break;
            case '-60': return 'ایمیل صحیح نیست';break;
            case '-61': return 'کد ملی صحیح نیست';break;
            case '-62': return 'کد پستی صحیح نیست';break;
            case '-63': return 'آدرس پستی صحیح نیست و یا بیش از ۱۵۰ کارکتر است';break;
            case '-64': return 'توضیحات صحیح نیست و یا بیش از ۱۵۰ کارکتر است';break;
            case '-65': return 'نام و نام خانوادگی صحیح نیست و یا بیش از ۳۵ کاکتر است';break;
            case '-66': return 'تلفن صحیح نیست';break;
            case '-67': return 'نام کاربری صحیح نیست یا بیش از ۳۰ کارکتر است';break;
            case '-68': return 'نام محصول صحیح نیست و یا بیش از ۳۰ کارکتر است';break;
            case '-69': return 'آدرس ارسالی برای بازگشت موفق صحیح نیست و یا بیش از ۱۰۰ کارکتر است';break;
            case '-70': return 'آدرس ارسالی برای بازگشت ناموفق صحیح نیست و یا بیش از ۱۰۰ کارکتر است';break;
            case '-71': return 'موبایل صحیح نیست';break;
            case '-72': return 'بانک پاسخگو نبوده است لطفا با نکست پی تماس بگیرید';break;
            case '-73': return 'مسیر بازگشت دارای خطا میباشد یا بسیار طولانیست';break;
            case '-90': return 'بازگشت مبلغ بدرستی انجام شد';break;
            case '-91': return 'عملیات ناموفق در بازگشت مبلغ';break;
            case '-92': return 'در عملیات بازگشت مبلغ خطا رخ داده است';break;
            case '-93': return 'موجودی صندوق کاربری برای بازگشت مبلغ کافی نیست';break;
            case '-94': return 'کلید بازگشت مبلغ یافت نشد';break;
            
            default:
                return 'پرداخت تکمیل و با موفقیت انجام شده است';
                break;
        }
    }
}
