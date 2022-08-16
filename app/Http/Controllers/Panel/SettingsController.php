<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Type;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SettingsController extends Controller
{
    //
    public function list()
    {
        $settings = Setting::with(['role', 'type'])->get();
        $types = Type::where('model_type', 'App\Models\Setting')->get();
        $roles = Role::all();
        
        return view('panel.pages.settings.list', [
            'title'                 => 'تنظیمات',
            'settings'              => $settings,
            'types'                 => $types,
            'roles'                 => $roles,
            'breadcrumb'            => null
        ]);
    }

    public function add()
    {
        # code...
        // return request();
        request()->validate([
            'role_id' => 'required|exists:roles,id',
            'type_id' => 'required|exists:types,id',
            'value' => 'required',
        ]);
            

        $type = Setting::create([
            'role_id' => request('role_id'),
            'type_id' => request('type_id'),
            'value' => request('value'),
            'details' => request('details'),
        ]);

        session()->put('noty', [
            'title' => '',
            'message' => 'با موفقیت ذخیره گردید',
            'status' => 'success',
            'data' => '',
        ]);
        return response()->json([
            'title' => '',
            'message' => 'با موفقیت ذخیره گردید',
            'status' => 'success',
            'data' => '',
            'autoRedirect' => route('panel.settings.list')
        ], 200);
    }

    public function edit()
    {
        # code...
        $id = request('id');
        $setting = Setting::find($id);
        $types = Type::where('model_type', 'App\Models\Setting')->get();
        $roles = Role::all();
        

        return view('panel.components.settings.edit', [
            'setting'   => $setting,
            'types'     => $types,
            'roles'     => $roles,
        ]);
    }

    public function update()
    {
        # code...
        request()->validate([
            'id'        => 'required|exists:settings',
            'role_id'   => 'required|exists:roles,id',
            'type_id'   => 'required|exists:types,id',
            'value'     => 'required',
        ]);

        $setting = Setting::where('id', request('id'))->first();
        if($setting){
            $setting->role_id = request('role_id');
            $setting->type_id = request('type_id');
            $setting->value = request('value');
            $setting->details = request('details');
            
            $setting->save();
        }

        session()->put('noty', [
            'title' => '',
            'message' => 'با موفقیت ذخیره گردید',
            'status' => 'success',
            'data' => '',
        ]);
        return response()->json([
            'title' => '',
            'message' => 'با موفقیت ذخیره گردید',
            'status' => 'success',
            'data' => '',
            'autoRedirect' => route('panel.settings.list')
        ], 200);
    }
}
