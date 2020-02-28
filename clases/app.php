<?php
session_start();
include_once 'agencias.php';

class App extends Agencias
{
    public function userAgenciaConsulta()
    {
        $sql = "SELECT COUNT(usuario) total FROM user_agencia WHERE usuario = :userCodigo";
        $conx = $this->conexionAPP();
        $stm = $conx->prepare($sql);
        $userCodigo = $_SESSION['codigoUser'];
        $stm->bindParam(':userCodigo', $userCodigo);
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['total'];
    }

    public function setUserAgencia($agencia = null)
    {
        $sql = "INSERT INTO user_agencia (usuario, agencia, creado, modificado) VALUES (:user, :agencia, NOW(), NOW())";
        $conx = $this->conexionAPP();
        $stm = $conx->prepare($sql);
        $user = $_SESSION['codigoUser'];
        $stm->bindParam(':user', $user);
        $stm->bindParam(':agencia', $agencia);
        $stm->execute();
    }

    public function usuarioAgenciaGet()
    {
        $sql = "SELECT id, usuario, agencia FROM user_agencia WHERE usuario = :userCodigo";
        $conx = $this->conexionAPP();
        $stm = $conx->prepare($sql);
        $userCodigo = $_SESSION['codigoUser'];
        $stm->bindParam(':userCodigo', $userCodigo);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);        
    }
}
