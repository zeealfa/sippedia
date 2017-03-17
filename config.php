<?php @session_start();
date_default_timezone_set('Asia/Jakarta');
$db_param_reader='server=127.0.0.1; database=masterppdb; username=root; password=paspass12345; port=3306';
$db_param_write='server=127.0.0.1; database=masterppdb; username=root; password=paspass12345; port=3306';
//$db_param_reader='server=127.0.0.1; database=mastersikad; username=master_r; password=a57edc0ec75cbcf20614f9481721d6639fc6a186; port=3306';
//$db_param_write='server=127.0.0.1; database=mastersikad; username=master_w; password=47143c39674118840a4de585db0036985c737bee; port=3306';
$db_ref='server=127.0.0.1; database=ref; username=root; password=paspass12345; port=3306';


$config_reader = array(
	'username' => 'root',
	'password' => 'paspass12345',
	'database' => 'masterppdb',
	'port' => '3306',
	'hostname' => '127.0.0.1');
$database['reader']='masterppdb';
$kunci='myBad';
?>