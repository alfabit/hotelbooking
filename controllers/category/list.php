<?php
    

    include '../../service.php';
    include '../user/check_auth.php';
    
    $Kontr_ID = 0;
    $ages = "";
    if(CheckAuth()){
        $Kontr_ID = $_SESSION['Kontr_ID'];
    }
    if(isset($_POST['ages'])){$ages = $_POST['ages'];}
    
    $dfrom = dateRead($_POST['dfrom']);
    $dto = dateRead($_POST['dto']);
        
    $r = CallArgedProcedure("WEB_RoomCatList", array(
        'integer:DFrom'=>$dfrom,
        'integer:DTo'=>$dto,
        'integer:QAdult'=>$_POST['qadult'],
        'integer:QChild'=>$_POST['qchild'],
        'integer:Client_ID'=>$Kontr_ID,
        'string:ChildAge'=>$ages
         
    ));


    $list = xmlToArray($r['content']);
    //print_r($list);
    
    if(isset($_POST['sort']) && ($_POST['sort']!='null')){
        $sort = $_POST['sort'];
        $direction = $_POST['d']+0;
        
                
        foreach ($list as $key => $row) {
            $data[$key]  = $row[$sort]; 
        }        
        array_multisort($data,$direction,$list);
    }
    
    include '../../views/category/list.php';
?>
