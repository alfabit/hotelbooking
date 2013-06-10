<?php
    include '../../securimage/securimage.php';
    include '../../service.php';
    include '../../config/hotel.php';
    global $hotel;
    
    $email = $_POST['email'];
    $code = $_POST['code'];
    $img = new Securimage();
    $valid = $img->check($code);

    if($valid != true) {       
        echo "code";
        return;
    }
    
    $r = CallArgedProcedure("KontragentTest", array('string:email'=>$email,'string:pass'=>1));
    if(stripos($r['content'],'_empty_')>0){
        echo "email";
        return;
    }
    $data = xmlToArray($r['content']);
    
    $newpass = substr( md5("digitwolf".microtime()),0,6);
    
    $name = explode(" ",$data[0]['KontrName']);
   
    $r = CallArgedProcedure("KontragentAdd", array(
                 'string:email'=>$email,
                 'string:pass'=>$data[0]['Pass'],
                 'string:newpass'=>md5($newpass),
                 'string:FName'=>$name[0],
                 'string:LName'=>$name[2],
                 'string:MName'=>$name[1],
                 'integer:Country_ID'=>0,
                 'string:birth'=>$data[0]['birth'],
                 'string:Addr'=>$data[0]['Addr'],
                 'string:Passport'=>$data[0]['Passport'],
                 'string:Contact'=>$data[0]['Contact']));
    //print_r($r);
    $data = xmlToArray($r['content']);
    
    if($data[0]['_empty_']>0){
        echo "1";
    }else{
        echo "0";   
        return;
    }
    
function mail_utf8($to, $subject = '(No subject)', $message = '', $header = '') { 
  $header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n"; 
  mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header); 
} 
  
mail_utf8($email, "Востановление пароля для системы бронирования номеров - ".$hotel['name'] , "
Здравствуйте, ".$name[1].",
    Ваш новый пароль для входа в систему бронирования номеров: $newpass
Доступ к системе бронирования по аддрессу: ".$hotel['booking_url']."    

Спасибо, за пользование нашими услугами.
");
?>
