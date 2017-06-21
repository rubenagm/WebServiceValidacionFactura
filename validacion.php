<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 19/04/2017
 * Time: 06:10 PM
 */


try {
    $client = new SoapClient("https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsdl");
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

$cadena="re=MSE1701315J6&rr=AUSD780424L24&tt=15.00&id=3FD65BFB-8973-4B0C-9853-46DA8A4399A7";

$param = array(
    'expresionImpresa'=>$cadena
);

$valores = $client->Consulta($param);

print_r($valores);