<?php


include_once ('part/db.php');

if ( isset($_POST["delete_id"]) )
   $delete_id = $_POST["delete_id"];
   echo "$delete_id";



   $sql = "SELECT * FROM product where product_id='$delete_id' ";
   $query = mysqli_query($link, $sql);
   $row = mysqli_fetch_row($query);



echo "$row[4]";
            unlink($row[4]);


            $sql = "DELETE FROM product WHERE product_id = '$delete_id'";

            $result = mysqli_query($link, $sql);

            header("Location:product-edit-admin.php");
 ?>
