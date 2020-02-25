<?php
session_start();

include_once '../clases/agencias.php';
include_once '../clases/sesiones.php';

$objCredi = new Agencias();
$objCredi->validateSession();

if (isset($_REQUEST['ope'])) {

    $ope = $_REQUEST['ope'];

    switch ($ope) {
        case 0:
            $data = $objCredi->prestamoCodigo($_REQUEST['codigo']);
            break;

        default:
            # code...
            break;
    }
}
