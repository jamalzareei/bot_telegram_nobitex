<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Http;

class NobitexService
{
    public function getToken()
    {
        $setToken = Setting::whereHas('type', function ($qType) {
            $qType->where('slug', 'token_nobitex');
        })
            ->first();
        if ($setToken && $setToken->value) {
            return $setToken->value;
        }

        $setUsername = Setting::whereHas('type', function ($qType) {
            $qType->where('slug', 'username_nobitex');
        })
            ->first();
        $setPassword = Setting::whereHas('type', function ($qType) {
            $qType->where('slug', 'password_nobitex');
        })
            ->first();

        $res = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])
            ->post('https://api.nobitex.ir/auth/login/', [
                'username'  => $setUsername->value ?? null,
                'password'  => $setPassword->value ?? null,
                'captcha'   => 'api',
                'X-TOTP'    => 123456
            ]);

        return $res->json()['key'] ?? '';
    }

    public function getPriceDollar()
    {
        // return '298470';
        $res = Http::get('https://dapi.p3p.repl.co/api/?currency=usd');
        return $res->json()['Price'] ?? '';
    }

    public function getPrice()
    {
        $dollar = $this->getPriceDollar();
        $res = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])
            ->post('https://api.nobitex.ir/market/global-stats', []);

        $str = '';
        if (!($res && $res->json())) {
            return $str;
        }
        $list = $res->json();
        
        foreach ($list as $key => $value) {
            if ($key == 'markets') {
                // return $value['binance'];
                foreach ($value['binance'] as $key2 => $value2) {
                    # code...
                    $value2 = 19955;
                    $str .= $key2. " : " . $value2;
                    $str .= "<br />";// "\n";
                    $str .= "قیمت خرید : " . $value2 * ($dollar + 5000) . " ريال ";
                    $str .= "<br />";// "\n";
                    $str .= "قیمت فروش : " . $value2 * ($dollar - 5000) . " ريال ";
                    $str .= "<br /><br /><br />";// "\n";
                }
            }
        }
        echo $str;return ;
        return $str;
    }
}
