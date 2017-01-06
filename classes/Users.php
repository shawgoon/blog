<?php
class Users {
  protected $id = '';
  protected $nickname = '';
  protected $mail = '';
  private $password = '';
  private $name = '';
  private $firstname = '';
  private $grad = '0';

  public function __construct($nickname, $mail, $password, $name, $firstname) {
    $this -> nickname = $nickname;
    $this -> mail = $mail;
    $this -> password = $password;
    $this -> name = $name;
    $this -> firstname = $firstname;
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
    $this -> mypdo();
    // if (isset($_POST['createUser'])) {
    //   $nickname = ($_POST['userName']);
    //   $email = ($_POST['email']);
    //   $password = ($_POST['password']);
    //   $name = ($_POST['name']);
    //   $firstname = ($_POST['firstname']);

      $sql = "INSERT INTO users (nickname, email, SHA1(password), name, firstname) VALUES (?, ?, ?, ?, ?)";
      $createSuccess = $instance->prepare($sql);
      $createSuccess -> execute(array($nickname, $email, $password, $name, $firstname));
    // }
  }

// méthode de connection au site
  public function login() {
    $this -> mypdo();
    $connected = false;
    if (isset($_POST['nickname']) && isset($_POST['password'])) {

      $sql = "SELECT *
      FROM users
      WHERE nickname = '".$_POST['nickname']."'AND password = '".$_POST['password']."'";
      $user = $instance->query($sql)->fetch();

      if ($user) {
        $_SESSION['user'] = array(
          "userName" => $user['nickname'],
          "userId" => $user['id'],
          "grad" => $user['grad']
        );
        $connected = true;
      }
    }
  }

// méthode de déconnection du site
  public function logout() {
    unset($_SESSION['user']);
  }
}

 ?>
