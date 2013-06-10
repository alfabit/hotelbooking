<?php
$merchant_id="i9672006953";
$merc_sign="x5Bikcg3SC8DUMVfDFGYOchY8nafh";
function createButton($orderId,$amount,$description,$payWay){
    $xml="<request>      
      <version>1.2</version>
      <merchant_id>$merchant_id</merchant_id>
      <result_url>result_url</result_url>
      <server_url>server_url</server_url>
      <order_id>$orderId</order_id>
      <amount>$amount</amount>
      <currency>UAH</currency>
      <description>$description</description>
      <default_phone></default_phone>
      <pay_way>$payWay</pay_way>
      <goods_id></goods_id>
</request>";
    $sign=base64_encode(sha1($merc_sign.$xml.$merc_sign,1));
}

?>
