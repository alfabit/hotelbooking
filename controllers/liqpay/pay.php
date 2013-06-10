<?php
     include '../../config/liqpay.php';
     include '../../config/hotel.php';
     include '../user/check_auth.php';
     include '../../service.php';
     if(!CheckAuth()){
         return;
     }
     if(!isset($_GET['id'])){
         return;
     }
     
     if(!isset($_GET['amount'])){
         return;
     }
     
     global $liqpay;
     global $hotel;
     $orderId = $_GET['id'];
     $amount = $_GET['amount'];
     $args = array(
        'integer:Inv_ID'=>$orderId
     );
    
     $r = CallArgedProcedure("WEB_InvoicePrint", $args);
    
     $invoice = xmlToArray($r['content']);
     if(count($invoice)==0){return;}
     
     //$amount = $invoice[0]['DocSumDisc'];
     
     $merchant_id=$liqpay['merchantId'];
     $signature=$liqpay['signature'];
     $url="https://www.liqpay.com/?do=clickNbuy";
     $method='card,liqpay,delayed';
     $phone='';

     $xml="<request>      
            <version>1.2</version>
            <result_url>".$hotel['booking_url']."?liqpay=1</result_url>
            <server_url>".$hotel['booking_url']."controllers/liqpay/result.php</server_url>
            <merchant_id>$merchant_id</merchant_id>
            <order_id>$orderId/".time()."</order_id>
            <amount>$amount</amount>
            <currency>UAH</currency>
            <description>Order no. $orderId</description>
            <pay_way>$method</pay_way> 
            </request>
            ";
		
     //echo $xml;
	$xml_encoded = base64_encode($xml); 
	$lqsignature = base64_encode(sha1($signature.$xml.$signature,1));
	


echo "<html><body>";
echo "<h1>Loading...</h1>";
    CreatePostForm($url,
            array(
                'operation_xml'=>$xml_encoded,
                'signature'=>$lqsignature
            ));
    

echo "<script>document.forms[0].submit();</script></body></html>";

?>
