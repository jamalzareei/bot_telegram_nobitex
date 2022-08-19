<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\KeyboradTelegram;
use App\Models\Status;
use App\Services\MainService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TelegramController extends Controller
{
    //
    public function routes()
    {
        # code...
        $parent_id = request('parent_id');

        $keyboradTelegrams = KeyboradTelegram::whereNotNull('id')
            ->when($parent_id, function ($q) use ($parent_id) {
                $q->where('parent_id', $parent_id);
            })
            ->with(['children','parent'])
            ->get();
        $keyboradTelegramsAll = KeyboradTelegram::all();
        $statuses = Status::all();
        $roles = Role::all();
        $controllers = MainService::controllers();

        return view('panel.pages.telegram.routes', [
            'title'                 => 'داشبورد',
            'keyboradTelegrams'     => $keyboradTelegrams,
            'keyboradTelegramsAll'  => $keyboradTelegramsAll,
            'statuses'              => $statuses,
            'roles'                 => $roles,
            'controllers'           => $controllers,
            'parent_id'             => $parent_id,
            'breadcrumb'            => null
        ]);
    }

    public function addRoute()
    {
        # code...
        // return request();
        request()->validate([
            /*
            active_at: "on"
            callback_data: null
            children_type: null
            chunk_children: null
            controller_method: null
            details: null
            next_callback_data: null
            parent_callback_data: null
            same_callback_data: null
            status_id: null
            text: null
            type: "text"
            url: null
            */]);
        $parent_callback_data = KeyboradTelegram::where('callback_data', request('parent_callback_data'))->first();
        $next_callback_data = KeyboradTelegram::where('callback_data', request('next_callback_data'))->first();

        $keyboardTelegram = KeyboradTelegram::create([
            'orderby' => request('orderby') ?? 1,
            'text' => request('text'),
            'parent_id' => $parent_callback_data->id ?? null,
            'parent_callback_data' => request('parent_callback_data'),
            'next_callback_data' => request('next_callback_data'),
            'next_id' => $next_callback_data->id ?? null,
            'type' => request('type'),
            'url' => request('url'),
            'callback_data' => request('callback_data'),
            'children_type' => request('children_type'),
            'same_callback_data' => request('same_callback_data'),
            'details' => request('details'),
            'file' => request('file'),
            'method_telegram' => request('method_telegram'),
            'controller_method' => request('controller_method'),
            'controller_method_child' => request('controller_method_child'),
            'status_id' => request('status_id'),
            'permissions' => request('permissions') ? implode(",",request('permissions')) : 'guest',
            'chunk_children' => request('chunk_children'),
            'actived_at' => request('actived_at') ? Carbon::now() : null,
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
            'autoRedirect' => route('panel.telegram.routes',['parent_id'=>$keyboardTelegram->parent_id])
        ], 200);
    }

    public function updateRoute()
    {
        # code...
        request()->validate([
            'id' => 'required|exists:keyborad_telegrams',
            /*
            active_at: "on"
            callback_data: null
            children_type: null
            chunk_children: null
            controller_method: null
            details: null
            next_callback_data: null
            parent_callback_data: null
            same_callback_data: null
            status_id: null
            text: null
            type: "text"
            url: null
            */]);
        $parent_callback_data = KeyboradTelegram::where('callback_data', request('parent_callback_data'))->first();
        $next_callback_data = KeyboradTelegram::where('callback_data', request('next_callback_data'))->first();

        $keyboardTelegram = KeyboradTelegram::where('id', request('id'))->first();
        if($keyboardTelegram){
            $keyboardTelegram->orderby = request('orderby') ?? 1;
            $keyboardTelegram->text = request('text');
            $keyboardTelegram->parent_id = $parent_callback_data->id ?? null;
            $keyboardTelegram->parent_callback_data = request('parent_callback_data');
            $keyboardTelegram->next_callback_data = request('next_callback_data');
            $keyboardTelegram->next_id = $next_callback_data->id ?? null;
            $keyboardTelegram->type = request('type');
            $keyboardTelegram->url = request('url');
            $keyboardTelegram->callback_data = request('callback_data');
            $keyboardTelegram->children_type = request('children_type');
            $keyboardTelegram->same_callback_data = request('same_callback_data');
            $keyboardTelegram->details = request('details');
            $keyboardTelegram->file = request('file');
            $keyboardTelegram->method_telegram = request('method_telegram');
            $keyboardTelegram->controller_method = request('controller_method');
            $keyboardTelegram->controller_method_child = request('controller_method_child');
            $keyboardTelegram->status_id = request('status_id');
            $keyboardTelegram->permissions = implode(",",request('permissions'));
            $keyboardTelegram->chunk_children = request('chunk_children');
            $keyboardTelegram->actived_at = request('actived_at') ? Carbon::now() : null;
            
            $keyboardTelegram->save();
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
            'autoRedirect' => route('panel.telegram.routes',['parent_id'=>$keyboardTelegram->parent_id])
        ], 200);
    }

    public function editRoute()
    {
        # code...
        $id = request('id');
        $keyboardTelegram = KeyboradTelegram::find($id);
        
        $keyboradTelegramsAll = KeyboradTelegram::all();
        $statuses = Status::all();
        $roles = Role::all();
        $controllers = MainService::controllers();

        return view('panel.components.telegram.routes.edit-old-route', [
            'keyboradTelegramsAll'  => $keyboradTelegramsAll,
            'statuses'              => $statuses,
            'roles'                 => $roles,
            'controllers'           => $controllers,
            'keyboardTelegram'      => $keyboardTelegram,
        ]);
    }
}
