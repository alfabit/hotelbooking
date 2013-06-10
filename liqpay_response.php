<?php
include 'config/liqpay.php';
global $liqpay;
$merc_id = $liqpay['merchantId'];
$merc_sig = $liqpay['signature'];
$xml=$_POST['operation_xml'];
$xml_decoded=decode_base64($xml);
$sign=base64_encode(sha1($merc_sig.$xml.$merc_sig,1));
?>
