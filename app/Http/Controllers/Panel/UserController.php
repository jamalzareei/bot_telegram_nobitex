<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SmsService;
use App\Services\TelegramService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function list()
    {
        $title = request('title');
        $users = User::with('roles')->get();
        $roles = Role::all();

        // return $users[0]->roles->where('id', 2)->count();
         
        return view('panel.pages.users.list', [
            'title'                 => 'کاربران',
            'users'                 => $users,
            'roles'                 => $roles,
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

        $telService = new TelegramService();
        if(request('status') == 'true'){
            $telService->sendMessage($user->chat_id, "\n\n✅✅✅✅✅✅ \n\n\n حساب کاربری شما تایید گردید. \n\n\n ✅✅✅✅✅✅\n\n", null);
        }else{
            // $telService->sendMessage($user->chat_id, "حساب شما غیر فعال گردید." null);
        }

        return response()->json([
            'title' => '',
            'message' => 'تغییر هویت کاربر با موفقیت ثبت گردید',
            'status' => 'success',
            'data' => '',
        ], 200);
        return request('status');
    }

    public function rolesSync($id)
    {
        // return request()->all();
        request()->validate([
            'roles.*' => 'required|exists:roles,id',
        ]);

        $user = User::find($id);

        $user->syncRoles(request('roles'));

        
        return response()->json([
            'title' => '',
            'message' => 'successfully',
            'status' => 'success',
            'data' => '',
        ], 200);
    }
}
