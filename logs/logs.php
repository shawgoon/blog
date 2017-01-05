<?php
$user = "root";
$mdp = "";
$host = "localhost";
$dbName = "non";

try
{
  $instance = new PDO ("mysql:host=".$host.";dbname=".$dbName, $user, $mdp);
} catch (PDOException $e){
  'Erreur :'.$e -> getMessage();
  $error = new Error ();
  $error -> error($e);
  exit;
}
  class Error {
    private function error($e) {
      $error = fopen("error.txt", "a+");
      fwrite($error, $e -> getMessage());
      fclose($error);

    }
  }
?>
