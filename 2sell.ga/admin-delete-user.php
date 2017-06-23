<?php
 include_once ('part/db.php');
$users_delete = $_POST["delete-user"];

echo "$users_delete";



$sql ="DELETE FROM users WHERE users_account = '$users_delete'";

mysqli_query($link, $sql);

header("Location:admin-date.php");



  ?>
