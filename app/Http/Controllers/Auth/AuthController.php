<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    //
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login', [
            'title' => 'ورود به حساب کاربری'
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration', [
            'title' => 'ثبت نام کاربر جدید'
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $phone = "+98" . substr($request->phone, -10);
        $request->merge(['phone' => $phone]);
        $request->validate([
            'phone' => 'required|exists:users',
            'password' => 'required',
        ]);

        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('شما با موفقیت وارد حساب کاربری خود شدید');
        }

        return back()->withErrors(['phone' => ['شماره همراه یا رمز عبور اشتباه است']]);

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $phone = "+98" . substr($request->phone, -10);
        $request->merge(['phone' => $phone]);
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);
        // return $request;

        $admin = false;
        if(User::count() == 0){
            $admin = true;
            Role::updateOrCreate(['name' => 'admin']);
        }
        $user = User::create([
            'firstname' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        if($admin){
            $user->assignRole([1]);
        }

        return response()->json([
            'status' => 'success',
            'title' => '',
            'message' => 'کاربر با موفقیت ایجاد گردید.'
        ], 200);
        // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function userData()
    {
        return User::where('id', auth()->id())->with(['roles', 'permissions'])->first(); 
    }
}
