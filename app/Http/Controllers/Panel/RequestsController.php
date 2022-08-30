<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use App\Models\Status;
use App\Services\TelegramService;
use Carbon\Carbon;

class RequestsController extends Controller
{
    //
    public function list()
    {
        $userId = request('user_id');
        $typeId = request('type_id');
        $statusId = request('status_id');
        $requests = ModelsRequest::with(['user', 'type', 'status'])
            ->when($userId, function ($qUser) use ($userId) {
                $qUser->where('user_id', $userId);
            })
            ->when($typeId, function ($qType) use ($typeId) {
                $qType->where('type_id', $typeId);
            })
            ->when($statusId, function ($qStatus) use ($statusId) {
                $qStatus->where('status_id', $statusId);
            })
            ->latest()
            ->paginate(20);

        return view('panel.pages.requests.list', [
            'title'                 => 'لیست درخواست های کاربران',
            'requests'              => $requests,
            'breadcrumb'            => null
        ]);
    }

    public function requestActive($id)
    {
        $request = ModelsRequest::find($id);
        $request->actived_at = request('status') == 'true' ? Carbon::now() : null;
        $statusId = $request->status_id;
        if(request('status') == 'true'){
            $status = Status::where('model_type', 'App\Models\Request')->where('slug', 'پرداخت-شده')->first();
        }else{
            $status = Status::where('model_type', 'App\Models\Request')->where('slug', 'در-انتظار-پرداخت')->first();
        }
        if($status){
            $statusId = $status->id;
        }
        $request->status_id = $statusId;
        $request->save();


        // $telService = new TelegramService();
        // if(request('status') == 'true'){
        //     $telService->sendMessage($user->chat_id, "\n\n✅✅✅✅✅✅ \n\n\n حساب کاربری شما تایید گردید. \n\n\n ✅✅✅✅✅✅\n\n", null);
        // }else{
        //     // $telService->sendMessage($user->chat_id, "حساب شما غیر فعال گردید." null);
        // }

        return response()->json([
            'title' => '',
            'message' => 'تغییر وضعیت با موفقیت ثبت گردید',
            'status' => 'success',
            'data' => '',
        ], 200);
        return request('status');
    }
}
