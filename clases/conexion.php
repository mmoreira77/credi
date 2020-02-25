<?php

class Conexion
{
    public function conexion()
    {
        $link = null;
        try {
            $link = new PDO('mysql:host=sql9.freemysqlhosting.net;dbname=sql9323919', 'sql9323919', 'iszmJjDxvS');
            //echo "Exito en la conexion";
        } catch (PDOException $ex) {
            echo "Sucedio un problema al realizar la conexión !!. Consultar con el administrador del sistema";
            exit;
        }
        return $link;
    }

    public function conexionAgencias()
    {
        $link = null;
        try {
            $link = new PDO('mysql:host=sql9.freemysqlhosting.net;dbname=sql10324626', 'sql10324626', 'rDeYryhtGk');
            //echo "Exito en la conexion";
        } catch (PDOException $ex) {
            echo "Sucedio un problema al realizar la conexión !!. Consultar con el administrador del sistema";
            exit;
        }
        return $link;
    }
}
