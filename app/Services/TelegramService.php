<?php

namespace App\Services;

use App\Models\KeyboradTelegram;
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
        $res = Http::get("https://api.telegram.org/bot" . config('telegram.token') . "/sendMessage?chat_id=$chatId&text=$text&reply_markup=$reply_markup");
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
        return [
            '{$firstname}'      => $firstname ?? '',
            '{$lastname}'       => $lastname ?? '',
            '{$birthday}'       => $lastname ?? ''
        ];
    }

}
