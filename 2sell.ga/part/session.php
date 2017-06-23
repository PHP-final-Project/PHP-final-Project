<?php
session_start();

if ( $_SESSION["login_session"] != true )
   header("Location: login.php");

?>
