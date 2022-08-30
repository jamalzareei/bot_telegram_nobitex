<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use Illuminate\Http\Request;

class PaysController extends Controller
{
    public function list()
    {
        $userId = request('user_id');
        $typeId = request('type_id');
        $statusId = request('status_id');
        $pays = Pay::with(['user', 'status', 'payable'])
            // ->when($userId, function ($qUser) use ($userId) {
            //     $qUser->where('user_id', $userId);
            // })
            // ->when($typeId, function ($qType) use ($typeId) {
            //     $qType->where('type_id', $typeId);
            // })
            // ->when($statusId, function ($qStatus) use ($statusId) {
            //     $qStatus->where('status_id', $statusId);
            // })
            ->latest()
            ->paginate(20);

        return view('panel.pages.pays.list', [
            'title'                 => 'لیست پرداخت های کاربران',
            'pays'                  => $pays,
            'breadcrumb'            => null
        ]);
    }
}
