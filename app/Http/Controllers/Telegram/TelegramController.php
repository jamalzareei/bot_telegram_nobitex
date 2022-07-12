<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Models\KeyboradTelegram;
use App\Services\MainService;
use App\Services\TelegramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    //
    protected $token = "5409689822:AAGNeNsImZCV6NTgRGp2ULXzcz1zPzDjAB4";
    protected $baseUrl = "https://telegram.shixeh.com/telegram";
    private $telService;

    public function __construct()
    {
        # code...
        $this->telService = new TelegramService();
    }

    public function index(Request $request)
    {
        # code...
        ini_set("allow_url_fopen", "1");
        $json = file_get_contents("php://input");
        $update = json_decode($json, true);

        $message = $update['message']['text'] ?? $update['callback_query']['data'] ?? 'NOT';
        $chat_id = $update['message']['chat']['id'] ?? $update['callback_query']['message']['chat']['id'] ?? config('telegram.bot_id');


        $data = $this->telService->getDataTelegram();
        $dataUser = $this->telService->getUserData($chat_id);
        $this->telService->sendMessage(config('telegram.chanel_id'), json_encode(['$dataUser'=>$dataUser]), null);

        $keyTelegram = $this->telService->getKeyTelegram($message);

        if ($keyTelegram && $keyTelegram->same_callback_data) {
            $keyTelegram = $this->telService->getKeyTelegram($keyTelegram->same_callback_data);
        }

        $arrayAllCallback = KeyboradTelegram::pluck('callback_data')->toArray();
        $botOld = Bot::where('chat_id', $chat_id)->whereIn('callback_data', $arrayAllCallback)->latest()->first();
        $this->telService->sendMessage(config('telegram.chanel_id'), json_encode(['1'=>$botOld]), null);

        ///////////login ///////////////
        $login = false;
        if( $keyTelegram && $keyTelegram->permissions && (strpos($keyTelegram->permissions, 'login') !== false) && !$dataUser['user'] ){
            $this->telService->sendMessage(config('telegram.chanel_id'), json_encode(['2'=>$keyTelegram]), null);
            $keyTelegram = $this->telService->getKeyTelegram('ورود به حساب کاربری');
        }
        ///////////login ///////////////
        
        if (!$keyTelegram && $botOld) {

            $keyTelegramOld = KeyboradTelegram::where('callback_data', $botOld->callback_data)->first();

            $keyTelegram = $this->telService->getKeyTelegram($keyTelegramOld->callback_data);
            
            $this->telService->sendMessage(config('telegram.chanel_id'), json_encode(['3'=>$keyTelegram]), null);

            if($keyTelegram->controller_method_child){
                return App::call($keyTelegram->controller_method_child);
            }
        }
        if($keyTelegram->controller_method){
            $this->telService->sendMessage(config('telegram.chanel_id'), json_encode(['$keyTelegram->controller_method'=>$keyTelegram->controller_method]), null);
            return App::call($keyTelegram->controller_method);
        }
        

        $text = $keyTelegram ? (strtr($keyTelegram->details, $dataUser) ?? '') : '';
        $replyMarkup = $this->telService->generateMarkup($keyTelegram);

        $this->telService->saveBot($data, $keyTelegram);

        MainService::saveRequestInFile();
        $this->telService->sendMessage($chat_id, $text, $replyMarkup);

    }

    public function getWebHookInfo()
    {
        return $this->telService->getWebHookInfo();
    }

    public function setWebHook()
    {
        return $this->telService->setWebHook();
    }

    public function deleteWebHook()
    {
        return $this->telService->deleteWebHook();
    }
    
}
