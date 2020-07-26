<?php
require("inc/bd.php");

$sql_select = "SELECT * FROM kot_user";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
do
{
	$time = time();
	if($time > $row['online_time'])
	{
$update_sql1 = "Update kot_user set online='0' WHERE id=".$row['id'];
mysql_query($update_sql1) or die("" . mysql_error());
	}
}
while($row = mysql_fetch_array($result));
?>