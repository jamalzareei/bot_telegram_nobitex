<?php

namespace App\Services;

use App\Models\Pay;
use App\Models\Request as ModelsRequest;
use App\Models\Status;
use App\Models\Type;
use App\Models\Wallet;
use Carbon\Carbon;

class FinancialService
{
    // Inventory increase
    // Inventory reduction
    // Inventory calculation
    public function inventoryIncrease($pay_id)
    { 
        // افزایش موجودی از پرداخت درگاه و اضافه کردن به والت
        $pay = Pay::find($pay_id);
        $type = Type::where('slug', 'واریز')->first();
        $status = Status::where('slug', 'تایید-واریز')->first();
        if($pay->payable_type == "App\Models\Request"){
            $request = ModelsRequest::find($pay->payable_id);
            $request->actived_at = Carbon::now();
            $request->save();
        }
        $wallet = Wallet::create([
            'user_id'           => $pay->user_id,
            'amount'            => $pay->amount,
            'details'           => 'افزایش کیف پول',
            'walletable_type'   => 'App\Models\Pay',
            'walletable_id'     => $pay_id,
            'pay_id'            => $pay_id,
            'status_id'         => $status->id ?? null,
            'type_id'           => $type->id ?? null,
        ]);

        return $wallet;
    }
    public function inventoryReduction($request_id)
    { 
        // ثبت برداشت از موجودی
        $type = Type::where('slug', 'برداشت')->first();
        $status = Status::where('slug', 'تایید-برداشت')->first();

        $request = ModelsRequest::find($request_id);
        $request->actived_at = Carbon::now();
        $request->save();
        
        $wallet = Wallet::create([
            'user_id'           => $request->user_id,
            'amount'            => $request->amount,
            'details'           => 'برداشت از کیف پول',
            'walletable_type'   => 'App\Models\Request',
            'walletable_id'     => $request_id,
            'pay_id'            => null,
            'status_id'         => $status->id ?? null,
            'type_id'           => $type->id ?? null,
        ]);
        
        return $wallet;
        
    }
    public static function inventoryCalculation($user_id)
    { 
        // محاسبه موجودی
        $typeInc = Type::where('slug', 'واریز')->first();
        $typeDec = Type::where('slug', 'برداشت')->first();
        
        $wallets = Wallet::where('user_id', $user_id)->get();
        $data['str'] = ' شرح حساب ';
        $data['balance'] = 0;
        foreach ($wallets as $key => $wallet) {
            # code...
            $type = null;
            if($wallet->type_id == $typeInc->id){
                $data['balance'] += $wallet->amount;
                $type = 'واریز';
            }else if($wallet->type_id == $typeDec->id){
                $data['balance'] -= $wallet->amount;
                $type = 'برداشت';
            }
            $numFormatAmount = number_format($wallet->amount);
            $data['str'] .= "<pre>$type $numFormatAmount ریال </pre>";// $wallet->created_at
        }
        $formatBalance = number_format($data['balance']);
        $data['str'] .= "================<code><pre>موجودی $formatBalance ریال</pre></code>";
        return $data;
        
    }
}
