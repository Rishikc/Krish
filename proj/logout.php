<?php
  session_start();
  if (isset($_SESSION['username'])) {
    $_SESSION = array();

    session_destroy();
  }
echo 'you have succesfully logged out :)' . '<br>';
header('Location:/securimage/home.html');
exit();
?>
