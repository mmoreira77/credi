<?php
session_start();

include_once '../clases/agencias.php';
include_once '../clases/sesiones.php';
include_once '../helpers/helperagencia.php';

$objCredi = new Agencias();
$objHelper = new HelperAgencia();
$objCredi->validateSession();

if (isset($_REQUEST['ope'])) {

    $ope = $_REQUEST['ope'];

    switch ($ope) {
        case 0:
            echo $objHelper->sortDataPrestamoCliente($objCredi->fusionPrestamoCliente($_REQUEST['data']));
            // echo '<pre>';
            // print_r($objCredi->fusionPrestamoCliente($_REQUEST['data']));
            // echo '</pre>';
            break;
        case 1:            
            echo $objHelper->sortSugerencias($objCredi->buscarCodigo($_REQUEST['cod']));
            // echo '<pre>';
            // print_r($objCredi->buscarCodigo($_REQUEST['cod']));
            // echo '</pre>';
            break;
        case 2:            
            echo $objHelper->sortClienteNombre($objCredi->buscarNombre($_REQUEST['cod']));
            // echo '<pre>';
            // print_r($objCredi->buscarCodigo($_REQUEST['cod']));
            // echo '</pre>';
            break;

        default:
            # code...
            break;
    }
}
