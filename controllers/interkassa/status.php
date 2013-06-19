<?php
	include 'log.php';

	$status = array(
	
		'ik_shop_id'=>$_POST['ik_shop_id'],
		'ik_payment_amount'=>$_POST['ik_payment_amount'],
		'ik_payment_id'=>$_POST['ik_payment_id'],
		'ik_payment_desc'=>$_POST['ik_payment_desc'],
		'ik_paysystem_alias'=>$_POST['ik_paysystem_alias'],
		'ik_baggage_fields'=>$_POST['ik_baggage_fields'],
		'ik_payment_timestamp'=>$_POST['ik_payment_timestamp'],
		'ik_payment_state'=>$_POST['ik_payment_state'],
		'ik_trans_id'=>$_POST['ik_trans_id'],
		'ik_currency_exch'=>$_POST['ik_currency_exch'],
		'ik_fees_payer'=>$_POST['ik_fees_payer'],
		'ik_sign_hash'=>$_POST['ik_sign_hash']
		
	);
	
		generateLog("log.txt",$status);