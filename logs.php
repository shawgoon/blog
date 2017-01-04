<?php
$user = "root";
$mdp = "";
$host = "localhost";
$dbName = "blog";

try
{
  $instance = new PDO ("mysql:host=".$host.";dbname=".$dbName, $user, $mdp);
} catch (PDOException $e){
  'Erreur :'.$e -> getMessage();
  $error = new Error ();
  exit;
}
  class Error {
    private function error() {
      $error = fopen("error.txt", "a+");
      fwrite($error, $e -> getMessage());
      fclose($error);

    }
  }
?>
