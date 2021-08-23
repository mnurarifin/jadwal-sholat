<?php 
	session_start();
	include "koneksi.php"; 
	include "config.php"; 
	include "api-ongkir.php";
	
	if($_GET['form']=='submit'){
		if($_GET['action']=='hitung'){
			$hasil = ongkir_get_cost($_POST['origin'],$_POST['destination'],$_POST['weight'],$_POST['courier']);
			
			$_SESSION['result'] = $hasil;
			 
			
			header('location:result.php');
			exit;
		}
	} 
?>