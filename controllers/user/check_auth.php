<?php
    $key=md5("dsfaljwennczmnqqoskqbaksdlfuiwjsjdnfuiq891jka89231jkdsa8923jksda89u213jnwd9823");
    
    function AuthenticateUser($email, $pass){
        global $key;
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        
        try{
//            include '../../lib.php';
            include_once '../../service.php';
//
//            if(!isAjax()) return false;

            $r = CallArgedProcedure("KontragentTest", array('string:email'=>$email,'string:pass'=>md5($pass)));
            $data = xmlToArray($r['content']);
            //print_r($r);
            $result = (!(stripos($r['content'], "<_empty_>")>0) && $data[0]['Pass']==md5($pass));
            
            if($result){
				if(trim($data[0]['KontrName']) == " " || trim($data[0]['KontrName']) == ""){
					$name = $data[0]['Addr'];
				}else{
					$name = trim($data[0]['KontrName']);
				};
                session_start();
                $_SESSION['Kontr_ID'] = $data[0]['Kontr_ID'];
                $_SESSION['KontrName'] = $name;
				//($data[0]['KontrName'] != " " && $data[0]['KontrName'] != "" && isset($data[0]['KontrName']) && !empty($data[0]['KontrName'])) ? $data[0]['KontrName'] : $data[0]['Addr'];
                $_SESSION['email'] = $data[0]['email'];
                $_SESSION['birth'] = $data[0]['birth'];
                $_SESSION['Passport'] = $data[0]['Passport'];
                $_SESSION['auth'] = sha1("$email/$key");
                $_SESSION['phash'] = md5($pass);
            
            }
            
            return $result;
            
        }
        catch(Exception $e){
            //print_r($e);
            return false;
        } 
    }
  
    function CheckAuth(){
        global $key;
        session_start();
        if(!isset($_SESSION['email'])){
            //echo "no email";
            return false;
        }
        $email = $_SESSION['email'];
        $auth = $_SESSION['auth'];
        
        return sha1("$email/$key")==$auth;
    }
    
?>
