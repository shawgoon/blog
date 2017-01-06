<?php
class Autoload {
  private static $classesDirectory ='./classes/';
  public static function classesAutoloader($classes) {
    $path = static::$classesDirectory."$classes.php";
    if (file_exists($path) && is_readable($path)) require $path;
  }
}

?>
