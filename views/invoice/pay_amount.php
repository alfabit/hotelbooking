<?php
global $invoice;
?>

<div>
 <img src="images/credit_cards.ico" class="float-left" width="100"/>
 <h2>Оплата счёта №<?php echo $invoice[0]['DocNumber'] ?></h3>
 <h3>На общую сумму: <?php echo $invoice[0]['DocSumDisc'] ?>грн.</h3>
 <br/>
 <div>Введите сумму, которую вы хотите оплатить:
    <input type="text" id="pay_amount_value" value="<?php echo $invoice[0]['DocSumDisc'] ?>"/>грн.
 <div>
</div>