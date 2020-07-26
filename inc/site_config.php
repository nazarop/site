<?php
require("bd.php");
$sql_select1 = "SELECT * FROM kot_config";
$result1 = mysql_query($sql_select1);
$row = mysql_fetch_array($result1);
if($row)
{
$sitename = $row['sitename']; ; // название сайта
$sitedomen = $row['sitedomen'];
$group = $row['sitegroup']; // группа сайта
$site_support = $row['sitesupport'];
$linksite = $_SERVER['HTTP_HOST']; // ссылка на сайт
$sitekey = $row['sitekey']; // ключ сайта для каптчи
$mail = $row['sitemail']; // почта сайта
$min_bonus_s = $row['min_bonus_size']; // минимальная сумма бонуса в раздаче (в руб)
$max_bonus_s = $row['max_bonus_size']; // максимальная сумма бонуса в раздаче (в руб)
$min_withdraw_sum = $row['min_withdraw_sum']; // минимальная сумма вывода
$bonus_reg = $row['bonus_reg'];
$fk_id = $row['fk_id'];
$fk_secret_1 = $row['fk_secret_1'];
$fk_secret_2 = $row['fk_secret_2'];
$dep_withdraw = $row['dep_withdraw'];
$min_bet = $row['min_bet'];
$max_bet = $row['max_bet'];
$min_per = $row['min_per'];
$max_per = $row['max_per'];
$fake_online = $row['fake_online'];
$fake_interval = $row['fake_interval'];
$min_sum_dep = $row['min_sum_dep'];
$idvk = $row['id_vk'];
$tokenvk = $row['token_vk'];
}
?>