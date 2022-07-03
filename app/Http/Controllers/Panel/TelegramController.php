<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    //
    public function routes()
    {
        # code...
        return view('panel.pages.telegram.routes',[
            'title'=>'داشبورد',
            'breadcrumb '=>null
        ]);
    }
}
