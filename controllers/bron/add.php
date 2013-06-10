<?php
    include '../../service.php';
    include '../../lib.php';
    include '../user/check_auth.php';
    
    if(!CheckAuth()){
        echo "530";
        return;
    }
    
    $catId=$_POST['cat'];
    $dfrom=$_POST['dfrom'];
    $dto=$_POST['dto'];
    $qadult=$_POST['qadult'];
    $qchild=$_POST['qchild'];
    $births = $_POST['births'];
    $names = $_POST['names'];
    $passports = $_POST['passports'];
    $clientId = $_SESSION['Kontr_ID'];
    $dsrv = $_POST['dserv'];
    $args =  array(
        'integer:DFrom'=>$dfrom,
        'integer:DTo'=>$dto,
        'integer:QAdult'=>$qadult,
        'integer:QChild'=>$qchild,
        'integer:Cat_ID'=>$catId,
        'integer:Client_ID'=>$clientId,
        'integer:Plat_ID'=>$clientId,
        'string:GuestNames'=>$names,
        'string:GuestBirth'=>$births,
        'string:GuestPassp'=>$passports//,
        //'string:DServ'=>$dsrv
    );
    $r = CallArgedProcedure("WEB_BronCatAdd",$args);
    //print_r($args);
    $data = xmlToArray($r['content']);
    if(count($data)==0){
        print_r($args);
        echo $r['content'];
    }else
    if($data[0]['_empty_']>0){
        echo "1";
    }else{
        echo $data[0]["_empty_"];
        echo $r['content'];
    }
?>
