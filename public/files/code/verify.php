<?php
//data base
$servername = "localhost";
$username= "";
$password= "";
$dbname= "";
$conn= new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn,'set names "utf8"');


    $MerchantID = '';
    $Amount =500; //Amount will be based on Toman
    $Authority = $_GET['Authority'];
	//sql query
	$sql1="SELECT chatid FROM test WHERE Authority='$Authority'";
	$nsend=$conn->query($sql1);
	$fields=$nsend->fetch_assoc();
	$chatid=$fields[chatid];
	
    if ($_GET['Status'] == 'OK') {
        // URL also can be ir.zarinpal.com or de.zarinpal.com
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
	
        $result = $client->PaymentVerification([
            'MerchantID'     => $MerchantID,
            'Authority'      => $Authority,
            'Amount'         => $Amount,
        ]);

        if ($result->Status == 100) {
			
            echo "پرداخت موفق بود";
			$refid=$result->RefID;
			$sql="UPDATE test SET refid='$refid' WHERE chatid='$chatid'";
			$result12=$conn->query($sql);
			//
			$token ='توکن ربات';
			$send=json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$chatid."&text=".urlencode("پرداخت شما با موفقیت انجام شد هم اکنون هیچ محدودیتی در استفاده از ربات ندارید!")));
			//status pay
			$statuspay="yes";
			$sql3="UPDATE test SET statuspay='$statuspay' WHERE chatid='$chatid'";
			$result4=$conn->query($sql3);

        } else {
            echo 'Transation failed. Status:'.$result->Status;
        }
    } else {
        echo 'Transaction canceled by user';
    }
