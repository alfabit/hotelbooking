<?php
    include '../../service.php';
    include '../../lib.php';
    include '../user/check_auth.php';
    
    if(!CheckAuth()){
        echo "530";
        return;
    }
    $args = array(
        'integer:Inv_ID'=>$_GET['id']
    );
    
    $r = CallArgedProcedure("WEB_InvoicePrint", $args);
    
    $invoice = xmlToArray($r['content']);
    
    include '../../views/invoice/pay_amount.php';
?>
