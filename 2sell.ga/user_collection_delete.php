<?php session_start();  ?>
<?php
$users_account = $_SESSION["user"] ;
include_once ('part/db.php');

if ( isset($_POST["delete_id"]) )
   $delete_id = $_POST["delete_id"];
   echo "$delete_id";
   echo "$users_account";




               $sql = "DELETE FROM collection WHERE collection_account='$users_account'&& collection_product='$delete_id'";

               $result = mysqli_query($link, $sql);
header("Location:user_collection.php");
 ?>
