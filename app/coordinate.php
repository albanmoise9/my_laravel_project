<?php
namespace App;

class coordinate 
{
    public static function password(string $p1, string $p2)
    {
        $pword = preg_match("/^[a-zA-Z0-9 .]+$/", $p1);
        if($p1 === $p2 && $pword == 0 && strlen($p1) == 8)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function email ($e)
    {
        $valid = preg_match("/^[a-z0-9 .^'£$%^&*()}{@:'#~?><>,;@|\-=-_+-¬`]+$/", $e);
            $number = preg_match("/^[0-9 .+-]+$/", $e);
        if($valid == 1 && filter_var($e, FILTER_VALIDATE_EMAIL))
        {
            return 'e';
        }
        elseif($number == 1)
        {
            return 'n';
        }
    }
}


?>