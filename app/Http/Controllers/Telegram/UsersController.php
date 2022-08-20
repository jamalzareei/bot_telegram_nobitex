<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Services\MainService;
use App\Services\TelegramService;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        # code...
        $this->telService = new TelegramService();
        $data = $this->telService->getDataTelegram();
        
        $user = User::where('chat_id', $data['chat_id'])->first();
        if(!$user){
            $text = 'ابتدا وارد حساب کاربری خود شوید';
            $this->telService->sendMessage($data['chat_id'], $text, null);
            
            $keyTelegram = $this->telService->getKeyTelegram('ورود به حساب کاربری', $data['chat_id']);

            $this->telService->saveBot($data, $keyTelegram);
             App::call($keyTelegram->controller_method);
            die();return;
            
            $dataUser = $this->telService->getUserData($data['chat_id'], $data['message']);
            $text = $keyTelegram ? (strtr($keyTelegram->details, $dataUser) ?? '') : '';
            $replyMarkup = $this->telService->generateMarkup($keyTelegram);
            $this->telService->sendMessage($data['chat_id'], $text, $replyMarkup);
            die();return;
        }
    }


    public function changeFirstName()
    {
        $data = $this->telService->getDataTelegram();

        // return $this->telService->sendMessage($data['chat_id'], $data['message'], null);

        $user = User::where('chat_id', $data['chat_id'])->first();
        if($user){

            $user->firstname = $data['message'];
            $user->save();
    
            $this->telService->sendMessageFromControllers($data, 'پروفایل');
        }
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
            // $card->deleted_at = Carbon::now();
            // $card->actived_at = null;
            // $card->save();
            // $this->telService->sendMessageReply($data['chat_id'], 'کارت حذف گردید.', $data['message_id'], null);
            
            $this->telService->sendMessageReply($data['chat_id'], 'این شماره کارت قبلا ثبت شده است.', $data['message_id'], null);
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
        
        // $this->telService->sendMessageFromControllers($data, 'لیست کارت ها');
        
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
            // $card->deleted_at = Carbon::now();
            // $card->actived_at = null;
            // $card->save();

            // $this->telService->sendMessageReply($data['chat_id'], 'شبا حذف گردید.', $data['message_id'], null);
            $this->telService->sendMessageReply($data['chat_id'], 'این شماره شبا قبلا ثبت شده است.', $data['message_id'], null);
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
        
        // $this->telService->sendMessageFromControllers($data, 'لیست شبا');
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
