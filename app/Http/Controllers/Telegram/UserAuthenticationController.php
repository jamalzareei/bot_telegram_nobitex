<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Setting;
use App\Models\User;
use App\Services\TelegramService;
use Carbon\Carbon;

class UserAuthenticationController extends Controller
{
    //

    public function __construct()
    {
        $this->telService = new TelegramService();
        $this->baseUrlUpload = "https://api.telegram.org/file/bot" . config('telegram.token') . "/";
    }

    public function authenticationUser()
    {
        $data = $this->telService->getDataTelegram();
        $user = User::where('chat_id', $data['chat_id'])->with('roles_telegram')->first();

        $message = $data['message'];
        $chat_id = $data['chat_id'];

        $roleId = ($user && $user->roles_telegram && $user->roles_telegram[0] && $user->roles_telegram[0]->id) ? $user->roles_telegram[0]->id : null;
        $roleName = ($user && $user->roles_telegram && $user->roles_telegram[0] && $user->roles_telegram[0]->name) ? $user->roles_telegram[0]->name : 'برنزی';
        $setting = Setting::where('role_id', $roleId)->first();
        if ($user->authenticate_user) {

            $this->telService->sendMessage($data['chat_id'], "حساب کاربری شما: $roleName \n\n" . $setting->details, null);
            return '';
        }else if($user->request_authenticate_user){
            $text = "\n\n\n حساب کاربری شما: $roleName \n\n" . $setting->details. "\n\n\n ";
            $text .= "حساب شما در مرحله بررسی میباشد.\n\n 💲💲💲💲💲💲💲💲💲💲";
            $this->telService->sendMessage($data['chat_id'], $text, null);
            return '';
        } else {
            $dataUser = $this->telService->getUserData($chat_id, $message);
            $keyTelegram = $this->telService->getKeyTelegram($message, $chat_id);
            $text = $keyTelegram ? (strtr($keyTelegram->details, $dataUser) ?? '') : '';
            $replyMarkup = $this->telService->generateMarkup($keyTelegram);

            $text .= "\n\n\n حساب کاربری شما: $roleName \n\n" . $setting->details;

            if ($keyTelegram->file) {
                return $this->telService->sendPhoto($chat_id, $text, $keyTelegram->file, $replyMarkup);
            }
            $this->telService->sendMessage($chat_id, $text, $replyMarkup);
            return '';
        }


        // $this->telService->sendMessage($data['chat_id'], json_encode(['$user' => $user, 'setting' => $setting]), null);

        // $fileId = 'data';
        // $text = '';
        // $keyTelegram = $this->telService->getKeyTelegram($data['message'], $data['chat_id']);


        // return $this->telService->sendPhoto($data['chat_id'], $text, $keyTelegram->file, null);
    }

    public function detailsUser($user, $type)
    {
        return "#$type \n نام: $user->firstname $user->lastname \n ایمیل: $user->email \n شماره تماس: $user->phone \n";
    }

    public function uploadImageNatinal()
    {
        $data = $this->telService->getDataTelegram();
        $file_id = $data['file_id'] ?? $data['document_id'];

        $user = User::where('chat_id', $data['chat_id'])->first();

        $getFile = $this->telService->getFile($file_id);
        $file_path = $getFile["result"]["file_path"] ?? '-';
        $size_file = $getFile["result"]["file_size"] ?? 0;
        Document::create([
            'user_id' => $user->id,
            'path' => $file_path,
            'size_file' => $size_file,
            'base_url' => $this->baseUrlUpload,
            'file_id_telegram' => $file_id,
            'type_file' => 'کارت ملی',
            'actived_at' => Carbon::now(),

        ]);
        $path = null; // $this->baseUrlUpload . $file_path;
        $this->telService->forwardMessage(config('telegram.chat_id_notification'), $data['chat_id'], $data['message_id']);
        $this->telService->sendMessage(config('telegram.chat_id_notification'), $this->detailsUser($user, 'عکس_کارت_ملی'), null);
        // $this->telService->sendPhoto(config('telegram.chat_id_notification'), $this->detailsUser($user, 'عکس_کارت_ملی'), $file_id, $reply_markup = null);

        return $this->telService->sendMessageReply($data['chat_id'], "با موفقیت ذخیره گردید.", $data['message_id'], null);
    }

    public function uploadImageSelfi()
    {

        $data = $this->telService->getDataTelegram();
        $file_id = $data['file_id'] ?? $data['document_id'];

        $user = User::where('chat_id', $data['chat_id'])->first();

        $getFile = $this->telService->getFile($file_id);
        $file_path = $getFile["result"]["file_path"] ?? '-';
        $size_file = $getFile["result"]["file_size"] ?? 0;
        Document::create([
            'user_id' => $user->id,
            'path' => $file_path,
            'size_file' => $size_file,
            'base_url' => $this->baseUrlUpload,
            'file_id_telegram' => $file_id,
            'type_file' => "عکس سلفی",
            'actived_at' => Carbon::now(),

        ]);
        $path = null; //$this->baseUrlUpload . $file_path;
        $this->telService->forwardMessage(config('telegram.chat_id_notification'), $data['chat_id'], $data['message_id']);
        $this->telService->sendMessage(config('telegram.chat_id_notification'), $this->detailsUser($user, 'عکس_سلفی'), null);
        // $this->telService->sendPhoto(config('telegram.chat_id_notification'), $this->detailsUser($user, 'عکس_سلفی'), $file_id, $reply_markup = null);
        return $this->telService->sendMessageReply($data['chat_id'], "با موفقیت ذخیره گردید. \n $path", $data['message_id'], null);
    }

    public function uploadCardBank()
    {
        $data = $this->telService->getDataTelegram();
        $file_id = $data['file_id'] ?? $data['document_id'];

        $user = User::where('chat_id', $data['chat_id'])->first();

        $getFile = $this->telService->getFile($file_id);
        $file_path = $getFile["result"]["file_path"] ?? '-';
        $size_file = $getFile["result"]["file_size"] ?? 0;
        Document::create([
            'user_id' => $user->id,
            'path' => $file_path,
            'size_file' => $size_file,
            'base_url' => $this->baseUrlUpload,
            'file_id_telegram' => $file_id,
            'type_file' => 'کارت بانکی',
            'actived_at' => Carbon::now(),

        ]);
        $path = null; // $this->baseUrlUpload . $file_path;
        $this->telService->forwardMessage(config('telegram.chat_id_notification'), $data['chat_id'], $data['message_id']);
        $this->telService->sendMessage(config('telegram.chat_id_notification'), $this->detailsUser($user, 'عکس_کارت_بانکی'), null);
        // $this->telService->sendPhoto(config('telegram.chat_id_notification'), $this->detailsUser($user, 'عکس_کارت_ملی'), $file_id, $reply_markup = null);

        return $this->telService->sendMessageReply($data['chat_id'], "با موفقیت ذخیره گردید.", $data['message_id'], null);
    }

    public function uploadVideoSelfi()
    {
        $data = $this->telService->getDataTelegram();
        $file_id = $data['file_id'] ?? $data['video_id'] ?? $data['document_id'];

        $user = User::where('chat_id', $data['chat_id'])->first();

        $getFile = $this->telService->getFile($file_id);
        $file_path = $getFile["result"]["file_path"] ?? '-';
        $size_file = $getFile["result"]["file_size"] ?? 0;
        // return $this->telService->sendMessageReply($data['chat_id'], json_encode(['$dataUser'=>$getFile]), null);
        Document::create([
            'user_id' => $user->id,
            'path' => $file_path,
            'size_file' => $size_file,
            'base_url' => $this->baseUrlUpload,
            'file_id_telegram' => $file_id,
            'type_file' => "ویدئو سلفی",
            'actived_at' => Carbon::now(),

        ]);
        $path = null; //$this->baseUrlUpload . $file_path;
        $this->telService->forwardMessage(config('telegram.chat_id_notification'), $data['chat_id'], $data['message_id']);
        $this->telService->sendMessage(config('telegram.chat_id_notification'), $this->detailsUser($user, 'ویدئو_سلفی'), null);
        // $this->telService->sendPhoto(config('telegram.chat_id_notification'), $this->detailsUser($user, 'ویدئو_سلفی'), $file_id, $reply_markup = null);

        return $this->telService->sendMessageReply($data['chat_id'], "با موفقیت ذخیره گردید. \n $path", $data['message_id'], null);
    }

    public function authUserNextpay()
    {
        $data = $this->telService->getDataTelegram();

        // $this->telService->answerCallbackQuery($data['callback_query_id'], 'اطلاعات حساب شما تکمیل نمیباشد', $url = null);


        $user = User::where('chat_id', $data['chat_id'])->first();
        return $this->telService->sendMessageReply($data['chat_id'], 'اطلاعات حساب شما تکمیل نمیباشد', $data['message_id'], null);
        // MainService::saveNotification($user->id, 1, '', '', 'تایید هویت کاربر', "کاربر با شماره $user->phone تایید هویت گردید.");
    }

    public function sendDataForAuthentication()
    {
        
        $data = $this->telService->getDataTelegram();
        $user = User::where('chat_id', $data['chat_id'])->first();
        $user->request_authenticate_user = Carbon::now();
        $user->save();


        $documents = Document::where('user_id', $user->id)->get();
        foreach ($documents as $doc){
            if($doc->type_file == "ویدئو سلفی"){
                $this->telService->sendVideo(config('telegram.chat_id_notification'), $this->detailsUser($user, str_replace(' ','_',$doc->type_file)), $doc->file_id_telegram, null);
            }else{
                $this->telService->sendPhoto(config('telegram.chat_id_notification'), $this->detailsUser($user, str_replace(' ','_',$doc->type_file)), $doc->file_id_telegram, null);
            }
        }
        
        // $this->telService->forwardMessage(config('telegram.chat_id_notification'), $data['chat_id'], $data['message_id']);
        $this->telService->sendMessage(config('telegram.chat_id_notification'), $this->detailsUser($user, 'تایید_هویت_کاربر'), null);
        
        return $this->telService->sendMessageReply($data['chat_id'], "اطلاعات با موفقیت ارسال گردید.\n\n بزودی بررسی اطلاعات شما انجام خواهد گرفت", $data['message_id'], null);
    }
}
