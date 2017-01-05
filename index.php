<?php
require ('./classes/Autoload.php');
spl_autoload_register('Autoload::classesAutoloader');

try {
throw new Exception("Error Processing Request");

} catch (Exception $e) {
  Log::writeCSV($e);
}
var_dump($e);
$user = new Users();
var_dump($user);
$article = new Articles('2017-01-05 15:13:25', 'bienvenu', 'ici gît l\'article');
var_dump($article);

include ('./form/signup.php');
?>
