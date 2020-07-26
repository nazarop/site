<?php
require("../inc/site_config.php");
require("../inc/bd.php");
session_start();
$sid = $_SESSION['hash'];

// проверка на админа
$admin_check = "SELECT * FROM kot_user WHERE hash = '$sid'";
$result_admin = mysql_query($admin_check);
$row = mysql_fetch_array($result_admin);
if($row)
{	
$last_check = $row['admin'];
}
// остальное - вывод юзеров и прочее
$sql_select1 = "SELECT COUNT(*) FROM kot_user";
$result1 = mysql_query($sql_select1);
$row = mysql_fetch_array($result1);
if($row)
{	
$users_count = $row['COUNT(*)'];
}
$sql_select2 = "SELECT * FROM kot_user";
$result2 = mysql_query($sql_select2);
if($last_check == 3) {
?>
  
<!DOCTYPE html>
<html lang="ru" class="js">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    

    <title><?=$sitename?> - админ-панель</title>
    <script src="https://kit.fontawesome.com/6cce539f85.js"></script>
    <meta name="description" content="<?=$sitename?> - Настоящий сайт Нвути. Все комиссии берем на себя, бонус при регистрации. Произведем выплаты за 24 часа на любую платежную систему.">
    <meta name="keywords" content="нвути, <?=$sitename?>">

    <meta name="author" content="<?=$linksite?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/fa.css">
<link rel="stylesheet" href="../css/ti.css">
<link rel="stylesheet" href="../css/vendor.bundle.css">
<link rel="stylesheet" href="../css/loader-0.css">
<link rel="stylesheet" href="../css/style.css?v=1575178639" id="layoutstyle">
<link rel="stylesheet" href="../css/datatables.min.css">
<script src="functions.js"></script>
<script src="../script/jquery-latest.min.js"></script>
<script src="../script/odometr.js"></script>
<script src="../script/js.cookie.js"></script>
</head>

<body class="page-user no-touch">
 
    <div class="topbar-wrap" style="padding-top: 0px;">
        <div class="topbar is-sticky">
            <div class="container">
                <div>
                    <style>
  
  @media (min-width: 1675px) {
                        .ava-p {
                         width:124px;
                         height:124px;
                        }
   						.mob-b {
                          width:170px;
                          height:74px;
                          font-size:34px;
                          text-align:center;
                        }
                        h6.mob-b-t {
                        font-weight:bold;
                        }
                        hr.tab-users-mob-adm {
                          display:none;
                        }
                          
}
  @media (min-width: 1090px) {
                        .ava-p {
                         width:72px;
                         height:72px;
                        }
}
  @media (max-width: 1089px) {
                        .ava-p {
                         width:48px;
                         height:48px;
                        }
}
  @media (min-width: 1349px) {
                        .ava-p {
                         width:64px;
                         height:64px;
                        }
   						.mob-b {
                          width:110px;
                          height:44px;
                          font-size:14px;
                          text-align:center;
                        }
                        h6.mob-b-t {
                        font-weight:bold;
                        }
                        hr.tab-users-mob-adm {
                          display:none;
                        }
                          
}
  @media (max-width: 359px) {
                        .mob-b {
                          width:56px;
                          height:24px;
                          font-size:8px;
                          text-align:center;
                        }
   						.mob-t {
                          font-size:14px;
                        }
  						.mob-b-t {
                        padding-bottom:9px;
                        font-weight:bold;
                        }
                        .mob-info {
                          font-size:10px;
                        }
}
@media (min-width: 360px) {
                        h6.mob-b-t {
                        font-weight:bold;
                        }
                        hr.tab-users-mob-adm {
                          display:none;
                        }
                          
}
  @media (max-width: 991px) {
                        .admin-users-block {
                       max-width:120%;
}
}
 @media (min-width: 991px) {

   .input-bordered {
     width:310px;
     margin-top:3px;
     margin-bottom:3px;
     display:block;
   }
                        .admin-users-block {
                       max-width:450px;
}
}
                        .mmmob {
                            display: none;
                        }
                        @media (max-width: 991px) {
                         
                            .des {
                                display: none;
                            }
                            .mmmob {
                                display: block;
                            }
                            .desktop-nav {
                                margin-top: -55px;
                            }
                        }
  .tbl-name, .sorting_1 {
    text-align:center;
  }
                    </style>
                    <ul class="topbar-nav d-lg-none">
                        <li class="topbar-nav-item relative" id="close-nav"><a class="toggle-nav" href="">
                            <div class="toggle-icon"><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span></div>
                        </a></li>
                    </ul>
                    <center class="desktop-nav" style="font-weight: 600;padding: 5px;color: #fff;font-size: 25px;"><?=$sitename?></center>
                </div>
            </div><!-- .container -->
        </div><!-- .topbar -->
        <div class="navbar">
            <div class="container">
                <div class="navbar-innr">
                    <ul class="navbar-menu des">
                       <li ><a href="/moder/users">Пользователи</a></li>
                        <li ><a href="/moder/promo">Промокоды</a></li>
                        <li ><a href="/moder/withdraws">Выплаты</a></li>
                      <li><a href="/moder/bot">Настройка ботов</a></li>
                       <li ><a href="/moder/percent">Шансы</a></li>
                    </ul>
                    <ul class="navbar-menu mmmob">
                        <li ><a href="/moder/users">Пользователи</a></li>
                        <li ><a href="/moder/promo">Промокоды</a></li>
                        <li ><a href="/moder/withdraws">Выплаты</a></li>
                      <li><a href="/moder/bot">Настройка ботов</a></li>
                       <li ><a href="/moder/percent">Шансы</a></li>
                    </ul>
                    <ul class="navbar-btns">
                        <li><a href="<?=$group?>" target="_blank" class="btn btn-sm btn-outline btn-light"><em style="color: #3b5998;" class="fab fa-vk"></em><span>Вконтакте</span></a></li>
                    </ul>
                </div><!-- .navbar-innr -->
            </div><!-- .container -->
        </div><!-- .navbar -->
    </div><!-- .topbar-wrap -->
    
    <div class="page-content">
      <div class="container">
       <div class="card content-area">
	<div class="card-innr">
		<div class="card-head">
                      
			<h4 class="mob-t card-title card-title-lg mob-t" style='float:left; padding-top:8px;'>Пользователи (Всего: <?=$users_count?>)</h4>
                      <br><br>
                      <hr>
		</div>
                     <div class="card-text"> 
                      
                      <!-- НАЧАЛО -->
                      <center>

<table id="withdraws-tbl" class="table-responsive-sm table table-striped- table-bordered table-hover table-checkable">
                    
				<thead>
					<tr>
						<th class="tbl-name">ID</th>
                        <th class="tbl-name">Логин</th>
						<th class="tbl-name">Баланс</th>
						<th class="tbl-name">Профиль VK</th>
						<th class="tbl-name">Привилегии</th>
						<th class="tbl-name">Бан</th>
                        <th class="tbl-name">IP адрес</th>
						<th class="tbl-name">Действия</th>
					</tr>
				</thead>
                      <tbody id="users-block">
                      <?php 
while($row = mysql_fetch_array($result2)) {
$id = $row['id'];
$login = $row['login'];
$social = $row['social'];
$balance = $row['balance'];
$ban = $row['ban'];
$admin = $row['admin'];
$ip = $row['ip'];
if($admin == 1) {
 $prava = "Администратор";
}
if($admin == 3) {
 $prava = "Модер";
}
if($admin == 2) {
 $prava = "Сотрудничество";
}
if($admin == 0) {
 $prava = "Пользователь"; 
}
if($login == '') {
  $name = '<font color="red">Не зареган</font>';
}
if($login != '') {
  $name = $login; 
}
if($social == '') {
  $stat_social = '<font color="red">Не привязан</font>';
}
if($social != '') {
 $stat_social = 'Перейти'; 
}
if($ban == 1) {
 $button_ban = "<button class='mob-b btn btn-sm btn-outline btn-light' style='display:inline-block; height:30px;width:100px' onclick="."unban_adm('$id')"."><h6 class='mob-b-t'>Разбан</h6></button>";
 $status = "Да";
 $ban_icon = "<i class='fa fa-times-circle-o' aria-hidden='true' style='color:red; margin-top:5px' id='icon-$id'></i>";
}
if($ban == 0) {
 $button_ban = "<button class='mob-b btn btn-sm btn-outline btn-light' style='display:inline-block; height:30px;width:100px' onclick="."ban_adm('$id');"."><h6 class='mob-b-t'>Бан</h6></button>";
 $status = "Нет";
 $ban_icon = "";
}
echo "<tr role='row' class='odd'>
<td class='sorting_1' tabindex='0'>$id</td>
<td class='sorting_1' tabindex='0'><span id='$id'>$name $ban_icon</span></td>
<td class='sorting_1' tabindex='0'>$balance</td>
<td class='sorting_1' tabindex='0'><a href='$social' target='_blank'>$stat_social</a></td>
<td class='sorting_1' tabindex='0'>$prava</td>
<td class='sorting_1' tabindex='0'><span id='stat$id'>$status</span></td>
<td class='sorting_1' tabindex='0'>$ip</td>
<td class='sorting_1' tabindex='0'><center><div id='banbutt$id'>$button_ban
<button class='mob-b btn btn-sm btn-outline btn-light' style='display:inline-block; height:30px;width:100px' data-toggle='modal' data-target='#userinfo' onclick="."select('$id')"."><h6 class='mob-b-t'>Настройки</h6></button></center></div></td>
</tr>";
}
  ?>

                      </tbody>
			</table>
                      </center>
              
                       <!-- КОНЕЦ -->
</div>	             
</div><!-- .card -->
   </div><!-- .container -->
</div><!-- .page-content -->
                      
<div class="footer-bar">
  <div class="container">
   <div class="row align-items-center justify-content-center">
    <div class="col-md-8">
        <style>
         ul.footer-links li {
          display: inline;
      }
  </style>
</div><!-- .col -->
<div class="col-md-12 mt-12 mt-sm-12">
 <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
   <ul class="footer-links">
    <li><a href="#" data-toggle="modal" data-target="#modalRules">Лицензионное соглашение</a></li>
    <li><a href="#" data-toggle="modal" data-target="#modalNoAzart">Правила</a></li>
</ul>
</div>					
</div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->
</div><!-- .footer-bar -->
</div>
</div>
<!-- MODAL -->
    <div class="modal fade show infotbl" id="userinfo" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">
    <center><p>Настройки данных пользователя #<span id='userid' style='color:gray;'>1</span></p>
    <hr>
    <p>Логин
<input type='text' class='input-bordered col-12' id='username' placeholder='Владимир Кот'></p><br>
    <p>Пароль
<input type='text' class='input-bordered col-12' id='userpass' placeholder='1212121212'></p><br>
    <p>Баланс
<input type='text' class='input-bordered col-12' id='userbal' placeholder='500.00'></p><br>
    <p>Подкрутка
    <select class="input-bordered form-control" id="winner">
      <option value="0">Выключена</option>
      <option value="1">Включена</option>
     
     </select></p><br>
   <p>Открутка
    <select class="input-bordered form-control" id="loser">
      <option value="0">Выключена</option>
      <option value="1">Включена</option>
     
     </select></p><br>
    <span style='color:gray;' id='status'></span><br>
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:200px' onclick="save_user_edit()">Сохранить</button>  
</center>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>
      <!-- END MODAL -->
<script src="../script/jquery.bundle.js"></script>
<script src="../script/datatables.min.js"></script>
<script src="../script/script.js?v=2"></script>
<script src="../script/jquery-3.2.1.min.js"></script>
</body>
</html>
<?php } else { header('Location: ../error404'); } ?>