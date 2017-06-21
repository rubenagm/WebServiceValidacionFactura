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

$cadena='re=' . $_POST["rfcEmisor"] . '&rr=' . $_POST["rfcReceptor"] . '&tt=' . $_POST["total"] . '&id=' . $_POST["id"] . '';

$param = array(
    'expresionImpresa'=>$cadena
);

$valores = $client->Consulta($param);

echo json_encode($valores);