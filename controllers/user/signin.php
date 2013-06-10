<?php
include 'check_auth.php';
//include_once '../../lib.php';
//if(!isAjax()) return false;

if(AuthenticateUser($_POST['email'], $_POST['pass']))
    echo "1";
else
    echo "0";

?>
