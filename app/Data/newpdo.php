<?php
namespace App\Data;

use PDO;

class newpdo
{
    public static function ini()
    {
        $user = 'root';
        $password = '';
        $dsn = 'mysql:dbname=mydb;host=127.0.0.1';
        $option = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        
        $pdo = new PDO($dsn, $user, $password, $option);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}


?>