<?php
    include 'check_auth.php';
    include '../../service.php';
    if (CheckAuth()){ 
        $email = $_SESSION['email'];
        $pass = $_SESSION['phash'];
        $r = CallArgedProcedure("KontragentTest", array('string:email'=>$email,'string:pass'=>$pass));
        $data = xmlToArray($r['content']);
        $profile = $data[0];
        if(isset($profile['email']))
            include '../../views/user/profile.php';
    }
 ?>