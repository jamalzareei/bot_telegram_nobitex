<?php

namespace App\Http\Controllers\Pay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NextpayController extends Controller
{
    //
    public function pay($model, $id, $type_request = null)
    {
        # code...
        return [
            'model' => $model,
            'id' => $id,
            'requests' => request()->all()
        ];
    }
}
