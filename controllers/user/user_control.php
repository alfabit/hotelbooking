<?php
    include 'check_auth.php';
    
    if(CheckAuth()){
         include '../../views/user/user.php';
    }else{
         include '../../views/user/guest.php';
    }
?>
