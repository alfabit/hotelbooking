<?php
    include '../../service.php';
    include '../../lib.php';
    include '../user/check_auth.php';
    
    if(!CheckAuth()){
        echo "530";
        return;
    }
    
    $r = CallArgedProcedure("WEB_BronList", array('integer:Client_ID'=>$_SESSION['Kontr_ID']));
    $list = xmlToArray($r['content']);
    
    include '../../views/bron/list.php';
?>
