<?php 
	include "koneksi.php";
	include "config.php";
	include "api-ongkir.php";
	
	$sql ="TRUNCATE TABLE provinsi ";
	$query =mysqli_query($sql);
	
	$result = ongkir_get_province();
	
	$sql_arr = array();
	foreach($result as $key => $value){
		if(!$value['id']){
			continue;
		}
		$sql_arr[] = "(NULL,'{$value['id']}','{$value['name']}')";
	}
	if(count($sql_arr)>0){
		$sqlinssert = "INSERT INTO provinsi VALUES ".implode(",",$sql_arr); 
		$queryinsert = mysqli_query($sqlinssert);
	}
	
?>