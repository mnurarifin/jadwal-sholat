<?php 
	include "koneksi.php"; 
	include "config.php"; 
	include "api-ongkir.php";
	 
	$sqltr = "TRUNCATE TABLE kabupaten";
	$querytr = mysqli_query($sqltr);

	$sqlarr =array();

	$sqlprov = "SELECT provinsiKode,provinsiId FROM provinsi ORDER BY provinsiNama ASC";
	$query = mysqli_query($sqlprov);
	while($data = mysqli_fetch_array($query)){
		$resultdata  = ongkir_get_city($data['provinsiKode']);

		foreach($resultdata as $key => $value){ 
			$sqlarr[] = "(NULL,'{$data['provinsiId']}','{$value['id']}','{$value['name']}','{$value['type']}','{$value['post']}')";
		} 
		
		
	} 
	if(count($sqlarr)>0){
		$sqlins = "INSERT INTO kabupaten VALUES ".implode(",",$sqlarr); 
		$queryins = mysqli_query($sqlins);
	}
?>