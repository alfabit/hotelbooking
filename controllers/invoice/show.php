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
    
    $r = CallArgedProcedure("WEB_FirmRekviz", $args);
    $rekviz = xmlToArray($r['content']);
    //print_r($invoice);
//    if(count($data)==0){
//        print_r($args);
//        echo $r['content'];
//    }else
//        
    include '../../views/invoice/show.php';
?>
