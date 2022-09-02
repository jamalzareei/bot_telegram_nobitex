<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Services\NobitexService;
use Illuminate\Http\Request;

class NobitexController extends Controller
{
    public function __construct()
    {
        # code...
        $this->nobitex = new NobitexService();
    }

    public function generateToken()
    {
        # code...
        return $this->nobitex->getToken();
    }

    public function listPrice()
    {
        return $this->nobitex->getPrice();
    }
}
