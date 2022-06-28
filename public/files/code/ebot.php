<?php
//setwebhook
//https://api.telegram.org/bot/setWebhook?url=
//input

$update = json_decode(file_get_contents('php://input'));
//message
$message=$update->message->text;
$chatid=$update->message->chat->id;
//token
$token ='387950515:AAHH92T5gqH52ufA-kVvDxDznK58VFjGrBg';

$rep=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$chatid."&text=".urlencode($message)));
    
	
	
	
?>