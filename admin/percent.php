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

$sql_select5 = "SELECT * FROM kot_chance ORDER BY id + 0 DESC";
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
  @media (max-width:640px) {
    .table-responsive-sm {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar
    }
}
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
    .input-bordered {
      width:250px
      }
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
                        <li><a href="/admin/bot">Настройка ботов</a></li>
                        <li ><a href="/admin/stat">Статистика сайта</a></li>
                       <li class='active'><a href="/admin/percent">Шансы</a></li>
                    </ul>
                    <ul class="navbar-menu mmmob">
                        <li ><a href="/admin">Настройки сайта</a></li>
                        <li ><a href="/admin/users">Пользователи</a></li>
                        <li ><a href="/admin/promo">Промокоды</a></li>
                        <li ><a href="/admin/deps">Пополнения</a></li>
                        <li ><a href="/admin/withdraws">Выплаты</a></li>
                        <li><a href="/admin/bot">Настройка ботов</a></li>
                        <li ><a href="/admin/stat">Статистика сайта</a></li>
                       <li class='active'><a href="/admin/percent">Шансы</a></li>
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
                      
			<h4 class="card-title card-title-lg" style='float:left; padding-top:8px;'>Шансы</h4>
                      <button id='saved' class="btn-ccc btn btn-sm btn-outline btn-light input-bordered" style="float:right; width:130px;" data-toggle="modal" data-target="#addper" >Добавить</button><br><br>
                      <hr>      
		</div>
                     <div class="card-text"> 
                      
                      <!-- НАЧАЛО -->
                      
              <center>

<table id="per-tbl" class="table-responsive-sm table table-striped- table-bordered table-hover table-checkable" style="width:100%">
                    
				<thead>
					<tr>
						<th class="tbl-name">ID</th>
                        <th class="tbl-name">Процент</th>
                        <th class="tbl-name">Шанс выпадения</th>
                        <th class="tbl-name">Выпадает</th>
                        <th class="tbl-name">Статус</th>
                        <th class="tbl-name">Действие</th>
						
						
					</tr>
				</thead>
                      <tbody>
                      <?php 
while($row = mysql_fetch_array($result5)) {
$id = $row['id'];
$per = $row['per'];
$chance = $row['chance'];
$is_drop = $row['is_drop'];
$is_active = $row['active'];
  if($is_active == 1) {
$status_active = "<td class='sorting_1' tabindex='0' style='color:green'><span class='badge badge-success' style='width:100px'>Активно</span></td>";
  }
  if($is_active == 0) {
 $status_active = "<td class='sorting_1' tabindex='0' style='color:green'><span class='badge badge-danger' style='width:100px'>Неактивно</span></td>";   
  }
  if($is_drop == 1) {
$status = "<td class='sorting_1' tabindex='0' style='color:green'><span class='badge badge-success' style='width:100px'>Да</span></td>";
  }
  if($is_drop == 0) {
 $status = "<td class='sorting_1' tabindex='0' style='color:green'><span class='badge badge-danger' style='width:100px'>Нет</span></td>";   
  }
$edit = "<td class='sorting_1' tabindex='0' style='color:green' onclick="." select('$id')"."  data-toggle='modal' data-target='#editper'><span class='badge badge-warning'  style='width:100px'>Изменить</span></td>";

echo "<tr role='row' class='odd'>
<td class='sorting_1' tabindex='0'>$id</td>
<td class='sorting_1' tabindex='0'>$per%</td>
<td class='sorting_1' tabindex='0'>$chance%</td>
$status
$status_active
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
    <li><a href="https://vk.com/xater0" target="_blank">Создание сайтов Reio</a></li>
</ul>
</div>					
</div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->
</div><!-- .footer-bar -->
</div>
</div>
<!-- MODAL -->
    <div class="modal fade show infotbl" id="addper" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a class="modal-close" id="close-mod-add" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">
    <center><p>Добавление процента</p>
    <hr>
    
    <div class="input-item input-with-label input-bordered col-12" style='border:none; '><br>
    <p>Выпадает?
    <select class="input-bordered col-12" style='' id="per_drop">
      <option value="1">Да</option>
      <option value="0">Нет</option>
     
     </select></p><br>
      <p>Процент
<input type="text" class="input-bordered col-12" style='' id="percent" value="" placeholder="Введите процент"></p><br>
    <p>Шанс выпадения
<input type="text" class="input-bordered col-12" style='' id="chance" value="" placeholder="Введите шанс выпадения"></p><br>
     
    <span id="succes_creatper" style="color:gray;"></span>
    <span id="error_creatper" style="color:gray;"></span>
    <!-- КОНЕЦ -->
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:260px' onclick="addper()">Добавить процент</button> 
      </div>
</center>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>
      <!-- END MODAL -->
    
    <!-- MODAL -->
    <div class="modal fade show infotbl" id="editper" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a id="close-mod-add-edit" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">
    <center><p>Изменение настроек процента <span id='editperid' style='display:none'></span></p>
    <hr>
    
    <div class="input-item input-with-label input-bordered col-12" style='border:none; '><br>
    <p>Статус
    <select class="input-bordered col-12" style='' id="new_status">
      <option value="1">Активно</option>
      <option value="0">Неактивно</option>
     
     </select></p><br>
    <p>Выпадает?
    <select class="input-bordered col-12" style='' id="newper_drop">
      <option value="1">Да</option>
      <option value="0">Нет</option>
     
     </select></p><br>
      <p>Процент
<input type="text" class="input-bordered col-12" style='' id="newpercent" value="" placeholder="Введите процент"></p><br>
    <p>Шанс выпадения
<input type="text" class="input-bordered col-12" style='' id="newchance" value="" placeholder="Введите шанс выпадения"></p><br>
     
    <span id="succes_saveeditper" style="color:gray;"></span>
    <span id="error_saveeditper" style="color:gray;"></span>
    <!-- КОНЕЦ -->
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='' onclick="saveper()">Сохранить</button> 
    
      </div>
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
<script>
    function saveper() {
    $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
		$("#error_saveeditper").hide();     	 
										},	
                                                                                data: {
                                                                                    type: "saveeditper",
           																	id: $('#editperid').html(),
                                                                            newstatus: $('#new_status').val(),
                                                                            newdrop: $('#newper_drop').val(),
                                                                            newchance: $('#newchance').val(),
                                                                            newper: $('#newpercent').val()
                                 
           
                                                                                  },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                   
                $("#close-mod-add-edit").click();
                $("#per-tbl").load("percent.php #per-tbl");
                                            
                                                              
                                            }else{
               $("#error_saveeditper").show();     
               $("#error_saveeditper").html(obj.error);     
               $("#per-tbl").load("percent.php #per-tbl");
                                            }
                                        }   
   });
  }
    function select(id) {
   
    $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
			 
										},	
                                                                                data: {
                                                                                    type: "selectper",
           id: id
                                 
           
                                                                                  },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                $('#editperid').html(obj.id);                              
                $("#newpercent").val(obj.per);
                $("#newchance").val(obj.chance);
                //$("#newper_drop").val(obj.drop);
               // $("#new_status").val(obj.status);   
                //$("#close-mod-add").click();
                $("#per-tbl").load("percent.php #per-tbl");
                                            
                                                              
                                            }else{
               $("#error_creatper").html(obj.error);     
               $("#per-tbl").load("percent.php #per-tbl");
                                            }
                                        }   
   });
  }
    function addper() {
    $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
			 
										},	
                                                                                data: {
                                                                                    type: "addper",
           percent: $("#percent").val(),
           chance: $("#chance").val(),
           drop: $("#per_drop").val()                           
           
                                                                                  },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                $("#close-mod-add").click();
                $("#per-tbl").load("percent.php #per-tbl");
                                            
                                                              
                                            }else{
               $("#error_creatper").html(obj.error);     
               $("#per-tbl").load("percent.php #per-tbl");
                                            }
                                        }   
   });
  }
   function withdraw_adm(status) {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
			 
										},	
                                                                                data: {
                                                                                    type: "editstatus",
           id_edit: $("#editid").html(),
           status: status                                                                     },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                $("#close-mod").click();
                $("#withdraws-tbl").load("withdraws.php #withdraws-tbl");
                                            
                                                              
                                            }else{
               $("#withdraws-tbl").load("withdraws.php #withdraws-tbl");
                                            }
                                        }   
   });
  }
  </script>
 
<?php } else { header('Location: ../error404'); } ?>