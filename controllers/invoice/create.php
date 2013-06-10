<?php
    include '../../service.php';
    include '../../lib.php';
    include '../user/check_auth.php';
    
    if(!CheckAuth()){
        echo "530";
        return;
    }
    $args = array(
        'integer:Doc_ID'=>$_POST['ids'],
        'integer:Opl_ID'=>$_POST['Opl_ID']
    );
    
    $r = CallArgedProcedure("WEB_InvoiceCr", $args);
    
    $data = xmlToArray($r['content']);
    if(count($data)==0){
        print_r($args);
        echo $r['content'];
    }else
        echo $data[0]['Doc_ID'];
?>
