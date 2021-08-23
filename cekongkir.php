<?php 
	include "koneksi.php"; 
	include "config.php"; 
	include "api-ongkir.php";
	 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ongkir</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	</head>
<body>
<nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top" >
      <img src="img/logo.png" alt="" style="height: 80px ; width: 150px;">
        <div class="container">
          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a style="margin-top: 5 px;" class="nav-link" href="jadwalsholat.html">Jadwal Sholat<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cekongkir.php">Cek Ongkir</a>
              </li>
            </ul>
          </div>
          
        </div>
        <img src="img/jne.png"  style="height: 50px ; width: 100px;">
          <img src="img/pos.png"  style="height: 50px ; width: 100px;">
          <img src="img/tiki.png" style="height: 50px ; width: 100px;">
      </nav>
	
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>	


<div class="countainer">

<div class="row mt-3 justify-content-center" >
	<div class=" col-md-8">

	<div class="card">
		<div card="card-header">
		<h1>Cek Ongkir</h1>
		</div>
<form method="POST" action="proses.php?form=submit&action=hitung">
	<table style="width:100%;border-collapse:collapse;" cellpadding="5" cellspacing="5" border="0" > 
		<tr>
			<td width="200">Asal</td>
			<td width="1">:</td>
			<td>
				<select size="1" name="origin">
					<option value=""></option>
					<?php 
					$server="localhost"; 
					$user ="root";
					$pwd=""; 
					$db="ongkir"; 

					$koneksi=mysqli_connect($server,$user,$pwd,$db);
					if ($data = $koneksi->query("SELECT * FROM kabupaten ORDER BY kabNama ASC")){

						foreach ($data as $hasil) 
							{     
								?>
						<option value="<?php echo $hasil['kabKode']; ?>"><?php echo $hasil['kabNama']; ?></option>
						<?php
							}
						 
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td >Tujuan Pengiriman</td>
			<td >:</td>
			<td>
				<select size="1"  name="destination">
					<option value=""></option>
					<?php 
					$server="localhost"; 
					$user ="root";
					$pwd=""; 
					$db="ongkir"; 

					$koneksi=mysqli_connect($server,$user,$pwd,$db);
					if ($data = $koneksi->query("SELECT * FROM kabupaten ORDER BY kabNama ASC")){

						foreach ($data as $hasil) 
							{     
								?>
						<option value="<?php echo $hasil['kabKode']; ?>"><?php echo $hasil['kabNama']; ?></option>
						<?php
							}
						 
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td >Berat Produk</td>
			<td >:</td>
			<td>
				<input type="text" name="weight" />
			</td>
		</tr> 
		<tr>
			<td >Kurir</td>
			<td >:</td>
			<td>
				<select size="1"  name="courier">
					<option value="">Pilih Kurir</option>
					<option value="jne">JNE</option>
					<option value="tiki">TIKI</option>
					<option value="pos">POS</option> 
				</select>
			</td>
		</tr>
		<tr>
			<td ></td>
			<td ></td>
			<td>
				<input type="submit" value="Kirim" />
			</td>
		</tr> 
	</table> 
</form>
</div>
				</div>
				</div>
				</div>
</body>
</html>  