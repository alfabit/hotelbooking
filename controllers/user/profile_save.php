<?php
    include 'check_auth.php';
    include '../../service.php';
    if (CheckAuth()){ 
        $email = $_SESSION['email'];
        $pass = $_SESSION['phash'];
        if(($_POST['pass']=="") || (md5($_POST['pass'])!=$pass)) {echo "530"; return;};
        
        $newpass="";
        if($_POST['npass']!="") $newpass = md5($_POST['npass']);
        
        $r = CallArgedProcedure("KontragentAdd", array(
                 'string:email'=>$email,
                 'string:pass'=>md5($_POST['pass']),
                 'string:newpass'=>$newpass,
                 'string:FName'=>($_POST['lastname']),
                 'string:MName'=>($_POST['firstname']),
                 'string:LName'=>($_POST['middlename']),
                 'integer:Country_ID'=>$_POST['country'],
                 'string:birth'=>$_POST['birth'],
                 'string:Addr'=>$_POST['addr'],
                 'string:Passport'=>  $_POST['passport'],
                 'string:Contact'=>$_POST['contact']));

        
        $data = xmlToArray($r['content']);
        
        // print_r($r);
//        print_r(array(
//                 'string:email'=>$email,
//                 'string:pass'=>md5($_POST['pass']),
//                 'string:newpass'=>$newpass,
//                 'string:FName'=>$_POST['lastname'],
//                 'string:LName'=>$_POST['middlename'],
//                 'string:MName'=>$_POST['firstname'],
//                 'integer:Country_ID'=>$_POST['country'],
//                 'string:birth'=>$_POST['birth'],
//                 'string:Addr'=>$_POST['addr'],
//                 'string:Passport'=>$_POST['passport'],
//                 'string:Contact'=>$_POST['contact']));
//        
        if($data[0]['_empty_']>0){
            if($newpass!="")
                AuthenticateUser($email,$newpass);
            echo "1";
        }
    }
?>
