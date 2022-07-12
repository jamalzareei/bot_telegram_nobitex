<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Services\MainService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function list()
    {
        # code...
        $model = request('model');

        $types = Type::whereNotNull('id')
            ->when($model, function ($q) use ($model) {
                $q->where('model_type', $model);
            })
            ->get();
            
        $models = MainService::models();

        return view('panel.pages.types.list', [
            'title'                 => 'نوع مدل ها',
            'types'                 => $types,
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
            'slug' => 'required|unique:types,slug',
            'model_type' => 'required',
        ]);
            

        $type = Type::create([
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
            'autoRedirect' => route('panel.types.list')
        ], 200);
    }

    public function edit()
    {
        # code...
        $id = request('id');
        $type = Type::find($id);
        
        $models = MainService::models();

        return view('panel.components.types.edit', [
            'type'  => $type,
            'models'=> $models,
        ]);
    }

    public function update()
    {
        # code...
        request()->validate([
            'id' => 'required|exists:types',
            'name' => 'required',
            'model_type' => 'required',
        ]);

        $type = Type::where('id', request('id'))->first();
        if($type){
            $type->name = request('name');
            // $type->slug = request('slug');
            $type->model_type = request('model_type');
            $type->actived_at = request('actived_at') ? Carbon::now() : null;
            
            $type->save();
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
            'autoRedirect' => route('panel.types.list')
        ], 200);
    }
}
