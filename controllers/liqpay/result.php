<?php

//LOG---------------------------------------------------------------------------
function writeToLogFile($msg)
{
     $today = date("Y_m_d"); 
     $logfile = "log.txt"; 
     if (!$handle = @fopen($logfile, "a"))
     {
          exit;
     }
     else
     {
          if(@fwrite($handle,"$msg\r\n")===FALSE) 
          {
               exit;
          }
  
          @fclose($handle);
     }
}

     include '../../config/liqpay.php';
     include '../user/check_auth.php';
     include '../../service.php';
//     if(!CheckAuth()){
//         return;
//     }
//     if(!isset($_POST['id'])){
//         return;
//     }
     
     global $liqpay;
     $merc_sig = $liqpay['signature'];
     $xml_decoded=base64_decode($_POST['operation_xml']);
     $signature = $_POST['signature'];
     
//     $xml="<response>      
//      <version>1.2</version>
//      <merchant_id></merchant_id>
//      <order_id> ORDER_123456</order_id>
//      <amount>1.01</amount>
//      <currency>UAH</currency>
//      <description>Comment</description>
//      <status>success</status>
//      <code></code>
//      <transaction_id>31</transaction_id>
//      <pay_way>card</pay_way>
//      <sender_phone>+3801234567890</sender_phone>
//      <goods_id>1234</goods_id>
//      <pays_count>5</pays_count>
//</response>";
     
          
     
     $p = xml_parser_create();
     xml_parse_into_struct($p, $xml_decoded, $vals, $index);
     xml_parser_free($p);
     
     
    $order_id =trim(substr($vals[7]['value'], strpos($vals[7]['value'], "/")+1)); 
    $result = $vals[3]['value'];
    $amount =  $vals[17]['value'];
    
    
    writeToLogFile(date(DATE_ATOM)."------------------------------------");
    writeToLogFile("SIGNATURE=$signature");
    writeToLogFile($xml_decoded);
    if($signature==base64_encode(sha1($merc_sig.$xml_decoded.$merc_sig,1)))
    {        
        writeToLogFile("#$order_id -> $amount $result");
        if($result=="success")
            writeToLogFile(print_r(CallArgedProcedure("WEB_InvoicePay", array('integer:Inv_ID'=>$order_id,'float:Summ'=>$amount))));
        
    }
    else
    {
        writeToLogFile("#$order_id FALSIFICATION");
    }

?>
