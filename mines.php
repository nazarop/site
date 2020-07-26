<?php
  session_start();
$sid = $_SESSION['hash'];
require("inc/site_config.php");
require("inc/config.php");
require("inc/bd.php");
$komissia = 0.1;
// данные игрока
 $sql_select = "SELECT * FROM kot_user WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
$login = $row['login'];
$money = $row['balance'];
$id = $row['id'];
}
//игровой массив
$query = ("SELECT * FROM `mines-game` WHERE `id_users` = '$id' AND `onOff` = '1' ORDER BY `id` DESC LIMIT 1");
$result = mysql_query($query);
$minesgame = mysql_fetch_array($result);

if($minesgame){
$mines = $minesgame['mines'];
$click = $minesgame['click'];
$step = $minesgame['step'];
$num_mines = $minesgame['num_mines'];
$bet = $minesgame['bet'];
$win = $minesgame['win'];
$resultgame = $minesgame['result'];
$onOff = $minesgame['onOff'];
$click = unserialize($click);
}else{
  $click = unserialize($click);
  $click = [];
}
if(isset($_POST['type'])){
    $query = mysql_query("UPDATE `mines-game` SET onOff = 2 WHERE onOff=1 AND id_users = '$id'");
    $type = $_POST['type'];
    $bet = $_POST['bet'];
    



 if(is_numeric($bet)) {
     $suc = 1;
 }
 if(!is_numeric($bet)) {
     $suc = 0;
 }
    $mines = $_POST['mines']; //кол-во мин
    if($mines == 3 || $mines == 5 || $mines == 10 || $mines == 24){
    if($money >= $bet){
        
    if($bet >= "1" && $suc == 1){
    
    if($type == "mine"){
    if($_SESSION['hash']) {
 
  
      $query = ("SELECT * FROM `mines-game` WHERE `id_users` = '$id' AND `onOff` = '1' ORDER BY `id` DESC LIMIT 1");
      $minesgame = mysql_query($query);
  
      if(mysql_num_rows($minesgame) != 0){
      $result = array("info" => "false");
      }else{
        //вычитаем монету
        $newbalance = round(($money - $bet), 2);
        $query = ("UPDATE `kot_user` SET `balance` = '$newbalance' WHERE `id` = '$id'");
        mysql_query($query);
        
        $money = $money - $bet;
  
  
        
        if($mines == 3){
          $resultmines = range(1,25);
          shuffle($resultmines);
          $resultmines = array_slice($resultmines,0,3);
        }
        if($mines == 5){
          $resultmines = range(1,25);
          shuffle($resultmines);
          $resultmines = array_slice($resultmines,0,5);
        }
        if($mines == 10){
          $resultmines = range(1,25);
          shuffle($resultmines);
          $resultmines = array_slice($resultmines,0,10);
        }
        if($mines == 24){
          $resultmines = range(1,25);
          shuffle($resultmines);
          $resultmines = array_slice($resultmines,0,24);
        }
        $resultmines = serialize($resultmines);
  
        $sss = []; // для заполнения столбца (click)
        $sss = serialize($sss); // часть функции
        
        $query = ("INSERT INTO `mines-game` (`id_users`, `bet`, `onOff`, `step`,`result`, `win`,`mines`,`click`,`num_mines`,`login`) VALUES ('$id', '$bet', '1', '0', '1', '0','$resultmines','$sss','$mines','$login')");
        mysql_query($query);
  
        $obj = array("info"=>"true","money"=>"$money");
      }
    }else{
    $obj = array("info" => "warning","warning"=>"Авторизуйтесь");
  }
    }  
  }else{
    $obj = array("info" => "warning","warning"=>"Сумма ставки от 1");
  }
  }else{
    $obj = array("info" => "warning","warning"=>"Недостаточно средств");
  }
  }else{
    $obj = array("info" => "warning","warning"=>"Произошла ошибка");
  }
  }
  if(isset($_POST['finish'])){
    $mines = unserialize($mines);
  
      if($step != "0"){
      if($minesgame != null){
      $newbalance = round(($money + $win), 2);
      $query = ("UPDATE `kot_user` SET `balance` = '$newbalance' WHERE `id` = '$id'"); //выдаем баланс игроку за победу.
      mysql_query($query);
  
      $query = ("UPDATE `mines-game` SET `onOff` = '2' WHERE `id_users` = '$id'"); //отключаем игру.
      mysql_query($query);
  
     $tamines = json_encode($mines);

  // для работы с антиминусом
   $query = ("SELECT * FROM `kot_admin`");
   $row_admin = mysql_query($query);
   $admin = mysql_fetch_array($row_admin);
  
   $bank = $admin['bank'];
   $profit = $admin['zarabotok'];
   $win = $win - $bet;
   $query = mysql_query("UPDATE `kot_admin` SET `bank`= '$bank'-'$win'");
    
    $win = $win + $bet;
    $money = $money + $win; //для правильного отображения баланса
    $ssa = "<span class='number result-win result'><span class='myBetsBox'>".$win."</span> <i class='fas fa-coins'></i></span>"; 
    $obj = array("info"=>"true","win" => "$win","money"=>"$money","tamines"=>"$tamines","resultHistoryContentBomb"=>"$ssa");
  }else{
    $obj = array("info" => "warning","warning"=>"Игра не существует.");
  }
  }else{
    $obj = array("info" => "warning","warning"=>"Ты не нажал на поле!");
  }
  }
  //игрок нажал на клетку...
if(isset($_POST['mmine'])){

    $mmines = $_POST['mmine'];
    if($mmines >= "1" && $mmines <= "25"){
    
    
    
    
    $mines = unserialize($mines);
    if($minesgame !=  null){
    

    $threebombs = [1.03,1.06,1.12,1.18,1.30,1.45,1.67,2.51,2.9,3.8,6,7.33,9.93,13.24,18.2,26.01,39.01,62.42,109.25,218.5,546.25,2190];
    $fivebombs = [1.18,1.5,1.91,2.48,3.01,3.84,5.89,7.15,8.55,12.8,17.21,25.21,40.72,80.25,150.29,350.58,504.31,700.05,1500];
    $tenbombs = [1.38,2.41,3.8,5.8,8.8,11.61,17.96,25.67,55.77,103,310,1086,4700,28200,31100];
    $twfobombs = [23.8];
    
    // для работы с антиминусом
   $query = ("SELECT * FROM `kot_admin`");
   $row_admin = mysql_query($query);
   $admin = mysql_fetch_array($row_admin);
  
   $bank = $admin['bank'];
 

    if(in_array($mmines,$click) == false){
    

    if(in_array($mmines,$mines)){
    
       //тут есть бомба, игра проиграна
    
      
    
      $query = ("UPDATE `mines-game` SET `onOff` = '2' WHERE `id_users` = '$id'"); //отключаем игру.
      mysql_query($query);
    
        // для работы с антиминусом
   $query = ("SELECT * FROM `kot_admin`");
   $row_admin = mysql_query($query);
   $admin = mysql_fetch_array($row_admin);
  
   $bank = $admin['bank'];
   $profit = $admin['zarabotok'];
   $profit1 = $bet * $komissia;
   $bank1 = $bet * (1-$komissia);
   $query = mysql_query("UPDATE `kot_admin` SET `bank`= '$bank'+'$bank1',`zarabotok`='$profit'+'$profit1'");
  
      $tamines = json_encode($mines);

      $saad = "<span class='number result-lose result'><span class='myBetsBox'>".$bet."</span> <i class='fas fa-coins'></i></span>";
      $obj = array("info" => "click","bombs"=>"true","pressmine" => "$mmines","tamines"=>"$tamines","resultHistoryContentBomb"=>"$saad");
    
    }else{
      $query = ("SELECT * FROM `kot_admin`");
      $row_admin = mysql_query($query);
      $admin = mysql_fetch_array($row_admin);
     
      $bank = $admin['bank'];

        $win = $win - $bet;
        if($win < $bank){

       //тут нет бомбы, все четко...
    
      $query = ("UPDATE `mines-game` SET `step` = '$step' + 1 WHERE `id_users` = '$id' AND `onOff` = '1'");
      mysql_query($query);
    
      if($num_mines == "3"){
      $win = $bet * $threebombs[$step];
      }
      if($num_mines == "5"){
      $win = $bet * $fivebombs[$step];
      }
      if($num_mines == "10"){
      $win = $bet * $tenbombs[$step];
      }
      if($num_mines == "24"){
      $win = $bet * $twfobombs[$step];
      }

    
     //кол-во криссталов
      $gem_number = 24 - $num_mines - $step;
    
      $query = ("UPDATE `mines-game` SET `win` = '$win' WHERE `id_users` = '$id' AND `onOff` = '1'");
      mysql_query($query);
    
      $click[] = $mmines;
      $click = serialize($click);
    
      $query = ("UPDATE `mines-game` SET `click` = '$click' WHERE `id_users` = '$id' AND `onOff` = '1'");
      mysql_query($query);

      if($num_mines == 3){
        $nextCoef = $threebombs[$step+1];
      }
      if($num_mines == 5){
        $nextCoef = $fivebombs[$step+1];
      }
      if($num_mines == 10){
        $nextCoef = $tenbombs[$step+1];
      }
      if($num_mines == 24){
        $nextCoef = $twfobombs[$step+1];
      }
      $rdr = "<span class='number result-win result'><span class='myBetsBox'>".$win."</span> <i class='fas fa-coins'></i></span>";
      $obj = array("info" => "click","bombs"=>"false","pressmine" => "$mmines","win" => "$win","gem"=>"$gem_number","nextX"=>"$nextCoef","resultHistoryContentBomb"=>"$rdr");
    
    }
    else{

    //создаем проигрышный вариант игры

$query = ("SELECT * FROM `mines-game` WHERE `id_users` = '$id' AND `onOff` = '1'");
$result55 = mysql_query($query);
$minesgame1 = mysql_fetch_array($result55);

$click = $minesgame1['click'];
$step = $minesgame1['step'];
$num_mines = $minesgame1['num_mines'];
$resultgame = $minesgame1['result'];
$onOff = $minesgame1['onOff'];
$click = unserialize($click);

$query = ("UPDATE `mines-game` SET `onOff` = '2' WHERE `id_users` = '$id'"); //отключаем игру.
      mysql_query($query);

    //создаем новый массив, нужно учесть значения click

    

      
  $query = ("SELECT * FROM `kot_admin`");
  $row_admin = mysql_query($query);
  $admin = mysql_fetch_array($row_admin);
 
  $bank = $admin['bank'];
  $profit = $admin['zarabotok'];
  $bet = $bet * (1-$komissia);
  $profit1 = $bet * $komissia;
  $query = mysql_query("UPDATE `kot_admin` SET `bank`='$bank'+'$bet',`zarabotok`='$profit'+'$profit1'");

  $mines = [];
  $mines[] = $mmines;      
  while(count($mines) < $num_mines){
    $rand = mt_rand(1,25);
    if(in_array($rand,$click)){
    }else{
        if(in_array($rand,$mines) == false){
           $mines[] = $rand;
        }

    }
}


      $mines = serialize($mines);
      $query = mysql_query("UPDATE `mines-game` SET `mines` = '$mines',`onOff`= '2',`loseBombs`='$mmines' WHERE `id_users` = '$id' AND `onOff` = '1'"); 
      $mines = unserialize($mines);
      $tamines = json_encode($mines);
      
      $saad = "<span class='number result-lose result'><span class='myBetsBox'>".$bet."</span> <i class='fas fa-coins'></i></span>";
      $obj = array("info" => "click","bombs"=>"true","pressmine" => "$mmines","tamines"=>"$tamines","resultHistoryContentBomb"=>"$saad");
    }
    }
    }else{
      $obj = array("info" => "warning","warning"=>"Вы уже нажимали на это поле.");
    }
    }else{
      $obj = array("info" => "warning","warning"=>"Нажмите начать игру.");
    }
    }else{
      $obj = array("info" => "warning","warning"=>"Произошла ошибка");
    }    
}
if(isset($_POST['live'])){
  $query = ("SELECT * FROM `mines-game` WHERE `onOff`= '2' ORDER BY `id` DESC LIMIT 10");
                        $result = mysql_query($query);
                        while(($minesHistory = mysql_fetch_array($result))){                        
                        
                        $idgameHistory = $minesHistory['id'];
                        $idusersHistory = $minesHistory['id_users'];
                        $nameHistory = $minesHistory['login'];
                        $betHistory = $minesHistory['bet'];
                        $bombsHistory = $minesHistory['num_mines'];
                        $resultHistory = $minesHistory['result'];
                        if($minesHistory['win'] != "0"){
                           $resultHistory = $minesHistory['win'];
                        }
                        if($minesHistory['win'] != 0){
						          	$color = "win";
					             	}else{
						           	$color = "lose";
						            }
						
                        $h.="
                        <tr onclick='openMines($idgameHistory)' style='cursor: pointer'>
                        <td ><i class='fas fa-user-circle'  onclick ='openProfile($idusersHistory)' style='cursor: pointer'></i> <span>".$nameHistory."</span></td>
                        <td><span>".$betHistory."</span> <i class='fas fa-coins'></i></td>
                        <td><span>".$bombsHistory."</span> <i class='fas fa-bomb'></i></td>
                        <td class='result-".$color."'><span>".$resultHistory."</span> <i class='fas fa-coins'></i></td>
                        </tr>";                            
                        } 
					 	            $obj = array("live"=>"$h");
                      }
                      if(isset($_POST['openMines'])){

$idMines = $_POST['idMines'];

$query = ("SELECT * FROM `mines-game` WHERE `id`='$idMines' AND `onOff`='2'");
$result4445 = mysql_query($query);
$row5554 = mysql_fetch_array($result4445);

if($row5554){


$clickOpen = $row5554['click'];								
$clickOpen = unserialize($clickOpen);
$idbetMines = $row5554['bet'];
$winminesOpen = $row5554['win'];
$loseBomb = $row5554['loseBombs'];
$loginMinesOpen = $row5554['login'];
$coefMinesOpen = $winminesOpen / $idbetMines;
$idUsersOpenMines = $row5554["id_users"];

$minesclickopen = [];

for($i=1;$i<26;$i++){
if(in_array($i,$clickOpen)){
array_push($minesclickopen,'<button class="mine win-mine openMines" data-number="'.$i.'" disabled="disabled"><i class="fas fa-gem" style="font-size: 25px;"></i></button>');
}else{
array_push($minesclickopen,'<button class="mine openMines" data-number="'.$i.'"></button>');
}		
}
}     $minesclickopen= json_encode($minesclickopen);

    $obj = array("result"=>"true","minesopen"=>"$minesclickopen","idbetMines"=>"$idbetMines","winminesOpen"=>"$winminesOpen","coefMinesOpen"=>"х$coefMinesOpen","loseBomb"=>"$loseBomb","loginMinesOpen"=>"$loginMinesOpen","idUsersOpen"=>"$idUsersOpenMines"); 

}
$dev = "Спасибо за приобретение скрипта, разработчик - Владимир Кот https://vk.com/id321223555";

echo json_encode($obj);
?>