<form name="payment" action="http://www.interkassa.com/lib/payment.php" method="post" target="_top">
<input type="hidden" name="ik_shop_id" value="<?php echo $interkassa_data['ik_shop_id']; ?>">
<input type="hidden" name="ik_payment_amount" value=" <?php echo $interkassa_data['ik_payment_amount']; ?>">
<input type="hidden" name="ik_payment_id" value="<?php echo $interkassa_data['ik_payment_id']; ?>">
<input type="hidden" name="ik_payment_desc" value="<?php echo $interkassa_data['ik_payment_desc']; ?>">
<input type="hidden" name="ik_paysystem_alias" value="<?php echo $interkassa_data['ik_paysystem_alias']; ?>">
<input type="hidden" name="ik_baggage_fields" value="<?php echo $interkassa_data['ik_baggage_fields']; ?>">
</form>

<?php if($invoice[0]['DocSumDisc']){ 
	echo "<script>document.forms[0].submit();</script>"; 
}
else{
	echo "Произошла ошибка. Пожалуйста, попробуйте снова";
}
		