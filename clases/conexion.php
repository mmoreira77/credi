<?php

class Conexion
{
    public function conexion()
    {
        $link = null;
        try {
            $link = new PDO('mysql:host=bkyxvadse0kzpi04d0jk-mysql.services.clever-cloud.com;dbname=bkyxvadse0kzpi04d0jk', 'ur57yo6bpmb8yxxa', 'A8wqmXXEI9XOSeKrQmyg');
            //echo "Exito en la conexion";
        } catch (PDOException $ex) {
            echo "Sucedio un problema al realizar la conexión !!. Consultar con el administrador del sistema";
            exit;
        }
        return $link;
    }

    public function conexionAgencias($agencia = null)
    {
        $link = null;
        $dbData = $this->changeDB($agencia);
        try {
            $link = new PDO('mysql:host=' . $dbData[0] . ';dbname=' . $dbData[1], $dbData[2], $dbData[3]);
            //echo "Exito en la conexion";
        } catch (PDOException $ex) {
            echo "Sucedio un problema al realizar la conexión !!. Consultar con el administrador del sistema";
            exit;
        }
        return $link;
    }

    public function conexionAPP()
    {
        $link = null;
        try {
            $link = new PDO('mysql:host=b9tkmnain9rbhsy6ccqf-mysql.services.clever-cloud.com;dbname=b9tkmnain9rbhsy6ccqf', 'u9jjschuzguy6vzx', 'dzNoKbaR5z97lAYrfqCk');
            //echo "Exito en la conexion";
        } catch (PDOException $ex) {
            echo "Sucedio un problema al realizar la conexión !!. Consultar con el administrador del sistema";
            exit;
        }
        return $link;
    }

    public function changeDB($agencia = null)
    {
        $db[0] = null; //server
        $db[1] = null; //nombre de db 
        $db[2] = null; //user
        $db[3] = null; //pass

        switch ($agencia) {
            case '01': //Santa Ana
                $db[0] = 'bvzf5v64rvhu14fuhpdc-mysql.services.clever-cloud.com';
                $db[1] = 'bvzf5v64rvhu14fuhpdc';
                $db[2] = 'uph5ppeoxkclfk0t';
                $db[3] = 'CM1F3Rf2CkXfJP5iKNDI';
                break;
            case '02': //Chalchuapa
                $db[0] = 'b7wgxyctffl10mddqjqm-mysql.services.clever-cloud.com';
                $db[1] = 'b7wgxyctffl10mddqjqm';
                $db[2] = 'utmovrnadrrfnqsi';
                $db[3] = 'rj1SBKoTaEFsrPmgtF2B';
                break;
            case '03': //Ahuachapan
                $db[0] = '';
                $db[1] = '';
                $db[2] = '';
                $db[3] = '';
                break;
            case '04': //Sonsonate
                $db[0] = 'blwspzaxoizvysdi8ola-mysql.services.clever-cloud.com';
                $db[1] = 'blwspzaxoizvysdi8ola';
                $db[2] = 'unizf0sx5ioo0ryk';
                $db[3] = 'fs9DzDBHN4JiJ49bYpee';
                break;
            case '07': //Chalatenango
                $db[0] = '';
                $db[1] = '';
                $db[2] = '';
                $db[3] = '';
                break;
            case '08': //Lourde Colon
                $db[0] = '';
                $db[1] = '';
                $db[2] = '';
                $db[3] = '';
                break;
        }

        return $db;
    }
}
