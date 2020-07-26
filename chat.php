<?php
include("inc/bd.php");
session_start();
$systemimg = "https://img.bgxcdn.com/customers_avatars/20170415124347_679.jpg";
$sid = $_SESSION['hash'];
//данные чата
$query = ("SELECT * FROM `kot_chat`");
$result = mysql_query($query);
$getChat = mysql_fetch_array($result);
$chatLogin = $getChat['login'];
$chatPhoto = $getChat['photo'];
$mess = $getChat['mess'];

//данные юзера
$query = ("SELECT * FROM `kot_user` WHERE `hash` = '$sid'");
$result = mysql_query($query);
$userInfo = mysql_fetch_array($result);

$idu = $userInfo['id'];
$login = $userInfo['login'];;
$prava = $userInfo['admin'];
$photo = $userInfo['img'];
$ban = $userInfo['chat_ban'];
if(isset($_POST['chatGet']) == "ok"){
    if($prava == 0){
      $query = ("SELECT * FROM `kot_chat`");
      $result = mysql_query($query);
    while(($chat = mysql_fetch_array($result))){
     $chatLogin = $chat['login'];
     $mess = $chat['mess'];
     $idUsersChat = $chat['id_users'];
     $photo = $chat['photo'];
    $p.='<div class="chat-box-item">
    <div class="chat-avatar"><img class="chat-avatar" style="box-shadow: 0 0 0 0.2rem rgba(0,0,0,.2);cursor:pointer" src="'.$photo.'"></div>
    <div class="chat-mess">
     <div class="chat-mess-name">
    <div>'.$chatLogin.'</div>
     </div>
     <div class="chat-mess-mess">
    '.$mess.'
     </div>
    </div>
  </div>';
    }
    }
  if($prava == 1 || $prava == 2){
    $query = ("SELECT * FROM `kot_chat`");
    $result = mysql_query($query);
    while(($chat = mysql_fetch_array($result))){
      $chat_id = $chat['id'];
      $vk_id = $chat['vk_id'];
      $chatLogin = $chat['login'];
      $mess = $chat['mess'];
$idUsersChat = $chat['id_users'];
      $photo = $chat['photo'];
      $idl = $chat['id_users'];
      $query1 = ("SELECT * FROM `kot_user` WHERE `id` = '$idl'");
$result1 = mysql_query($query1);
$userInff = mysql_fetch_array($result1);

$loginban = $userInff['login'];;
$ban = $userInff['chat_ban'];
if($idUsersChat == 0) {
    $fa = "";
    $sup = "";
}
if($idUsersChat != 0) {
if($ban == 1) {
    $fa = "<i class='fas fa-unlock' onclick='noblockUsers(".$idl.")' style='color:green;cursor:pointer' title='Разблокировать'></i>";
}
if($ban == 0) {
    $fa = "<i class='fas fa-ban' onclick='blockUsers(".$idl.");' title='Заблокировать' style='color: red;cursor:pointer'></i>";
}
if($prava == 1) {
   $sup = "<i class='fa fa-life-ring' style='cursor:pointer; color:orange;' title='Выдать права модератора' onclick='mod(".$idl.");'></i>";
}
}
     $p.='<div class="chat-box-item">
     <div class="chat-avatar"><img class="chat-avatar" style="box-shadow: 0 0 0 0.2rem rgba(0,0,0,.2);cursor:pointer" src="'.$photo.'"></div>
     <div class="chat-mess">
      <div class="chat-mess-name">
     <div style="cursor: pointer"><span onclick=\'var u = $(this); $("#inputChat1").val(u.text() + ", "); $("#inputChat1").focus(); return false;\'>'.$chatLogin.'</span> <i class="fas fa-trash" style="cursor:pointer" title="Удалить" onclick="delMess('.$chat_id.');"></i> '.$fa.' '.$sup.'</div>
      </div>
      <div class="chat-mess-mess">
     '.$mess.'
      </div>
     </div>
   </div>';
  }
}

    $obj = array("chat" => "$p");    
}
if(isset($_POST['mess'])){
    $mess = $_POST['mess'];
  $image = explode( '/simg', $mess )[1];
  $unid = explode( '/unban', $mess )[1];
  $banid = explode( '/ban', $mess)[1];
  $sys = explode( '/sys', $mess)[1];
  $promo = explode( '/promo ', $mess)[1];
    if($ban != 1 ){
    $query = ("SELECT * FROM `kot_admin`");
    $resultad = mysql_query($query);
    $admin = mysql_fetch_array($resultad);
    $chat = $admin['chat'];

    if($chat == 0){

    
    $mess = htmlspecialchars($mess);
    $query = ("SELECT * FROM `kot_user` WHERE `hash`= '$sid'");
    $result = mysql_query($query);
    $token = mysql_num_rows($result);
    if($token != null){
   
    if($prava == "1"){
      $colorNickname =  'style="color: red;font-weight: 600"';
      }
      if($prava == "0"){
        $colorNickname =  '0 0 0 0.2rem rgba(0,0,0,.2)"';
        }
        if($prava == "2"){
        $colorNickname =  'style="color: #007500;font-weight: 600;"';
        }

$login = '<span '.$colorNickname.'>'.  $login . '</span>';
if($photo == '') {
    $photo = "https://vk.com/images/camera_100.png?ava=1";
}
if(!$unid && !$image && !$banid && !$sys && !$promo) {
$query = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','$vk_id','$idu')");
}
if($prava == 1 || $prava == 2){
 if($promo) {
     $datas = date("d.m.Y");
	$datass = date("H:i:s");
	$data = "$datas $datass";
     $quer = mysql_query("INSERT INTO `kot_promo` (`id`, `date`, `name`, `sum`, `active`, `actived`, `id_active`) VALUES (NULL, '$data', '$promo', '2', '3', '0', '');");
      $login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">Промокод '.$promo.' <br>Активаций: 3<br>Сумма: 2</span>';
$photo = $systemimg;
$query1 = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
 }
 if($sys) {
       $login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">'.$sys.'</span>';
$photo = $systemimg;
$query1 = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
 }
  if($unid) {
$query = ("SELECT * FROM `kot_user` WHERE `id` = '$unid'");
$result = mysql_query($query);
$userInf = mysql_fetch_array($result);
$unlog = $userInf['login'];
$adm = $userInf['admin'];
$unban = mysql_query("UPDATE kot_user SET chat_ban = 0 WHERE id = '$unid'");
$login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">Пользователь '.$unlog.' разблокирован в чате!</span>';
$photo = 'https://img.bgxcdn.com/customers_avatars/20170415124347_679.jpg';
$query = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");

}
if($banid) {
$query = ("SELECT * FROM `kot_user` WHERE `id` = '$banid'");
$result = mysql_query($query);
$userInf = mysql_fetch_array($result);
$banlog = $userInf['login'];
$adm = $userInf['admin'];
if($prava == 2 && $adm == 1 || $prava == 2 && $adm == 2 || $prava == 1 && $adm == 1) {
     $login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">Пользователь <font color="red">'.$banlog.'</font> не может быть заблокирован в чате, т.к его уровень прав выше или равен вашему!</span>';
$photo = $systemimg;
$query1 = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
}
if($prava == 2 && $adm == 2 || $prava == 2 && $adm == 0 || $prava == 1 && $adm == 2 || $prava == 1 && $adm == 0) {
$ban = mysql_query("UPDATE kot_user SET chat_ban = 1 WHERE id = '$banid'");
$login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">Пользователь '.$banlog.' заблокирован в чате!</span>';
$photo = 'https://img.bgxcdn.com/customers_avatars/20170415124347_679.jpg';
$query = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
}
}
if($image) {
$img = '<p><img src='.$image.' style="max-width:100%;height:100px"></p>';
$login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">'.$img.'</span>';
$photo = 'https://img.bgxcdn.com/customers_avatars/20170415124347_679.jpg';
$query = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
}
}
if($mess == '/clear'){
if($prava == 1 || $prava == 2){
$query = mysql_query("TRUNCATE `kot_chat`");
$login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">Чат очищен модератором или администратором проекта.</span>';
$photo = 'https://img.bgxcdn.com/customers_avatars/20170415124347_679.jpg';
$query = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
}
}




}else{
  $obj = array("good"=>"false","mess"=>"Авторизируйтесь!");
}
}else{
  $obj = array("good"=>"false","mess"=>"Чат временно недоступен");
}
}else{
  $obj = array("good"=>"false","mess"=>"Вы заблокированы в чате!");
}
}
if(isset($_POST['del'])){
  $del = $_POST['del'];
  if($prava == 1 || $prava == 2){
  $query = mysql_query("DELETE FROM `kot_chat` WHERE `id` = '$del'");
  }
}
if(isset($_POST['chat_ban'])){
  $chat_ban = $_POST['chat_ban'];
  if($prava == 1 || $prava == 2){
      $query = ("SELECT * FROM `kot_user` WHERE `id` = '$chat_ban'");
$result = mysql_query($query);
$userInf = mysql_fetch_array($result);
$is_admin = $userInf['admin'];
$loginban = $userInf['login'];;
$ban = $userInf['chat_ban'];

if($prava < $is_admin || $is_admin == 0) {
    
        $query1 = mysql_query("UPDATE `kot_user` SET `admin` = '0' WHERE `id` = '$chat_ban'");
    
    $query = mysql_query("UPDATE `kot_user` SET `chat_ban` = '1' WHERE `id` = '$chat_ban'");
    
    $login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">Пользователь <font color="red">'.$loginban.'</font> заблокирован в чате</span>';
$photo = $systemimg;
$query1 = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
  }
  if($prava == $is_admin) {
      $error = 1;
  }
  if($error == 1 || $prava == 0 && $is_admin == 2 || $is_admin == 1 && $prava == 2) {
    $login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">Пользователь <font color="red">'.$loginban.'</font> не может быть заблокирован в чате, т.к его уровень прав выше или равен вашему!</span>';
$photo = $systemimg;
$query1 = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
  }
  }
}
  if(isset($_POST['no_chat_ban'])){
    $chat_ban = $_POST['no_chat_ban'];
     $query = ("SELECT * FROM `kot_user` WHERE `id` = '$chat_ban'");
$result = mysql_query($query);
$userInf = mysql_fetch_array($result);
$loginban = $userInf['login'];;
$ban = $userInf['chat_ban'];

    if($prava == 1 || $prava == 2){
      $query = mysql_query("UPDATE `kot_user` SET `chat_ban` = '0' WHERE `id` = '$chat_ban'");
      if($ban == 1) {
       $login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">Пользователь <font color="green">'.$loginban.'</font> разблокирован в чате</span>';
$photo = $systemimg;
$query1 = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
      }
}
  }
  if(isset($_POST['moder'])){
    $idm = $_POST['moder'];
     $query = ("SELECT * FROM `kot_user` WHERE `id` = '$idm'");
$result = mysql_query($query);
$userInf = mysql_fetch_array($result);
$loginm = $userInf['login'];;
$is_admin = $userInf['admin'];
if($prava == 1) {
    if($is_admin == 0 && $is_admin != 1){
      $query = mysql_query("UPDATE `kot_user` SET `admin` = '2' WHERE `id` = '$idm'");
      
       $login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">Пользователь <font color="blue">'.$loginm.'</font> назначен модератором в чате!</span>';
$photo = $systemimg;
$query1 = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
      
}
if($is_admin == 1) {
    $login = '<span style="color: #0b61bd;font-weight: 600">Система</span>';
$mess = '<span style="font-weight: 700">Пользователь <font color="blue">'.$loginm.'</font> не может быть назначен модератором в чате, т.к его уровень прав выше или равен данному!</span>';
$photo = $systemimg;
$query1 = mysql_query("INSERT INTO `kot_chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/id321223555','none')");
}
  }
  }
  // разработчик - vk.com/id321223555
echo json_encode($obj);
?>