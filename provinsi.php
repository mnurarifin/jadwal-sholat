<?php 

include "koneksi.php"; 
include "config.php"; 
include "api-ongkir.php";

$sqltr = "TRUNCATE TABLE provinsi";
$querytr = mysql_query($sqltr);

$resultdata  = ongkir_get_province();

$sqlarr =array();
foreach($resultdata as $key => $value){ 
	$sqlarr[] = "(NULL,'{$value['id']}','{$value['name']}')";
} 
if(count($sqlarr)>0){
	$sqlins = "INSERT INTO provinsi VALUES ".implode(",",$sqlarr); 
	$queryins = mysql_query($sqlins);
} 

?>