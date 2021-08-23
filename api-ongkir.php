<?php 
function ongkir_get_province(){
	$url = RAJAONGKIR_API_URL; 
	
	$data = array();
	
	for($i=1;$i<=34;$i++){ 
		$dataurl = $url ."/province/?id=".$i;
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $dataurl,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: ".RAJAONGKIR_API_KEY
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl); 
		
		$result =  json_decode($response,true);
		
		$data[] = array(
			'id' => $result['rajaongkir']['results']['province_id'],
			'name' => $result['rajaongkir']['results']['province']
		);
		
		
	}
	return $data;
}

function ongkir_get_city($provid=null){
	$url = RAJAONGKIR_API_URL;
	
	$dataar = array();
	if($provid){ 
		$wherclause = " WHERE provinsiKode = $provid";
	}

	$sql = "SELECT provinsiKode FROM provinsi $wherclause";
	$query = mysqli_query($sql);
	$numOf = mysqli_num_rows($query);
	if($numOf>0){
		while($data = mysqli_fetch_array($query)){
			
			$dataurl = $url ."city?id=&province=".$data['provinsiKode'];
		
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $dataurl,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"key: ".RAJAONGKIR_API_KEY
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl); 
			
			$result =  json_decode($response,true);
			
			if(count($result['rajaongkir']['results']>1)){
				foreach($result['rajaongkir']['results'] as $key => $value){
					$dataar[] = array(
						'id' => $value['city_id'],
						'type' => $value['type'],
						'name' => $value['city_name'],
						'post' => $value['postal_code']
					);
				}
			}else{ 
				$dataar[] = array(
					'id' => $result['rajaongkir']['results']['city_id'],
					'type' => $result['rajaongkir']['results']['type'],
					'name' => $result['rajaongkir']['results']['city_name'],
					'post' => $result['rajaongkir']['results']['postal_code']
				);
			}
		}
	} 
	return $dataar;
}  


function ongkir_get_cost($origin,$dest,$weight,$courier){
	$url = RAJAONGKIR_API_URL;
	  
	$dataurl = $url ."cost/";
	
	$dataar = array();

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $dataurl,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "origin=$origin&destination=$dest&weight=$weight&courier=$courier",
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: ".RAJAONGKIR_API_KEY
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl); 
	
	$result =  json_decode($response,true);  
		 
	return $result;
} 
?>