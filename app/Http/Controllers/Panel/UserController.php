<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SmsService;
use Carbon\Carbon;

class UserController extends Controller
{
    public function list()
    {
        $title = request('title');
        $users = User::all();
         
        return view('panel.pages.users.list', [
            'title'                 => 'کاربران',
            'users'                 => $users,
            'breadcrumb'            => null
        ]);
    }

    public function sendConfirmCode($id)
    {
        $user = User::find($id);
        if ( strpos($user->phone, '9135368845') !== false ||  strpos($user->phone, '9014252026') !== false ){

            $sms = SmsService::sendMessageCode( $user->phone, $user->code_confirm );
            // return $sms;
            if($sms['status'] == 1){
                return response()->json([
                    'title' => '',
                    'message' => 'succecc',
                    'status' => 'success',
                    'data' => '',
                ], 200);
            }
        }
        return response()->json([
            'title' => '',
            'message' => 'notallow',
            'status' => 'error',
            'data' => '',
        ], 200);
    }

    public function authenticateUser($id)
    {
        $user = User::find($id);
        $user->authenticate_user = request('status') == 'true' ? Carbon::now() : null;
        $user->save();

        return response()->json([
            'title' => '',
            'message' => 'تغییر هویت کاربر با موفقیت ثبت گردید',
            'status' => 'success',
            'data' => '',
        ], 200);
        return request('status');
    }
}
