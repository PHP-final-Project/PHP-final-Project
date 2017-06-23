<?php include_once ('part/session.php');?>

<?php include_once ('part/db.php');?>

<?php
$users_account ;
$users_account = $_SESSION["search_user"] ;

$sql = "DELETE FROM users WHERE users_account = '$users_account'";

$result = mysqli_query($link, $sql);

header("Location:admin-date.php");

 ?>
