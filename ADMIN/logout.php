<?php
  session_start(); //inicia la session

  session_unset(); //libera todas las variables de sesión actualmente registradas

  session_destroy(); //destruye la sessión

  header('Location: ./index.php'); //lo envía a index.php
?>