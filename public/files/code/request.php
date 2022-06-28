<?php
if(isset($_GET['pay'])){
$chatid=$_GET['pay'];
//database
//data base
$servername = "localhost";
$username= "";
$password= "";
$dbname= "";
$conn= new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn,'set names "utf8"');

    $MerchantID = '';  //Required
    $Amount = 500; //Amount will be based on Toman  - Required
    $Description = 'خرید ربات';  // Required
   // $Email = 'UserEmail@Mail.Com'; // Optional
  //  $Mobile = '09123456789'; // Optional
    $CallbackURL = 'آدرس varify.php';  // Required

    // URL also can be ir.zarinpal.com or de.zarinpal.com
    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentRequest([
        'MerchantID'     => $MerchantID,
        'Amount'         => $Amount,
        'Description'    => $Description,
        //'Email'          => $Email,
     //   'Mobile'         => $Mobile,
        'CallbackURL'    => $CallbackURL,
    ]);

    //Redirect to URL You can do it also by creating a form
    if ($result->Status == 100) {
		$authority=$result->Authority;
		$sql="UPDATE test SET authority='$authority' WHERE chatid='$chatid'";
		$result12=$conn->query($sql);
        header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
    } else {
        echo'ERR: '.$result->Status;
    }
}