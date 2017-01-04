<?php
require ('./classes/autoload.php');
spl_autoload_register('Autoload::classesAutoloader');
require ('./classes/log.php');

try
{
throw new Exception("Error Processing Request");

} catch (Exception $e){
  Log::writeCSV($e);
}
var_dump($e);

?>
