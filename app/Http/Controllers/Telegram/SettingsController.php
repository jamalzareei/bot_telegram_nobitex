<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\KeyboradTelegram;
use App\Models\Notification;
use App\Models\Request as ModelsRequest;
use App\Models\Type;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Storage;
use  Image;

class SettingsController extends Controller
{
    //
    
    public function __construct()
    {
        $this->telService = new TelegramService();

        $data = $this->telService->getDataTelegram();
        if (!in_array($data['chat_id'], config('telegram.chat_id_admins'))){
            // return $this->telService->sendMessage($data['chat_id'], "شما اجازه دسترسی به این بخش را ندارید.", null);
            return $this->telService->sendMessageReply($data['chat_id'], "شما اجازه دسترسی به این بخش را ندارید.", $data['message_id'], null);
        }
    }
    
    public function changeImageMenu()
    {
        # code...
        $data = $this->telService->getDataTelegram();
        $file_id = $data['file_id'] ?? $data['document_id'];
        
        $key = KeyboradTelegram::where('callback_data', '/start')->first();
        $key->file = $file_id;
        $key->save();

        $getFile = $this->telService->getFile($file_id);
        // $getFile["result"]["file_id"]: "AgACAgQAAxkBAAILDWLa_Dw9Cyuv41m1ymKM3u12QkKoAAK2uTEbIOLYUs-qrvcRg2CBAQADAgADcwADKQQ",
        // $getFile["result"]["file_unique_id"]: "AQADtrkxGyDi2FJ4",
        // $getFile["result"]["file_size"]: 630,
        // $getFile["result"]["file_path"]: "photos/file_0.jpg",
        $file_path = $getFile["result"]["file_path"] ?? null;

        

        if($file_path){
            $url = $this->telService->getFilePath($file_path);
            $contents = file_get_contents($url);
            // $name = substr($url, strrpos($url, '/') + 1);
            Storage::disk('public')->put("uploads/admin/menu.jpg", $contents);

        }
        
        return $this->telService->sendMessageReply($data['chat_id'], "با موفقیت ذخیره گردید.", $data['message_id'], null);
    }

    public function changeMessageMenu()
    {
        # code...
        $data = $this->telService->getDataTelegram();
        
        $key = KeyboradTelegram::where('callback_data', '/start')->first();
        $key->details = $data['message'];
        $key->save();
        
        return $this->telService->sendMessageReply($data['chat_id'], "با موفقیت ذخیره گردید.", $data['message_id'], null);
    }

    public function notifications()
    {
        $data = $this->telService->getDataTelegram();
        $notifications = Notification::whereNull('readed_at')->get();

        $str = '';
        foreach ($notifications as $key => $noty) {
            # code...
            $row = $key+1;
            $str .= "\n$row- $noty->title\n💯 $noty->message\n";
        }
        $str .= "\n 💲💲💲💲💲💲💲";
        
        return $this->telService->sendMessageReply($data['chat_id'], $str, $data['message_id'], null);
        return $str;
    }

    public function faqs()
    {
        $data = $this->telService->getDataTelegram();
        $faqs = Faq::whereNull('answer')->get();

        $str = '';
        foreach ($faqs as $key => $faq) {
            # code...
            $row = $key+1;
            $str .= "\n$row- $faq->title\n💯 $faq->answer\n";
        }
        $str .= "\n 💲💲💲💲💲💲💲";
        return $this->telService->sendMessageReply($data['chat_id'], $str, $data['message_id'], null);
        return $str;
    }

    public function requests()
    {
        $data = $this->telService->getDataTelegram();
        $requests = ModelsRequest::latest('id')->take(20)->get();
        $typeInc = Type::where('slug', 'افزایش-موجودی')->first();
        $typeDec = Type::where('slug', 'برداشت-موجودی')->first();

        $str = '';
        // foreach ($requests as $key => $req) {
        //     # code...
        //     $row = $key+1;
        //     $str .= "\n$row- $req->title\n💯 $req->answer\n";
        // }
        foreach ($requests as $key => $req) {
            # code...
            $type = null;
            if($req->type_id == $typeInc->id){
                $type = '✅ افزایش موجودی';
            }else if($req->type_id == $typeDec->id){
                $type = '❌ برداشت موجودی';
            }
            $numFormatAmount = number_format($req->amount);
            $str .= "\n$type $numFormatAmount ریال \n";// $wallet->created_at
        }
        $str .= "\n 💲💲💲💲💲💲💲";
        return $this->telService->sendMessageReply($data['chat_id'], $str, $data['message_id'], null);
        return $str;
    }

    public function changeHelp()
    {
        $data = $this->telService->getDataTelegram();
        
        $key = KeyboradTelegram::where('callback_data', 'راهنمایی')->first();
        $key->details = $data['message'];
        $key->save();
        
        return $this->telService->sendMessageReply($data['chat_id'], "با موفقیت ذخیره گردید.", $data['message_id'], null);
    }
}
