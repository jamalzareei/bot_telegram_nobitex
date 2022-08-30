<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function list()
    {
        $userId = request('user_id');
        $typeId = request('type_id');
        $accounts = Account::with(['user'])
            ->when($userId, function ($qUser) use ($userId) {
                $qUser->where('user_id', $userId);
            })
            ->when($typeId, function ($qType) use ($typeId) {
                $qType->where('number', 'like' ,'%IR%');
            })
            ->latest()
            ->paginate(20);

        return view('panel.pages.accounts.list', [
            'title'                 => 'لیست کارت و شبای کاربران',
            'accounts'              => $accounts,
            'breadcrumb'            => null
        ]);
    }
}
