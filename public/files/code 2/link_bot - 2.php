﻿<?php
$json =file_get_contents('php://input');
$update = json_decode(file_get_contents('php://input'));
$admin_chatid="287200846";
$user1="-1001346538067";
//main input
$message=$update->message->text;
$message_id=$update->message->message_id;
$chatid=$update->message->chat->id;
$last_name=$update->message->from->last_name;
$first_name=$update->message->from->first_name;
$usernameid=$update->message->from->username;
//variabel
$token ='';
if($chatid==$user1){
//ضد لینک برای تمام لینک ها 
/*
if (strpos($message,"http://" ) !== false or strpos($message,"https://" ) !== false) {
$m_delete=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/deleteMessage?chat_id=".$chatid."&message_id=".$message_id));	
}
*/
//ضد لینک برای گروه ها کانال های تلگرامی
if (strpos($message,"https://t.me/joinchat/" ) !== false or strpos($message,"https://t.me/" ) !== false or strpos($message,"https://telegram.me/" ) !== false ) {
$m_delete=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/deleteMessage?chat_id=".$chatid."&message_id=".$message_id));	
}
}else{
$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$chatid."&text=".urlencode("یک خطا رخ داده است ربات برای این گروه تنظیم نشده است")));		
}
//$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$admin_chatid."&text=".urldecode($json)));
?>