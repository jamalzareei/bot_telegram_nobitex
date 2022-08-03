<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use App\Services\MainService;
use App\Services\TelegramService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserAuthenticationController extends Controller
{
    //
    
    public function __construct()
    {
        $this->telService = new TelegramService();
        $this->baseUrlUpload = "https://api.telegram.org/file/bot" . config('telegram.token') . "/";
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
        $path = null;// $this->baseUrlUpload . $file_path;
        $this->telService->forwardMessage(config('telegram.chat_id_notification'), $data['chat_id'], $data['message_id']);
        $this->telService->sendMessage(config('telegram.chat_id_notification'), json_encode($user), null);
        
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
        $path = null;//$this->baseUrlUpload . $file_path;
        return $this->telService->sendMessageReply($data['chat_id'], "با موفقیت ذخیره گردید. \n $path", $data['message_id'], null);
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
        $path = null;//$this->baseUrlUpload . $file_path;
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
}
