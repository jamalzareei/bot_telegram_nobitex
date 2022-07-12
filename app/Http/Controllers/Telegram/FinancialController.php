<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Models\Request as ModelsRequest;
use App\Models\Status;
use App\Models\Type;
use App\Models\User;
use App\Services\MainService;
use App\Services\TelegramService;

class FinancialController extends Controller
{
    public function __construct()
    {
        # code...
        $this->telService = new TelegramService();
    }

    public function inventoryIncrease()
    {
        $data = $this->telService->getDataTelegram();
        $data['message'] = MainService::ConvertToEn($data['message']);

        $user = User::where('chat_id', $data['chat_id'])->first();

        $type = Type::where('slug', 'افزایش-موجودی')->first();
        $status = Status::where('slug', 'در-انتظار-پرداخت')->first();
        $requestModel = ModelsRequest::create([
            'user_id'           => $user->id,
            'status_id'         => $status->id ?? '',
            'type_id'           => $type->id ?? '',
            'transaction_id'    => null,
            'amount'            => $data['message'],
            'actived_at'        => null,
        ]);
        // save request

        $reply_markup = json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => 'اتصال به درگاه و پرداخت',
                        "callback_data" => 'اتصال به درگاه و پرداخت',
                        "url" => route('pay.nextpay', ['model' => 'Request', 'id' => $requestModel->id, 'type_request' => 'telegram'])
                    ]
                ]
            ]
        ]);
        $text = "
        درخواست شما ثبت شد:

        مبلغ پرداختی: $requestModel->amount ریال
        وضعیت: $status->name
        نوع: $type->name
        .
        ";

        $this->telService->sendMessageReply($data['chat_id'], $text, $data['message_id'], $reply_markup);
    }

    public function ithdrawalFromInventory()
    {
        $data = $this->telService->getDataTelegram();
        $data['message'] = MainService::ConvertToEn($data['message']);

        $user = User::where('chat_id', $data['chat_id'])->first();

        $type = Type::where('slug', 'برداشت-موجودی')->first();
        $status = Status::where('slug', 'در-انتظار-تایید-مدیریت')->first();
        $requestModel = ModelsRequest::create([
            'user_id'           => $user->id,
            'status_id'         => $status->id ?? '',
            'type_id'           => $type->id ?? '',
            'transaction_id'    => null,
            'amount'            => $data['message'],
            'actived_at'        => null,
        ]);
        // save request

        $reply_markup = null;
        $text = "
        درخواست شما ثبت شد
        پس از تایید مدیریت وجه به حساب شما پرداخت خواهد شد.
        
        مبلغ درخواستی: $requestModel->amount ریال
        وضعیت: $status->name
        نوع: $type->name
        .
        ";

        $this->telService->sendMessageReply($data['chat_id'], $text, $data['message_id'], $reply_markup);
    }
}
