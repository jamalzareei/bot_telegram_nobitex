<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Bot;
use App\Models\Faq;
use App\Models\KeyboradTelegram;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class TelegramService
{
    public function convertInlineKeyboards($arrayInlineKeyboards, $chunk_children = 2)
    {
        if ($chunk_children <= 0) $chunk_children = 2;
        return  json_encode([
            'inline_keyboard' => array_chunk(array_values($arrayInlineKeyboards), $chunk_children),
            //'remove_keyboard' => true
        ]);
    }

    public function convertKeyboards($arrayInlineKeyboards, $chunk_children = 2)
    {
        if ($chunk_children <= 0) $chunk_children = 2;
        foreach($arrayInlineKeyboards as $key => $value) {
            if($arrayInlineKeyboards[$key]['callback_data'] == 'درخواست شماره تلفن'){
                $arrayInlineKeyboards[$key]['request_contact'] = true;
            }
        }
        return json_encode([
            "keyboard" => array_chunk($arrayInlineKeyboards, $chunk_children), "resize_keyboard" => true ,// "remove_keyboard" => true
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
        // $text = '
        // <b>bold</b>
        // <strong>bold</strong>
        // <i>italic</i>
        // <em>italic</em>
        // <a href="http://www.example.com/">inline URL</a>
        // <code>inline fixed-width code</code>
        // <pre>pre-formatted fixed-width code block</pre>
        // ';
        $text = urlencode($text);
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/sendMessage?chat_id=$chatId&text=$text &reply_markup=$reply_markup&parse_mode=html");
        return $res->json();
    }

    public function sendPhoto($chatId, $text, $photo, $reply_markup = null)
    {
        $text = urlencode($text);
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/sendPhoto?chat_id=$chatId&photo=$photo&caption=$text&reply_markup=$reply_markup&parse_mode=html");
        return $res->json();
    }
    
    public function sendMessageReply($chatId, $text, $reply_to_message_id, $reply_markup = null)
    {
        $text = urlencode($text);
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/sendMessage?chat_id=$chatId&text=$text &reply_to_message_id=$reply_to_message_id&reply_markup=$reply_markup&parse_mode=html");
        return $res->json();
    }

    public function getFile($file_id)
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/getFile?file_id=$file_id");
        return $res->json();
    }
    
    public function getFilePath($file_path)
    {
        return "https://api.telegram.org/file/bot" . config('telegram.token') . "/$file_path";
        ///
        $res = Http::get("https://api.telegram.org/file/bot" . config('telegram.token') . "/$file_path");
        return $res->json();
    }

    public function sendChatAction($chatId, $action)
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/sendChatAction?chat_id=$chatId&action=$action");
        return $res->json();
    }

    public function answerCallbackQuery($callback_query_id, $text, $url = null)
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/answerCallbackQuery?callback_query_id=". $callback_query_id ."&text=$text&show_alert=true&url=$url");
        return $res->json();
    }
    
    public function getChatMember($chatId, $user_id)
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/getChatMember?chat_id=$chatId&user_id=$user_id");
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
    
    public function getKeyTelegram($callback_data, $chat_id = null)
    {
        $permissions = "admin"; // admin
        if (in_array($chat_id, config('telegram.chat_id_admins'))){
            $permissions = "aaaa";
        }
        return KeyboradTelegram::where('callback_data', $callback_data)
            ->with([
                'children' => function ($queryChild) use($permissions) {
                    $queryChild->select('id', 'text', 'callback_data', 'parent_id')->where('permissions', 'not like', "%$permissions%");
                }
            ])
            ->where('permissions', 'not like', "%$permissions%")
            ->first();
    }

    public function getUserData($chat_id, $message)
    {
        $user = User::where('chat_id', $chat_id)->where('login_telegram', 1)->with('accounts')->first();
        
        $listShaba = Account::where('number', 'like', '%IR%')->pluck('number')->toArray();//
        $listCredit = Account::where('number', 'not like', '%IR%')->pluck('number')->toArray();
        $listWallet = $user ? FinancialService::inventoryCalculation($user->id) : null;
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
            '{$listWallet}'     => $listWallet['str'] ?? '',
            '{$balance}'        => $listWallet['balance'] ?? '',
            '{$faqsList}'       => $this->faqsList(),
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
        $result['file_id'] = $data['message']['photo'][1]['file_id'] ?? $data['callback_query']['message']['photo'][0]['file_id'] ?? '';
        
        $result['data_query'] = $data['callback_query']['data'] ?? '';
        $result['callback_query_id'] = $data['callback_query']['id'] ?? '';

        
        $result['phone_number'] = $data["message"]["contact"]["phone_number"] ?? '';

        return $result;
    }

    public function saveBot($data, $keyTelegram)
    {        
        Bot::create([
            'chat_id' => $data['chat_id'],
            'message' => $data['message'],
            'message_id' => $data['message_id'],
            'file_id' => $data['file_id'],
            'callback_query_id' => $data['callback_query_id'] ?? null,
            'next_answer' => $keyTelegram->next_callback_data ?? '',
            'callback_data' => $keyTelegram->callback_data ?? '',
            'parent_chat' => $keyTelegram->parent_callback_data ?? '',
            'controller_method' => $keyTelegram->controller_method ?? '',
            'controller_method_child' => $keyTelegram->controller_method_child ?? '',
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'data' => json_encode(request()->all()),
            'session_data' => json_encode($data)
        ]);
    }

    public function sendMessageFromControllers($data, $callback_data, $methodName = 'sendMessage')
    {
        # code...
        $keyTelegram = $this->getKeyTelegram($callback_data, $data['chat_id']);
        
        $this->saveBot($data, $keyTelegram);

        $dataUser = $this->getUserData($data['chat_id'], $data['message']);
        $text = $keyTelegram ? (strtr($keyTelegram->details, $dataUser) ?? '') : '';
        $replyMarkup = $this->generateMarkup($keyTelegram);


        if($methodName == 'sendMessage'){
            $this->sendMessage($data['chat_id'], $text, $replyMarkup);
        }
        
    }

    public function faqsList()
    {
        # code...
        $faqs = Faq::whereNotNull('actived_at')->whereNotNull('title')->whereNotNull('answer')->get();

        $str = '';
        foreach ($faqs as $key => $faq) {
            # code...
            $row = $key+1;
            $str .= "\n$row- $faq->title\n💯 $faq->answer\n";
        }
        $str .= "\n 💲💲💲💲💲💲💲";
        return $str;
        
    }
}
