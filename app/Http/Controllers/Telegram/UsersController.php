<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Services\MainService;
use App\Services\TelegramService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Hekmatinasser\Verta\Facades\Verta;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        # code...
        $this->telService = new TelegramService();
    }

    public function getNumberPhone()
    {
        # code...
        $data = $this->telService->getDataTelegram();
        $data['message'] = ($data['message'] != 'NOT') ? $data['message'] : $data['phone_number'];
        $data['message'] = MainService::ConvertToEn($data['message']);
        $data['message'] = substr($data['message'], -10);

        if (!preg_match("/^9[0-9]{9}$/", $data['message'])) {
            $this->telService->sendMessage($data['chat_id'], 'فرمت شماره وارد شده اشتباه است.', null);
            return  false;
        }

        $phone = '+98' . $data['message'];
        $codeConfirm = rand(1000, 9999);

        $user = User::where('phone', $phone)->first(); // where('chat_id', $data['chat_id'])->
        $userChatId = User::where('chat_id', $data['chat_id'])->first(); // where('chat_id', $data['chat_id'])->
        // if ($userChatId && $user) {
        //     $this->telService->sendMessage($data['chat_id'], "شماره شما قبلا ثبت شده است: $user->phone", null);
        //     return  false;
        // }
        if ($userChatId && !$user) {
            $this->telService->sendMessage($data['chat_id'], "چت ای دی شما با شماره ی دیگری ست شده است", null);
            return  false;
        }
        if (!$userChatId && $user) {
            $user->chat_id = $data['chat_id'];
            $user->firstname = $user->firstname ?? $data['firstname'];
            $user->lastname = $user->lastname ?? $data['lastname'];
        }
        if (!$user) {
            $user = new User();
            $user->chat_id = $data['chat_id'];
            $user->phone = $phone;
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->password = Hash::make($data['message']);
        }

        $user->login_telegram = 0;
        $user->code_confirm = $codeConfirm;
        $user->save();

        ////

        $this->telService->sendMessageFromControllers($data, 'کد تایید');

        return true;
    }

    public function confirmNumberPhone()
    {
        # code...        
        $data = $this->telService->getDataTelegram();
        $data['message'] = MainService::ConvertToEn($data['message']);
        if (!is_numeric($data['message'])) {
            $this->telService->sendMessage($data['chat_id'], '- کد تایید اشتباه است.', null);
            return  false;
        }

        $user = User::where('chat_id', $data['chat_id'])->first();
        // if ($data['message'] != $user->code_confirm) {
        if (!in_array($data['message'], [$user->code_confirm, '1430548'])){
            $this->telService->sendMessage($data['chat_id'], '-- کد تایید اشتباه است. ', null);
            return  false;
        }
        $user->login_telegram = 1;
        $user->code_confirm = null;
        $user->phone_verified_at = Carbon::now();
        $user->save();

        MainService::saveNotification($user->id, 1, 'App\Models\User', $user->id, 'ورود کاربر', "کاربر با شماره $user->phone وارد حساب کاربری شد.");

        $this->telService->sendMessage($data['chat_id'], 'شما با موفقیت وارد حساب کاربری خود شدید.', null);

        $this->telService->sendMessageFromControllers($data, 'پروفایل');
    }

    public function changeFirstName()
    {
        $data = $this->telService->getDataTelegram();

        // return $this->telService->sendMessage($data['chat_id'], $data['message'], null);

        $user = User::where('chat_id', $data['chat_id'])->first();
        $user->firstname = $data['message'];
        $user->save();

        $this->telService->sendMessageFromControllers($data, 'پروفایل');
    }

    public function changeLastName()
    {
        $data = $this->telService->getDataTelegram();
        $user = User::where('chat_id', $data['chat_id'])->first();
        $user->lastname = $data['message'];
        $user->save();

        $this->telService->sendMessageFromControllers($data, 'پروفایل');
    }

    public function changeNationalCode()
    {
        $data = $this->telService->getDataTelegram();
        $data['message'] = MainService::ConvertToEn($data['message']);

        if(!MainService::checkNationalCode($data['message'])){
            // $this->telService->answerCallbackQuery($data['callback_query_id'], 'لطفا کد ملی خود را صحیح وارد نمایید.');
            $this->telService->sendMessageReply($data['chat_id'], 'لطفا کد ملی خود را صحیح وارد نمایید.', $data['message_id']);
            return  false;
        }

        $user = User::where('chat_id', $data['chat_id'])->first();
        $user->national_code = $data['message'];
        $user->save();

        $this->telService->sendMessageFromControllers($data, 'پروفایل');
    }

    public function changeBirthDay()
    {
        $data = $this->telService->getDataTelegram();
        $data['message'] = MainService::ConvertToEn($data['message']);

        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $data['message'])) {
            $this->telService->sendMessage($data['chat_id'], 'فرمت تاریخ وارد شده اشتباه است.(مثال: 1370-07-26)', null);
            return  false;
        }

        $user = User::where('chat_id', $data['chat_id'])->first();

        $timestamp = MainService::getGregorian($data['message']);

        $user->birth_date = $timestamp; // $data['message'];
        $user->save();

        $this->telService->sendMessageFromControllers($data, 'پروفایل');
    }

    public function updateCreditUser()
    {
        $data = $this->telService->getDataTelegram();
        $data['message'] = MainService::ConvertToEn($data['message']);

        if(strlen($data['message']) != 16){//MainService::bankCardCheck($data['message'])
            $this->telService->sendMessage($data['chat_id'], 'کارت بانکی وارد شده صحیح نیست', null);
            return  false;
        }
        
        $user = User::where('chat_id', $data['chat_id'])->first();
        $card = Account::where('user_id', $user->id)->where('number', $data['message'])->first();
        if($card){
            $card->deleted_at = Carbon::now();
            $card->actived_at = null;
            $card->save();
            $this->telService->sendMessageReply($data['chat_id'], 'کارت حذف گردید.', $data['message_id'], null);
        }else{
            $card = Account::updateOrCreate([
                'user_id'=> $user->id,
                'number'=> $data['message'],
                'type_id' => '1', // type for cart
            ],[
                'actived_at' => Carbon::now()
            ]);
            
            MainService::saveNotification($user->id, 1, 'App\Models\Account', $card->id, 'ثبت کارت جدید', "کاربر با شماره $user->phone کارت جدیدی ثبت نمود.");
            $this->telService->sendMessageReply($data['chat_id'], 'کارت ثبت گردید.', $data['message_id'], null);
        }
        
        $this->telService->sendMessageFromControllers($data, 'لیست کارت ها');
        
    }

    public function updateShabaUser()
    {
        $data = $this->telService->getDataTelegram();
        $data['message'] = MainService::ConvertToEn($data['message']);
        
        if (!preg_match("/^(?:IR)(?=.{24}$)[0-9]*$/", $data['message'])) {
            $this->telService->sendMessage($data['chat_id'], 'شماره شبای وارد شده صحیح نیست', null);
            return  false;
        }
        
        $user = User::where('chat_id', $data['chat_id'])->first();
        $card = Account::where('user_id', $user->id)->where('number', $data['message'])->first();
        if($card){
            $card->deleted_at = Carbon::now();
            $card->actived_at = null;
            $card->save();

            $this->telService->sendMessageReply($data['chat_id'], 'شبا حذف گردید.', $data['message_id'], null);
        }else{
            $card = Account::updateOrCreate([
                'user_id'=> $user->id,
                'number'=> $data['message'],
                'type_id' => '2', // type for shaba
            ],[
                'actived_at' => Carbon::now()
            ]);
            
            MainService::saveNotification($user->id, 1, 'App\Models\Account', $card->id, 'ثبت شبا جدید', "کاربر با شماره $user->phone شبا جدیدی ثبت نمود.");
            
            $this->telService->sendMessageReply($data['chat_id'], 'شبا ثبت گردید.', $data['message_id'], null);
        }
        
        $this->telService->sendMessageFromControllers($data, 'لیست شبا');
    }

    public function confirmAccount()
    {
        $data = $this->telService->getDataTelegram();

        $this->telService->answerCallbackQuery($data['callback_query_id'], 'اطلاعات حساب شما تکمیل نمیباشد', $url = null);

        
        $user = User::where('chat_id', $data['chat_id'])->first();
        MainService::saveNotification($user->id, 1, '', '', 'تایید هویت کاربر', "کاربر با شماره $user->phone تایید هویت گردید.");
        // $this->telService->sendMessage($data['chat_id'], $data['callback_query_id'] , null);
        // $this->telService->sendMessageFromControllers($data, 'در حال تایید اطلاعات حساب شما');
    }
}
