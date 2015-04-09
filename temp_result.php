<?php

header("Content-type: text/xml"); 
include('lib/nusoap.php');

if(!isset($_REQUEST['ciutat'])){
$ciudad='Barcelona';
}else{
$ciudad=$_REQUEST['ciutat'];	
}
if(!isset($_REQUEST['pais'])){
$pais='Spain';
}else{
$pais=$_REQUEST['pais'];	
}



$client = new nusoap_client('http://www.webservicex.net/globalweather.asmx?WSDL','wsdl');
$error = $client->getError();
if ($error) {

}

$param = array('CityName'=>$ciutat,'CountryName'=>$pais);

$resultat = $client->call('GetWeather',$param);

$resultat2 = end($resultat);

$resultat2 = mb_convert_encoding($resultat2, "UTF-16", "UTF-8");

if ($client->fault) {
} else {
	$error = $client->getError();
	if ($error) {

	} else {
		 $xml=simplexml_load_string($resultat2) or die("Error: Cannot create object");
		 echo $xml->asXML();


	}
}
?>