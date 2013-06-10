<?php
    include '../../controllers/user/check_auth.php';
    include '../../service.php';
    
        
//    if(!CheckAuth()){
//        echo "Нет доступа.";
//        return;
//    }
// 
    session_start();
    $dfrom = dateRead($_POST['dfrom']);
    $dto = dateRead($_POST['dto']);
    
    echo $_POST['dfrom'];
    
    $clientId = 0;//$_SESSION['Kontr_ID'];
    
    $r = CallArgedProcedure("WEB_ServList", array(
        'integer:DFrom'=>$dfrom,
        'integer:DTo'=>$dto,
        'integer:Client_ID'=>$clientId
    ));
    
    $service_price = xmlToArray($r['content']);
    
    include '../../views/services/list.php';
?>
