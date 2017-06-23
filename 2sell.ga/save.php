<?php
include_once ('part/db.php');
$id = $_POST['id'];
list($field, $user) = explode("-", $id);
$val=$_POST['value'];

$val = htmlspecialchars($val, ENT_QUOTES);
if($field=="note"){
	if(strlen($val)>100){
		echo "輸入資料超過100，請重新輸入";
		exit;
	}
}
$time=date("Y-m-d H:i:s");
if(empty($val)){
    echo "不能為空直";
}
else{
	$val =trim($val);
	$val = preg_replace('/s(?=s)/', '', $val);
	$sql = "UPDATE users SET $field = '$val'
	 WHERE users_id='$user'";
	$result = mysqli_query($link,$sql)or die ("無法更新".mysql_error());

	if($result){
	   echo $val;
	}else{
	   echo "數據錯誤";
		 echo "$user";
		 echo "$field";

	}
}
?>
