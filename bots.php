<?php
require("inc/bd.php");
$bots_active = 1;
session_start();
$sid = $_SESSION['hash'];
$allbots = "SELECT COUNT(*) FROM kot_bots";
$result_bots = mysql_query($allbots);
$row = mysql_fetch_array($result_bots);
if($row)
{	
$bots = $row['COUNT(*)'];
}
if($bots_active == 1) {
if($bots >= 1) {
$randbot = rand(1, $bots); // выбор бота

$select_info_bot = "SELECT * FROM kot_bots WHERE id = '$randbot'";
$result_select_bots = mysql_query($select_info_bot);
$row = mysql_fetch_array($result_select_bots);
if($row)
{
$active = $row['status'];
$logbot = $row['bot_login'];
$bot_min = $row['bot_min_bet'];
$bot_max = $row['bot_max_bet'];
}
if($active == 1) {
$rand_bot_bet = rand($bot_min, $bot_max); // ставка бота
$rand_bot_per = rand(1, 95); // шанс на выигрыш бота
$rand_bot_number = rand(0, 999999);
$rand_bot_sum = round(((100 / $rand_bot_per) * $rand_bot_bet), 2);
$rand_bot_type = array('min', 'max'); // м или б
$rand_bot_type_select = rand(0, 1);
if($rand_bot_type_select == 0) {
$rand_bot_win_num = $rand_bot_per * 10000;
if($rand_bot_number > $rand_bot_win_num) {
  $rand_bot_type_game = "lose"; // бот проиграл
  $rand_bot_sum = 0;
  $rand_bot_cel = "0 - $rand_bot_win_num";
  $bot = "INSERT INTO `kot_games` (`id`, `user_id`, `login`, `number`, `cel`, `sum`, `chance`, `type`, `win_summa`) VALUES (NULL, '1', '$logbot', '$rand_bot_number', '$rand_bot_cel', '$rand_bot_bet', '$rand_bot_per', '$rand_bot_type_game', '$rand_bot_sum');";
  mysql_query($bot);
  }
  if($rand_bot_number < $rand_bot_win_num) { // если бот выиграл
  $rand_bot_type_game = "win"; // бот выиграл
  $rand_bot_sum = round(((100 / $rand_bot_per) * $rand_bot_bet), 2);
  $rand_bot_cel = "0 - $rand_bot_win_num";
  $bot = "INSERT INTO `kot_games` (`id`, `user_id`, `login`, `number`, `cel`, `sum`, `chance`, `type`, `win_summa`) VALUES (NULL, '1', '$logbot', '$rand_bot_number', '$rand_bot_cel', '$rand_bot_bet', '$rand_bot_per', '$rand_bot_type_game', '$rand_bot_sum');";
  mysql_query($bot);
  }
}
 // если бот ставит на больше 
if($rand_bot_type_select == 1) {
$rand_bot_win_num = 1000000 - ($rand_bot_per * 10000);
if($rand_bot_number < $rand_bot_win_num) {
  $rand_bot_type_game = "lose"; // бот проиграл
  $rand_bot_sum = 0;
  $rand_bot_cel = "$rand_bot_win_num - 999999";
  $bot = "INSERT INTO `kot_games` (`id`, `user_id`, `login`, `number`, `cel`, `sum`, `chance`, `type`, `win_summa`) VALUES (NULL, '1', '$logbot', '$rand_bot_number', '$rand_bot_cel', '$rand_bot_bet', '$rand_bot_per', '$rand_bot_type_game', '$rand_bot_sum');";
  mysql_query($bot);
  }
  if($rand_bot_number > $rand_bot_win_num) { // бот выиграл
  $rand_bot_type_game = "win"; // бот выиграл
  $rand_bot_sum = round(((100 / $rand_bot_per) * $rand_bot_bet), 2);
  $rand_bot_cel = "$rand_bot_win_num - 999999";
  $bot = "INSERT INTO `kot_games` (`id`, `user_id`, `login`, `number`, `cel`, `sum`, `chance`, `type`, `win_summa`) VALUES (NULL, '1', '$logbot', '$rand_bot_number', '$rand_bot_cel', '$rand_bot_bet', '$rand_bot_per', '$rand_bot_type_game', '$rand_bot_sum');";
  mysql_query($bot);
  }
}
}
}
}
?>