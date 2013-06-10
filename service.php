<?php
function dateRead($date){
        try{
            $d = explode(".",$date);
            if(count($d)<3) return 0;
            return intval(mktime(0,0,0,$d[1]+0,$d[0]+0,$d[2]+0)/86400 + 25568);
        }
        catch(Exception $e){return $e;}
    }
	

function CallArgedProcedure($proc,$args){
    try {
        $host = "sh.altinet.com.ua";
        $port = 8080;
        $url="http://$host:$port/ws/$proc.xml";
        
        foreach ($args as $k=>$v){
            $args[$k]=iconv( 'utf-8', 'cp1251',$v);
        }
        
//        if(isset($args)){
//            for($i=0;$i<count($args)-1;$i++){
//                $args[$i]=iconv( 'utf-8', 'cp1251',$args[$i]);
//            }
//        }
        return SendPost($host,$port,$url,$args);
    } catch (Exception $ex) {        
            return array('status' => 'err',
            'error' => $ex);
    }
}

function CallProcedure(){
    if(isset ($_GET["proc"])){
        try {
            $host = "sh.altinet.com.ua";
            $port = 8080;
            $proc = $_GET["proc"];
            $url="http://$host:$port/ws/$proc.xml";

            $data = array();
           
            foreach ($_GET as $k => $v) {
                
                if(substr($k, 0,4)=="name"){
                    $data[substr($k,4)] =iconv( 'utf-8', 'cp1251',$v);
                }
            }

            
            return SendPost($host,$port,$url,$data);
        } catch (Exception $ex) {
            return array('status' => 'err',
            'error' => $ex);
        }
    }
}

function SendPost($host,$port,$url,$data){
    // Convert the data array into URL Parameters like a=b&foo=bar etc.
     $data = http_build_query($data);
     //$data = utf8_encode($data);
     //$data = iconv( 'utf-8', 'cp1251',$data);
    // open a socket connection on port 80 - timeout: 30 sec
    $fp = fsockopen($host, $port, $errno, $errstr, 30);

    if ($fp){

        // send the request headers:
        fputs($fp, "POST $url HTTP/1.1\r\n");
        fputs($fp, "Host: sh.altinet.com.ua:8080\r\n");
        fputs($fp, "Content-type: application/x-www-form-urlencoded; charset=utf-8\r\n");
        fputs($fp, "Content-length: ". strlen($data) ."\r\n");
        fputs($fp, "Connection: close\r\n\r\n");
        fputs($fp, $data);

        $result = '';
        while(!feof($fp)) {
            // receive the results of the request
            $result .= fgets($fp, 128);
        }
    }
    else {
       
        return array(
            'status' => 'err',
            'error' => "$errstr ($errno)"
        );
    }

    // close the socket connection:
    fclose($fp);
 //echo $result;
    // split the result header from the content
    $result = explode("\r\n\r\n", $result, 2);

    $header = isset($result[0]) ? $result[0] : '';
    $content = isset($result[1]) ? $result[1] : '';
    
    // return as structured array:
    return array(
        'status' => 'ok',
        'header' => $header,
        'content' => $content
    );
}

function xmlToArray($xml){
    $data = array();
    $p1 = stripos($xml, "<row>");
    while($p1!=false){
        $p1 += 5;
        $p2 = stripos($xml, "</row>", $p1);
        $row = substr($xml, $p1,$p2-$p1);
        $rowArray = array();
        $r1 = stripos($row, "<");
        do{
            $r1 ++;
            $r2 = stripos($row, ">", $r1);
            $key = substr($row, $r1,$r2-$r1);

            $r1 = $r2+1;
            $r2 = stripos($row, "</", $r1);
            $value = substr($row, $r1,$r2-$r1);
            $rowArray[$key]= iconv('cp1251', 'utf-8', $value);

            
            $r2+=2;
            $r1 = stripos($row, "<", $r2);
        }while($r1!=false && $r1<$p2);
        array_push($data, $rowArray);

        $p1 = stripos($xml, "<row>" ,$p2);
    }
    return $data;    
}

function arrayToJson($data){

    $js = "[";
    if(count($data)>0)
    {
        foreach($data as $r ){
            $js.="{";
            foreach($r as $k=>$v ){
                $js.="'$k':'$v',";

            }
            $js= substr($js,0,strlen($js)-1)."},";
        }
        $js= substr($js,0,strlen($js)-1);
    }
    $js.="]";
    return $js;
}

error_reporting(E_ALL);
ini_set('display_errors', '1');

$r = CallProcedure();

if($r['status']=="ok"){
    echo "var ".$_GET["proc"]."=".  arrayToJson(xmlToArray($r['content'])).";";
}

function CreatePostForm($action,$params){
    echo "<form action='$action' method='POST'>";

    foreach($params as $k=>$v){
        echo "<input type='hidden' name='$k' value='$v'>";
    }

    //echo "<button>Submit</button>";
    echo "</form>";
}

?>
