<?php

function generateLog($file,$data)
{
	ob_start();
	var_dump($data);
	$log_data = ob_get_clean();
	$date = "[".date("d/m/Y h:i:s", mktime()) ."]\n";
	$log_data = $date . $log_data;
	$handle = fopen($file, 'a+');
	
	if($handle === FALSE)
	
		echo "ошибка в записи";
	else 
		echo 'получилось';
		
		fwrite($handle, $log_data);
	
	fclose($handle);
}
?>