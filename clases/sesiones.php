<?php
ini_set("session.cookie_lifetime", "14400");
ini_set("session.gc_maxlifetime", "14400");
session_start();
class Sesiones
{
    public function init($user = null, $nombreUser = null, $codigo = null)
    {
        $_SESSION['user'] = $user;
        $_SESSION['nombreUser'] = $nombreUser;
        $_SESSION['codigoUser'] = $codigo;
        $_SESSION['initSesion'] = date('d-m-Y H:i:s');
    }

    public function destroy()
    {
        session_destroy();
    }

    public function getSessionUser()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        } else {
            return 0;
        }
    }

    public function getSessionInit()
    {
        if ($_SESSION['init']) {
            return $_SESSION['user'];
        } else {
            return 0;
        }
    }

    public function setAgenciaSession($agencia = null)
    {
        if (!isset($_SESSION['agenciaSession'])) {
            $_SESSION['agenciaSession'] = $agencia;
        }
    }
}
