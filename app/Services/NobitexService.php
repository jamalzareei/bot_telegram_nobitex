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
            ->get('https://api.nobitex.ir/market/stats?srcCurrency=btc&dstCurrency=rls', []);

        $str = "آخرین قیمت های بازار \n" . verta()->format('l Y/n/j H:i') . "\n\n\n";
        if (!($res && $res->json())) {
            return $str;
        }
        $list = $res->json();
        // return $list['global']['binance'];
        $arr = ['btc', 'eth', 'bnb', 'ada', 'xrp', 'one', 'dot', 'sol', 'avax', 'vtho', 'usdt'];
        $result = array_filter(
            $list['global']['binance'],
            function ($key) use ($arr) {
                return in_array($key, $arr);
            },
            ARRAY_FILTER_USE_KEY
        );


        $row = 0;
        // return $result;
        foreach ($result ?? [] as $key => $value) {
                $str .= "💲 " . $key . " : " . $value . " دلار ";
                $str .= "\n"; // "\n";
                $str .= "🟢 قیمت خرید : " . ($value * ($dollar + 5000)) . " ريال ";
                $str .= "\n"; // "\n";
                $str .= "🔴 قیمت فروش : " . ($value * ($dollar - 5000)) . " ريال ";
                $str .= "\n\n\n"; // "\n";
            $row++;
        }
        // echo $str;return ;
        return ($str);
    }

    public function getPriceV2()
    {
        $dollar = $this->getPriceDollar();
        $res = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])
            ->post('https://api.nobitex.ir/market/global-stats', []);

        $str = "آخرین قیمت های بازار \n" . verta()->format('l Y/n/j H:i') . "\n\n\n";
        if (!($res && $res->json())) {
            return $str;
        }
        $list = $res->json();
        // return $list;
        $row = 0;
        foreach ($list as $key => $value) {
            if ($key == 'markets') { // && $row <= 10
                foreach ($value['binance'] as $key2 => $value2) {
                    if ($row <= 10) {
                        $str .= "💲 " . $key2 . " : " . $value2 . " دلار ";
                        $str .= "\n"; // "\n";
                        $str .= "🟢 قیمت خرید : " . ($value2 * ($dollar + 5000)) . " ريال ";
                        $str .= "\n"; // "\n";
                        $str .= "🔴 قیمت فروش : " . ($value2 * ($dollar - 5000)) . " ريال ";
                        $str .= "\n\n\n"; // "\n";
                    }
                    $row++;
                }
            }
        }
        // echo $str;return ;
        return $str;
    }
}
