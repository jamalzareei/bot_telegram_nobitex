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

//$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$chatid."&text=".urlencode($json)));

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

?>