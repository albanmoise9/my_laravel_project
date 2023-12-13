<?php 

namespace App\header;

class header
{
  
public static function active($link, $item, $a_class)
{
    $class = 'nav-item';
    if($_SERVER['SCRIPT_NAME'] === $link){
        $class .= ' active';
    }
    return '<li class= "' . $class . '">
    <a class="' . $a_class . '" aria-current="page" href="' . $link . '">' . $item . '</a>
  </li>';
}

public static function signout($link, $item, $a_class)
{
    $class = 'nav-item';
    if(!empty($_GET['action']) && $_GET['action'] === 'signout'){
      unset($_SESSION['connected']);
      header('location: /index.php');
    }
    return '<li class= "' . $class . '">
    <a class="' . $a_class . '" aria-current="page" href="' . $link . '">' . $item . '</a>
  </li>';
}

}

?>