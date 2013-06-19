<?php

$result = array(

	'ik_shop_id' => $_POST['ik_shop_id'],
	'ik_payment_state' => $_POST['ik_payment_state'],
	'ik_payment_timestamp' => $_POST['ik_payment_timestamp'],
	'ik_payment_state' => $_POST['ik_payment_state']	

);
//$result['ik_shop_id'] === '5ABA07D8-0DA7-C42D-0FC9-C229057B8240'
if(true){
	if($_POST['ik_payment_state'] === 'success'){
		$message = 'Спасибо за Ваш заказ! Наш менеджер вскоре свяжется с Вами';
	}else{
		$message = 'К сожалению, произошла ошибка, попробуйте еще раз';
	}
	include'../../views/interkassa/result.php';
}