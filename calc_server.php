<?php
	require_once 'lib/nusoap.php';

	$soap = new soap_server;
	$soap->configureWSDL('AddService', 'http://localhost/serv');
	$soap->wsdl->schemaTargetNamespace = 'http://localhost/serv';
	$soap->register('Add', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('res', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('mult', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('div', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');

	$soap->service(isset($HTTP_RAW_POST_DATA) ?$HTTP_RAW_POST_DATA : '');


//Operacions
//SUMA
function Add($a, $b){
	return $a + $b;
}
//RESTA
function res($a, $b){
	return $a - $b;
}
//MULTIPLICACIO
function mult($a, $b){
	return $a * $b;
}
//DIVISIO
function div($a, $b){
	return $a / $b;
}
?>

