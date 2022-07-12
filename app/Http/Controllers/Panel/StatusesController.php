<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Services\MainService;
use Carbon\Carbon;

class StatusesController extends Controller
{
    public function list()
    {
        # code...
        $model = request('model');

        $statuses = Status::whereNotNull('id')
            ->when($model, function ($q) use ($model) {
                $q->where('model_type', $model);
            })
            ->get();
            
        $models = MainService::models();

        return view('panel.pages.statuses.list', [
            'title'                 => 'وضعیت در مدل ها',
            'statuses'              => $statuses,
            'models'                => $models,
            'breadcrumb'            => null
        ]);
    }

    public function add()
    {
        # code...
        // return request();
        request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:statuses,slug',
            'model_type' => 'required',
        ]);
            

        $type = Status::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'model_type' => request('model_type'),
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
            'autoRedirect' => route('panel.statuses.list')
        ], 200);
    }

    public function edit()
    {
        # code...
        $id = request('id');
        $status = Status::find($id);
        
        $models = MainService::models();

        return view('panel.components.statuses.edit', [
            'status'  => $status,
            'models'=> $models,
        ]);
    }

    public function update()
    {
        # code...
        request()->validate([
            'id' => 'required|exists:statuses',
            'name' => 'required',
            'model_type' => 'required',
        ]);

        $status = Status::where('id', request('id'))->first();
        if($status){
            $status->name = request('name');
            // $status->slug = request('slug');
            $status->model_type = request('model_type');
            $status->actived_at = request('actived_at') ? Carbon::now() : null;
            
            $status->save();
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
            'autoRedirect' => route('panel.statuses.list')
        ], 200);
    }
}
