<?php session_start();  ?>
<?php include_once ('part/db.php');?>
<?php

$product_id = $_GET['product_id'] ;
$user=$_SESSION["user"];

if ($user!=null) {


  $sql = "SELECT * FROM collection where collection_product = '$product_id'&& collection_account = '$user'";
  $result = mysqli_query($link, $sql);
  $row = @mysqli_fetch_row($result);
  if ( $row[0]==null)
   {
     $sql ="INSERT INTO collection (collection_product,collection_account)
     VALUES ( '$product_id','$user')";  //新增資料
     mysqli_query($link, $sql);
   }
  else {
    $sql = "DELETE FROM collection where collection_product = '$product_id'&& collection_account = '$user'";

    $result = mysqli_query($link, $sql);
  }
}

  header("Location:single.php?product_id=$product_id");
 ?>
