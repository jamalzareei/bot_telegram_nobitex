<?php

namespace App\Services;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Support\Facades\Storage;

class MainService
{

    public static function controllers()
    {
        $controllers = [];

        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();

            if (array_key_exists('controller', $action)) {
                // You can also use explode('@', $action['controller']); here
                // to separate the class name from the method
                $controllers[] = $action['controller'];
            }
        }

        return $controllers;
    }

    public static function models()
    {
        $path = app_path("Models/");
        $namespace = "App\\Models\\";
        $out = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path),
            \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iterator as $item) {
            /**
             * @var \SplFileInfo $item
             */
            if ($item->isReadable() && $item->isFile() && mb_strtolower($item->getExtension()) === 'php') {
                $out[] =  $namespace .
                    str_replace("/", "\\", mb_substr($item->getRealPath(), mb_strlen($path), -4));
            }
        }
        return $out;
    }


    public static function saveRequestInFile()
    {
        $data = request()->all();

        $destinationPath = public_path() . "/upload/json/";
        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        Storage::disk('local')->put('example.json', json_encode($data));

        $telService = new TelegramService();

        $telService->sendMessage(config('telegram.chanel_develop_id'), json_encode(['saveRequestInFile' => $data]), null);
    }

    public static function ConvertToEn($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }

    public static function getGregorian($date)
    {
        $convert_data = null;
        if (isset($date)) {
            $data = explode('-', $date);
            $convert_data = Verta::getGregorian($data[0], $data[1], $data[2]);

            $dt = Carbon::parse($convert_data[0] . "-" . $convert_data[1] . "-" . $convert_data[2]);

            $convert_data = $dt;
        }
        return $convert_data;
    }

    public static function bankCardCheck($card = '', $irCard = true)
    {
        $card = (string) preg_replace('/\D/', '', $card);
        $strlen = strlen($card);
        if ($irCard == true and $strlen != 16)
            return false;
        if ($irCard != true and ($strlen < 13 or $strlen > 19))
            return false;
        if (!in_array($card[0], [2, 4, 5, 6, 9]))
            return false;

        for ($i = 0; $i < $strlen; $i++) {
            $res[$i] = $card[$i];
            if (($strlen % 2) == ($i % 2)) {
                $res[$i] *= 2;
                if ($res[$i] > 9)
                    $res[$i] -= 9;
            }
        }
        return array_sum($res) % 10 == 0 ? true : false;
    }

    public static function checkNationalCode($code)
    {
        if (!preg_match('/^[0-9]{10}$/', $code))
            return false;
        for ($i = 0; $i < 10; $i++)
            if (preg_match('/^' . $i . '{10}$/', $code))
                return false;
        for ($i = 0, $sum = 0; $i < 9; $i++)
            $sum += ((10 - $i) * intval(substr($code, $i, 1)));
        $ret = $sum % 11;
        $parity = intval(substr($code, 9, 1));
        if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity))
            return true;
        return false;
    }

    public static function saveNotification($sender_id, $receiver_id, $notificationable_type, $notificationable_id, $title, $message)
    {
        Notification::create([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'notificationable_type' => $notificationable_type,
            'notificationable_id' => $notificationable_id ?? null,
            'title' => $title,
            'message' => $message,
        ]);
    }
}
