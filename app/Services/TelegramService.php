<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Bot;
use App\Models\Document;
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
            // 'keyboard' => [[["text" => "بازگشت",]]],
            'remove_keyboard' => true,
            'hide_keyboard' => true,
            "resize_keyboard" => true,
            "one_time_keyboard" => true,
            "ReplyKeyboardRemove" => [ "remove_keyboard" => true ],
            "input_field_placeholder" => " خرید و فروش ارز",
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
            "keyboard" => array_chunk($arrayInlineKeyboards, $chunk_children),
            "resize_keyboard" => true,
            // "remove_keyboard"=> true,
            // 'hide_keyboard' => true,
            "one_time_keyboard" => true,
            "input_field_placeholder" => " خرید و فروش ارز",
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
        if(!$reply_markup){//remove_keyboard
            $reply_markup = $this->convertKeyboards([]);
        }
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
    
    public function sendVideo($chatId, $text, $photo, $reply_markup = null)
    {
        $text = urlencode($text);
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/sendVideo?chat_id=$chatId&video=$photo&caption=$text&reply_markup=$reply_markup&parse_mode=html");
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
        // "https://api.telegram.org/bot5409689822:AAGNeNsImZCV6NTgRGp2ULXzcz1zPzDjAB4/getFile?file_id=BAACAgQAAxkBAAIMTmLq31OgCMBEla-gft34au5B88HUAAKSCwAC6zNZU3JpbJclG1qTKQQ
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
    
    public function forwardMessage($chatId, $from_chat_id, $message_id)
    {
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/forwardMessage?chat_id=$chatId&from_chat_id=$from_chat_id&message_id=$message_id");
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

    public function generateMarkup($keyTelegram, $chat_id = null)
    {
        $replyMarkup = null;
        if ($keyTelegram && $keyTelegram->children && $keyTelegram->children_type === 'keyboard') {
            $replyMarkup = $this->convertKeyboards($keyTelegram->children->toArray(), $keyTelegram->chunk_children);
        } else if ($keyTelegram && $keyTelegram->children && $keyTelegram->children_type === 'inline_keyboard') {
            // $this->sendMessage(config('telegram.chanel_develop_id'), json_encode(['$$keyTelegram->children->toArray()'=>$keyTelegram->children->toArray()]), null);
            $newArray = $this->changeInlineKeyboardsWithDataUSer($keyTelegram->children->toArray(), $chat_id);
            $replyMarkup = $this->convertInlineKeyboards($newArray, $keyTelegram->chunk_children);
        }
        return $replyMarkup;
    }
    
    public function getKeyTelegram($callback_data, $chat_id = null)
    {
        $permissions = "admin"; // admin
        if (in_array($chat_id, config('telegram.chat_id_admins'))){
            $permissions = "aaaa";
        }
        return KeyboradTelegram::whereNotNull('actived_at')->where('callback_data', $callback_data)
            ->with([
                'children' => function ($queryChild) use($permissions) {
                    $queryChild->select('id', 'text', 'callback_data', 'parent_id')->whereNotNull('actived_at')->where('permissions', 'not like', "%$permissions%");
                }
            ])
            ->where('permissions', 'not like', "%$permissions%")
            ->first();
    }

    public function getUserData($chat_id, $message)
    {
        $user = User::where('chat_id', $chat_id)->where('login_telegram', 1)->with('accounts')->first();
        $listCredit_ = 'هنوز کارتی وارد نشده است'; $listShaba_ = 'هنوز شماره شبا وارد نشده است'; $listWalletStr = ''; $listWalletBalance = ''; $faqsList = '';

        $kTelegram = KeyboradTelegram::orWhere('callback_data', $message)->orWhere('text', $message)->first();
        if(!$kTelegram){
            
            $arrayAllCallback = KeyboradTelegram::pluck('callback_data')->toArray();
            $botOld = Bot::where('chat_id', $chat_id)->whereIn('callback_data', $arrayAllCallback)->latest('id')->first();
            $message = $botOld->callback_data;
        }

        if($message == 'برداشت موجودی' || $message == 'مالی'){
            $listWallet = $user ? FinancialService::inventoryCalculation($user->id) : null;
            $listWalletStr = $listWallet['str'] ?? '';
            $listWalletBalance = $listWallet['balance'] ?? '';
        }

        if($message == 'لیست کارت ها'){
            $listCredit = $user ? Account::where('number', 'not like', '%IR%')->where('user_id', $user->id)->pluck('number')->toArray() : null;
            $listCredit_ = $listCredit ? implode("\n",$listCredit) : 'هنوز کارتی وارد نشده است';
        }
        
        if($message == 'لیست شبا'){
            $listShaba = $user ? Account::where('number', 'like', '%IR%')->where('user_id', $user->id)->pluck('number')->toArray() : null;//
            $listShaba_ = $listShaba ? implode("\n",$listShaba) : 'هنوز شماره شبا وارد نشده است';
        }

        if($message == 'سوالات متداول'){
            $faqsList = $this->faqsList();
        }
        return [
            'user'              => $user ? $user : null,
            '{$firstname}'      => $user->firstname ?? '',
            '{$lastname}'       => $user->lastname ?? '',
            '{$birthday}'       => $user->birth_date_fa ?? '',
            '{$phone}'          => $user->phone ?? '',
            '{$authenticationUser}' => ($user && $user->authenticate_user) ? '✅ حساب شما تایید شده است ✅' : '❌ حساب شما هنوز تایید هویت نشده است ❌ ', // احراز هویت
            '{$national_code}'  => $user->national_code ?? '0',
            '{$listCredit}'     => $listCredit_,//لیست کارت ها
            '{$listShaba}'      => $listShaba_,//لیست شبا
            '{$listWallet}'     => $listWalletStr,//مالی
            '{$balance}'        => $listWalletBalance,//برداشت موجودی
            '{$faqsList}'       => $faqsList,//سوالات متداول
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
        $result['file_id'] = 
            $data['message']['photo'][0]['file_id'] ?? 
            $data['callback_query']['message']['photo'][1]['file_id'] ?? 
            $data['message']['document']['thumb']['file_id'] ?? 
            $data['message']['video']['file_id'] ?? 
            '';
        $result['document_id'] = $data['message']['document']['thumb']['file_id'] ?? '';
        $result['video_id'] = $data['message']['video']['file_id'] ?? '';
        
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
            'file_id' => $data['file_id'] ?? $data['document_id'],
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
        $replyMarkup = $this->generateMarkup($keyTelegram, $data['chat_id']);


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

    public function changeInlineKeyboardsWithDataUSer($array, $chatId)
    {
        $user= User::where('chat_id', $chatId)->with(['accounts', 'documents'])->first();
        $documents = Document::where('user_id', $user->id)->latest('id')->get();
        foreach($array as $key => $row){
            $str = '';
            if($row['text'] == 'نام' && $user && $user->firstname){
                $str = ' ✅ ';
            }
            if($row['text'] == 'نام خانوادگی' && $user && $user->lastname){
                $str = ' ✅ ';
            }
            if($row['text'] == 'کد ملی' && $user && $user->national_code){
                $str = ' ✅ ';
            }
            if($row['text'] == 'تولد' && $user && $user->birth_date){
                $str = ' ✅ ';
            }
            if($row['text'] == 'احراز هویت' && $user && $user->authenticate_user){
                $str = ' ✅ ';
            }
            
            if($row['text'] == 'عکس کارت ملی' && $documents && $documents->where('type_file', 'کارت ملی')){
                $str = ' ✅ ';
            }
            if($row['text'] == 'فیلم سلفی' && $documents && $documents->where('type_file', 'ویدئو سلفی')){
                $str = ' ✅ ';
            }
            if($row['text'] == 'کارت بانکی' && $documents && $documents->where('type_file', 'کارت بانکی')){
                $str = ' ✅ ';
            }

            if($row['text'] == 'لیست کارت ها' && $documents && $documents->where('type_file', 'لیست کارت ها')){
                
                $filtered_collection = $user->accounts->filter(function ($item) { return (stripos($item, "IR") !== false) ? false : true; })->count();

                $str = " ( ".($filtered_collection ?? 0)." ) ";
            }
            if($row['text'] == 'لیست شبا' && $documents && $documents->where('type_file', 'لیست شبا')){

                $filtered_collection = $user->accounts->filter(function ($item) { return (stripos($item, "IR") !== false) ? true : false; })->count();

                $str = " ( ".($filtered_collection ?? 0)." ) ";
            }
            if($row['text'] == 'مالی' && $documents && $documents->where('type_file', 'مالی')){

                $filtered_collection = FinancialService::inventoryCalculation($user->id);
                $str = " ( ".number_format($filtered_collection['balance'] ?? 0)." ) ";
            }
            
            $array[$key]['text'] = $row['text'] . $str;
        }
        return $array;
    }
}
