<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Models\KeyboradTelegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    //
    protected $token = "5409689822:AAGNeNsImZCV6NTgRGp2ULXzcz1zPzDjAB4";
    protected $baseUrl = "https://telegram.shixeh.com/telegram";

    // https://api.telegram.org/bot5409689822:AAGNeNsImZCV6NTgRGp2ULXzcz1zPzDjAB4/getUpdates
    // https://api.telegram.org/bot5409689822:AAGNeNsImZCV6NTgRGp2ULXzcz1zPzDjAB4/deleteWebHook?url=
    // https://api.telegram.org/bot5409689822:AAGNeNsImZCV6NTgRGp2ULXzcz1zPzDjAB4/sendMessage?chat_id=&amp;text=json
    // https://api.telegram.org/bot5409689822:AAGNeNsImZCV6NTgRGp2ULXzcz1zPzDjAB4/setWebHook?url=https://telegram.shixeh.com/telegram.php
    // https://api.telegram.org/bot5409689822:AAGNeNsImZCV6NTgRGp2ULXzcz1zPzDjAB4/getWebHookInfo?url=https://tel.freecluster.eu/teleg.php

    // https://panel.servermax.net/clientarea.php?action=productdetails&id=1541
    //T^5%OLj,HMWy

    public function __conctract()
    {
        # code...
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


        $keyTelegram = KeyboradTelegram::where('callback_data', $message)
            ->with([
                'children' => function ($queryChild) {
                    $queryChild->select('id', 'text', 'callback_data', 'parent_id');
                }
            ])
            ->first();

        if ($keyTelegram && $keyTelegram->same_callback_data) {
            $keyTelegram = KeyboradTelegram::where('callback_data', $keyTelegram->same_callback_data)
                ->with([
                    'children' => function ($queryChild) {
                        $queryChild->select('id', 'text', 'callback_data', 'parent_id');
                    }
                ])
                ->first();
        }

        $arrayAllCallback = KeyboradTelegram::pluck('callback_data')->toArray();
        $botOld = Bot::where('chate_id', $chat_id)->whereIn('callback_data', $arrayAllCallback)->latest()->first();

        if (!$keyTelegram && $botOld) {
            // اجرای فانکشن 

            $keyTelegramOld = KeyboradTelegram::where('callback_data', $botOld->callback_data)->first();
            $keyTelegram = KeyboradTelegram::where('callback_data', $keyTelegramOld->next_callback_data)
                ->with([
                    'children' => function ($queryChild) {
                        $queryChild->select('id', 'text', 'callback_data', 'parent_id');
                    }
                ])->first();
        }

        $dataUser = [
            '{$firstname}'      => $firstname ?? '',
            '{$lastname}'       => $lastname ?? '',
            '{$birthday}'       => $lastname ?? ''
        ];

        $replyMarkup = null;
        $text = $keyTelegram ? (strtr($keyTelegram->details, $dataUser) ?? '') : ''; // json_encode($keyTelegramChildren[0]);
        if ($keyTelegram && $keyTelegram->children && $keyTelegram->children_type === 'keyboard') {
            $replyMarkup = $this->convertKeyboards($keyTelegram->children->toArray(), $keyTelegram->chunk_children);
        } else if ($keyTelegram && $keyTelegram->children && $keyTelegram->children_type === 'inline_keyboard') {
            $replyMarkup = $this->convertInlineKeyboards($keyTelegram->children->toArray(), $keyTelegram->chunk_children);
        }

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


        $this->sendMessage($chat_id, $text, $replyMarkup);
        // $this->sendMessage($bot_id, $message);
        // $this->sendMessage($group_id, $message);
        // $this->sendMessage($chanel_id, $message);

    }

    public function convertInlineKeyboards($arrayInlineKeyboards, $chunk_children = 2)
    {
        if ($chunk_children <= 0) $chunk_children = 2;
        return  json_encode([
            'inline_keyboard' => array_chunk(array_values($arrayInlineKeyboards), $chunk_children)
        ]);
    }


    public function convertKeyboards($arrayInlineKeyboards, $chunk_children = 2)
    {
        if ($chunk_children <= 0) $chunk_children = 2;
        return json_encode([
            "keyboard" => array_chunk($arrayInlineKeyboards, $chunk_children), "resize_keyboard" => true //,"one_time_keyboard" => false
        ]);
    }

    public function setWebHook()
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/setWebHook?url=" . config('telegram.baseUrl'));
        return $res->json();
    }

    public function deleteWebHook()
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/deleteWebHook?url=" . config('telegram.baseUrl'));
        return $res->json();
    }

    public function getWebHookInfo()
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/getWebHookInfo?url=" . config('telegram.baseUrl'));
        return $res->json();
    }

    public function sendMessage($chatId, $text, $reply_markup = null)
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/sendMessage?chat_id=$chatId&text=$text&reply_markup=$reply_markup");
        return $res->json();
    }
}
