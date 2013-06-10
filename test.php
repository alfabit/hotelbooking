<?php
$xml="<response>
<sender_phone>+380634122757</sender_phone>
<status>failure</status>
<version>1.2</version>
<order_id>21836/1313754035</order_id>
<merchant_id>i5546392099</merchant_id>
<pay_details>PB</pay_details>
<description>Order no. 21836</description>
<currency>UAH</currency>
<amount>0.10</amount>
<pay_way>card</pay_way>
<transaction_id>11937637</transaction_id>
<action>server_url</action>
<code></code>
</response>";
     
          
     
     $p = xml_parser_create();
     xml_parse_into_struct($p, $xml, $vals, $index);
     xml_parser_free($p);
     
     print_r($vals);
?>
