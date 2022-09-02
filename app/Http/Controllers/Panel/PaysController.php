<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use App\Services\ConvertDateService;
use App\Services\MainService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaysController extends Controller
{
    public function list()
    {
        $phoneUser = substr(request('phone'), -10);
        $amount = request('amount');
        $tracking_code = request('tracking_code');
        $dd = MainService::ConvertToEn(request('date'));
        $startDate = $dd ? ConvertDateService::getGregorian($dd, true) : null;
        $date = $startDate ? Carbon::createFromFormat('Y-m-d', $startDate) : null;
        $endDate = $date ? $date->addDays(1)->format('Y-m-d') : null;

        $pays = Pay::with(['user', 'status', 'payable'])
            ->when($phoneUser, function ($qUser) use ($phoneUser) {
                $qUser->whereHas('user', function ($qUserF) use ($phoneUser){
                    $qUserF->where('phone', 'like', "%$phoneUser%");
                });
            })
            ->when($amount, function ($qAmount) use ($amount) {
                $qAmount->where('amount', $amount);
            })
            ->when($tracking_code, function ($qTrack) use ($tracking_code) {
                $qTrack->where('tracking_code', 'like', "%$tracking_code%");
            })
            ->when($startDate, function ($qstartDate) use ($startDate) {
                $qstartDate->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($qendDate) use ($endDate) {
                $qendDate->where('created_at', '<=', $endDate);
            })
            ->latest()
            ->paginate(20);

        return view('panel.pages.pays.list', [
            'title'                 => 'لیست پرداخت های کاربران',
            'pays'                  => $pays,
            'breadcrumb'            => null
        ]);
    }
}
