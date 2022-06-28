<?php
$json =file_get_contents('php://input');
$update = json_decode(file_get_contents('php://input'));
$admin_chatid="287200846";
$user1="-1001346538067";
//set time zone
date_default_timezone_set('Asia/Tehran');
//main input
$message=$update->message->text;
$message_id=$update->message->message_id;
$chatid=$update->message->chat->id;
$last_name=$update->message->from->last_name;
$first_name=$update->message->from->first_name;
$usernameid=$update->message->from->username;
//variabel
$token ='';
$start="19:55";
$end="21";
//function
function diffTime($start, $end, $time) 
{
  $s = explode(":", $start);
  $startInt = $s[0] * 60 + $s[1];

  $e = explode(":", $end);
  $endInt = $e[0]*60 + $e[1];

  $t = explode(":", $time);
  $timeInt = $t[0]*60 + $t[1];

  return ($timeInt >= $startInt && $timeInt <= $endInt);

}
//real_time
$date_array = getdate();
$formated_date_m= $date_array['minutes'];
$formated_date_h= $date_array['hours'];
$real_time=$formated_date_h.":".$formated_date_m;
$off_or_on=diffTime($start, $end, $real_time);
if($chatid==$user1){
if($off_or_on){
$m_delete=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/deleteMessage?chat_id=".$chatid."&message_id=".$message_id));		
}
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

//$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$admin_chatid."&text=".urlencode($json)));