<?php
include_once '../../service.php';
include_once 'check_auth.php';
include_once '../../lib.php';
if(!isAjax()) { echo "error"; return false;}

$company = ($_POST['company']) ? $_POST['company'] : " ";
$code_passport = ($_POST['code']) ? $_POST['code'] : ($_POST['passport']);
if($_POST['code']){
	$code_passport = $_POST['code'];
}else{
	if ($_POST['passport']){
		$code_passport = $_POST['passport'];
	}
	if (!isset($_POST['passport']) && !isset($_POST['code'])){
		$code_passport = "aha";
	}
	}
	$arr = $_POST;
	
	if(!isset($arr['middlename']) || $arr['middlename'] == ""){
		$arr['middlename'] = " ";
	}
	if(!isset($arr['lastname']) || $arr['lastname'] == ""){
		$arr['lastname'] = " ";
	}
	if(!isset($arr['firstname']) || $arr['firstname'] == ""){
		$arr['firstname'] = " ";
	}
	if(!isset($arr['middlename']) || $arr['middlename'] == ""){
		$arr['middlename'] = " ";
	}
	if(!isset($arr['birth']) || $arr['birth'] == ""){
		$arr['birth'] = "01.01.2000";
	}

$r = CallArgedProcedure("KontragentAdd", array(
     'string:email'=>$arr['email'],
     'string:pass'=>md5($arr['pass']),
     'string:FName'=>($arr['lastname']),
     'string:MName'=>($arr['firstname']),
     'string:LName'=>($arr['middlename']),
     'integer:Country_ID'=>$arr['country'],
     'string:birth'=>$arr['birth'],
     'string:Addr'=>$company,
     'string:Passport'=>$code_passport,
     'string:Contact'=>$arr['contact']));

	$data = xmlToArray($r['content']);
	
if($data[0]['_empty_']>0){
    AuthenticateUser($_POST['email'],$_POST['pass']);
    echo "1";
}else{
    echo "Ошибка регистрации. Такой пользователь, возможно, уже зарегистрирован.";
    //print_r($data);
}

?>