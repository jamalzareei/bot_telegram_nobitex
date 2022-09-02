<?php

namespace App\Services;

use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;

class ConvertDateService
{
    public static function getGregorian($date, $format = null)
    {
        $convert_data = null;
        if (isset($date)) {
            $data = explode('/', $date);
            $convert_data = Verta::getGregorian($data[0], $data[1], $data[2]);

            $dt = Carbon::parse($convert_data[0] . "-" . $convert_data[1] . "-" . $convert_data[2]);

            $convert_data = $dt;
        }
        if($format){
            return $convert_data->format('Y-m-d');
        }
        return $convert_data;
    }
    
    public static function getGregorianTimestamp($date)
    {
        $convert_data = null;
        if (isset($date)) {
            $data = explode('/', $date);
            $convert_data = Verta::getGregorian($data[0], $data[1], $data[2]);

            $dt = Carbon::parse($convert_data[0] . "-" . $convert_data[1] . "-" . $convert_data[2]);

            $convert_data = $dt->timestamp;
        }
        return $convert_data;
    }
}
