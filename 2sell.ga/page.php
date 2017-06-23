<?
// 連接mysql
mysql_pconnect("localhost","root","z59815981");
mysql_query("SET NAMES 'utf8'");
mysql_select_db("2sell");
$sql="SELECT * FROM users;";
$result = mysql_query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<!-- by iZO.tw 載入jquery & jeditable.js & jeditable.php -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/jeditable.js"></script>
<script type="text/javascript">
$(document).ready(function() {
     $('.jedit').editable('jeditable.php', {
         type      : 'textarea',
         cancel    : '取消',
         submit    : '修改',
         indicator : '正在儲存中',
         tooltip   : '點擊修改'
     });
});
</script>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<title>iZO jeditable 教學</title>
</head>
<body>

<table cellpadding="20" border="1" align="center">
<tr><td>NO</td><td>代號</td><td>標題</td><td>人氣</td></tr>
<?
while($row=mysql_fetch_array($result)) {
 echo"<tr><td>".$row[no]."</td>
 <td class='jedit' id='class_".$row[no]."'>".$row['class']."</td>
 <td class='jedit' id='title_".$row[no]."' Width='150'>".$row[title]."</td>
 <td class='jedit' id='cou_".$row[no]."'>".$row[cou]."</td></tr>";
}
}
?>
</table>
</body>
</html>
