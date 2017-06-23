
<?php
// 建立MySQL的資料庫連接

$link = mysqli_connect("localhost","root",
                       "z59815981","2sell-ga")
     or die("無法開啟MySQL資料庫連接!<br/>");


mysqli_query($link, 'SET NAMES utf8');
?>
