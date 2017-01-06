<?php
class FormSignup {

  public function AffichForm() {
    if (!isset($_POST['cannot'])) {
      include ('./form/signup.php');
    } else {
      if (isset($_POST['createUser'])) {
        $nickname = ($_POST['userName']);
        $mail = ($_POST['mail']);
        $password = ($_POST['password']);
        $name = ($_POST['name']);
        $firstname = ($_POST['firstname']);
        $signup = new Users($nickname, $mail, $password, $name, $firstname);
        $signup -> checkMail();
      }
      include ('./form/login.php');
    }
  }
}
  ?>
