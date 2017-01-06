<form class="" action="index.php" method="post">
  <label for="">Pseudo</label><br>
  <input required="required" type="text" name="nickname" value=""><br>
  <label for="">Mot de passe</label><br>
  <input required="required" type="password" name="password" value=""><br>
  <input type="hidden" name="">
  <input type="submit" name="" value="Connexion">
</form>


<?php
$connected = false;
if (isset($_POST['nickname']) && isset($_POST['password'])) {

  $login = new Users();
  $login -> login();

  if ($user) {
    $_SESSION['user'] = array(
      "userName" => $user['nickname'],
      "userId" => $user['id'],
      "grad" => $user['grad']
    );
    $connected = true;
  }
}
 ?>
