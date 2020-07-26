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

$sql_select5 = "SELECT * FROM kot_bots ORDER BY id + 0 DESC";
$result5 = mysql_query($sql_select5);
if($last_check == 1) {
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
    .btn-cc {
      width:35%;
    }
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
  .mob-tb {
                           max-width:100%;
                         }
                          .sorting_1 {
                            text-align:center;
                            width:auto;
                          }
  .tbl-name {
    text-align:center;
  }
  .icon-edit {
    color:gray;
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
                        <li ><a href="/admin">Настройки сайта</a></li>
                        <li ><a href="/admin/users">Пользователи</a></li>
                        <li ><a href="/admin/promo">Промокоды</a></li>
                        <li ><a href="/admin/deps">Пополнения</a></li>
                        <li ><a href="/admin/withdraws">Выплаты</a></li>
                        <li class="active"><a href="/admin/bot">Настройка ботов</a></li>
                        <li ><a href="/admin/stat">Статистика сайта</a></li>
                       <li ><a href="/admin/percent">Шансы</a></li>
                      
                    </ul>
                    <ul class="navbar-menu mmmob">
                        <li ><a href="/admin">Настройки сайта</a></li>
                        <li ><a href="/admin/users">Пользователи</a></li>
                        <li ><a href="/admin/promo">Промокоды</a></li>
                        <li ><a href="/admin/deps">Пополнения</a></li>
                        <li ><a href="/admin/withdraws">Выплаты</a></li>
                        <li class="active"><a href="/admin/bot">Настройка ботов</a></li>
                        <li ><a href="/admin/stat">Статистика сайта</a></li> 
                      <li ><a href="/admin/percent">Шансы</a></li>
                      
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
                      
			<h4 class="card-title card-title-lg mob-t" style='float:left; padding-top:8px;'>Боты</h4>
                      <button class="btn-ccc btn btn-sm btn-outline btn-light input-bordered col-12" style="float:right; width:120px" data-toggle="modal" data-target="#addbot" >Добавить <i class="fas fa-plus icon-edit"></i></button><br><br>
            <hr>          
		</div>
                     <div class="card-text"> 
                      
                      <!-- НАЧАЛО -->
                      <center>

<table id="bot-tbl" class="table-responsive-sm table table-striped- table-bordered table-hover table-checkable" style="width:100%">
                    
				<thead>
					<tr>
						<th class="tbl-name">ID</th>
                        <th class="tbl-name">Логин бота</th>
                        <th class="tbl-name">Мин. ставка</th>
						<th class="tbl-name">Макс. ставка</th>
						<th class="tbl-name">Статус</th>
                        <th class="tbl-name">Действие</th>
						
						
					</tr>
				</thead>
                      <tbody>
                      <?php 
while($row = mysql_fetch_array($result5)) {
$bot_id = $row['id'];
$bot_login = $row['bot_login'];
$bot_min_bet = $row['bot_min_bet'];
$bot_max_bet = $row['bot_max_bet'];
$active = $row['status'];
  if($active == 1) {
$status = "<td class='sorting_1' tabindex='0' style='color:green'><span class='badge badge-success' style='width:100px'>Активен</span></td>";
  }
  if($active == 0) {
 $status = "<td class='sorting_1' tabindex='0' style='color:green'><span class='badge badge-danger' style='width:100px'>Неактивен</span></td>";   
  }
$edit = "<td class='sorting_1' tabindex='0' style='color:green' onclick="."$('#editbotid').html('$bot_id');"."  data-toggle='modal' data-target='#editstatusbot'><span class='badge badge-warning'  style='width:100px'>Изменить</span></td>";

echo "<tr role='row' class='odd'>
<td class='sorting_1' tabindex='0'>$bot_id</td>
<td class='sorting_1' tabindex='0'>$bot_login</td>
<td class='sorting_1' tabindex='0'>$bot_min_bet</td>
<td class='sorting_1' tabindex='0'>$bot_max_bet</td>
$status
$edit
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
    <div class="modal fade show infotbl" id="addbot" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a class="modal-close" id="close-modal" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">
    <center><p>Добавление бота</p>
    <hr>
    <p>Логин
<input type='text' class='input-bordered col-12' id='botname' value='' placeholder='Логин бота'></p><br>
    <p>Мин. ставка
<input type='text' class='input-bordered col-12' id='botmin' value='' placeholder='Минимальная ставка'></p><br>
    <p>Макс. ставка
<input type='text' class='input-bordered col-12' id='botmax' value='' placeholder='Максимальная ставка'></p><br>
    <!-- ОПОВЕЩЕНИЯ -->
    <span id="succes_insert" style="color:gray;"></span>
    <span id="error_insert" style="color:gray;"></span>
    <!-- КОНЕЦ -->
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:260px' onclick="insert()">Добавить бота</button>  
</center>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>
      <!-- END MODAL -->
    <!-- MODAL -->
    <div class="modal fade show infotbl" id="editstatusbot" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a id="close-mod" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">
    <center><p>Изменение статуса бота <span id='editbotid' style='display:none'></span></p>
    <hr>
    
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:140px; display:inline-block' onclick="bot_adm('succes')">Активен <i class='fa fa-check' style='color:green'></i></button>  
    
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:140px; display:inline-block' onclick="bot_adm('error')">Неактивен <i class='fa fa-times' style='color:red'></i></button>
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
    <script>
   function insert() {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
			 
										},	
                                                                                data: {
                                                                        type: "insert_bot",
           																login: $("#botname").val(),
          																minbet: $("#botmin").val(),  
                                                                        maxbet: $("#botmax").val()         
                                                                                  
                                                                                  },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                $("#close-modal").click();
                $("#bot-tbl").load("bot.php #bot-tbl");
                                            
                                                              
                                            }else{
               $("#bot-tbl").load("bot.php #bot-tbl");
               $('#error_insert').show();
               $('#error_insert').html(obj.error);                               
                                            }
                                        }   
   });
  }
  function bot_adm(status) {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
			 
										},	
                                                                                data: {
                                                                                    type: "editstatusbot",
           id_edit: $("#editbotid").html(),
           status: status                                                                     },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                $("#close-mod").click();
                $("#bot-tbl").load("bot.php #bot-tbl");
                                            
                                                              
                                            }else{
               $("#bot-tbl").load("bot.php #bot-tbl");
                                            }
                                        }   
   });
  }
  </script>
</html>
<?php } else { header('Location: ../error404'); } ?>