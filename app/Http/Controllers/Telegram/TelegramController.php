<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    //
    protected $token = "5409689822:AAGNeNsImZCV6NTgRGp2ULXzcz1zPzDjAB4";
    protected $baseUrl = "https://telegram.shixeh.com/telegram";
    protected $keyborads = [
        ["text" => "/start", "parent_text" => "", "type" => "text", "url" => "", "callback_data" => "/start", "children_type"=> "keyboard", "details"=> "به ربات خوش آمدید"],

        ["text" => "پروفایل", "parent_text" => "/start", "type" => "keyboard", "url" => "", "callback_data" => "پروفایل", "children_type"=> "inline_keyboard", "details"=> "ویرایش اطلاعات پروفایل"],
        ["text" => "خرید", "parent_text" => "/start", "type" => "keyboard", "url" => "", "callback_data" => "خرید", "children_type"=> "inline_keyboard", "details"=> "خرید ارز:"],
        ["text" => "فروش", "parent_text" => "/start", "type" => "keyboard", "url" => "", "callback_data" => "فروش", "children_type"=> "inline_keyboard", "details"=> "فروش ارز:"],
        ["text" => "راهنمای", "parent_text" => "/start", "type" => "keyboard", "url" => "", "callback_data" => "راهنمای", "children_type"=> "inline_keyboard", "details"=> "راهنمای کاربر"],
        ["text" => "سوالات متداول", "parent_text" => "/start", "type" => "keyboard", "url" => "", "callback_data" => "سوالات متداول", "children_type"=> "inline_keyboard", "details"=> "سوالات متداول کاربر"],

        ["text" => "شماره تماس", "parent_text" => "پروفایل", "type" => "inline_keyboard", "callback_data" => "phone_number", "children_type"=> "text", "details"=> "شماره تلفن خود را وارد نمایید"],
        ["text" => "عکس پروفایل", "parent_text" => "پروفایل", "type" => "inline_keyboard", "callback_data" => "photo_user", "children_type"=> "text", "details"=> "عکس خود را ارسال نمایید"],
        ["text" => "کد ملی", "parent_text" => "پروفایل", "type" => "inline_keyboard", "callback_data" => "ssn", "children_type"=> "text", "details"=> "کد ملی خود را وارد نمایید"],
        ["text" => "بازگشت", "parent_text" => "پروفایل", "type" => "inline_keyboard", "callback_data" => "/start", "children_type"=> "text", "details"=> "برگشت به منوی اصلی"],
        ["text" => "بیت کوین", "parent_text" => "خرید", "type" => "inline_keyboard", "callback_data" => "buy_bitcoin", "children_type"=> "text", "details"=> "مقدار فروش بیت کوین خود را وارد نمایید"],
        ["text" => "تتر", "parent_text" => "خرید", "type" => "inline_keyboard", "callback_data" => "buy_teter", "children_type"=> "text", "details"=> "مقدار فروش تتر خود را وارد نمایید"],
        ["text" => "بازگشت", "parent_text" => "خرید", "type" => "inline_keyboard", "callback_data" => "/start", "children_type"=> "text", "details"=> "برگشت به منوی اصلی"],
        ["text" => "تتر", "parent_text" => "فروش", "type" => "inline_keyboard", "callback_data" => "sell_teter", "children_type"=> "text", "details"=> "مقدار خرید تتر خود را وارد نمایید"],
        ["text" => "بیت کوین", "parent_text" => "فروش", "type" => "inline_keyboard", "callback_data" => "sell_bitcoin", "children_type"=> "text", "details"=> "مقدار خرید بیت کوین خود را وارد نمایید"],
        ["text" => "بازگشت", "parent_text" => "فروش", "type" => "inline_keyboard", "callback_data" => "/start", "children_type"=> "text", "details"=> "برگشت به منوی اصلی"],
        ["text" => "راهنمای", "parent_text" => "راهنمای", "type" => "inline_keyboard", "url" => "https://google.com", "children_type"=> "text", "details"=> "برگشت به منوی اصلی"],
        ["text" => "سوالات متداول", "parent_text" => "سوالات متداول", "type" => "inline_keyboard", "url" => "https://google.com", "children_type"=> "text", "details"=> "برگشت به منوی اصلی"],
    ];
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

        $message = $update['message']['text'] ?? 'NOT';
        $chat_id = $update['message']['chat']['id'] ?? $bot_id;
        // $this->sendMessage($chat_id, $json);

        $row = collect($this->keyborads)->where('text', $message)->first();
        $replyMarkup = null;
        if(!($row && count($row) > 0)){
            $row = collect($this->keyborads)->first();
        }
        $array = collect($this->keyborads)->where('parent_text', $row['callback_data'])->all();
        $replyMarkup = $row['children_type'] == 'keyboard' ? $this->convertKeyboards($array) : ($row['children_type'] == 'inline_keyboard' ? $this->convertInlineKeyboards($array) : null);
    
        $text = $row['details'] ?? json_decode($row);//$json;//

        $this->sendMessage($chat_id, $text, $replyMarkup );
        // $this->sendMessage($bot_id, $message);
        // $this->sendMessage($group_id, $message);
        // $this->sendMessage($chanel_id, $message);

    }

    public function convertInlineKeyboards($arrayInlineKeyboards)
    {
        //[ "text" => "بازگشت", "parent_text" => "فروش", "type" => "inline_keyboard", "url" => "","callback_data" => "back" ],
        
        $list = [];
        foreach ($arrayInlineKeyboards as $res){
            array_push($list, [ $res ]);
        }
        return json_encode(
            [
                'inline_keyboard' => [
                    array_values($arrayInlineKeyboards)
                    // array_merge($arrayInlineKeyboards)
                ]
            ]
        );
    }


    public function convertKeyboards($arrayInlineKeyboards)
    {
        //[ "text" => "بازگشت", "parent_text" => "فروش", "type" => "inline_keyboard", "url" => "","callback_data" => "back" ],

        $list = [];
        foreach ($arrayInlineKeyboards as $res){
            array_push($list, [ $res ]);
        }
        return json_encode([
            "keyboard" => $list,"resize_keyboard" => true//,"one_time_keyboard" => false
        ]);

    }

    public function setWebHook()
    {
        $res = Http::get("https://api.telegram.org/bot$this->token/setWebHook?url=$this->baseUrl");
        return $res->json();
    }

    public function deleteWebHook()
    {
        $res = Http::get("https://api.telegram.org/bot$this->token/deleteWebHook?url=$this->baseUrl");
        return $res->json();
    }

    public function getWebHookInfo()
    {
        $res = Http::get("https://api.telegram.org/bot$this->token/getWebHookInfo?url=$this->baseUrl");
        return $res->json();
    }

    public function sendMessage($chatId, $text, $reply_markup = null)
    {
        $res = Http::get("https://api.telegram.org/bot$this->token/sendMessage?chat_id=$chatId&text=$text&reply_markup=$reply_markup");
        return $res->json();
    }
}
