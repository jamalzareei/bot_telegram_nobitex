<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Models\KeyboradTelegram;
use App\Services\TelegramService;
use Illuminate\Http\Request;
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

        $group_id = -672687753;
        $chanel_id = -1001697519941;
        $bot_id = 926406689;

        $message = $update['message']['text'] ?? $update['callback_query']['data'] ?? 'NOT';
        $chat_id = $update['message']['chat']['id'] ?? $update['callback_query']['message']['chat']['id'] ?? $bot_id;
        $firstname = $update['message']['chat']['first_name'] ?? $update['callback_query']['message']['chat']['first_name'] ?? '';
        $lastname = $update['message']['chat']['last_name'] ?? $update['callback_query']['message']['chat']['last_name'] ?? '';
        $username = $update['message']['chat']['username'] ?? $update['callback_query']['message']['chat']['username'] ?? '';
        $message_id = $update['message']['message_id'] ?? $update['callback_query']['message']['message_id'] ?? 0;
        $file_id = $update['message']['photo'][0]['file_id'] ?? $update['callback_query']['message']['photo'][0]['file_id'] ?? '';


        $keyTelegram = $this->telService->getKeyTelegram($message);

        if ($keyTelegram && $keyTelegram->same_callback_data) {
            $keyTelegram = $this->telService->getKeyTelegram($keyTelegram->same_callback_data);
        }

        $arrayAllCallback = KeyboradTelegram::pluck('callback_data')->toArray();
        $botOld = Bot::where('chate_id', $chat_id)->whereIn('callback_data', $arrayAllCallback)->latest()->first();

        if (!$keyTelegram && $botOld) {
            // اجرای فانکشن 

            $keyTelegramOld = KeyboradTelegram::where('callback_data', $botOld->callback_data)->first();
            
            $keyTelegram = $this->telService->getKeyTelegram($keyTelegramOld->next_callback_data);
        }

        ///////////login ///////////////
        $login = false;
        if( $keyTelegram && $keyTelegram->permissions && (strpos($keyTelegram->permissions, 'login') !== false) && !$login ){
            // $replyMarkup= json_encode([
            //     "keyboard" => [['ورود به حساب کاربری']], "resize_keyboard" => true //,"one_time_keyboard" => false
            // ]);
            // $this->telService->sendMessage($chat_id, 'ابتدا شماره خود را ثبت نمایید', $replyMarkup);
            // return '';
            $keyTelegram = $this->telService->getKeyTelegram('ورود به حساب کاربری');
        }
        ///////////login ///////////////

        $dataUser = $this->telService->getUserData($chat_id);

        $text = $keyTelegram ? (strtr($keyTelegram->details, $dataUser) ?? '') : ''; // json_encode($keyTelegramChildren[0]);
        
        $replyMarkup = $this->telService->generateMarkup($keyTelegram);

        Bot::create([
            'chate_id' => $chat_id,
            'message' => $message,
            'message_id' => $message_id,
            'file_id' => $file_id,
            'next_answer' => $keyTelegram->next_callback_data ?? '',
            'callback_data' => $keyTelegram->callback_data ?? '',
            'parent_chat' => $keyTelegram->parent_callback_data ?? '',
            'controller_method' => '',
            'firstname' => $firstname,
            'lastname' => $lastname,
            'username' => $username,
            'data' => json_encode($update),
            'session_data' => $keyTelegram && json_encode($keyTelegram) ?? '',
        ]);
        // $text = json_encode($keyTelegram);


        $this->telService->sendMessage($chat_id, $text, $replyMarkup);
        // $this->sendMessage($bot_id, $message);
        // $this->sendMessage($group_id, $message);
        // $this->sendMessage($chanel_id, $message);

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
