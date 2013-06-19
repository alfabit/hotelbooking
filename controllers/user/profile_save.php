<?php
    include 'check_auth.php';
    include '../../service.php';
    if (CheckAuth()){ 
        $email = $_SESSION['email'];
        $pass = $_SESSION['phash'];
        if(($_POST['pass']=="") || (md5($_POST['pass'])!=$pass)) {echo "530"; return;};
        
        $newpass="";
        if($_POST['npass']!="") $newpass = md5($_POST['npass']);
		$arr = array();
        $arr['middlename'] == "";
		$arr['lastname'] == "";
		$arr['firstname'] == "";
		
		$arr = $_POST;
		foreach ($arr as &$post){
			$post = ($post) ? $post : " ";
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
                 'string:email'=>$email,
                 'string:pass'=>md5($arr['pass']),
                 'string:newpass'=>$newpass,
                 'string:FName'=>($arr['lastname']),
                 'string:MName'=>($arr['firstname']),
                 'string:LName'=>($arr['middlename']),
                 'integer:Country_ID'=>$arr['country'],
                 'string:birth'=>$arr['birth'],
                 'string:Addr'=>$arr['addr'],
                 'string:Passport'=>$arr['passport'], 
                 'string:Contact'=>$arr['contact']));

        
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
//        if($data[0]['_empty_']>0){
			AuthenticateUser($email,$pass);
            if($newpass!=""){
                AuthenticateUser($email,$newpass);
            echo "1";
			}else{
				AuthenticateUser($email,$pass);
			}
//        }
    }
?>
