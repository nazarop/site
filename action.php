<?php
  session_start();
$sid = $_SESSION['hash'];
require("inc/site_config.php");
require("inc/config.php");
require("inc/bd.php");
$pass = $_POST['pass'];
$login = $_POST['login'];
$type = $_POST['type'];
$email = $_POST['email'];
$error = 0;
$fa = "";
if($type == "crashStart") {
  $betsize = round($_POST['betsize'], 2);
  $autotake = round($_POST['autotake'], 2);
   $sql_select = "SELECT * FROM engmn_user WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
  $crashstarted = $row['crashstarted'];
$balance = $row['balance'];
$fart = $row['win'];
$sliv = $row['sliv'];
$adminn = $row['admin'];
}

 if(!is_numeric($betsize)) {
   $error = 3;
   $mess = "Ошибка!";
   $fa = "fatal";
  }
  if($betsize < 1) {
   $error = 4;
   $mess = "Ставки от 1";
   $fa = "fatal";
  }
  if($betsize > $max_bet) {
   $error = 5;
   $mess = "Макс ставка - $max_bet";
   $fa = "fatal";
  }

  if (!preg_match("#^[.0-9]+$#",$betsize)) {
   $error = 8;
   $mess = "Недопустимые символы!";
   $fa = "fatal";
  }

  if(!$_SESSION['hash']) {
   $error = 9;
   $mess = "Авторизуйтесь";
   $fa = "fatal";
  }
  if ( $betsize > $balance ){

$error = 1;
$mess = "Недостаточно средств!";
$fa = "error";

}
if ( $crashstarted == 1 ){

$error = 2;
$mess = "У вас уже начата игра!";
$fa = "error";

}
if ( $error == 0 ){

if ( $fart == 1){

$bigCrash = rand(2, 5);
$smallCrash = rand(0, 99);

}elseif ( $sliv == 1){

$bigCrash = rand(1, 2);
$smallCrash = rand(0, 50);

}else{
  $randx = rand(0, 10);
  if ( $randx == 9 ){
  $bigCrash = rand(1, 10);
  $smallCrash = rand(0, 99);
}
if ( $randx == 10 ){

$bigCrash = 1;
$smallCrash = 0;

}
if ( $randx > 1 and $randx < 9 ){

$bigCrash = rand(1, 3);
  $smallCrash = rand(0, 99);

}
  if ( $randx <= 1 ){
  $bigCrash = rand(1, 1);
  $smallCrash = rand(0, 60);
}

}

  if ( $smallCrash < 10 ){

      $smallCrash = "0" . $smallCrash;

  }

  $newbalance = round($balance - $betsize, 2);
   $update_sql2 = "UPDATE engmn_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql2);
     $update_sql3 = "UPDATE engmn_user SET crashstarted = '1' WHERE hash = '$sid'";
    mysql_query($update_sql3);
         $update_sql4 = "UPDATE engmn_user SET crashbet = '$betsize' WHERE hash = '$sid'";
    mysql_query($update_sql4);
 $error = 0;
 $mess = "";
  $fa = "success";
  $mdbigcrash = md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5($bigCrash)))))))))))))))));
  $mdsmallcrash = md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5($smallCrash)))))))))))))))));

}
  $result = array(
  'success' => "$fa",
  'error' => "$mess",
  'bigcrash' => "$mdbigcrash",
  'smallcrash' => "$mdsmallcrash",
  'newbalance' => "$newbalance"
    );
}

if($type == "crashTake") {
  $bigx = $_POST['bigx'];
  $smallx = $_POST['smallx'];

   $sql_select = "SELECT * FROM engmn_user WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
  $crashstarted = $row['crashstarted'];
  $crashbet = $row['crashbet'];
$balance = $row['balance'];

}

if ( $crashstarted == 0 & $crashbet == 0 ){

$error = 2;
$mess = "У вас нет активной игры!";
$fa = "error";

}
if ( $error == 0 ){
    $profitbet = $bigx . '.' . $smallx;
    $profitbet = round($crashbet * $profitbet, 2);
  $newbalance = round($balance + $profitbet, 2);
   $update_sql2 = "UPDATE engmn_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql2);
     $update_sql3 = "UPDATE engmn_user SET crashstarted = '0' WHERE hash = '$sid'";
    mysql_query($update_sql3);
     $update_sql4 = "UPDATE engmn_user SET crashbet = '0' WHERE hash = '$sid'";
    mysql_query($update_sql4);
 $error = 0;
 $mess = "";
  $fa = "success";
}
  $result = array(
  'success' => "$fa",
  'error' => "$mess",
  'newbalance' => "$newbalance",
  'profit' => "$profitbet"
    );
}
if ( $type == "crashStop" ){

  $update_sql3 = "UPDATE engmn_user SET crashstarted = '0' WHERE hash = '$sid'";
    mysql_query($update_sql3);
         $update_sql4 = "UPDATE engmn_user SET crashbet = '0' WHERE hash = '$sid'";
    mysql_query($update_sql4);

}
if($type == "wheel") {
    $sql_select = "SELECT * FROM kot_user WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
}
    $size = $_POST['size'];
    $colorWheel = $_POST['color'];
    if($size > $balance) {
        $error = 1;
        $mess = "Недостаточно средств";
        $fa = "fatal";
    }
    if($size < 1) {
    $error = 2;
    $messs = "Сумма ставки от 1";
    $fa = "fatal";
}
    if(!is_numeric($size)) {
        $error = 2;
        $mess = "Введите сумму корректно";
        $fa = "fatal";
    }
    if(!$_SESSION['hash']) {
        $error = 3;
        $mess = "Авторизуйтесь";
        $fa = "fatal";
    }
    if($error == 0) {
        $arrayWheel = [5,2,3,2,3,2,3,2,5,2,5,2,3,2,3,2,3,2,5,2,5,2,3,2,3,2,3,2,3,2,3,2,5,2,5,2,3,2,3,2,3,2,5,2,5,2,3,2,3,2,3,2,5,50];
    $randWheel =  mt_rand(0,53); //цвет который выпадет
    $valuesWheel = $arrayWheel[$randWheel];    
    // получаем цвет
     if ($arrayWheel[$randWheel] == 2) {
    $key2Wheel = [
       1,  3,  5,  7,  9, 11, 13, 15,
      17, 19, 21, 23, 25, 27, 29, 31,
      33, 35, 37, 39, 41, 43, 45, 47,
      49, 51
    ];
    $random = mt_rand(0,25);
    $key = $key2Wheel[$random];
  }
  if ($arrayWheel[$randWheel] == 3) {
    $key3Wheel = [
      2,4,6,
      12,14,16,
      22,24,26,
      28,30,36,
      38,40,46,
      48,50
    ];
    $random = mt_rand(0,16);
    $key = $key3Wheel[$random];
  }
  if ($arrayWheel[$randWheel] == 5) {
    $key5Wheel = [
      0,8,10,18,20,32,34,42,44,52
    ];
    $random = mt_rand(0,9);
    $key = $key5Wheel[$random];
  }
  if ($valuesWheel == 50) {
    $key5Wheel = [
      53
    ];
    $key = 53;
  }
 
  if($colorWheel == $valuesWheel){ // вы выиграли
  $newbalance = $balance + ($size * $colorWheel) - $size;
  $win = $size * $colorWheel;
  $query = mysql_query("UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'");
  $mess = "Вы выиграли <b>$win</b>";
  $type = "success";
  }
  if($colorWheel != $valuesWheel){
  $newbalance = $balance - $size;
  $query = mysql_query("UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'");
  $mess = "Вы проиграли";
  $type = "error";
  }
  $fa = "success";
    }
    
    $result = array(
'valuesWheel' => "$valuesWheel",
'key' => "$key",
'success' => "$fa",
'error' => "$messs",
'balance' => "$balance",
'new' => "$newbalance",
'mess' => "$mess",
'type' => "$type"
    );
}
if($type == "coinflip") {
    $sum = $_POST['size'];
    $lay = $_POST['lay'];
$sql_select = "SELECT * FROM kot_user WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
}
if($sum > $balance) {
    $error = 1;
    $messs = "Недостаточно средств";
    $fa = "fatal";
}
if($sum < 1) {
    $error = 2;
    $messs = "Сумма ставки от 1";
    $fa = "fatal";
}
if(!is_numeric($sum)) {
    $error = 3;
    $messs = "Введите сумму корректно";
    $fa = "fatal";
}
if(!$_SESSION['hash']) {
    $error = 4;
    $messs = "Авторизуйтесь!";
    $fa = "fatal";
}
    if($error == 0) {
    $rnd = rand(0,21);
    if($rnd <= 10) {
        $rand = 1;
    }
    if($rnd > 10 && $rand < 21) {
        $rand = 2;
    }
    if($rnd == 21) {
        $rand = 30;
    }
    if($lay == 1) {
        if($rnd <= 10) {
            $newbalance = $balance + ($sum * 2) - $sum;
            $fsum = $sum * 2;
            $update_sql2 = mysql_query("UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'");
            $mess = "Выпал 'Орёл', вы выиграли $fsum";
             $fa = "success";
        }else{
            $newbalance = $balance - $sum;
            $update_sql2 = mysql_query("UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'");
            $mess = "Вы проиграли";
             $fa = "error";
        }
    }
   // сторона 2
   if($lay == 2) {
        if($rnd > 10 && $rnd < 21) {
            $newbalance = $balance + ($sum * 2) - $sum;
            $fsum = $sum * 2;
            $update_sql2 = mysql_query("UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'");
            $mess = "Выпала 'Решка', вы выиграли $fsum";
             $fa = "success";
        }else{
            $newbalance = $balance - $sum;
            $update_sql2 = mysql_query("UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'");
            $mess = "Вы проиграли";
             $fa = "error";
        }
    }
    // сторона 3
    if($lay == 30) {
        if($rnd == 21) {
            $newbalance = $balance + ($sum * 10) - $sum;
            $fsum = $sum * 10;
            $update_sql2 = mysql_query("UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'");
            $mess = "Выпал 'Орёл', вы выиграли $fsum";
             $fa = "success";
        }else{
            $newbalance = $balance - $sum;
            $update_sql2 = mysql_query("UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'");
            $mess = "Вы проиграли";
             $fa = "error";
        }
    }
    }
     $result = array(
'success' => "$fa",
'error' => "$messs",
'flipResult' => "$rand",
'balance' => "$balance",
'new_balance' => "$newbalance",
'message' => "$mess"
    );
}
if($type == "dice") {
    $sql_select = "SELECT * FROM kot_user WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
}
    $cel = $_POST['celwin'];
    $rand = rand(100,10000) / 100;
    $sum = $_POST['betsize'];
if($sum > $balance) {
    $error = 1;
    $mess = "Недостаточно средств";
    $fa = "fatal";
}
if(!is_numeric($sum)) {
    $error = 2;
    $mess = "Введите сумму корректно";
    $fa = "fatal";
}
if($sum < 1) {
    $error = 3;
    $mess = "Минимальная сумма - 1";
    $fa = "fatal";
}
if($cel < 1) {
    $error = 4;
    $mess = "Минимальный шанс - 1%";
    $fa = "fatal";
}
if(!is_numeric($cel)) {
    $error = 5;
    $mess = "Ошибка";
    $fa = "fatal";
}
if(!$_SESSION['hash']) {
    $error = 6;
    $mess = "Авторизуйтесь";
    $fa = "fatal";
}
if($error == 0) {
    
        if($cel <= $rand) {
            $win1 = round((100 - $cel), 2);
    $win = round((99 / $win1), 2);
    $newbalance = $balance + round((($sum * $win) - $sum),2);
       $update_sql2 = "UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql2);      
$fa = "success";
}
if($cel > $rand) {
    $newbalance = $balance - $sum;
       $update_sql2 = "UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql2);      
    $fa = "error";
}
       
    }
    $result = array(
'success' => "$fa",
'error' => "$mess",
'num' => "$rand",
'balance' => "$balance",
'new_balance' => "$newbalance"
    );
}
if($type == "battledice") {
  $sql_select = "SELECT * FROM kot_user WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
}
  $rand = rand(1, 999);
  $team = $_POST['team'];
  $per = $_POST['per'];
  $sum = $_POST['sum'];
  $win = round((100 / $per) * $sum, 2);
  if($team != 'red' && $team != 'blue' || $team == '') {
   $error = 1;
   $mess = "Выберите цвет";
   $fa = "fatal";
  }
  
  if($sum > $balance) {
   $error = 2;
   $mess = "Недостаточно средств";
   $fa = "fatal"; 
  }
  if(!is_numeric($sum)) {
   $error = 3;
   $mess = "Ошибка!";
   $fa = "fatal"; 
  }
  if($sum < 1) {
   $error = 4;
   $mess = "Ставки от 1";
   $fa = "fatal"; 
  }
  if($sum > $max_bet) {
   $error = 5;
   $mess = "Макс ставка - $max_bet";
   $fa = "fatal"; 
  }
  if($per < 1 || $per > 95) {
   $error = 6;
   $mess = "Шанс от 1 до 95";
   $fa = "fatal"; 
  }
  if(!is_numeric($per)) {
   $error = 7;
   $mess = "Ошибка!";
   $fa = "fatal"; 
  }
  if (!preg_match("#^[.0-9]+$#",$sum)) {
   $error = 8;
   $mess = "Недопустимые символы!";
   $fa = "fatal"; 
  }
  if (!preg_match("#^[.0-9]+$#",$per)) {
   $error = 8;
   $mess = "Недопустимые символы!";
   $fa = "fatal"; 
  }
  if(!$_SESSION['hash']) {
   $error = 9;
   $mess = "Авторизуйтесь";
   $fa = "fatal";  
  }
  
  if($error == 0) {
  if($team == "red") {
    $win_range = ($per / 100) * 999;
    if($rand > $win_range) {
       $newbalance = $balance - $sum;
     $update_sql2 = "UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql2); 
     $mess = "Выпал билет $rand";
     $fa = "error"; 
    }
    if($rand <= $win_range) {
       $newbalance = ($balance + $win) - $sum;
     $update_sql2 = "UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql2); 
     $fa = "success"; 
    }
  }
  
 if($team == "blue") {
   $win_range = 999 - ($per / 100) * 999;
    if($rand < $win_range) {
     $newbalance = $balance - $sum;
     $update_sql2 = "UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql2); 
     $mess = "Выпал билет $rand";
     $fa = "error"; 
    }
    if($rand >= $win_range) {
       $newbalance = ($balance + $win) - $sum;
     $update_sql2 = "UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql2); 
     $fa = "success"; 
    }
  }
  }
 
  $result = array(
	'success' => "$fa",
	'error' => "$mess",
    'number' => "$rand",
    'win' => "$win",
    'balance' => "$balance",
    'new_balance' => "$newbalance"
    );
}
if($type == "resetPassPanel") {
 $newpass = $_POST['newPass'];
  if (!preg_match("#^[aA-zZ0-9\-_]+$#",$newpass)) {
    $error = 1;
	$mess = "Недопустимые символы";
	$fa = "error";	
  }
  if($error == 0) {
 $update_sql2 = "UPDATE kot_user SET pass = '$newpass' WHERE hash = '$sid'";
    mysql_query($update_sql2); 
  $fa = "success";
  }
  $result = array(
	'success' => "$fa",
	'error' => "$mess"
    );
}
if($type == "deposit")
{
	
$size = $_POST['sum'];
$sql_select = "SELECT * FROM kot_user WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$user_id = $row['id'];
}
 
  if($error == 0) {
$podpis = md5($fk_id.':'.$size.':'.$fk_secret_1.':'. $user_id);
  $fa = "success";
}
    $result = array(
	'success' => "success",
	'locations' => "http://www.free-kassa.ru/merchant/cash.php?m=".$fk_id."&oa={$size}&o={$user_id}&s=".$podpis.""
    );
  

}
if($type == "continue_reg") {
  $login = $_POST['login'];
  $pass = $_POST['pass'];
  $dllogin = strlen($login);
  $dlpass = strlen($pass);
  $sql_select1 = sprintf("SELECT COUNT(*) FROM kot_user WHERE login='%s'", mysql_real_escape_string($login));
$result1 = mysql_query($sql_select1);
$row = mysql_fetch_array($result1);
if($row)
{
$count = $row['COUNT(*)'];
}  
  if($login == '' || $pass == '') {
   $error = 1;
   $mess = "Заполните все поля";
   $fa = "error";
  }
  if($login != '' && $pass != '') {
  if($dllogin < 5 || $dllogin > 15) {
   $error = 2;
   $mess = "Логин от 5 до 15 симв.";
   $fa = "error";
  }
  if($dlpass < 6 || $dlpass > 12) {
   $error = 3;
   $mess = "Пароль от 6 до 12 симв.";
   $fa = "error";
  }
  if (!preg_match("#^[aA-zZ0-9\-_]+$#",$login)) {
    $error = 4;
	$mess = "Недопустимые символы";
	$fa = "error";	
  }
  if (!preg_match("#^[aA-zZ0-9\-_]+$#",$pass)) {
    $error = 5;
	$mess = "Недопустимые символы";
	$fa = "error";	
  } 
  if($count >= 1) {
    $error = 6;
	$mess = "Логин занят";
	$fa = "error";	
  }
  }
  if($error == 0) {
    $update_sql1 = "UPDATE kot_user SET login = '$login' WHERE hash = '$sid'";
    mysql_query($update_sql1);
    $update_sql2 = "UPDATE kot_user SET pass = '$pass' WHERE hash = '$sid'";
    mysql_query($update_sql2);
    $fa = "success";
  }
  $result = array(
	'success' => "$fa",
	'error' => "$mess"
    );
}
if($type == "registration") {
  $login1 = $_POST['login'];
  $pass = $_POST['pass'];
  $repeatpass = $_POST['repeatpass'];
  $dllogin = strlen($login1);
  $dlpass = strlen($pass);
  $sql_select1 = sprintf("SELECT COUNT(*) FROM kot_user WHERE login='%s'", mysql_real_escape_string($login1));
$result1 = mysql_query($sql_select1);
$row = mysql_fetch_array($result1);
if($row)
{
$count = $row['COUNT(*)'];
}
$ip_c = $_SERVER['REMOTE_ADDR'];
$sql_select11 = sprintf("SELECT COUNT(*) FROM kot_user WHERE ip='%s'", mysql_real_escape_string($ip_c));
$result11 = mysql_query($sql_select11);
$row = mysql_fetch_array($result11);
if($row)
{
$count_ip = $row['COUNT(*)'];
}
  if($login1 == '' || $pass == '' || $repeatpass == '') {
    $error = 1;
    $mess = "Заполните все поля";
    $fa = "error";
  }
  if($pass != $repeatpass) {
    $error = 2;
    $mess = "Пароли не совпадают";
    $fa = "error";
  }
  if($login1 != '' && $pass != '' && $repeatpass != '') {
  if (!preg_match("#^[aA-zZ0-9\-_]+$#",$login1)) {
    $error = 3;
	$mess = "Недопустимые символы";
	$fa = "error";	
  }
  if (!preg_match("#^[aA-zZ0-9\-_]+$#",$pass)) {
    $error = 4;
	$mess = "Недопустимые символы";
	$fa = "error";	
  } 
  if($dllogin < 4 || $dllogin > 20) {
    $error = 5;
    $mess = "Логин от 4 до 20 симв.";
    $fa = "error";
  }
  if($count >= 1) {
    $error = 6;
    $mess = "Логин занят";
    $fa = "error";  
  }
  if($count_ip >= 1) {
    $error = 7;
    $mess = "Такой IP уже зареган";
    $fa = "error";
  }
    if($dlpass < 6 || $dlpass > 12) {
    $error = 8;
    $mess = "Пароль от 6 до 12 симв.";
    $fa = "error";
  }
  }
  if($error == 0) {
$ip = $_SERVER["REMOTE_ADDR"];
$ref = $_SESSION["ref"];
$datas = date("d.m.Y");
	$datass = date("H:i:s");
	$data = "$datas $datass";
	$chars3="qazxswedcvfrtgnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
$max3=32; 
$size3=StrLen($chars3)-1; 
$passwords3=null; 
while($max3--) 
$hash.=$chars3[rand(32,$size3)];
	$insert_sql1 = "INSERT INTO `kot_user` (`date_reg`, `ip`, `ref_id`, `login`, `pass`, `hash`, `balance`, `social`) 
	VALUES ('{$data}', '{$ip}', '{$ref}', '{$login}', '{$pass}', '{$hash}', '{$bonus_reg}', '');";
mysql_query($insert_sql1);
    $_SESSION['hash'] = $hash;
    $_SESSION['login'] = 1;
    $fa = "success";
  }
  $result = array(
	'success' => "$fa",
	'error' => "$mess"
    );
}
if($type == "login") {
  $login = $_POST['login'];
  $pass = $_POST['pass'];
  $sql_select1 = sprintf("SELECT COUNT(*) FROM kot_user WHERE login='%s' AND pass='%s'", mysql_real_escape_string($login), mysql_real_escape_string($pass));
$result1 = mysql_query($sql_select1);
$row = mysql_fetch_array($result1);
if($row)
{
$count = $row['COUNT(*)'];
}  
  if($login == '' || $pass == '') {
    $error = 1;
    $mess = "Заполните все поля";
    $fa = "error";
  }
  if($login != '' && $pass != '') {
  if($count == 0) {
    $error = 2;
    $mess = "Пользователь не найден";
    $fa = "error";
  }
  if (!preg_match("#^[aA-zZ0-9\-_]+$#",$login)) {
    $error = 3;
	$mess = "Недопустимые символы";
	$fa = "error";	
} 
  if (!preg_match("#^[aA-zZ0-9\-_]+$#",$pass)) {
    $error = 4;
	$mess = "Недопустимые символы";
	$fa = "error";
} 
  }
  if($error == 0) {
    $sql_select2 = sprintf("SELECT * FROM kot_user WHERE login='%s' AND pass='%s'", mysql_real_escape_string($login), mysql_real_escape_string($pass));
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{
$hash = $row['hash'];   
}
    $_SESSION['hash'] = $hash;
    $_SESSION['login'] = 1;
    $fa = "success";
  }
  $result = array(
	'success' => "$fa",
	'error' => "$mess"
    );
}
if($type == "deletewithdraw") {
  $id_delete = $_POST['del'];
$sql_select2 = "SELECT * FROM kot_user WHERE hash='$sid'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{
$user_id = $row['id'];
$login = $row['login'];
$ban = $row['ban'];
$balance = $row['balance'];
}
$sql_select3 = "SELECT * FROM kot_withdraws WHERE id='$id_delete'";
$result3 = mysql_query($sql_select3);
$row = mysql_fetch_array($result3);
if($row)
{
$user_id_w = $row['user_id'];
$sum = $row['sum'];
$status = $row['status'];
}  
if($status != 0) {
   $error = 1;
   $mess = "";
   $fa = "error";
}
if($user_id != $user_id_w) {
   $error = 2;
   $mess = "";
   $fa = "error";
}
  if($error == 0) {
    $delete = "DELETE FROM `kot_withdraws` WHERE id = '$id_delete'";
mysql_query($delete);
  $newbalance = $balance + $sum;
    $update_sql1 = "UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql1);
    $fa = "success";
  }
  $result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'new_balance' => "$newbalance"
    );
}
if($type == "withdrawuser") {

$sql_select2 = "SELECT * FROM kot_user WHERE hash='$sid'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{
$user_id = $row['id'];
$login = $row['login'];
$ban = $row['ban'];
$balance = $row['balance'];
}
$sql_select23 = "SELECT SUM(suma) FROM kot_payments WHERE user_id='$user_id'";
$result23 = mysql_query($sql_select23);
$row = mysql_fetch_array($result23);
if($row)
{
$sumdep = $row['SUM(suma)'];
}
if($sumdep == '') {
 $sumdep = 0; 
}
$system = $_POST['system'];
$wallet = $_POST['wallet'];
$sum = $_POST['sum'];
  if($system == 4) {
      $ps = "qiwi";
    }
    if($system == 2) {
      $ps = "payeer";
    }
    if($system == 3) {
      $ps = "wm";
    }
    if($system == 1) {
      $ps = "ya";
    }
    if($system == 5) {
      $ps = "beeline";
    }
    if($system == 6) {
      $ps = "megafon";
    }
    if($system == 7) {
      $ps = "mts";
    }
    if($system == 8) {
      $ps = "tele";
    }
    if($system == 9) {
      $ps = "visa";
    }
    if($system == 10) {
      $ps = "mc";
    }
$dwallet = strlen($wallet);
if($wallet == '' || $sum == '') {
  $error = 1;
  $mess = "Заполните все поля";
  $fa = "error";
}
if($sum > $balance) {
  $error = 2;
  $mess = "Недостаточно средств";
  $fa = "error";
}
if($ban == 1) {
  $error = 3;
  $mess = "Ваш аккаунт заблокирован";
  $fa = "error";
}
  if($sum != '' && $wallet != '') {
if(!is_numeric($sum)) {
  $error = 4;
  $mess = "Введите корректную сумму";
  $fa = "error";
}
if($dwallet < 8 || $dwallet > 20) {
  $error = 5;
  $mess = "Кошелек от 8 до 20 символов";
  $fa = "error";
}
  
if($sum < $min_withdraw_sum) {
  $error = 6;
  $mess = "Минимальная сумма вывода $min_withdraw_sum";
  $fa = "error";
}
if (!preg_match("#^[aA-zZ0-9\-_.]+$#",$sum)) 
{
	$mess = "Недопустимые символы в сумме";
	$fa = "error";
	$error = 7;
} 
if (!preg_match("#^[+0-9PpWw]+$#",$wallet)) 
{
	$mess = "Недопустимые символы в реквизитах";
	$fa = "error";
	$error = 8;
}
if($sumdep < $dep_withdraw) {
    $mess = "Пополните баланс на $dep_withdraw";
    $error = 9;
	$fa = "error";
	
  }
  }
  if($error == 0) {
    $summ = round($sum, 2);
    $newbalance = $balance - $sum;
    $datas = date("d.m.Y");
	$datass = date("H:i:s");
	$data = "$datas $datass";
    $insert_sql11 = "INSERT INTO `kot_withdraws` (`id`, `user_id`, `ps`, `wallet`, `sum`, `date`, `status`) VALUES (NULL, '$user_id', '$ps', '$wallet', '$summ', '$data', '0');";
    mysql_query($insert_sql11); 
    $update_sql1 = "UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql1);
    $fa = "success";
}
  $result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'new_balance' => "$newbalance"
    );
}
if($type == "createPromoUser") {

$sql_select2 = "SELECT * FROM kot_user WHERE hash='$sid'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{
$user_id = $row['id'];
$ban = $row['ban'];
$balance = $row['balance'];
}
$name = $_POST['createname'];
$sum = $_POST['createsum'];
$act = $_POST['createactive'];
$sql_select4 = sprintf("SELECT COUNT(*) FROM kot_promo WHERE name='%s'", mysql_real_escape_string($name));
$result4 = mysql_query($sql_select4);
$row = mysql_fetch_array($result4);
if($row)
{
$count = $row['COUNT(*)'];
}
if($name == '' || $sum == '' || $act == '') {
  $error = 1;
  $mess = "Заполните все поля";
  $fa = "error";
}
if($ban == 1) {
  $error = 2;
  $mess = "Ваш аккаунт заблокирован";
  $fa = "error";
}
if(($sum * $act) > $balance) {
  $error = 3;
  $mess = "Недостаточно средств";
  $fa = "error";
}
  if($name != '' && $sum != '' && $act != '') {
  if($sum < 1) {
  $error = 4;
  $mess = "Сумма от 1";
  $fa = "error";
}
  if($act < 1) {
  $error = 5;
  $mess = "Кол-во от 1";
  $fa = "error";
}
  if(!is_numeric($sum)) {
  $error = 6;
  $mess = "Сумма цифрами";
  $fa = "error";
}
  if(!is_numeric($act)) {
  $error = 7;
  $mess = "Кол-во цифрами";
  $fa = "error";
}
  if (!preg_match("#^[а-яА-ЯaA-zZ0-9\-_]+$#",$name)) {
   $error = 8;
   $mess = "Недопустимые символы";
   $fa = "error";
}   
  if($count > 0) {
  $error = 9;
  $mess = "Промокод уже существует";
  $fa = "error";
}
if (explode( '.', $act)[1]) {
    $error = 10;
  $mess = "Ошибка при создании";
  $fa = "error";
}
}
  if($error == 0) {
    $datas = date("d.m.Y");
	$datass = date("H:i:s");
	$data = "$datas $datass";
  $newbalance = $balance - ($sum * $act);
  $insert_sql1 = "INSERT INTO `kot_promo` (`id`, `date`, `name`, `sum`, `active`, `actived`, `id_active`) VALUES (NULL, '$data', '$name', '$sum', '$act', '0', '');";
    mysql_query($insert_sql1);
    $update_sql1 = "UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql1);
    $fa = "success";
}
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'new_balance' => "$newbalance"
    );
}
if($type == "activePromo") {
  
$sql_select2 = "SELECT * FROM kot_user WHERE hash='$sid'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{
$user_id = $row['id'];
$ban = $row['ban'];
$balance = $row['balance'];
}
// инфу о пользователе мы получили, получаем промо
$promo = $_POST['promoactive']; // получаем введенное промо
$sql_select = sprintf("SELECT COUNT(*) FROM kot_promo WHERE name='%s'", mysql_real_escape_string($promo));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$count = $row['COUNT(*)'];
}
 
  if($promo == '') {
    $error = 1;
    $mess = "Введите промокод";
    $fa = "error";
  }
  if($count == 0) {
    $error = 2;
    $mess = "Промокод не найден";
    $fa = "error";
  }
 if($count != 0) {
    $sql_select1 = "SELECT * FROM kot_promo WHERE name='$promo'";
$result1 = mysql_query($sql_select1);
$row = mysql_fetch_array($result1);
if($row)
{	
$sum = $row['sum'];
$limit = $row['active'];
$actived = $row['actived'];
$idactive = $row['id_active'];
}
  }
  if($count == 1) {
  if($limit == $actived || $actived > $limit) {
    $error = 3;
    $mess = "Активации закончились";
    $fa = "error";
  }
  if($ban == 1) {
    $error = 4;
    $mess = "Ваш аккаунт заблокирован";
    $fa = "error";
  }
  }
  if (preg_match("/$user_id /",$idactive))  {	
	$error = 5;
    $mess = "Вы уже активировали этот код";
    $fa = "error";
   }
  if($error == 0) {
    $newbalance = $balance + $sum;
    $newactive = $actived + 1;
    $newid = "$user_id $idactive";
    $update_sql1 = "UPDATE kot_user SET balance = '$newbalance' WHERE hash = '$sid'";
    mysql_query($update_sql1);
    // обновляем бд (2)
    $update_sql2 = "UPDATE kot_promo SET actived = '$newactive' WHERE name = '$promo'";
    mysql_query($update_sql2); 
    // обновляем бд (3)
    $update_sql3 = "UPDATE kot_promo SET id_active = '$newid' WHERE name = '$promo'";
    mysql_query($update_sql3);
    $fa = "success";
  }
  $result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'new_balance' => "$newbalance"
    );
}
if($type == "bonus")	
{
    $datab = Date("dmY");
$min_bonus_size = $min_bonus_s * 100;
$max_bonus_size = $max_bonus_s * 100;
	
$sql_select = "SELECT * FROM kot_user WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bonus = $row['bdate'];
$balance = $row['balance'];
$vk = $row['social'];
}
if($bonus == $datab){
$error = 1;
$fa = "error";
$mess = "Вы получали бонус за эти 24 часа";
}
if($vk == '') {
$error = 2;
$fa = "error";
$mess = "Для получения войдите через вк";    
}
if($vk != '') {
    $user = explode( 'vk.com', $vk )[1];
$http = "http://";
$vks = str_replace($user, '', $vk);
$vks = str_replace($http, '', $vks);
if($vks == "vk.com" || $vks == "m.vk.com")
{
	//good
		$domainvk = explode( 'http://vk.com/id', $vk )[1];
if (!is_numeric($domainvk))
{
	$domainvk = explode( 'com/', $vk )[1];
}

		$vk1 = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$domainvk}&access_token=".$tokenvk."&v=5.74"));
        $vk1 = $vk1->response[0]->id;
	$resp = file_get_contents("https://api.vk.com/method/groups.isMember?group_id=".$idvk."&user_id={$vk1}&access_token=".$tokenvk."&v=5.74");
$data = json_decode($resp, true);
    

if($data['response']=='0')
{
$error = 3;
$fa = "error";
$mess = "Подпишитесь на группу";    
}
if($data['response']=='1')
{
}
}
}
if($error == 0) {
    $randomb = rand($min_bonus_size,$max_bonus_size) / 100;
    $balancenew = $balance + $randomb;
$update_sql = "Update kot_user set balance='$balancenew' WHERE hash='$sid'";
      mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
$update_sql1 = "Update kot_user set bdate='$datab' WHERE hash='$sid'";
      mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
$fa = "success";

}
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'new_balance' => "$balancenew",
	'bonussize' => "$randomb"
    );
}

if($type == "exit") {
 unset($_SESSION['hash']); 
 unset($_SESSION['login']);
  $fa = "success";
  $result = array(
	'success' => "$fa",
	'error' => "$mess"
    );
}
if($type == "minbet") {
 // $winsum = $_POST['win'];
  
  $sum = $_POST['sum'];
  $per = $_POST['per'];
  $nwin = ($per * 10000) - 1;
  $winsum = round(((100 / $per * $sum) - $sum), 2);
  //$nwin = $_POST['nwin'];
  $sql_select2 = "SELECT * FROM kot_user WHERE hash='$sid'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{	
$balance = $row['balance'];
$ban = $row['ban'];
$sliv = $row['sliv'];
$fart = $row['win'];
$login = $row['login'];
$user_id = $row['id'];
}
  $sql_select27 = "SELECT COUNT(*) FROM kot_chance WHERE per='$per'";
$result27 = mysql_query($sql_select27);
$row = mysql_fetch_array($result27);
if($row)
{	
$get_per = $row['COUNT(*)'];
}
if($get_per != 0) {
  $sql_select0 = "SELECT * FROM kot_chance WHERE per='$per'";
$result0 = mysql_query($sql_select0);
$row = mysql_fetch_array($result0);
if($row)
{	
$active_chance = $row['active'];
$chance = $row['chance'];
$is_drop = $row['is_drop'];
}
}
  if($fart == 0 && $sliv == 0) {
  if($active_chance == 1) {
    if($chance == 0 && $is_drop == 0) {
       $rand = rand($nwin, 999999);
    }
    if($chance > 0 && $is_drop == 1) {
      $get_win = rand(1, 100);
      if($chance >= $get_win) {
        $rand = rand(0, $nwin);
      }
      if($chance < $get_win) {
        $rand = rand($nwin, 999999);
      }
    }
  }
  if($sliv == 0 && $active_chance == 0) {
  $rand = rand(0, 999999);
  }
  }
  if($sliv == 1) {
    $rand = rand($nwin, 999999);
  }
  if($fart == 1) {
    $rand = rand(0, $nwin);
  }
  $hash = hash('sha512', $rand);
  if((empty($_SESSION['hash'])) || $_SESSION['login'] != 1){
    $error = 2;
    $mess = "Авторизуйтесь";
    $fa = "error";
  }
     if($_SESSION['hash'] != '') {
       if($sum > $balance) {
         $newbalance = $balance;
         $error = 4;
         $mess = "Недостаточно средств";
         $fa = "error";
       }
       if($per > $max_per || $per < $min_per) {
         $newbalance = $balance;
         $error = 98;
         $mess = "% Шанс от $min_per до $max_per";
         $fa = "error";
       }
       if($ban == 1) {
         $newbalance = $balance;
         $error = 97;
         $mess = "Ваш аккаунт заблокирован";
         $fa = "error";
       }
       if($sum < $min_bet) {
         $newbalance = $balance;
         $error = 64;
         $mess = "Ставки от $min_bet";
         $fa = "error";
       }
       if($sum > $max_bet) {
         $newbalance = $balance;
         $error = 69;
         $mess = "Макс. ставка $max_bet";
         $fa = "error";
       }
       if(!is_numeric($sum)) {
           $newbalance = $balance;
         $error = 77;
         $mess = "Введите сумму корректно";
         $fa = "error";
          
       }
       if($error == 0) {
  if($rand <= $nwin)
  {
    $summ = round($sum, 2);
    $winsumm = round($winsum, 2) + $sum;
  $insert_sql1 = "INSERT INTO `kot_games` (`id`,`user_id`, `login`, `number`, `cel`, `sum`, `chance`, `type`, `win_summa`) 
	VALUES ('NULL', '$user_id', '$login', '$rand', '0 - $nwin', '$summ', '$per', 'win', '$winsumm');";
mysql_query($insert_sql1);
  $newbalance = $balance + $winsum;
    $update_sql4 = "Update kot_user set balance='$newbalance' WHERE hash='$sid'";
      mysql_query($update_sql4);
  $fa = "success";
  }
       }
       
       if($error == 0) {
  if($rand > $nwin)
  {
    $summ = round($sum, 2);
    $winsumm = round($winsum, 2) + $sum;
  $insert_sql1 = "INSERT INTO `kot_games` (`id`,`user_id`, `login`, `number`, `cel`, `sum`, `chance`, `type`, `win_summa`) 
	VALUES ('NULL', '$user_id', '$login', '$rand', '0 - $nwin', '$summ', '$per', 'lose', '0');";
mysql_query($insert_sql1);
  $newbalance = $balance - $sum;
    $update_sql4 = "Update kot_user set balance='$newbalance' WHERE hash='$sid'";
      mysql_query($update_sql4);
  $error = 1;
  $mess = "Выпало <b>$rand</b>";
  $fa = "error";
  }
   }  
     }
     
  $winning = $winsum + $sum;
  $result = array(
	'success' => "$fa",
	'error' => "$mess",
	'number' => "$rand",
    'hash' => "$hash",
    'fullwin' => "$winning",
    'balance' => "$balance",
    'new_balance' => "$newbalance"

    );
}
if($type == "maxbet") {
  // $winsum = $_POST['win'];
  $per = $_POST['per'];
  $nwin = 1000000 - ($per * 10000);
  //$nwin = $_POST['nwin'];
  $sum = $_POST['sum'];
  $winsum = round(((100 / $per * $sum) - $sum), 2);
  $sql_select2 = "SELECT * FROM kot_user WHERE hash='$sid'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{
$balance = $row['balance'];
$ban = $row['ban'];
$sliv = $row['sliv'];
$fart = $row['win'];
$login = $row['login'];
$user_id = $row['id'];
}
 $sql_select27 = "SELECT COUNT(*) FROM kot_chance WHERE per='$per'";
$result27 = mysql_query($sql_select27);
$row = mysql_fetch_array($result27);
if($row)
{	
$get_per = $row['COUNT(*)'];
}
if($get_per != 0) {
  $sql_select0 = "SELECT * FROM kot_chance WHERE per='$per'";
$result0 = mysql_query($sql_select0);
$row = mysql_fetch_array($result0);
if($row)
{	
$active_chance = $row['active'];
$chance = $row['chance'];
$is_drop = $row['is_drop'];
}
}
  if($fart == 0) {
  if($active_chance == 1) {
    if($chance == 0 && $is_drop == 0) {
       $rand = rand(0, $nwin);
    }
    if($chance > 0 && $is_drop == 1) {
      $get_win = rand(1, 100);
      if($chance >= $get_win) {
        $rand = rand($nwin, 999999);
      }
      if($chance < $get_win) {
        $rand = rand(0, $nwin);
      }
    }
  }
  if($sliv == 0 && $active_chance != 1) {
  $rand = rand(0,999999);
  }
  }
  if($sliv == 1) {
    $rand = rand(0, $nwin);
  }
  if($fart == 1) {
    $rand = rand($nwin, 999999);
  }
  $hash = hash('sha512', $rand);
  if((empty($_SESSION['hash'])) || $_SESSION['login'] != 1){
    $error = 2;
    $mess = "Авторизуйтесь";
    $fa = "error";
  }
  
     if($_SESSION['hash'] != '') {
       if($sum > $balance) {
         $newbalance = $balance;
         $error = 4;
         $mess = "Недостаточно средств";
         $fa = "error";
       }
       if($per > $max_per || $per < $min_per) {
         $newbalance = $balance;
         $error = 98;
         $mess = "% Шанс от $min_per до $max_per";
         $fa = "error";
       }
       if($ban == 1) {
         $newbalance = $balance;
         $error = 97;
         $mess = "Ваш аккаунт заблокирован";
         $fa = "error";
       }
       if($sum < $min_bet) {
         $newbalance = $balance;
         $error = 64;
         $mess = "Ставки от $min_bet";
         $fa = "error";
       }
       if($sum > $max_bet) {
         $newbalance = $balance;
         $error = 69;
         $mess = "Макс. ставка $max_bet";
         $fa = "error";
       }
       if(!is_numeric($sum)) {
           $newbalance = $balance;
         $error = 77;
         $mess = "Введите сумму корректно";
         $fa = "error";
          
       }
       if($error == 0) {
  if($rand >= $nwin)
  {
    $summ = round($sum, 2);
    $winsumm = round($winsum, 2) + $sum;
  $insert_sql1 = "INSERT INTO `kot_games` (`id`,`user_id`, `login`, `number`, `cel`, `sum`, `chance`, `type`, `win_summa`) 
	VALUES ('NULL', '$user_id', '$login', '$rand', '$nwin - 999999', '$summ', '$per', 'win', '$winsumm');";
mysql_query($insert_sql1);
  $newbalance = $balance + $winsum;
    $update_sql4 = "Update kot_user set balance='$newbalance' WHERE hash='$sid'";
      mysql_query($update_sql4);
  $fa = "success";
  }
       } 
     }
    
       
       if($error == 0) {
  if($rand < $nwin)
  {
    $summ = round($sum, 2);
    $winsumm = round($winsum, 2) + $sum;
  $insert_sql1 = "INSERT INTO `kot_games` (`id`,`user_id`, `login`, `number`, `cel`, `sum`, `chance`, `type`, `win_summa`) 
	VALUES ('NULL', '$user_id', '$login', '$rand', '$nwin - 999999', '$summ', '$per', 'lose', '0');";
mysql_query($insert_sql1);
  $newbalance = $balance - $sum;
    $update_sql4 = "Update kot_user set balance='$newbalance' WHERE hash='$sid'";
      mysql_query($update_sql4);
  $error = 1;
  $mess = "Выпало <b>$rand</b>";
  $fa = "error";
  }
       }
     
     
  $winning = $winsum + $sum;
  $result = array(
	'success' => "$fa",
	'error' => "$mess",
	'number' => "$rand",
    'hash' => "$hash",
    'fullwin' => "$winning",
    'balance' => "$balance",
    'new_balance' => "$newbalance"

    );
}

	/* огромное спасибо за покупку, моя страница в вк - https://vk.com/id321223555 по всем вопросам и т.д */
    echo json_encode($result);
?>