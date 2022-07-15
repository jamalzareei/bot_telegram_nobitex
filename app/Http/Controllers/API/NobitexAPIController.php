<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NobitexAPIController extends Controller
{
    public function marketGlobalStats()
    {
        $res = Http::post('https://api.nobitex.ir/market/global-stats');

        return $res->json();
    }
}
