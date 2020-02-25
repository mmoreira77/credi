<?php
include_once './credimaster.php';
class Agencias extends Credimaster
{
    public function prestamoCodigo($codigo = null)
    {
        $sql = "SELECT CODIGOPRE, APERTURA, VENCIMENTO, MONTO, SALDO, TOTPAGO, VALPAGADO, VALDEBPAG, DIFVALORA, CUOTA, NCUOTMORA, VALORPMOR, PDIAHOY, PTOTALHOY, TIPCUOTA, NCUOTA, PLAZMESES, MODIFICADO, DIASMOROSO, MANEJO, SEGURO, ESREVERTIDO, ESVENCIDO, ESCANCELADO, ASESOR FROM `prestamos` WHERE `CODIGOPRE` LIKE :codigo";
        $conx = $this->conexionAgencias();
        $stm = $conx->prepare($sql);
        $codigo = $codigo . '%';
        $stm->bindParam(':codigo', $codigo);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
