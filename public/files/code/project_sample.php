<?php
$update = json_decode(file_get_contents('php://input'));
//main input
$message = $update->message->text;
$chatid = $update->message->chat->id;
$last_name = $update->message->from->last_name;
$first_name = $update->message->from->first_name;
$usernameid = $update->message->from->username;
//variable
$token = '';
$text1 = "🏞عکس بده🏞";
$text2 = "😎معرفی به دوستان";
$text3 = "پرداخت";
//PAY URL
$payurl = "آدرس فایل مورد نظر برای پرداخت?pay=" . $chatid;
$share = "لینک اشتراک ربات";
//keyboard
$reply_markup = json_encode(["keyboard" =>
[
	[["text" => $text1]],
	[["text" => $text2]],

], "resize_keyboard" => true]);
$reply_markup2 = json_encode(
	[
		'inline_keyboard' => [

			[['text' => $text3, 'url' => $payurl]]


		]
	]
);
//data base
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, 'set names "utf8"');
$sql = "INSERT INTO test (chatid,firstname,lastname,username)VALUES('$chatid','$first_name','$last_name','$usernameid')";
mysqli_query($conn, 'set names "utf8"');
$result = $conn->query($sql);
//start
if ($message == "/start") {
	$starttxt = "سلام" . $last_name . " " . $first_name . "خوش آومدی توی این ربات میتونی عکس های زیبا رو مشاهده کنی " . "✌️✌️✌️";
	$rep = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/SendMessage?chat_id=" . $chatid . "&reply_markup=" . $reply_markup . "&text=" . urlencode($starttxt)));
}
if ($message == "ok") {
	$stopfree = "no";
	$sqlstopf = "UPDATE test SET stopfree='$stopfree' WHERE chatid='$chatid'";
	$nsend = $conn->query($sqlstopf);
	$freetime = 0;
	$sqlfreet = "UPDATE test SET freetime='$freetime' WHERE chatid='$chatid'";
	$nsend = $conn->query($sqlfreet);
}
if ($message == $text1) {
	$sqlt = "SELECT freetime FROM test WHERE chatid='$chatid'";
	$nsend = $conn->query($sqlt);
	$fields = $nsend->fetch_assoc();
	$freetime = $fields['freetime'];
	$realtime = time();
	$timer = $realtime - $freetime;
	if ($timer > 86400) {
		$stopfree = "no";
		$sqlstopf = "UPDATE test SET stopfree='$stopfree' WHERE chatid='$chatid'";
		$nsend = $conn->query($sqlstopf);
		$freetime = $realtime;
		$sqlfreet = "UPDATE test SET freetime='$freetime' WHERE chatid='$chatid'";
		$nsend = $conn->query($sqlfreet);
	} else {
		$stopfree = "yes";
		$sqlstopf = "UPDATE test SET stopfree='$stopfree' WHERE chatid='$chatid'";
		$nsend = $conn->query($sqlstopf);
	}
	///////////////////////
	//check vip user or not
	$statuspay = "no";
	$sqlt = "SELECT statuspay FROM test WHERE chatid='$chatid'";
	$nsend = $conn->query($sqlt);
	$fields = $nsend->fetch_assoc();
	$statuspay = $fields['statuspay'];
	if ($statuspay == "yes" or $stopfree == "no") {
		$imgurl = "http://kaaseb.com/img/";
		$img = rand(1, 100);
		$imgurl = $imgurl . $img . ".jpg";
		$rep = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/sendPhoto?chat_id=" . $chatid . "&photo=" . $imgurl . "&caption=" . "زندگی زیباست!"));
	}
	if ($statuspay == "no" and $stopfree == "yes") {
		$stoptxt = "❌❌در حالت رایگان میتوانید هر 24 ساعت یک عکس دریافت نمایید!! شما با پرداخت مبلغ 2 هزار تومان میتوانید بدون محدودیت از ربات استفاده نمایید!";
		$rep = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/SendMessage?chat_id=" . $chatid . "&reply_markup=" . $reply_markup2 . "&text=" . $stoptxt));
	}
}
if ($message == $text2) {
	$rep = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/SendMessage?chat_id=" . $chatid . "&reply_markup=" . $reply_markup . "&text=" . urlencode($share)));
}
