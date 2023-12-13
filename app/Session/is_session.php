<?php
namespace App\Session;

class is_session
{
    public static function start()
    {
        if(session_status() === PHP_SESSION_NONE)
        {
            return session_start();
        }
    }
}


?>