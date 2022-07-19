<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Carbon\Carbon;

class FaqsController extends Controller
{
    //
    public function list()
    {
        # code...
        $title = request('title');

        $faqs = Faq::whereNotNull('id')
            ->when($title, function ($q) use ($title) {
                $q->where('title', $title);
            })
            ->get();
            
        return view('panel.pages.faqs.list', [
            'title'                 => 'سوالات متداول',
            'faqs'                  => $faqs,
            'breadcrumb'            => null
        ]);
    }

    public function add()
    {
        # code...
        // return request();
        request()->validate([
            'title' => 'required',
            'answer' => 'required',
        ]);
            

        $faq = Faq::create([
            'title' => request('title'),
            'answer' => request('answer'),
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
            'autoRedirect' => route('panel.faqs.list')
        ], 200);
    }

    public function edit()
    {
        # code...
        $id = request('id');
        $faq = Faq::find($id);
        
        return view('panel.components.faqs.edit', [
            'faq'  => $faq,
        ]);
    }

    public function update()
    {
        # code...
        request()->validate([
            'id' => 'required|exists:faqs',
            'title' => 'required',
            'answer' => 'required',
        ]);

        $status = Faq::where('id', request('id'))->first();
        if($status){
            $status->answer = request('answer');
            $status->answer = request('answer');
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
            'autoRedirect' => route('panel.faqs.list')
        ], 200);
    }
}
