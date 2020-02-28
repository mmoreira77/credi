<?php
session_start();
include_once 'clases/sesiones.php';
$objSession = new Sesiones();
if (isset($_REQUEST['user']) && isset($_REQUEST['pass'])) {
    include_once 'clases/credimaster.php';
    $objMaster = new Credimaster();

    $login = $objMaster->login($_REQUEST['user'], $_REQUEST['pass']);
    if (count($login) > 0) {
        $objSession->init($_REQUEST['user'], $login[0]['usuario'], $login[0]['CODIGO']);
        header('Location: home.php');
    } else {
        header('Location: index.html');
    }
} else {
    $objSession->destroy();
    header('Location: index.html');
}

