<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 19/04/2017
 * Time: 06:10 PM
 */
error_reporting(0);
$datosFactura = explode("&", $_POST["qr"]);
$respuesta = array();
$respuesta['rfcEmisor'] = str_replace("?", "", str_replace("re=", "", $datosFactura[0]));
$respuesta['rfcReceptor'] = str_replace("rr=", "", $datosFactura[1]);
$respuesta['total'] = str_replace("tt=", "", $datosFactura[2]);
$respuesta['id'] = str_replace("id=", "", $datosFactura[3]);
$respuesta['fechaVerificacion'] = date("d-m-Y h:i:s");

try {
    $client = new SoapClient("https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsdl");
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

$param = array(
    'expresionImpresa' => $_POST["qr"]
);

$valores = json_decode(json_encode($client->Consulta($param)), true);
$respuesta['estatus'] = $valores["ConsultaResult"]["CodigoEstatus"];
$respuesta['estado'] = $valores["ConsultaResult"]["Estado"];

echo json_encode($respuesta);