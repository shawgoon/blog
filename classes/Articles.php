<?php
class Articles {
  public $id = '';
  public $date = '';
  public $title = '';
  public $content = '';

  public function __construct($date, $title, $content) {
    $this -> date = $date;
    $this -> title = $title;
    $this -> content = $content;
  }

  // méthode de connection à la BDD
  private function mypdo() {
    $user = "root";
    $mdp = "";
    $host = "localhost";
    $dbName = "blog";
    try {
      $instance = new PDO ("mysql:host=".$host.";dbname=".$dbName, $user, $mdp);
    } catch (PDOException $log) {
     $log = new Log ();
    }
    return $instance;
  }

  // méthode de poste d'un article
  public function post() {
    $this -> mypdo();
    $sql = "INSERT INTO articles (day, title, content) VALUES (?, ?, ?)";
    $createSuccess = $instance->prepare($sql);
    $createSuccess -> execute(array($date, $title, $content));
  }

  // méthode de post d'un message
  // public function chat() {
  //   $this -> mypdo();
  //
  // }
}
 ?>
