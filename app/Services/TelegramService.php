<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Bot;
use App\Models\KeyboradTelegram;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class TelegramService
{
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
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/sendMessage?chat_id=$chatId&text=$text\n&reply_markup=$reply_markup");
        return $res->json();
    }
    
    public function sendMessageReply($chatId, $text, $reply_to_message_id)
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/sendMessage?chat_id=$chatId&text=$text&reply_to_message_id=$reply_to_message_id");
        return $res->json();
    }

    public function sendChatAction($chatId, $action)
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/sendChatAction?chat_id=$chatId&action=$action");
        return $res->json();
    }

    public function answerCallbackQuery($callback_query_id, $text)
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/answerCallbackQuery?callback_query_id=". $callback_query_id ."&text=$text&show_alert=true");
        return $res->json();
    }

    public function generateMarkup($keyTelegram)
    {
        $replyMarkup = null;
        if ($keyTelegram && $keyTelegram->children && $keyTelegram->children_type === 'keyboard') {
            $replyMarkup = $this->convertKeyboards($keyTelegram->children->toArray(), $keyTelegram->chunk_children);
        } else if ($keyTelegram && $keyTelegram->children && $keyTelegram->children_type === 'inline_keyboard') {
            $replyMarkup = $this->convertInlineKeyboards($keyTelegram->children->toArray(), $keyTelegram->chunk_children);
        }
        return $replyMarkup;
    }
    
    public function getKeyTelegram($callback_data)
    {
        return KeyboradTelegram::where('callback_data', $callback_data)
            ->with([
                'children' => function ($queryChild) {
                    $queryChild->select('id', 'text', 'callback_data', 'parent_id');
                }
            ])
            ->first();
    }

    public function getUserData($chat_id)
    {
        $user = User::where('chat_id', $chat_id)->with('accounts')->first();
        
        $listShaba = Account::where('number', 'like', '%IR%')->pluck('number')->toArray();//
        $listCredit = Account::where('number', 'not like', '%IR%')->pluck('number')->toArray();
        return [
            'user'              => $user ? $user : null,
            '{$firstname}'      => $user->firstname ?? '',
            '{$lastname}'       => $user->lastname ?? '',
            '{$birthday}'       => $user->birth_date_fa ?? '',
            '{$phone}'          => $user->phone ?? '',
            '{$balance}'        => $user->balance ?? '0',
            '{$national_code}'  => $user->national_code ?? '0',
            '{$listCredit}'     => implode("\n",$listCredit) ?? 'هنوز کارتی وارد نشده است',//json_encode($listCredit)
            '{$listShaba}'      => implode("\n",$listShaba) ?? 'هنوز شماره شبا وارد نشده است',//json_encode($listShaba)
        ];
    }

    public function getDataTelegram()
    {
        $data = request();
        $result = [];
        $result['message'] = $data['message']['text'] ?? $data['callback_query']['data'] ?? 'NOT';
        $result['chat_id'] = $data['message']['chat']['id'] ?? $data['callback_query']['message']['chat']['id'] ?? config('telegram.bot_id');
        $result['from_id'] = $data['message']['from']['id'] ?? $data['callback_query']['message']['from']['id'] ?? '0';
        $result['firstname'] = $data['message']['chat']['first_name'] ?? $data['callback_query']['message']['chat']['first_name'] ?? '';
        $result['lastname'] = $data['message']['chat']['last_name'] ?? $data['callback_query']['message']['chat']['last_name'] ?? '';
        $result['username'] = $data['message']['chat']['username'] ?? $data['callback_query']['message']['chat']['username'] ?? '';
        $result['message_id'] = $data['message']['message_id'] ?? $data['callback_query']['message']['message_id'] ?? 0;
        $result['file_id'] = $data['message']['photo'][0]['file_id'] ?? $data['callback_query']['message']['photo'][0]['file_id'] ?? '';
        
        $result['data_query'] = $data['callback_query']['data'] ?? '';
        $result['callback_query_id'] = $data['callback_query']['id'] ?? '';


        return $result;
    }

    public function saveBot($data, $keyTelegram)
    {        
        Bot::create([
            'chat_id' => $data['chat_id'],
            'message' => $data['message'],
            'message_id' => $data['message_id'],
            'file_id' => $data['file_id'],
            'next_answer' => $keyTelegram->next_callback_data ?? '',
            'callback_data' => $keyTelegram->callback_data ?? '',
            'parent_chat' => $keyTelegram->parent_callback_data ?? '',
            'controller_method' => $keyTelegram->controller_method ?? '',
            'controller_method_child' => $keyTelegram->controller_method_child ?? '',
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'data' => json_encode(request()->all()),
            'session_data' => json_encode(request()->all())
        ]);
    }

    public function sendMessageFromControllers($data, $callback_date, $methodName = 'sendMessage')
    {
        # code...
        $keyTelegram = $this->getKeyTelegram($callback_date);
        $dataUser = $this->getUserData($data['chat_id']);
        $text = $keyTelegram ? (strtr($keyTelegram->details, $dataUser) ?? '') : '';
        $replyMarkup = $this->generateMarkup($keyTelegram);

        $this->saveBot($data, $keyTelegram);

        if($methodName == 'sendMessage'){
            $this->sendMessage($data['chat_id'], $text, $replyMarkup);
        }
        
    }
}
