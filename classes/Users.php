<?php
class Users {
  protected $id = '';
  protected $nickname = '';
  protected $mail = '';
  private $password = '';
  private $name = '';
  private $firstname = '';
  private $grad;

  public function __construct($nickname, $mail, $password, $name, $firstname, $grad = 0) {
    $this -> nickname = $nickname;
    $this -> mail = $mail;
    $this -> password = $password;
    $this -> name = $name;
    $this -> firstname = $firstname;
    $this -> grad = $grad;
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

// méthode d'inscription
  public function signup() {
    $instance = $this -> mypdo();
      $sql = "INSERT INTO users (nickname, email, password, name, firstname, grad) VALUES (?, ?, SHA1(?), ?, ?, ?)";
        $createSuccess = $instance->prepare($sql);
        $createSuccess -> execute(array(
        $this -> nickname,
        $this -> mail,
        $this -> password,
        $this -> name,
        $this -> firstname,
        $this -> grad
        ));
  }

  // méthode de vérification de mail
  public function checkMail() {
    $instance = $this -> mypdo();
    $sql = "SELECT * FROM users WHERE email= ?";
    $result = $instance -> prepare($sql);
    $result -> execute (array($_POST['mail']));
    $data = $result -> fetch ();
    if ($data != false) {
      echo 'Vous êtes déjà inscrit avec ce mail';
    } else {
      $this -> signup();
    }

  }

// méthode de connection au site
  public function login() {
    $instance = $this -> mypdo();

      $sql = "SELECT *
      FROM users
      WHERE nickname = '".$_POST['nickname']."'AND password = '".$_POST['password']."'";
      $user = $instance->query($sql)->fetch();
  }

// méthode de déconnection du site
  public function logout() {
    unset($_SESSION['user']);
  }
}

 ?>
