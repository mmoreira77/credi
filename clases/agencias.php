<?php
session_start();
include_once 'credimaster.php';
class Agencias extends Credimaster
{
    public function prestamoCodigo($codigo = null)
    {
        $sql = "SELECT CODIGOPRE, APERTURA, VENCIMENTO, MONTO, SALDO, TOTPAGO, VALPAGADO, VALDEBPAG, DIFVALORA, CUOTA, NCUOTMORA, VALORPMOR, PDIAHOY, PTOTALHOY, TIPCUOTA, NCUOTA, PLAZMESES, MODIFICADO, DIASMOROSO, MANEJO, SEGURO, ESREVERTIDO, ESVENCIDO, ESCANCELADO, ASESOR FROM prestamos WHERE CODIGOPRE = :codigo";
        $conx = $this->conexionAgencias($_SESSION['agenciaSession']);
        $stm = $conx->prepare($sql);        
        $stm->bindParam(':codigo', $codigo);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function datosCliente($codigo = null)
    {   
        $codigo = substr($codigo, 0,7);
        $sql = "SELECT CODIGO, APELLIDO, NOMBRE ,DUI, NIT, MODIFICADO, CREDITO FROM socioacti WHERE CODIGO = :codigo ";
        $conx = $this->conexionAgencias($_SESSION['agenciaSession']);
        $stm = $conx->prepare($sql);        
        $stm->bindParam(':codigo', $codigo);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agenciaGet($codigo = null)
    {
        $codigo = substr($codigo,5,2);
        $sql = "SELECT CODIGO, NOMBRE FROM agencia WHERE CODIGO = :codigo";
        $conx = $this->conexion($_SESSION['agenciaSession']);
        $stm = $conx->prepare($sql);        
        $stm->bindParam(':codigo', $codigo);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fusionPrestamoCliente($codigo = null)
    {
        $data[] = $this->prestamoCodigo($codigo);
        $data[] = $this->datosCliente($codigo);
        $data[] = $this->agenciaGet($codigo);
        return $data;
    }

    public function buscarCodigo($codigo = null)
    {
        $sql = "SELECT CODIGOPRE FROM prestamos WHERE CODIGOPRE LIKE :codigo";
        $conx = $this->conexionAgencias($_SESSION['agenciaSession']);
        $stm = $conx->prepare($sql);        
        $codigo = $codigo . '%';
        $stm->bindParam(':codigo', $codigo);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarNombre($string = null)
    {
        $sql = "SELECT CODIGO, APELLIDO, NOMBRE FROM socioacti WHERE APELLIDO LIKE :apellido OR NOMBRE LIKE :nombre ";
        $conx = $this->conexionAgencias($_SESSION['agenciaSession']);
        $stm = $conx->prepare($sql);        
        $apellido = '%' . $string . '%';
        $nombre = '%' . $string . '%';
        $stm->bindParam(':apellido', $apellido);
        $stm->bindParam(':nombre', $nombre);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
