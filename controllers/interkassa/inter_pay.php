<?php
    include '../../service.php';
    include '../../lib.php';
    include '../user/check_auth.php';
	include 'log.php';
    
    if(!CheckAuth()){
        echo "530";
        return;
    }
    $args = array(
        'integer:Inv_ID'=>$_GET['id']
    );
    
    $r = CallArgedProcedure("WEB_InvoicePrint", $args);
    
    $invoice = xmlToArray($r['content']);
	
	
	
	$interkassa_data = array(
		'ik_shop_id' =>         '5ABA07D8-0DA7-C42D-0FC9-C229057B8240',
		'ik_payment_amount' =>  $invoice[0]['DocSumDisc'],
		'ik_payment_id' =>      $_GET['id'],
		'ik_payment_desc' =>    'Заказ номера в пансионате "РУТА"',
		'ik_paysystem_alias' => '',
		'ik_baggage_fields' =>  '',
		'action' =>             'http://www.interkassa.com/lib/payment.php',
		'method' =>             'POST'
	
	
	);
generateLog('log.txt' , $interkassa_data);
include '../../views/interkassa/inter_pay.php';
