<?php
include_once '../../service.php';
include_once 'check_auth.php';
include_once '../../lib.php';
if(!isAjax()) { echo "error"; return false;}
    
    
 $r = CallArgedProcedure("KontragentAdd", array(
     'string:email'=>$_POST['email'],
     'string:pass'=>md5($_POST['pass']),
     'string:FName'=>($_POST['lastname']),
     'string:MName'=>($_POST['firstname']),
     'string:LName'=>($_POST['middlename']),
     'integer:Country_ID'=>$_POST['country'],
     'string:birth'=>$_POST['birth'],
     'string:Addr'=>$_POST['addr'],
     'string:Passport'=>$_POST['passport'],
     'string:Contact'=>$_POST['contact']));

$data = xmlToArray($r['content']);

if($data[0]['_empty_']>0){
    AuthenticateUser($_POST['email'],$_POST['pass']);
    echo "1";
}else{
    echo "Ошибка регистрации. Такой пользователь, возможно, уже зарегистрирован.";
    //print_r($data);
}

?>
