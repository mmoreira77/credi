<?php
session_start();
include_once 'conexion.php';
include_once 'sesiones.php';

class Credimaster extends Conexion
{

    public function login($user = null, $pass = null)
    {
        $sql = "SELECT CODIGO, usuario, TIPO, perfil, usuario FROM usuarios WHERE ucorrugado = :user AND pcorrugado = :pass AND TIPO = 1";
        $conx = $this->conexion();
        $stm = $conx->prepare($sql);
        $user = $this->cript($user);
        $pass = $this->cript($pass);
        $stm->bindParam(':user', $user);
        $stm->bindParam(':pass', $pass);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function userAll()
    {
        $sql = "SELECT CODIGO, usuario, TIPO, perfil FROM usuarios";
        $conx = $this->conexion();
        $stm = $conx->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agenciaNombreGet($cod = null)
    {
        $sql = "SELECT CODIGO, NOMBRE FROM agencia WHERE CODIGO = :cod";
        $conx = $this->conexion();
        $stm = $conx->prepare($sql);
        $stm->bindParam(':cod', $cod);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////                     UTILIDADES    ////////////////////////////////////////////////////////////
    public function cript($pass = null)
    {
        return sha1($pass);
    }

    public function validateSession()
    {
        $objSession = new Sesiones();
        if ($objSession->getSessionUser() == '0') {
            header("Location: http://201.247.105.75/components/com_dat/");
        };
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////              FIN     UTILIDADES    ////////////////////////////////////////////////////////////
}
