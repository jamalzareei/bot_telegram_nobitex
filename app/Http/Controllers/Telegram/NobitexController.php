<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Services\NobitexService;
use App\Services\TelegramService;
use Illuminate\Http\Request;

class NobitexController extends Controller
{
    public function __construct()
    {
        # code...
        $this->telService = new TelegramService();
        $this->nobitex = new NobitexService();
    }

    public function generateToken()
    {
        # code...
        return $this->nobitex->getToken();
    }

    public function listPrice()
    {
        $data = $this->telService->getDataTelegram();

        $text = $this->nobitex->getPrice();
        if($data && $data['chat_id']){ 
            $this->telService->sendMessage($data['chat_id'], $text, null);
            // $this->telService->sendPhoto($data['chat_id'], $text, null, null);
        }
        return $text;
    }
}
