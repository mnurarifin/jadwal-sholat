<?php 
	session_start();
	include "koneksi.php"; 
	include "config.php"; 
	include "api-ongkir.php";
		
	//print_r($_SESSION['result']); 
	 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hasil nya</title>
	</head>
<body>
	<table width="300" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
		<tr>
			<td>Dari</td>
			<td>:</td>
			
		</tr>
		<tr>
			<td>Tujuan</td>
			<td>:</td>
			
		</tr>
		<tr>
			<td>Berat</td>
			<td>:</td>
			<td> Gram</td>
		</tr>
	</table>
	
</body>
</html>  