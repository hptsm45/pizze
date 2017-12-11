<center>
ELENCO PIZZERIE BERGAMO (11/12/2017)

<?php
	
	$l=50; //num max output
	$q='pizza'; //query
	$luogo='bergamo';
	
	$url="https://api.foursquare.com/v2/venues/search?v=20171211&client_id=5YBD24EBCB5BO3LPZIWCOPWOMUHXP35ZDDWV02MMCFXPCKHN&client_secret=HS5VYXTOUVGXSFMXWFSC10CGD0LVI2GYKVNYZHQ22FY54JFW&near=$luogo&query=$q&limit=$l&intent=checkin";
		
	// inizializzo cURL
	$ch = curl_init();
	
	// imposto la URL della risorsa remota da scaricare
	curl_setopt($ch, CURLOPT_URL, $url);

	//  return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	// eseguo la chiamata 
	curl_exec($ch);
	$json=curl_exec($ch);
		
	//decodfico json	
	$dati = json_decode($json);
	
	/*contaquanti sono
	$conta=0;
	foreach($dati->response->venues as $i => $ven)
		$conta++;
	echo $conta;*/
		
	//stampa tabella
	echo "<table border=1px>";
		echo "<tr>";
			echo "<th>NOME</th>";
			echo "<th>LATITUDINE</th>";
			echo "<th>LONGITUDINE</th>";
		echo "</tr>";
	foreach($dati->response->venues as $i => $ven)
	{
		echo "<tr>";
			echo "<td align='center'>";
				echo $ven->name;
			echo "</td>";
			echo "<td align='center'>";
				echo $ven->location->lat;
			echo "</td>";
			echo "<td align='center'>";
				echo $ven->location->lng;
			echo "</td>";
		echo "</tr>";
	}
	echo "</table>";

	// chiudo cURL
	echo curl_error($ch);
	curl_close($ch);
?>
</center>