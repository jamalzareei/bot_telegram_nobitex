<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\User;
use App\Services\TelegramService;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function __construct()
    {
        # code...
        $this->telService = new TelegramService();
    }
    
    public function faqs()
    {
        # code...
        
        $data = $this->telService->getDataTelegram();

        $faqs = Faq::whereNotNull('actived_at')->get();

        // if($data['chat_id']){
        //     return $this->telService->sendMessage($data['chat_id'], $text = null, null);
        // }
        return response()->json([
            'faqs' => $faqs,
        ], 200);
    }

    public function faqInsert()
    {
        $data = $this->telService->getDataTelegram();
        $user = User::where('chat_id', $data['chat_id'])->first();

        $faq = Faq::create([
            'title' => $data['message'],
            'chat_id' => $data['chat_id'],
            'user_id' => $user->id ?? null,
        ]);
        
        $this->telService->saveBot($data, null);

        $text = 'سوال شما دریافت شد';
        $this->telService->sendMessageReply($data['chat_id'], $text, $data['message_id'], null);
    }
}
