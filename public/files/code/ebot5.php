<?php
//setwebhook
//https://api.telegram.org/bot/setWebhook?url=
//input
$json=file_get_contents('php://input');
$update = json_decode(file_get_contents('php://input'));
//message
$message=$update->message->text;
$chatid=$update->message->chat->id;
//token
$token ='';

$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$chatid."&text=".urlencode($json)));

//sendPhoto

//$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/sendPhoto?chat_id=".$chatid."&photo="."&caption=faranesh")); 

//sendAudio

//$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/sendAudio?chat_id=".$chatid."&audio="."&caption=faranesh"));
 
//sendVideo

//$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/sendVideo?chat_id=".$chatid."&video="."&caption=faranesh"));

//sendDocument

//$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/sendDocument?chat_id=".$chatid."&document="."&caption=faranesh"));

//sendChatAction

//$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/sendChatAction?chat_id=".$chatid."&action=upload_photo"));


//forwardMessage
//$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/forwardMessage?chat_id=".$chatid."&from_chat_id=&message_id="));
//----------------------------------------------------------------------------------------------
//variable
$text1="راهنما";
$text2="فرانش";
$text3="کیبرد شیشه ای";
$text4="گوگل";
$text5="درباره ما";
$text6="تصویر";
$url="https://www.google.com/";
//
//keyboard
$reply_markup=json_encode(["keyboard"=>
            [
                [["text"=>$text1],["text"=>$text2]],
				[["text"=>$text3]],
				
             
],"resize_keyboard"=>true]);
//inline_keyboard
$reply_markup2=json_encode(
[
        'inline_keyboard'=>[
			
             [['text'=>$text4,'url'=>$url]],
			 [['text'=>$text5,'callback_data'=>"info"]],
			 [['text'=>$text6,'callback_data'=>"photo"]],
        ]
    ]);
switch ($message) {
    case "/start":
        $rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$chatid."&reply_markup=".$reply_markup."&text=".urlencode("سلام فرانشی عزیز خوش اومدی ")));
        break;
    case $text1:
        $rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$chatid."&reply_markup=".$reply_markup."&text=".urlencode("این یک راهنما است")));
        break;
    case $text2:
        $rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$chatid."&reply_markup=".$reply_markup."&text=".urlencode("آموزش در سایت فرانش وجود دارد")));
        break;
	case $text3:
        $rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$chatid."&reply_markup=".$reply_markup2."&text=".urlencode("یک گزینه را انتخاب نمایید")));
        break;

}
//callback_data
if(isset($update->callback_query)){
//chatid
    $chatid=$update->callback_query->from->id;
//data
    $data_query=$update->callback_query->data;
switch ($data_query) {
    case "info":
        $rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$chatid."&reply_markup=".$reply_markup."&text=".urlencode("این یک راهنما است")));
        break;
    case "photo":
        $rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/sendPhoto?chat_id=".$chatid."&photo="."&caption=faranesh")); 
        break;

}		
}	
?>