<?php
require ('./classes/Autoload.php');
spl_autoload_register('Autoload::classesAutoloader');

$article = new Articles('2017-01-05 15:13:25', 'bienvenu', 'ici gît l\'article');
var_dump($article);

$signupForm = new FormSignup();
$signupForm -> AffichForm();

?>
