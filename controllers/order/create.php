<?php
    include '../../controllers/user/check_auth.php';
    include '../../service.php';
    
    
    if(!CheckAuth()){
        echo "Пожалуйста, выполните вход в систему.";
        return;
    }
    
        
    include '../../views/order/create.php';
    
?>
