<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function list()
    {
        $roles = Role::all();
        
        return view('panel.pages.roles.list', [
            'title'                 => 'سطح دسترسی کاربران',
            'roles'                 => $roles,
            'breadcrumb'            => null
        ]);
    }

    public function add()
    {
        # code...
        // return request();
        request()->validate([
            'name' => 'required',
            // 'details' => 'required|exists:types,id',
        ]);
            

        $type = Role::create([
            'name' => request('name'),
            'details' => request('details'),
            'guard_name'=> 'web'
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
            'autoRedirect' => route('panel.roles.list')
        ], 200);
    }

    public function edit()
    {
        $role = Role::find(request('id'));
        
        return view('panel.components.roles.edit', [
            'role'   => $role,
        ]);
    }

    public function update()
    {
        # code...
        request()->validate([
            'id'        => 'required|exists:roles',
            'name'     => 'required',
        ]);

        $role = role::where('id', request('id'))->first();
        if($role){
            $role->name = request('name');
            $role->details = request('details');
            
            $role->save();
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
            'autoRedirect' => route('panel.roles.list')
        ], 200);
    }
}
