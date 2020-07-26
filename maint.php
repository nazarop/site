<?php
require ("config.php");
session_start();
$site_access = $_GET['access'];
if($site_access != '') {
  $_SESSION['access'] = $site_access;
  header('Location: /');
}
$refer = $_GET['i'];
if($refer != '') {
  $_SESSION['ref'] = $refer;
  header('Location: /');
}
$sid = $_SESSION['hash'];

$selecter1 = "SELECT * FROM kot_user WHERE hash = '$sid'";
         $result4 = mysql_query($selecter1);
         $row = mysql_fetch_array($result4);
		 if($row)
		{	
          $login = $row['login'];
          $pass = $row['pass'];
          $balance = $row['balance'];
          $id = $row['id'];
          $social_link = $row['social'];
          $is_admin = $row['admin'];
          $is_ban = $row['ban'];
        }
if($social_link == '') {
  $social_link = "Не привязан";
}
$select_deps = "SELECT * FROM kot_payments WHERE user_id = '$id' ORDER BY id DESC";
$result_deps = mysql_query($select_deps);
$select_refs = "SELECT * FROM kot_user WHERE ref_id = '$id'";
$result_ref = mysql_query($select_refs);
$sql_select222 = "SELECT * FROM kot_withdraws WHERE user_id = '$id' ORDER BY id DESC";
$result2 = mysql_query($sql_select222);
$img = substr($login, 0, 2);
$img = strtoupper($img);// аватарка (не трогать)
if($is_ban == 1) {
  header('Location: /ban');
} 
if($_SESSION['login'] != 1) {
  header('Location: /login');
}
if($_SESSION['login'] == 1) {
if($login == '' || $pass == '') {
  header('Location: /complete');
}
}
?>
<?php 
  if(empty($_SESSION['access'])) {
    ?>
 
       <div style="background:#e0e8f3;width: 100%;height: 100vh;z-index: 55555;position: fixed;">

<div class="page-header page-header-kyc"><div class="container"><div class="row justify-content-center"><div class="col-lg-8 col-xl-7 text-center"><h1 class="page-title">Официальный сайт</h1>
<b style="font-size: 52px;">Game-cash.<span style="color:blue">fun</span></b><p class="large">Удачной игры</p>
<a class="btn btn-primary " href="/?access=1">Перейти на сайт</a>
</div>
</div>
</div>
      </div>
      </div>
      <?php } ?>
<!DOCTYPE html>

<html lang="ru" class="js">

<head>

   <meta name="yandex-verification" content="24b16affb97ea5f1" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
    .btn-primary.btn {
        background:#293133;
    }
        .swal-icon--error {
            border-color: #293133;
            -webkit-animation: animateErrorIcon .5s;
            animation: animateErrorIcon .5s
        }

        .swal-icon--error__x-mark {
            position: relative;
            display: block;
            -webkit-animation: animateXMark .5s;
            animation: animateXMark .5s
        }

        .swal-icon--error__line {
            position: absolute;
            height: 5px;
            width: 47px;
            background-color: #293133;
            display: block;
            top: 37px;
            border-radius: 2px
        }

        .swal-icon--error__line--left {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            left: 17px
        }

        .swal-icon--error__line--right {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            right: 16px
        }

        @-webkit-keyframes animateErrorIcon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }

            to {
                -webkit-transform: rotateX(0deg);
                transform: rotateX(0deg);
                opacity: 1
            }
        }

        @keyframes animateErrorIcon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }

            to {
                -webkit-transform: rotateX(0deg);
                transform: rotateX(0deg);
                opacity: 1
            }
        }

        @-webkit-keyframes animateXMark {
            0% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }

            50% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }

            80% {
                -webkit-transform: scale(1.15);
                transform: scale(1.15);
                margin-top: -6px
            }

            to {
                -webkit-transform: scale(1);
                transform: scale(1);
                margin-top: 0;
                opacity: 1
            }
        }

        @keyframes animateXMark {
            0% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }

            50% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }

            80% {
                -webkit-transform: scale(1.15);
                transform: scale(1.15);
                margin-top: -6px
            }

            to {
                -webkit-transform: scale(1);
                transform: scale(1);
                margin-top: 0;
                opacity: 1
            }
        }

        .swal-icon--warning {
            border-color: #293133;
            -webkit-animation: pulseWarning .75s infinite alternate;
            animation: pulseWarning .75s infinite alternate
        }

        .swal-icon--warning__body {
            width: 5px;
            height: 47px;
            top: 10px;
            border-radius: 2px;
            margin-left: -2px
        }

        .swal-icon--warning__body,
        .swal-icon--warning__dot {
            position: absolute;
            left: 50%;
            background-color: #293133
        }

        .swal-icon--warning__dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            margin-left: -4px;
            bottom: -11px
        }

        @-webkit-keyframes pulseWarning {
            0% {
                border-color: #293133
            }

            to {
                border-color: #293133
            }
        }

        @keyframes pulseWarning {
            0% {
                border-color: #293133
            }

            to {
                border-color: #293133
            }
        }

        .swal-icon--success {
            border-color: #293133
        }

        .swal-icon--success:after,
        .swal-icon--success:before {
            content: "";
            border-radius: 50%;
            position: absolute;
            width: 60px;
            height: 120px;
            background: #fff;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .swal-icon--success:before {
            border-radius: 120px 0 0 120px;
            top: -7px;
            left: -33px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 60px 60px;
            transform-origin: 60px 60px
        }

        .swal-icon--success:after {
            border-radius: 0 120px 120px 0;
            top: -11px;
            left: 30px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 0 60px;
            transform-origin: 0 60px;
            -webkit-animation: rotatePlaceholder 4.25s ease-in;
            animation: rotatePlaceholder 4.25s ease-in
        }

        .swal-icon--success__ring {
            width: 80px;
            height: 80px;
            border: 4px solid hsla(98, 55%, 69%, .2);
            border-radius: 50%;
            box-sizing: content-box;
            position: absolute;
            left: -4px;
            top: -4px;
            z-index: 2
        }

        .swal-icon--success__hide-corners {
            width: 5px;
            height: 90px;
            background-color: #fff;
            padding: 1px;
            position: absolute;
            left: 28px;
            top: 8px;
            z-index: 1;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .swal-icon--success__line {
            height: 5px;
            background-color: #293133;
            display: block;
            border-radius: 2px;
            position: absolute;
            z-index: 2
        }

        .swal-icon--success__line--tip {
            width: 25px;
            left: 14px;
            top: 46px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-animation: animateSuccessTip .75s;
            animation: animateSuccessTip .75s
        }

        .swal-icon--success__line--long {
            width: 47px;
            right: 8px;
            top: 38px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-animation: animateSuccessLong .75s;
            animation: animateSuccessLong .75s
        }

        @-webkit-keyframes rotatePlaceholder {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }

            to {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @keyframes rotatePlaceholder {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }

            to {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @-webkit-keyframes animateSuccessTip {
            0% {
                width: 0;
                left: 1px;
                top: 19px
            }

            54% {
                width: 0;
                left: 1px;
                top: 19px
            }

            70% {
                width: 50px;
                left: -8px;
                top: 37px
            }

            84% {
                width: 17px;
                left: 21px;
                top: 48px
            }

            to {
                width: 25px;
                left: 14px;
                top: 45px
            }
        }

        @keyframes animateSuccessTip {
            0% {
                width: 0;
                left: 1px;
                top: 19px
            }

            54% {
                width: 0;
                left: 1px;
                top: 19px
            }

            70% {
                width: 50px;
                left: -8px;
                top: 37px
            }

            84% {
                width: 17px;
                left: 21px;
                top: 48px
            }

            to {
                width: 25px;
                left: 14px;
                top: 45px
            }
        }

        @-webkit-keyframes animateSuccessLong {
            0% {
                width: 0;
                right: 46px;
                top: 54px
            }

            65% {
                width: 0;
                right: 46px;
                top: 54px
            }

            84% {
                width: 55px;
                right: 0;
                top: 35px
            }

            to {
                width: 47px;
                right: 8px;
                top: 38px
            }
        }

        @keyframes animateSuccessLong {
            0% {
                width: 0;
                right: 46px;
                top: 54px
            }

            65% {
                width: 0;
                right: 46px;
                top: 54px
            }

            84% {
                width: 55px;
                right: 0;
                top: 35px
            }

            to {
                width: 47px;
                right: 8px;
                top: 38px
            }
        }

        .swal-icon--info {
            border-color: #293133
        }

        .swal-icon--info:before {
            width: 5px;
            height: 29px;
            bottom: 17px;
            border-radius: 2px;
            margin-left: -2px
        }

        .swal-icon--info:after,
        .swal-icon--info:before {
            content: "";
            position: absolute;
            left: 50%;
            background-color: #293133
        }

        .swal-icon--info:after {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            margin-left: -3px;
            top: 19px
        }

        .swal-icon {
            width: 80px;
            height: 80px;
            border-width: 4px;
            border-style: solid;
            border-radius: 50%;
            padding: 0;
            position: relative;
            box-sizing: content-box;
            margin: 20px auto
        }

        .swal-icon:first-child {
            margin-top: 32px
        }

        .swal-icon--custom {
            width: auto;
            height: auto;
            max-width: 100%;
            border: none;
            border-radius: 0
        }

        .swal-icon img {
            max-width: 100%;
            max-height: 100%
        }

        .swal-title {
            color: rgba(0, 0, 0, .65);
            font-weight: 600;
            text-transform: none;
            position: relative;
            display: block;
            padding: 13px 16px;
            font-size: 27px;
            line-height: normal;
            text-align: center;
            margin-bottom: 0
        }

        .swal-title:first-child {
            margin-top: 26px
        }

        .swal-title:not(:first-child) {
            padding-bottom: 0
        }

        .swal-title:not(:last-child) {
            margin-bottom: 13px
        }

        .swal-text {
            font-size: 16px;
            position: relative;
            float: none;
            line-height: normal;
            vertical-align: top;
            text-align: left;
            display: inline-block;
            margin: 0;
            padding: 0 10px;
            font-weight: 400;
            color: rgba(0, 0, 0, .64);
            max-width: calc(100% - 20px);
            overflow-wrap: break-word;
            box-sizing: border-box
        }

        .swal-text:first-child {
            margin-top: 45px
        }

        .swal-text:last-child {
            margin-bottom: 45px
        }

        .swal-footer {
            text-align: right;
            padding-top: 13px;
            margin-top: 13px;
            padding: 13px 16px;
            border-radius: inherit;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .swal-button-container {
            margin: 5px;
            display: inline-block;
            position: relative
        }

        .swal-button {
            background-color: #293133;
            color: #fff;
            border: none;
            box-shadow: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 24px;
            margin: 0;
            cursor: pointer
        }

        .swal-button:not([disabled]):hover {
            background-color: #293133
        }

        .swal-button:active {
            background-color: #293133
        }

        .swal-button:focus {
            outline: none;
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(43, 114, 165, .29)
        }

        .swal-button[disabled] {
            opacity: .5;
            cursor: default
        }

        .swal-button::-moz-focus-inner {
            border: 0
        }

        .swal-button--cancel {
            color: #555;
            background-color: #293133
        }

        .swal-button--cancel:not([disabled]):hover {
            background-color: #293133
        }

        .swal-button--cancel:active {
            background-color: #293133
        }

        .swal-button--cancel:focus {
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(116, 136, 150, .29)
        }

        .swal-button--danger {
            background-color: #293133
        }

        .swal-button--danger:not([disabled]):hover {
            background-color: #293133
        }

        .swal-button--danger:active {
            background-color: #293133
        }

        .swal-button--danger:focus {
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(165, 43, 43, .29)
        }

        .swal-content {
            padding: 0 20px;
            margin-top: 20px;
            font-size: medium
        }

        .swal-content:last-child {
            margin-bottom: 20px
        }

        .swal-content__input,
        .swal-content__textarea {
            -webkit-appearance: none;
            background-color: #293133;
            border: none;
            font-size: 14px;
            display: block;
            box-sizing: border-box;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, .14);
            padding: 10px 13px;
            border-radius: 2px;
            transition: border-color .2s
        }

        .swal-content__input:focus,
        .swal-content__textarea:focus {
            outline: none;
            border-color: #293133
        }

        .swal-content__textarea {
            resize: vertical
        }

        .swal-button--loading {
            color: transparent
        }

        .swal-button--loading~.swal-button__loader {
            opacity: 1
        }

        .swal-button__loader {
            position: absolute;
            height: auto;
            width: 43px;
            z-index: 2;
            left: 50%;
            top: 50%;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            text-align: center;
            pointer-events: none;
            opacity: 0
        }

        .swal-button__loader div {
            display: inline-block;
            float: none;
            vertical-align: baseline;
            width: 9px;
            height: 9px;
            padding: 0;
            border: none;
            margin: 2px;
            opacity: .4;
            border-radius: 7px;
            background-color: hsla(0, 0%, 100%, .9);
            transition: background .2s;
            -webkit-animation: swal-loading-anim 1s infinite;
            animation: swal-loading-anim 1s infinite
        }

        .swal-button__loader div:nth-child(3n+2) {
            -webkit-animation-delay: .15s;
            animation-delay: .15s
        }

        .swal-button__loader div:nth-child(3n+3) {
            -webkit-animation-delay: .3s;
            animation-delay: .3s
        }

        @-webkit-keyframes swal-loading-anim {
            0% {
                opacity: .4
            }

            20% {
                opacity: .4
            }

            50% {
                opacity: 1
            }

            to {
                opacity: .4
            }
        }

        @keyframes swal-loading-anim {
            0% {
                opacity: .4
            }

            20% {
                opacity: .4
            }

            50% {
                opacity: 1
            }

            to {
                opacity: .4
            }
        }

        .swal-overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 0;
            overflow-y: auto;
            background-color: rgba(0, 0, 0, .4);
            z-index: 10000;
            pointer-events: none;
            opacity: 0;
            transition: opacity .3s
        }

        .swal-overlay:before {
            content: " ";
            display: inline-block;
            vertical-align: middle;
            height: 100%
        }

        .swal-overlay--show-modal {
            opacity: 1;
            pointer-events: auto
        }

        .swal-overlay--show-modal .swal-modal {
            opacity: 1;
            pointer-events: auto;
            box-sizing: border-box;
            -webkit-animation: showSweetAlert .3s;
            animation: showSweetAlert .3s;
            will-change: transform
        }

        .swal-modal {
            width: 478px;
            opacity: 0;
            pointer-events: none;
            background-color: #fff;
            text-align: center;
            border-radius: 5px;
            position: static;
            margin: 20px auto;
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            z-index: 10001;
            transition: opacity .2s, -webkit-transform .3s;
            transition: transform .3s, opacity .2s;
            transition: transform .3s, opacity .2s, -webkit-transform .3s
        }

        @media (max-width:500px) {
            .swal-modal {
                width: calc(100% - 20px)
            }
        }

        @-webkit-keyframes showSweetAlert {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            1% {
                -webkit-transform: scale(.5);
                transform: scale(.5)
            }

            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }

            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }

            to {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes showSweetAlert {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            1% {
                -webkit-transform: scale(.5);
                transform: scale(.5)
            }

            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }

            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }

            to {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }
        
        .circle-online {
  width :8px;
  height:8px;

  background: linear-gradient(to right, #0ACB90, #2BDE6D);
  border-radius:100%;
}
.pulse-online {
  animation :pulse 11s infinite;
  animation-duration: 4s;
}
@-webkit-keyframes pulse {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.6);
        }
        70% {
            -webkit-box-shadow: 0 0 0 10px rgba(10, 203, 144, 0);
        }
        100% {
            -webkit-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
        }
    }
    @keyframes pulse {
        0% {
  
            -moz-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.6);
            box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.5);
        }
        70% {
                 transform:rotateY(0deg); 

            -moz-box-shadow: 0 0 0 9px rgba(10, 203, 144, 0);
            box-shadow: 0 0 0 9px rgba(10, 203, 144, 0);
        }
        100% {
            -moz-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
            box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
        }
    }

    </style>
    <meta name="author" content="<?=$sitename?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$sitename?> - официальный сайт - сервис мгновенных игр</title>
    <meta name="description" content="<?=$sitename?> - Настоящий сайт Нвути. Все комиссии берем на себя, бонус при регистрации. Произведем выплаты за 24 часа на любую платежную систему."><!-- Fav Icon -->
    <link rel="shortcut icon" href="favicon.ico"><!-- Site Title  -->
    <!-- Vendor Bundle CSS -->
    <script src="https://kit.fontawesome.com/6cce539f85.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                              <script>
                              setTimeout(function() {
                              $('#userBalance').attr('myBalance', <?=$balance?>);
                                                                        updateBalance(0, <?=$balance?>); 
                              }, 1400);
                              </script>
    <link rel="stylesheet" href="../css/fa.css">
    <link rel="stylesheet" href="../css/ti.css">   
    <link rel="stylesheet" href="../css/vendor.bundle.css">
    <link rel="stylesheet" href="../css/loader-0.css">
    <link rel="stylesheet" href="../css/style.css" id="layoutstyle">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <link rel="stylesheet" href="../css/wnoty.css">
    <script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>
    <script src="../ajax/functions.js"></script>
    <script src="../ajax/wheel.js"></script>
    <script src="../ajax/func.js"></script>
    <script src="https://d3js.org/d3-path.v1.min.js"></script>
	<script src="https://d3js.org/d3-shape.v1.min.js"></script> 
	
    <script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>
<script>
    window.renderRecaptchas = function() {
        var recaptchas = document.querySelectorAll('.g-recaptcha');
        for (var i = 0; i < recaptchas.length; i++) {
            grecaptcha.render(recaptchas[i], {
                sitekey: recaptchas[i].getAttribute('data-sitekey')
            });
        }
    }
</script>
                
<script>    
 window.onerror = null;                              
$(function() {
  window.history.replaceState(null, null, window.location.pathname);
  

                $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));

            });
                              function bots() {
if(navigator.onLine) {
 $.ajax({
            url: 'bots.php',
            timeout: 10000,
            success: function(data) {
				var obj = jQuery.parseJSON(data);
                $("#response").prepend(obj.game);
				$('#response').children().slice(15).remove();
				
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('bots()',<?=$fake_interval?>);
                              function historys() {
if(navigator.onLine) {
 $.ajax({
            url: 'core.php',
            timeout: 10000,
            success: function(data) {
				var obj = jQuery.parseJSON(data);
                $("#response").prepend(obj.game);
				$('#response').children().slice(15).remove();
				$("#oe").html(obj.online);
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('historys()',300);
        
         function offliner() {
if(navigator.onLine) {
 $.ajax({
            url: 'offline.php',
            timeout: 10000,
            success: function(data) {
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('offliner()',3000);                     
            </script>
<style>

    /* Важное свойство */
    .chat {
    height: 430px;
    width: 110%;
    overflow: auto; /* Это позволяет отображать полосу прокрутки */
    position: relative; /* Это позволяет съезжать тексту в слое, не растягивая страницу */
    text-align: left;
background-color:White;
    
    }

    .chat div {
    position: absolute; /* Страница остаётся того же размера */
background-color:White;
    }

      .chat span {
background-color:White;
    display: block;
        position:relative;
    margin-top: -10px;
    }

    /* Для CSS 3 */
    .r4 {
background-color:White;
    
    }
</style>

</head>

<body class="page-user no-touch">

    <div class="topbar-wrap" style="padding-top: 0px;">
        <div class="topbar is-sticky">
            <div class="container">
                <div class="">
                    <style>
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

                    </style>
                    <ul class="topbar-nav d-lg-none">
                        <li class="topbar-nav-item relative" id="close-nav"><a class="toggle-nav">
                                <div class="toggle-icon"><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span></div>
                            </a></li>
                    </ul>
                    <center onclick="window.location.href='/'" class="desktop-nav" style="cursor:pointer;font-weight: 600;padding: 5px;color: #fff;font-size: 25px;"><?=$sitename?></center>
                </div>
            </div><!-- .container -->
        </div><!-- .topbar -->
        <div class="navbar">
            <div class="container">

                <div class="navbar-innr">

                    <ul class="navbar-menu des">
                         <li class="active"><a href="/"><span style="color:#000000">Главная</a></li>
                        <li><a href="/check.php"><span style="color:#000000">Честная игра</a></li>
                        <li><a href="/faq.php"><span style="color:#000000">FAQ</a></li>
                        <li><a href="/support.php"><span style="color:#000000">Контакты</a></li>
                        <li><a href="/withdraws.php"><span style="color:#000000">Выплаты</a></li>
                        <li><a href="/COVID2019.php"><span style="color:#000000">COVID-19 (коронавирус)</a></li>

                        <?php if($is_admin == 1) { ?>
                        
                        <li><a href="/admin"><span style="color:#000000">Админка</a></li>
                        <?php } ?>
                         <?php if($is_admin == 2) { ?>
                        
                        <li><a href="/sotr"><span style="color:#000000">Сотрудничество</a></li>
                        <?php } ?>
                         <?php if($is_admin == 3) { ?>
                        
                        <li><a href="/moder"><span style="color:#000000">Модерка</a></li>
                        <?php } ?>
                    </ul>

                    
                     
                    <ul class="navbar-menu mmmob">
                        <li class="has-dropdown page-links-all"><a class="drop-toggle" href="#"><span style="color:#000000">Страницы</a>
                            <ul class="navbar-dropdown" style="color: #293133;">
                                <li><a href="/"><span style="color:#000000">Главная</a></li>
                                <li><a href="/check.php"><span style="color:#000000">Честная игра</a></li>
                                <li><a href="/faq.php"><span style="color:#000000">FAQ</a></li>
                                <li><a href="/support.php"><span style="color:#000000">Контакты</a></li>
                                <li><a href="/withdraws.php"><span style="color:#000000">Выплаты</a></li>
                               
                               
                             
                            </ul>
                        </li>
                       
                        <li><a class="asff4" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#game').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');"><span style="color:blue">Список игр</a></li>
                        <li><a class="asff4" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#profile').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');"><span style="color:blue">Настройки</a></li>
                       <li><a class="asff4" onclick="location.href='<?=$site_support?>'"><span style="color:blue">Служба поддержки</a></li>
                       
                        <li><a class="asff4" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#ref').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');"><span style="color:blue">Мои рефералы</a></li>
                        <li><a class="asff4" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#bonus').show(); $(this).addClass('mfjkg'); $('#close-nav').trigger('click');"><span style="color:blue">Раздача</a></li>
                         <li><a class="asff4" onclick="location.href = '/COVID2019.php';"><span style="color:blue">COVID-19 (коронавирус)</a></li>
                        <?php if($is_admin == 1) { ?>
                        
                        <li><a class="asff4" onclick="location.href = '/admin';"><span style="color:blue">Админка</a></li>
                        
                        <?php } ?>
                         <?php if($is_admin == 2) { ?>
                        
                        <li><a class="asff4" onclick="location.href = '/sotr';"><span style="color:blue">Сотрудничество</a></li>
                        
                        <?php } ?>
                         <?php if($is_admin == 3) { ?>
                        
                        <li><a class="asff4" onclick="location.href = '/moder';"><span style="color:blue">Модерка</a></li>
                        
                        <?php } ?>
                        
                        
                        
                        <li><a class="asff4" onclick="exit();location.href = '';"><span style="color:blue">Выйти</a></li>
                        
                        
                    </ul>
                    
                    
                    
                    <ul class="navbar-btns">
                        <li><a href="<?=$group?>" target="_blank" class="btn btn-sm btn-outline btn-light"><em style="color:blue;" class="fab fa-vk"></em><span><span style="color:blue">Вконтакте</span></a></li>
                    </ul>
                </div><!-- .navbar-innr -->
            </div><!-- .container -->
        </div><!-- .navbar -->
    </div><!-- .topbar-wrap -->
<script>

    $(function() {
        
        $.ajax({
            type: 'POST',
            url: 'action.php',
            data: {
                type: 'newMes',
                sid: Cookies.get('sid')
                
            },
            success: function(data) {
             var obj = jQuery.parseJSON(data);
                if ('success' in obj) {
                    $('.new-mes').show();
                }
            }
        });
        
        
        
        
        updateProfit();
                $(window).scroll(function(){
                  var docscroll=$(document).scrollTop();
                  if(docscroll>$(window).height()){
                    $('token-statistics').css({'height': $('nav').height(),'width': $('nav').width()}).addClass('fixed');
                  }else{
                    $('token-statistics').removeClass('fixed');
                  }
                });
               //changeTowerAmount();
                    
            });
        </script>
        <div class="card-block" style="display:none">
                                                <div class="card-text">
                                                    <h1><?=$sitename?></h1>
                                                   <p>Если вы не знаете, чем заняться сегодня вечером, то рекомендуем вам обратить внимание на <b>онлайн игру <?=$sitename?></b>. Интернет сервис <?=$sitename?> представляет собой состязание с выбором суммы и шанса победы. Здесь не только увлекательные развлечения, но и множество преимуществ.</p>
                                                    <h2><?=$sitename?> - мобильная версия</h2>
                                                    <p>Глобальный прогресс не стоит на месте и сегодня есть у каждого возможность играть в нвути онлайн с мобильных устройств. Наш настоящий сайт v полностью адаптивен к вашим гаджетам. Официальный сайт становится доступен вне дома, будь-то работа, школа или парк.</p>
                                                    <p>Другими словами, сервис Нвути предлагает своим пользователям играть с мобильных устройств, причем для этого не нужно скачивать и устанавливать на свой телефон дополнительные приложения.</p>
                                                    
                                                    <h3>Играть на официальном сайте нвути в полном объёме честно</h3>
                                                    
                                                    <p>Так как в начале каждой игры виден хеш-код игры, благодаря ему не составит труда проверить сражение нвути. Вкладывая средства, вы можете быть уверены в том, что администрация сайта не выдает вам фальшивые данные, поскольку разработчики nvuti каждый день совершенствуют систему.</p>

                                                    <h3>Игра базируется на бонусах</h3>

                                                    <p>Если выпадает символ разброса, то начисляется стартовый бонус nvuti. Это означает, что игрок получает возможность <b>играть без депозита</b>.</p> 
                                                    <p>При этом на счет начисляются настоящие деньги, следовательно пользователь может поэкспериментировать с разнообразными стратегиями. Мы постоянно предоставляет различные бонусы и настоящие раздачи денег, которые дают шанс выиграть приз - Джек-пот.</p>

                                                    <h3>Делитесь с друзьями ссылкой нвути</h3>
                                                    <p>Приглашайте друзей выиграть денежный куш, сидя дома на диване или кресле, где вас ничего не отвлекает. Продвинутая реферальная система начисляет 10% за каждый депозит. Для этого проделайте один легкий шаг - отправьте ему ссылку на <b>сайт Нвути бест</b> или разместите в социальных сетях, форумах.</p>
                                                    <p>На подлинном сайте поддерживается более 20 видов оплаты, таких как: QIWI, WebMoney, VISA, MasterCard, Dash, Bitcoin, Payeer и многие другие. Посетители мгновенных игр часто задаются вопросом: «А какая у вас комиссия при пополнении?» Мы с радостью отвечаем, что на сайте <b>nvuti</b> никогда не было и не будет издержек.</p>
                                                    <p>По всем вопросам, связанным с регистрацией, можно проконсультироваться со службой онлайн-техподдержки, доступной в любое время.</p>
                                                    
                                                    <h4>Быстрые выплаты на настоящем сайте <?=$sitename?></h4>
                                                    <p>Программисты нашего официального сайта тащтельно слядет за игрой нвути. Благодаря им, вывод осуществляется за считанные минуты на любую платежную систему электронных денег.</p>
                                                    <p>Хотим заметить, что выплата возможна только на кошелек с которого был пополнен баланс на сайте нвути. Это одна из мер безопасности сайта <?=$sitename?> для защиты вашего баланса аккаунта от мошенников.</p>

                                                </div>
                                            </div>
<div class="page-content">
    <div class="container">
        <div class="row">
                                    <div class="aside sidebar-right col-lg-3 ">
<a href="#000000" data-toggle="modal" data-target="#promo" class="btn btn-info btn-xl btn-between w-100 mgb-1-5x"><span style="color:blue">Активировать промокод <em class="ti ti-arrow-right"></em></a>
                                <div class="token-statistics card card-token height-auto ">
                    <div class="card-innr">
                        <div class="token-balance">


                            <div class="token-balance token-balance-with-icon mobile" style="margin-bottom: 0px;">
                                <div class="token-balance-text">
                                    <h6 class="card-sub-title"><?=$login?></h6>



                                    <span style="    color: #fff;font-weight: 500;font-size: 1.6em;line-height: 1;letter-spacing: -0.02em;" mybalanceMob="0.00" class="odometer" id="userBalanceMob">
                                        <?=$balance?></span>
                                </div>
                                <div style="margin:0 auto;">
                                    <span style="font-size: 13px;" class="btn btn-xs btn-primary btn-auto" data-toggle="modal" data-target="#modalDeposit" onclick="getNowDeposits()"><span style="color:#000000">Пополнить</span>
                                    <span style="font-size: 13px;" class="btn btn-xs btn-primary btn-auto" data-toggle="modal" data-target="#withdraw" onclick="getLasterMyWithdraws()"><span style="color:#000000">Вывести</span>
                                </div>


                            </div>




                            <div class="token-balance token-balance-with-icon kjfwf">
                                <div style="
    height: 50px;" class="token-balance-icon">
                                    <div class="user-photo" style="font-size:20px">
                                        <?=$img?>                                    </div>
                                </div>
                                <div class="token-balance-text">
                                    <h6 class="card-sub-title">
                                        <?=$login?>                                    </h6>



                                    <span style="    color: #fff;font-weight: 500;font-size: 1.6em;line-height: 1;letter-spacing: -0.02em;" mybalance="0.00" class="odometer" id="userBalance"></span>
                                </div>


                            </div>
                            <div class="kjfwf" style="margin:0 auto;"> <span style="font-size: 13px;" class="btn btn-xs btn-primary btn-auto" data-toggle="modal" data-target="#modalDeposit" onclick="getNowDeposits()"><span style="color:#000000">Пополнить </span>
                                <span style="font-size: 13px;" class="btn btn-xs btn-primary btn-auto" data-toggle="modal" data-target="#withdraw" onclick="getLasterMyWithdraws()"><span style="color:#000000">Вывести</span>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="token-sales card mrnr">
                    <div class="card-innr">
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12 ativemenu">
                                <a class="asff4 font-mid text-dark mfjkg" style="cursor:pointer" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#game').show(); $(this).addClass('mfjkg'); "><span style="color:blue"><span style="color:#000000">Список игр</a>
                            </div>
                        </div>
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12">
                                <a class="asff4 font-mid text-dark" style="cursor:pointer" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#profile').show(); $(this).addClass('mfjkg'); "><span style="color:blue"><span style="color:#000000">Настройки аккаунта</a>
                            </div>
                        </div>
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12">
                                <a class="asff4 font-mid text-dark" style="cursor:pointer" onclick="location.href='<?=$site_support?>'"><span style="color:blue"><span style="color:#000000">Служба поддержки</a>
                                <div class="new-mes" style="position: absolute;height: 14px;width: 14px;border-radius: 50%;border: 2px solid #fff;background: #2c80ff;content: '';top: 5px;right: 0px; display:none"> </div>
                            </div>
                        </div>
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12">
                                <a class="asff4 font-mid text-dark" style="cursor:pointer" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#ref').show(); $(this).addClass('mfjkg'); "><span style="color:blue"><span style="color:#000000">Мои рефералы</a>
                            </div>
                        </div>
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12">
                                <div class="asff4 font-mid text-dark" style="cursor:pointer;" onclick="$('.asff4').removeClass('mfjkg');$('.main-content').hide();$('#bonus').show(); $(this).addClass('mfjkg'); "><span style="color:blue"><span style="color:#000000">Раздача</div>
                            </div>
                        </div>
                        <div class="token-rate-wrap row">
                            <div class="token-rate col-md-6 col-lg-12">
                               
                        
                                <div class="font-mid text-dark" style="cursor:pointer" onclick="exit(); location.href = ''"><span style="color:blue"><span style="color:#000000">Выход</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div><!-- .col -->

                           <style>
            @media (min-width: 768px) {
    .modal-dialog-md {
        min-width: 700px!important;
    }
            }
            .chat-wrap {
 position:relative;
 display:flex;
 height:calc(100vh - 265px);
 overflow:hidden
}
.chat-wrap .dropdown-content {
 box-shadow:0px 0 35px 0px rgba(0,0,0,0.05)
}
.chat-wrap .dropdown-content-top-left {
 top:0
}
.chat-wrap .simplebar-track,
.chat-wrap .simplebar-scrollbar {
 visibility:hidden !important
}
.chat-wrap .simplebar-content {
 display:flex;
 flex-direction:column
}
.chat-wrap .simplebar-scroll-content {
 padding-right:0 !important;
 margin-bottom:0 !important
}
.chat-wrap:after {
 position:absolute;
 top:0;
 left:0;
 bottom:0;
 right:0;
 content:'';
 background:rgba(0,0,0,0.3);
 visibility:hidden;
 opacity:0;
 transition:all .4s
}
.chat-wrap.contact-active:after,
.chat-wrap.information-active:after {
 opacity:1;
 visibility:visible
}
.chat-avatar {
 flex-shrink:0
}
.chat-avatar img {
 width:36px;
 border-radius:6px;
 border:2px solid #fff
}
.chat-avatar-xs img {
 width:18px
}
.chat-avatar-sm img {
 width:24px
}
.chat-avatar-lg img {
 width:40px
}
.chat-avatar.circle img {
 border-radius:50%
}
.chat-avatar-group {
 position:relative;
 border-radius:6px;
 overflow:hidden;
 border:2px solid #fff
}
.circle>.chat-avatar-group {
 border-radius:50%
}
.chat-avatar-group:before,
.chat-avatar-group:after {
 position:absolute;
 content:'';
 background-color:#fff;
 left:50%;
 z-index:1
}
.chat-avatar-group:before {
 height:100%;
 width:1px
}
.chat-avatar-group:after {
 top:50%;
 width:50%;
 height:1px
}
.chat-avatar-group img {
 border-radius:0 !important;
 border:none
}
.chat-avatar-group img:not(:first-child) {
 position:absolute;
 width:20px;
 right:0
}
.chat-avatar-group img:nth-child(2) {
 top:0
}
.chat-avatar-group img:nth-child(3) {
 bottom:0
}
.chat-name {
 margin-bottom:0;
 font-weight:500;
 font-size:14px;
 color:#495463
}
.chat-status {
 position:relative
}
.chat-status:after {
 position:absolute;
 height:10px;
 width:10px;
 border-radius:50%;
 top:-5px;
 right:-5px;
 border:2px solid #fff;
 content:'';
 background:#293133
}
.chat-status-idle:after {
 background:#293133
}
.chat-status-active:after {
 background:#293133
}
.chat-status.circle:after {
 top:2px;
 right:2px
}
.chat-time {
 font-size:12px;
 color:#293133
}
.chat-time .icon {
 font-size:11px;
 color:#293133
}
.chat-time .icon:not(:first-of-type) {
 margin-left:-5px
}
.chat-time .icon+span {
 margin-left:2px
}
.chat-time span+.icon:first-of-type {
 margin-left:5px
}
.chat-seen .icon {
 color:#293133
}
.chat-lock .icon {
 color:#293133;
 margin-right:10px
}
.chat-attachment {
 position:relative;
 max-width:130px;
 overflow:hidden
}
.chat-attachment:first-child {
 border-radius:4px 0 0 0
}
.self .chat-attachment:first-child {
 border-radius:0 4px 0 0
}
.chat-attachment:last-child {
 border-radius:0 4px 4px 0
}
.self .chat-attachment:last-child {
 border-radius:4px 0 0 4px
}
.chat-attachment:before {
 position:absolute;
 top:0;
 bottom:0;
 left:0;
 right:0;
 background:#293133;
 content:'';
 opacity:.4;
 transition:all .4s
}
.self .chat-attachment:before {
 opacity:.7;
 background:#293133
}
.chat-attachment:hover:before {
 opacity:0.6
}
.self .chat-attachment:hover:before {
 opacity:.9
}
.chat-attachment-caption {
 position:absolute;
 left:0;
 right:0;
 bottom:0;
 color:#fff;
 padding:7px 15px;
 font-size:13px;
 opacity:1;
 transition:all .4s
}
.chat-attachment-download {
 position:absolute;
 top:50%;
 left:50%;
 transform:translate(-50%, -50%);
 opacity:0;
 transition:all .4s;
 color:#fff;
 width:32px;
 line-height:32px;
 background:rgba(255,255,255,0.2);
 text-align:center
}
.chat-attachment-download:hover {
 color:#293133;
 background:#fff
}
.self .chat-attachment-download:hover {
 color:#293133
}
.chat-attachment:hover .chat-attachment-caption {
 opacity:0
}
.chat-attachment:hover .chat-attachment-download {
 opacity:1
}
.chat-attachment-list {
 display:flex;
 margin:-5px
}
.chat-attachment-list li {
 width:33.33%;
 padding:5px
}
.chat-attachment-item {
 border:5px solid rgba(230,239,251,0.5);
 height:100%;
 min-height:60px;
 text-align:center;
 font-size:30px;
 display:flex;
 align-items:center;
 justify-content:center
}
.chat-users {
 display:none;
 align-items:center
}
.chat-users>* {
 padding:0 10px
}
.chat-users-stack {
 display:flex;
 flex-direction:row-reverse
}
.chat-users-stack .chat-avatar:not(:first-child) {
 margin-right:-12px
}
.chat-users-search {
 display:flex;
 margin:-5px
}
.chat-users-search>div {
 padding:5px
}
.chat-users-add {
 position:relative
}
.chat-contacts {
 position:absolute;
 left:-100%;
 top:0;
 width:350px;
 max-width:85%;
 flex-shrink:0;
 transition:all .4s;
 z-index:1;
 background:#fff;
 height:100%
}
.chat-contacts.active {
 left:0
}
.chat-contacts-tools {
 padding:20px;
 position:relative;
 overflow:hidden
}
.chat-contacts-tools-long {
 transition:all .4s
}
.chat-contacts-tools-short {
 transition:all .4s;
 position:absolute;
 top:20px;
 opacity:0
}
.chat-contacts-heading {
 background:#293133;
 padding:5px 20px;
 display:flex;
 align-items:center;
 justify-content:space-between
}
.chat-contacts-heading .toggle-tigger {
 color:#293133;
 position:relative;
 top:2px
}
.chat-contacts-title {
 font-size:0.8rem;
 font-weight:500;
 letter-spacing:0.1em;
 margin-bottom:0;
 text-transform:uppercase;
 white-space:nowrap
}
.chat-contacts-title span {
 color:#293133
}
.chat-contacts-list {
 height:100%;
 width:350px;
 max-width:100%
}
.chat-contacts-wrap {
 height:calc(100% - 117px);
 overflow:hidden;
 position:relative
}
.chat-contacts-wrap:after {
 position:absolute;
 left:0;
 right:0;
 bottom:0;
 height:20px;
 content:'';
 background:linear-gradient(180deg, rgba(255,255,255,0) 0%, #fff 100%)
}
.chat-contacts-wrap .simplebar-content {
 padding-bottom:0 !important
}
.chat-contacts-item {
 display:flex;
 align-items:center;
 padding:8px 20px;
 min-height:96px;
 transition:background .4s
}
.chat-contacts-item:not(:last-child) {
 border-bottom:1px solid #293133
}
.chat-contacts-item:hover,
.chat-contacts-item.current,
.chat-contacts-item.active {
 background:#293133
}
.chat-contacts-item.unseen p {
 font-weight:500;
 color:#293133
}
.chat-contacts-content {
 padding-left:10px;
 transition:all .4s
}
.chat-contacts-content .chat-name {
 margin-bottom:3px
}
.chat-contacts-content p {
 color:#293133;
 font-size:12px;
 line-height:1.34;
 max-width:85%;
 margin-bottom:0;
 overflow:hidden;
 height:18px
}
.chat-contacts-badges {
 display:flex;
 align-items:center;
 margin:0 -3px;
 margin-bottom:2px
}
.chat-contacts-badges li {
 padding:0 3px;
 display:inline-flex
}
.chat-contacts-info {
 justify-content:space-between;
 align-items:center
}
.chat-contacts-texts {
 position:relative
}
.chat-contacts-texts .badge {
 position:absolute;
 right:0;
 top:50%;
 transform:translateY(-50%)
}
.chat-messages {
 display:flex;
 flex-direction:column;
 flex-grow:1
}
.chat-messages-head {
 position:relative;
 padding:14px 12px;
 display:flex;
 align-items:center;
 justify-content:space-between;
 border-bottom:1px solid #293133
}
.chat-messages-name {
 font-weight:500;
 display:inline-flex;
 align-items:center
}
.chat-messages-name .icon {
 margin-left:7px
}
.chat-messages-name-ellipsis {
 width:80px;
 display:inline-block;
 white-space:nowrap;
 overflow:hidden;
 text-overflow:ellipsis
}
.chat-messages-tools {
 display:flex
}
.chat-messages-tools>li {
 padding:0 0;
 display:inline-flex
}
.chat-messages-tools>li>a {
 display:inline-flex;
 color:#495463;
 border-radius:50%;
 padding:7px
}
.chat-messages-tools>li>a.active {
 color:#293133
}
.chat-messages-tools>li>a.show-information.active {
 color:#293133;
 background:#293133
}
.chat-messages-search {
 position:absolute;
 top:100%;
 left:30px;
 right:30px;
 bottom:-20px;
 z-index:4;
 padding:10px 0 0 0;
 margin-top:1px;
 background:#fff;
 opacity:0;
 visibility:hidden;
 transition:all .4s
}
.chat-messages-search.active {
 transform:translateY(10px);
 opacity:1;
 visibility:visible
}
.chat-messages-body {
 height:calc(100% - 165px)
}
.chat-messages-body .simplebar-content {
 padding-top:15px;
 padding-bottom:15px
}
.chat-messages-list {
 padding:15px 12px 0
}
.chat-messages-item {
 display:flex;
 align-items:flex-end;
 padding:5px 0
}
.chat-messages-item.self {
 flex-direction:row-reverse
}
.chat-messages-sap {
 position:relative;
 width:70%;
 text-align:center;
 margin-left:auto;
 margin-right:auto;
 padding:5px 0
}
.chat-messages-sap span {
 display:inline-block;
 padding:0 20px;
 background:#fff;
 position:relative;
 z-index:5;
 color:#293133;
 font-size:13px
}
.chat-messages-sap:before {
 position:absolute;
 top:50%;
 height:1px;
 left:0;
 right:0;
 background:#293133;
 content:'';
 transform:translateY(-50%)
}
.chat-messages-content {
 margin:0;
 flex-grow:1
}
.chat-messages-bubble {
 position:relative;
 padding:16px 20px;
 background:#293133;
 margin:4px 0;
 display:inline-block;
 border-radius:4px
}
.chat-messages-body .chat-messages-bubble {
 border-radius:4px 4px 4px 0;
 clear:both;
 float:left
}
.chat-messages-body .self .chat-messages-bubble {
 text-align:right;
 float:right;
 background:#293133;
 color:#fff;
 border-radius:4px 4px 0 4px
}
.chat-messages-bubble p {
 margin-bottom:8px
}
.chat-messages-bubble p:last-of-type {
 margin-bottom:0
}
.chat-messages-bubble:hover .chat-messages-actions {
 opacity:1
}
.chat-messages-attachments {
 padding:4px 0;
 display:flex;
 width:100%;
 margin:0 -1px
}
.chat-messages-attachments>div {
 margin:0 1px
}
.self .chat-messages-attachments {
 flex-direction:row-reverse
}
.chat-messages-actions {
 position:absolute;
 left:100%;
 top:50%;
 transform:translateY(-50%);
 opacity:0;
 transition:all .4s;
 z-index:2
}
.self .chat-messages-actions {
 left:auto;
 right:100%
}
.chat-messages-actions>a {
 padding:0 20px;
 color:#293133
}
.chat-messages-actions>a:hover {
 color:#293133
}
.chat-messages-badges {
 padding:4px 0 2px;
 display:flex;
 margin:0 -5px
}
.chat-messages-badges>div,
.chat-messages-badges>li {
 padding:0 5px
}
.chat-messages-info {
 display:flex;
 margin:0 -8px;
 padding-top:2px;
 clear:both;
 flex-wrap:wrap
}
.self .chat-messages-info {
 flex-direction:row-reverse
}
.chat-messages-info li {
 font-size:12px;
 padding:0 8px;
 position:relative
}
.chat-messages-info li:not(:last-child):after {
 position:absolute;
 right:0;
 top:50%;
 content:'';
 height:4px;
 width:4px;
 background:#d2dde9;
 border-radius:50%;
 transform:translate(50%, -50%)
}
.self .chat-messages-info li:not(:last-child):after {
 right:auto;
 left:0;
 transform:translate(-50%, -50%)
}
.chat-messages-info li a {
 color:#293133
}
.chat-messages-info li a:hover {
 color:#293133
}
.chat-messages-info-name {
 width:100%
}
.chat-messages-info-name:after {
 display:none
}
.chat-messages-field {
 padding:0 12px 12px;
 margin-top:auto;
 display:flex;
 align-items:center
}
.chat-messages-field .toggle-mobile-content {
 bottom:100%;
 left:50%;
 transform:translateX(-50%)
}
.chat-messages-input {
 position:relative;
 flex-grow:1;
 margin-right:8px
}
.chat-messages-insert {
 margin:0 -10px;
 padding:0 5px;
 background:#fff
}
.chat-messages-insert li {
 padding:8px 10px
}
.chat-messages-icon {
 display:inline-flex
}
.chat-messages-icon a {
 display:inline-flex
}
.chat-information {
 width:350px;
 max-width:100%;
 padding:0 30px;
 flex-shrink:0;
 height:100%;
 overflow-y:scroll
}
.chat-information-wrap {
 position:absolute;
 right:-100%;
 top:0;
 transition:all .4s;
 width:350px;
 max-width:85%;
 height:100%;
 overflow:hidden;
 flex-shrink:0;
 background:#fff;
 z-index:1;
 padding:25px 0
}
.chat-information-wrap.active {
 right:0
}
.chat-information .accordion-content {
 padding-right:0 !important
}
.chat-information .accordion-heading {
 text-transform:uppercase;
 color:#293133;
 font-size:13px;
 font-weight:500;
 margin-bottom:16px;
 letter-spacing:0.03em
}
.chat-information .accordion-heading span {
 color:#758698;
 display:inline-block;
 margin-left:4px
}
.chat-details-item {
 margin-bottom:15px
}
.chat-details-title {
 font-weight:12px;
 color:#293133;
 margin-bottom:8px
}
.chat-details-info {
 display:flex;
 align-items:center
}
.chat-details-info .chat-name {
 margin-left:8px
}
.chat-details-drop {
 margin-left:auto;
 position:relative;
 display:inline-flex
}
.chat-details-drop>a {
 display:inline-flex;
 color:#758698
}
.chat-details-drop .dropdown-content {
 top:-5px
}
.chat-member-list {
 margin-left:-10px;
 margin-right:-10px;
 height:165px;
 margin-top:15px
}
.chat-member-item {
 position:relative;
 display:flex;
 align-items:center;
 padding:4px 10px
}
.chat-member-item .chat-name {
 margin-left:5px;
 color:#758698
}
.chat-member-item>* {
 position:relative;
 z-index:1
}
.chat-member-item:before {
 position:absolute;
 content:'';
 background:rgba(230,239,251,0.5);
 top:0;
 bottom:0;
 left:0;
 right:0;
 z-index:0;
 opacity:0;
 transition:all .4s
}
.chat-member-item:hover:before,
.chat-member-item:hover .chat-member-action {
 opacity:1
}
.chat-member-item:hover .chat-name {
 color:#293133
}
.chat-member-action,
.chat-member-position {
 margin-left:auto
}
.chat-member-action {
 position:relative;
 opacity:0;
 transition:all .4s
}
.chat-member-action a {
 position:relative;
 color:#293133;
 top:2px
}
.chat-member-action .dropdown-content {
 margin-top:-3px
}
.chat-member-position {
 color:#293133;
 font-size:11px
}
.chat-add-short {
 position:absolute;
 top:20px;
 left:20px;
 opacity:0;
 transition:all .4s
}
.btn-long {
 display:none
}
@media (min-width: 480px) {
 .chat-contacts-info {
  display:flex
 }
 .chat-contacts-content p {
  max-width:75%;
  height:auto
 }
 .btn-short {
  display:none
 }
 .btn-long {
  display:block
 }
}
@media (min-width: 576px) {
 .chat-messages-head {
  padding:14px 30px
 }
 .chat-messages-list {
  padding:15px 30px 0
 }
 .chat-messages-name-ellipsis {
  width:auto;
  max-width:220px
 }
 .chat-messages-info-name {
  width:auto
 }
 .chat-messages-info-name:after {
  display:block
 }
 .chat-messages-body .chat-messages-bubble {
  max-width:85%
 }
 .chat-messages-input {
  margin-right:20px
 }
 .chat-messages-field {
  padding:0 30px 30px
 }
 .chat-messages-field .toggle-mobile-content {
  transform:translateX(0)
 }
 .chat-messages-insert {
  display:flex
 }
}
@media (min-width: 992px) {
 .chat-wrap {
  overflow:visible
 }
 .chat-wrap:after {
  display:none !important
 }
 .chat-contacts {
  position:static
 }
 .chat-contacts.short {
  width:80px
 }
 .chat-contacts-list {
  min-width:350px
 }
 .chat-contacts-tools-long {
  opacity:1
 }
 .short .chat-contacts-tools-long {
  opacity:0
 }
 .chat-contacts-tools-short {
  opacity:0
 }
 .short .chat-contacts-tools-short {
  opacity:1
 }
 .chat-contacts-heading {
  justify-content:space-between
 }
 .short .chat-contacts-heading {
  justify-content:center
 }
 .short .chat-contacts-title {
  display:none
 }
 .short .chat-contacts-content {
  opacity:0
 }
 .chat-users {
  margin:0 -10px
 }
 .chat-users-search {
  transition:all .4s
 }
 .short .chat-users-search {
  opacity:0
 }
 .short .chat-add-short {
  opacity:1
 }
 .chat-information {
  min-width:350px
 }
 .chat-information-wrap {
  position:static;
  width:0;
  right:0
 }
 .chat-information-wrap.active {
  width:350px
 }
 .chat-users {
  display:flex
 }
 .chat-messages {
  border-left:1px solid #293133;
  border-right:1px solid #293133
 }
 .chat-messages-icon {
  display:none
 }
}
.timeline {
 position:relative;
 padding:15px 0
}
.timeline-wrap {
 position:relative;
 overflow:hidden;
 height:100%;
 min-height:300px
}
.timeline-wrap .timeline-innr {
 overflow-x:hidden;
 height:100%;
 position:absolute;
 padding-right:20px;
 padding-bottom:30px
}
.timeline-wrap.loaded .timeline-innr {
 padding-bottom:0
}

                .mobile{
                        display: none;
                    }
                    .desProfit{
                        display: block;
                    }
                    .mobileProfit {
                        display: none;
                    }
                    .heded{
                       height:210px
                    }
                    
                @media (max-width: 576px) {
                    .mobile{
                        display: flex;
                    }
                    .heded{
                       height: 120px
                    }
                   .mrnr{
                       display: none
                   }
                    
                    .hbetf{
                       display: none
                   }
                    .mobileProfit {
                        padding-top: 20px;
                        display: block;
                    }
                    .desProfit {
                        display: none;
                    }
                    .kjfwf {
                        display: none;
                    }
                }
                    
                    .mfjkg{
                        color:#2c80ff!important;
                        cursor:default;
                    }
                .asff4 {
                    color:#2c80ff;
                }
                </style>

            <style>


        .loader-support {
  --path: #293133;
  --dot: #293133;
  --duration: 3s;
  width: 44px;
  height: 44px;
  position: relative;
}
.loader-support:before {
  content: '';
  width: 6px;
  height: 6px;
  border-radius: 50%;
  position: absolute;
  display: block;
  background: var(--dot);
  top: 37px;
  left: 19px;
  -webkit-transform: translate(-18px, -18px);
          transform: translate(-18px, -18px);
  -webkit-animation: dotRect var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
          animation: dotRect var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
}
.loader-support svg {
  display: block;
  width: 100%;
  height: 100%;
}
.loader-support svg rect,
.loader-support svg polygon,
.loader-support svg circle {
  fill: none;
  stroke: var(--path);
  stroke-width: 6px;
  stroke-linejoin: round;
  stroke-linecap: round;
}
.loader-support svg polygon {
  stroke-dasharray: 145 76 145 76;
  stroke-dashoffset: 0;
  -webkit-animation: pathTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
          animation: pathTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
}
.loader-support svg rect {
  stroke-dasharray: 192 64 192 64;
  stroke-dashoffset: 0;
  -webkit-animation: pathRect 3s cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
          animation: pathRect 3s cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
}
.loader-support svg circle {
  stroke-dasharray: 150 50 150 50;
  stroke-dashoffset: 75;
  -webkit-animation: pathCircle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
          animation: pathCircle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
}


@-webkit-keyframes pathRect {
  25% {
    stroke-dashoffset: 64;
  }
  50% {
    stroke-dashoffset: 128;
  }
  75% {
    stroke-dashoffset: 192;
  }
  100% {
    stroke-dashoffset: 256;
  }
}

@keyframes pathRect {
  25% {
    stroke-dashoffset: 64;
  }
  50% {
    stroke-dashoffset: 128;
  }
  75% {
    stroke-dashoffset: 192;
  }
  100% {
    stroke-dashoffset: 256;
  }
}
@-webkit-keyframes dotRect {
  25% {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  50% {
    -webkit-transform: translate(18px, -18px);
            transform: translate(18px, -18px);
  }
  75% {
    -webkit-transform: translate(0, -36px);
            transform: translate(0, -36px);
  }
  100% {
    -webkit-transform: translate(-18px, -18px);
            transform: translate(-18px, -18px);
  }
}
@keyframes dotRect {
  25% {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  50% {
    -webkit-transform: translate(18px, -18px);
            transform: translate(18px, -18px);
  }
  75% {
    -webkit-transform: translate(0, -36px);
            transform: translate(0, -36px);
  }
  100% {
    -webkit-transform: translate(-18px, -18px);
            transform: translate(-18px, -18px);
  }
}
@-webkit-keyframes pathCircle {
  25% {
    stroke-dashoffset: 125;
  }
  50% {
    stroke-dashoffset: 175;
  }
  75% {
    stroke-dashoffset: 225;
  }
  100% {
    stroke-dashoffset: 275;
  }
}
@keyframes pathCircle {
  25% {
    stroke-dashoffset: 125;
  }
  50% {
    stroke-dashoffset: 175;
  }
  75% {
    stroke-dashoffset: 225;
  }
  100% {
    stroke-dashoffset: 275;
  }
}
.loader-support {
  display: inline-block;
  margin: 0 16px;
}
    
    
    </style>

            <style>
                .mobile{
                        display: none;
                    }
                    . desProfit{
                        display: block;
                    }
                    .mobileProfit {
                        display: none;
                    }
                    .heded{
                       height:210px
                    }
                    
                @media (max-width: 576px) {
                    .mobile{
                        display: flex;
                    }
                    .heded{
                       height: 120px
                    }
                   .mrnr{
                       display: none
                   }
                    
                    .hbetf{
                       display: none
                   }
                    .mobileProfit {
                        padding-top: 20px;
                        display: block;
                    }
                    .desProfit {
                        display: none;
                    }
                    .kjfwf {
                        display: none;
                    }
                }
                    
                    .mfjkg{
                        color:#293133!important;cursor:default;
                    }
                
                </style>

            <div class="main-content col-lg-9" id="game">



                <div class="content-area card">

                    <div class="card-innr">
                        <div class="card-head has-aside">
                            <h4 class="card-title"><span style="color:#000000">Режим игры</h4>
                        </div>
                        <style>
                            .avatar_in_roll
                        
                        </style>


                         <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#dice-game"><img style="width:140px; height:75px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAaQAAAFYCAMAAAArwnhlAAAA+VBMVEUAAAD/0gD/4FP/2y//0gD/4FX/3Dj/////0QD/2zj/31L/3kv/3D7/2S3/2jL/3Uf/3UP/2Cr/30//2jX/3EH/1ADkpRz/++f/8a7/5nn/4V7/6IT/0wf/4Vv/1Q//42b/5nL/1xv/5Gr/5W7///z/1RX/6Hz/+Nz/2CP//Oz/4Vj//vb/+uL/98//7Zz//fL4yAb/87r/7JH/1yHrshT/9MH/8KTnqxf/4mP/8Kn/8rX/9cj0wAvqryLmqSH/6or5zzrwug/7zQT71Ef2yDXyvyzvxWj45r7uuCjnrC3qt0jsvFX70SrxzoD67tL24bH4yijz1ZL23aJ8+pGHAAAAB3RSTlMAYMdgx8dgYGqG3gAAHXlJREFUeNrsnNFu2zAMRYcBA5aQqVRVj0aGPAQI+rb1//9tatKAaSLTokwVtcWbFuj7wZWOSac/fltqMxw2wCWkn9Fs009Zfv0wSLXZ7xzwCTylrUFqm+GEUJDAZRsMUsMcn6AwAbgiBYPUKMNzLEYUYF6TXg1STZIrSMIhsjupSfbPXoYIgGFkdkdRFG4HskwddnbcUbSE2wE4ISQwu/uqDG/oEiMnZwQMI4OkKtzuGqDM1jubOGgKNyGSQ2KLZHeSSg4v7jYATs3u7E7SEu7PiAiShjrYc5KKcN8HnFKR6MQzSHOE27tMQJrAmUPRpWSQGOHOBSr0DmyfRNEV7nxASClwfmdjoXrhRscEAGzioB25cHOB86/ecWf7pBrh9o5J7cABrEmKwj2NqG7kYM9JWsLtneco1U8cuCpZk8qFe+NTihipGDjF7qRS4fbnNMJkd5KGcHuKm4r+PsnGQlM5UIkymPQelMD2SdXCjQ+EGkAK3LLC7qQJ4fb3cSV3EkgxTY/BDdKIcEefjVNTcIqJQ7Vw5yMokhYlE4e8cFONKi4lEHYpBGuSKPsTxsgwKpNwYextIZlwx8QnjjIq8gaooQQwcwz+sw9ISbhjChWJoaRfJJvdFQl3/Ah/3Lk247tRUNtgz0lX4cYbRJ4oVZ538smQNWlSuOPneCb6Iwde72x2l3Lcxbt4/loiSKoLdJs4jAs3lYi5ksRzIZDF9kmccCNixEhRsjs5JmbC2nOTknC/J1sk9qwjTC0HrMSo2ztpOLxgyhgmXu+cdpX4fVKnCp5KRIQww8izD0q+xZsodifdCTcSI8Qcpak7yasfd7yEd3YnHXdIIW2Q+F2T1xxMHG6EGx8To7RKvoSS7ZMqhTuLCEV3ktfdJ9HkzsQhucIGc4nCJrlSu1N8nO2jSSTcOUp5RjHWe4POPokIhbD6fRIJ92MEEwdKiyJ1vU9Kwj2FKN+lAm/4Xl8kW2yTSLg5TN9CwTt9746Em02MDUYOikXarlgcMsLN6J1wn+TV90nQ3z4pI9ySO8kLVrN64gA9PScNh6dNClJq7iTuuPvq18FX16T9s4QQJkI5TEyP2r3U1cmANQn3Ofj+mYhonyR/UHKq31AKq4F03F35yE67rDnMu5PkXepi6bc/XSp0CaYwnKb3SbyEt3DwcUwrGQsNh90VEX585oqDnykOKohIHMLSm3RxhTOY2085JRRQardPgvXuky7CTb5wDkoY5RDJvaHFP/ikO2nRTfooEQWvpEoRtdrMShM4UAu2u+Ht5ZEPkt8JRg4Sv3PO6/vdSvdJSbgpj5xwnjhwaTIWWuHEYX8aJUR/iYqk/6px3/ukJNwZQrekZHInRtRA7ji/2y5PwTMlIj7EqGrkQBHsk9o/KC3sO7Mk3NkQJdGMNRt+n9Tki2Svf8bXfmEpTSLhnm4SYrmFy3azrpmB//s7UqTF2B2VSKlJxEgqeI2aBP+5O9eutIEgDH+cEggQIEERkUsgohCEcrMq1vbU3q///8c0pCkD2eySvYTSvNrTczjHfujjO/PuzBKGo/97LNTV4xHiSeE4Yj2GbJct1Wzo/b8D1sYlnlp5OMVUhf8dSsUk3qHkAryiWOnYexIGbi5CUhmcXe6S2ic5AP3/cunnmSiui3ZJ8XSl6AwutU8S+OyXNgBE17ujLndrEyGihJxUOZa3zc7A0yyS0fEGh4bhmajMpMSeDUnukyqH3Ce1XQd8DR81AtGxnpO8wF32lYlNKSd4luVtST6josJ9ktZ7VQXU9exMI/dJx1fuukY5UKYs4KRg78cRwrkgKb7UdTXY8EFOIUxHFxwaL/NlFBcfdBJfbsjJ7JPkMZ2OR7CtwW2TZFQ6Hid5WQEBcVCS2ij9+zG49nhnB4SceTuRfVJdVxi4SURlAUI8ueEoZg7Z5cBH5BMiJR/BSxPlJkJxMEJOXOsKipEq4hFc6APQXTwnJRHBbwdKAne+nJdBROQ7uX0SZ72TPyjVAKBKvy4k6aT6CMrki5yBOx+BiPechJR47+zz7ZP8P+q3FQ7AnLZPkoZ0CjAzQq/pLk/gzvsqizqJ9BLPWIiCqHKgRzmgXLCXyeyTWr0BrHVX2/HOWT9+4EZECEkME1LiuiApsE8qJrBPWsKQcR1coie15kHEt8fa9usOVOJlhTyKYCQwcRDJ4LR7d3IDVpF694hY1A5Y69kxgLNs7LyYB5jECNz5XZUpmDLc+S7hdyjFiHciV1EmWolU7rLbeFmQnt21AAqhlx4BqrFNhD7KCxkJER1qn5TQE42jEHXNtepF6Qg+G4Wz3AAAMszAnY8SyUikJ+FJKS4lqX1Skp+AfmkGunkte5ht34ZeqICnSUwTISLJ2CC+T5KasMoj0iheKnTNjaYPr+Wc1NV2IVw5fpQ4azECN4mIyknISeL7pMM/J8DtRD4DqtAwUfeWhZhkp+D10i2OdGftVlTgplEqR0k+3am/Ham4KQ3maCQKI/PG8vTwVsUUvDAfwY7s2UWDKHMcmDKiTuJpSsmcZmNj6oET3I7MUhmZbyxfrxU4qRiGBMNeAwM3VapGDvjFt0+S2M3KO+kOoEbkhqzPCPXC+qO3KvZJ9drY3hByznQ00V4pmjggJ8lzUkXGSHGzQ20yBICBG8bUQj7oJE/vFC39Ws2+X+ncMhG4hYxUVuGkI30w4dzelJydTZJuUiCtlG1mS+DJpZiIMzlwMCJIST25Bjkl+YEV5/41IftucrVtpJwZ1o2F9Y6jJ2G5JLW2UiUI3MiIi5J8ApeKdwfcJ43BXgY3jbEhhXWPkJhOIhFRObkA/XXg1teKi4hyThKcC+W4Fug8B6WC4gV6E4ahgcOlSehJFhLJKQfgdo01oPW3mJOwJ/Eywp2S5Bi8kmQCR1Unu08Hz5ikpmFIzck+SDcIKRpTFTr6WhyMVO2T0EnikBARDZPKTxVxtQBRFotdWIswpJO7fT1p8WRGaXNqNeajfMAoz8YUZ59UTvY2uNA5SeXEoRT8hcmOmhsQUv/6iu2kJ2tqRss/tXpszsd6ICQkiolLBCWJ56lJrWazos+dzpooMjdYwWKpB3DGhORhXZg0Xeq+cn8RcdS7cuSyQqwnJRru4nhJBFAWUwOtJT0ETO4Ahsxyt/6JGyqlhqHvKs+BCUVEB04feZLcJ7GshFL9+YvFyAK1MdIHzdPZuA+eqrcdqpP8NDg16WohIK5wFykhQjhdTegqimonYU96Sal2OBZyr2Ejx42GFPSwGwalxi4l4eMsDsKTv3v3r5/xWfrDqWDSqh3mhs5JH3zZw8kyutwFP7B4YTL0EhlxIJIdg4vvk3JHcMnBt5JhoojBHY7uzjxM1cdzWnDYOG9qstQlKIlVvMPsk3IRiJhD1hiIxB4UYLKr3Qct0BxgQk93C+uv7pmUGojI+z7QGFzk/ZgVzne/YL5T35SyummyTrK49LsA1jnJQt0wKdWDlCc5YOXtSIH4MFUiJTIWQgk5qWEyT7JWdgPFmWksSKg3bErZi71qx9OFltsPqLTs0NXsNMXVudoLqtY8lVXv9LS9x0gfEMr8TGOVO9RiD6VXoEz2XY9NaF6FBDUatxmIOuMRKFGPZiRyBL5k7ZOerPiUzBNQKOeczsi9hqQ1K1EoaTNQpRY7f69KMW8LvbF4KN2CQl03aZ1oBgfQ4Dwy39UGoErDPUZ6p8WDVG897FK6YVMaK6VUi4b0Cg4iJ7tNKMBUUscIHtkdafU2FqTGS0P/goTiJHFH6S9zJKMeHEivIpyk8hekSD8joZHYkOotwzB03XgXovTEpHTZB4V6jCp2VTiQ7CXRki5shYWibhLaDmpv90LqXhqefEwPIUpT5oQoq7TiZEg14WC6JTZKKpvuzCT1RBiJDqllBNK9ry8ry+JoTHNQqCwJ6QQOpgFR7QagTi4zNazcfe+q8PAgJWxLWPIYZmqoLHhtEtIQDia7sDFSwAkUqsksdl+HJaaTwpD0H5bFYaY2qFOPhDSAw+kqdBHlChSqwCp2H/sDbT8kpGQgpVhmaoxAmc5ISFU4nM5DyaEGCqWTxQ71C6oan5MiKS2oYXySMki+kdRDMog1EuqTHQsS2ohGyZpSap6WMkjFZCC16A1p9Q3iQEIjBV76soqNKZ8+SMVi4pCmFuonAH+58yk9WDEx6amDlEhPKlIZfbJ5IW0oGR+sKC3uwxGinTpIHiX1kC5ojD46wO0kFE6Iwnba5pTvpw3SGlFROaT5Vj/yGKHegw+J65yEmLDkkZzuA1AvvowgbZA8Sgk4yW5tsvfCCjUkPicZQXLAkkfXYjqdLqyvkD5IxSR6EtwGNrq3tvUM3JDQSJkgiz9YTH0cpRBSwbOSekhw4hWfN/eLXUb2BlIpLiTM4G47MNPzigXpPaQQUjJOgupnBISMuJ2ko5UGJ4GlTpxnOqNnSCGkAqY7xXr/mcKIsycFjK5glA8gef/2J1qx66cRkk8pEUi7/5WrX4AS6UkuwMUGEhXTd4A0QiLKXSKYPn8DlEi6Wy+t78oICZ0aLnaphEQEB+WYVp+xmwuck3SjfDqz/a38uFneQAJwvn4MFbsqAKQSUkJOQiIONiOhcmecjrZ+9AIhAdjfnz9uMfLtmlJI6KTEJOIkzA2Z0/E1eBqdtPOBk1Dffj5/Wq2ngl8d8JRSSJjukpKkk/SgJzkZ7EkhXW/cmk5I/mn20JBK8SEFlFyADqY7qlIK6Td7Z9fSVhBF0ccZ1HxdhNg0xo/GRE2MmKJUfej//1eNSrtTBPHclZ1OuTni87qwODNn9hEsvJN+p0J7adZurKROt+hOav15Ks2fWo2V1O38H53UWpw2WNJrLxU73WmfdNhurqTXw67c4259n9RcSa+eCj7uXhQ1XlJn9Vt0J/XCnZQ/XddEEqdH7iR1kpEdlyRHO0nqJAMbDA6ytJP0cuBtv5P2qp2k4HHXKfu4291Jb71U8HHX2g0OjjvJkIKbJA2IJE6P3UnqJCtbnVTFBoeeSdITlcTpPAXnbJ7dGTvpckwkcXpwn9SVJAOb7pOCkqqPaj+rljhx4HTeSZzNO2nDsdCjvnR0SyRxekiSOsnABp2k2WGDktr61FOQ3RnoYLrDbL5PkiUu6S6rpkQSp4N9kpetd1IFBgdQXX1pRVJwP12SZGlgY/PEQa1EJd1k1T2RxOlgn4TZBawqPqhrfWkrIUmcHr2T1EkGNpW0wTtpnlULKonTg/skSfKzecBau871pRczIMlAB9MdZfOAVa3EJV0N9amThCT56ZKkZhpsgS1JoX3Sxt5JE33psI8kcXr0uNOd5GbruKv+wXE3u9CnHiciidPDnaQUnLMdx92mBodlVt0ASQY6upM4m6/PN/VOGn/Xlx4kLonTg/skHXdetvZJFdwnxeshqx65JE4HKThmlxqwrgWMZ2MiidPjkrRPMrDJZlap0DtJMGD8mbAkTo+P4JJkZetOArEQDhiHVwZJgA72SZDNjzvVO0ksYDxPVBKng+yOscFxZx/Br7NqiiRZ6XyfxNlKHLa8T5pm1X5CkjgdHHeM3UlvVeg+6Tyr7pgkL50v/Thb7yQwOLCAsZeYJEonnUTZhk6SJtpJk6xaQEmUTjvJz1YnVQFJtJPWA8bRzCAJ0MN/sM/ZZe6Tlll1mqAkSI9LkqaBi833SS+/SNL4LKvmVBKm134nSZKTreNOkuLHHQoY9xKXxOlkn+Rn6zFbbe8x28qqZyyJ00l252druiP7JBIwthOWhOhAkvZJgO16J/XoPukwqx64JETnneRn651U1Q9YQcB4NuaSCJ12EmN7Bwd5qiFpL6u+JoMkQI/+SRdnl7lPmubAOgVIAnQQC3E2Txwkqrakk6z6kQySAD2WOKwkYXaZ+6SrYVbduCVxOo+FOFv7JDyCxwPGbjJIAnRw3AXZh8nWSarakm5HWXXkl8TpfLrjbL2TKhYLxQPGy7FbEqfzTuJsJQ64k+IB4zIZJAF6bJ+kTrKz1Ukwu4sHjKNbmyRO5wErZ/PBoSdJNQPGb8kgCdDBPsnN1j6p8u+TnvJaTQ2SYnT6TpIkwLbFQqufWp10kFVVMknidD7dcTa/k2oODs95re7tkjidZ3ecLUl0nxQPGFvJIAnQeSdxNn8n8X3SNK/VwiAJ0NE7yc/W0q8KBKx1JJ1k1cXMIMlKlyTVgLDjkj453anikvrDrJokgyRAB3eSnS1J/oD1S1YN+wZJYTq/kwC7yH3SXwHjcXJK4nS+T+Js/k6KJw79o7WaGyQBOkoc/GzFQqvfwHHXa/R/fdFxFy/USVUoBW/2v+ZhktzvJCnqNV7S6lLadVLpkrbfSdL0ucFhdydpcADlfSftjrtf7JvbUuJAEIZvtmoyJJwmZjwhgmRR5CC4nEEQPOFarrX7/g+ziSw2JCE7nRQDIt/orTdf/d1NN8qXFGEWu3KHXwvJA78WiiZ3SVrDdIfqSbsk2Wz+dLdL0hqShOtJu42DpUj+CI69JyWTX13SOsrdLkmbLwm3Fkp+hSSZpXKj26xUmp2DRsncgJ6E24Jv+8ah0L0+i18YC2TVYe9y7eUOmpLYdJfcSklm7/oE9DhIZbWFyWGjk7St96RC5yRt+JPd+zyfk7ZQUrGZMARI762zJzFEkrZvLVQ+TRtiZD9NkqLRrZruGglDnMSMze5JW1buehhF0fVIgo0DE5W0TZ+TimcGgnQvtTZJX/ee1LgwMLTJ3Xo3Dgx1T5qJ6hB55KmLEgnFgYGjS/7AdHdJ5FGCe1KAJF0TeZxRF2USho6BIn1qkqsh+7BE5FFmFsjpDkRliDxU6iJUtS0bCFInXZPYmI1jdWqpRKTRnfUkFmS6oyaRxTl1kyEhSKAksUqB2FzV8vGpJIml/hi/YJ1vSl0iiyF1o4WYHAoGimqLv5iEHMY/yl3bJJLYjwS5JwFxk8ihRL3Ih0gmSlGdWzyRp4e5HWuNSGI4DRKi3DnOFXkiheIJ9SR4kt9SKEU2j+RxkgCYpK5UYwxR7sCR7AGvmKPeaA0SkOeRIYTSb/F/PO/zm4WvOUix1IvMFDHsPQnIFciqOb+kS6kUSSBeeF/EUJ3P8cLtJIGmSIOsmmKTTcHv7hYs6cMyWSFmL69TnS6FNQOND6+c16v+VW7U4k7u55NkkatdkRWyf9BmIMlTkxr95ilppgigkTZwiuTMj9OIplP7+aG2c0JkMrnMjDtuUe+PDS/G1VGde3Dj+J9Mm6P3v3lov7Dk33/zMzJHDPD8oMRoVlFAkutYgSIWjQmie0FBEg6Nasu45VNa9VG/OlYUu7gp42q1P6pDgJyOtHlH8f+jxlUUTGU+OBVpP1KKApJcipJIRSAJ7wmSJIJm/cy/pXBx3gbgCKEJJGE0qWKOEknbEEhy4ePD/SBIwZOk4+IDz0fSDRfl2XzkFhOHozhoWuoIL8kT5z1JjaYVC5CEqHex0PVOt14oTdqCJb8wTbgor+SN88F9wolAuQtQ73w92bDYdwVYVu58elLM+1n2BB15Vzuq6yFz5OaBi/KLFAcPECPhIAXIkX+1sy3RrAJ4SgJROHDlzuUJFOFM+Wq654L8tI9ZrhRBT1p5uQNPexcpBQjYk2LLnjC6R5QCdyT/+W7Axfj9/m0VALIkd76LJ6ERCZQ7fJLERelhZwex6Q6GcH8Gk1t7o2JGvCyJzHdAKEvqX+rNZrWNIAjCRzFkfwZ2DrEvEvHJOD/4kIMSDHuQwO//RNn1JhSzjEZTXRmv3JINPn/UdHV1G42oTEmtRUmFTUnyDXDg6EkuQ+mawXs5j+Hh97IivPPrKkPUc4jSjNCICCW19ZoSIMkv3gIsV+NrBtCpCV+Ojztc8h9iRMQ0KzWlZWYthYSilUS8dsmmxE+zYJSv0/lljef1fBqbEO6P61Dw8fM+FpLPE7IYhxUnzKwkJJuS2k2m2aaoxtPfGic6/2r/a53v/3g+RFqqbRt6zKyoSu7u7YvinQPGJLoruaawQhOmb1z+YRITnru7PkZEUCJBwSpYIbVVhZTyDs743jXLbwJTXN4Hv/+5GIcDbxwmQDYtxVZBeO5IKVmEhOIQcToCokTNLOZH7ylhwetEDjMlzKwUJF1KesbKK2kBVsYoRcm//RwxzMZ1HZGlLfloZlV6EtWWWESdZhwid6cpyc9S2iMWot87VkpoRNsoqRX2STDhlJKWP0RMwX/dPX0iGNnjOzQiHVKWUUpIAGTdVTAysikJ5i4mNNX33XOS0f/dJ2Fm1SChLPvzVqDkKEz4MPYuKaT5c4/Xjk1YS+0d1Yj0npRsSWIu5KAlihMMHickMFq09K33hLmjM4fMzKopSR2U+GXFwDx3/Cx7qSfNBUZ0DF5gFYhGxCmJCsJFRLANdL6qvHbwdyiLcbhiFdCIdEh6U9LHWQunupS8RCmeWXVI+kapVRg5QCLzVW1S8h6M1H0SbxV0JdW7cki+eBQjkOKaUjoYEt+7ZLWYWWtBspwLdZK9E14756TwLsOp78uSIWFmVSDpiQN/42DboDdKxIqGlC6iIdEzq+7u+N2svk8yXUdSCeslLSm+IQYV0IjqQyJP9olxdkDmIGACJT1iVZQERPHMuvlz1xnTO1BSD1FiQk5x4LB35n1Sf2Vmva05yRyDw4TzOuIWf8nKKckX7ZPimfUWlHQhvJMcuLPfdKFMPcmLFny2CsLMKuyTaCWxmFR350BJ2ifpkxI5s263T+qE80gwqp0KhfQGXZISuWf9MPuktHVwUsYq7JMEeyc2Il1J7KCk3xnLeQN/ioK8gReS0oh0SAiGyHUSI6RODIaifZJzgnXwMyg2Bidm1qrZ3UdRkniIkkWUtuC+KDy91TlJ3ScN9a+6GnmfRMys9ecki5RabZh1wzvuk3DkQCSsjgpP6yup4jW43pRAqk7ggIqsQmkj2r4ntXIMrm7PG/s+qaH3SZJVqN+T6Bhc+9/mwXppTJRRSP5Pe9eW2jAMBFsMAYGtIpQL9K//uf/dagRBBD+i2fHGK8nqA9rfYbQzO6sNUYh08yT4jZIn35EJX80iE/tAnpQVHupZFUHiiTQxk8YO34qCawdBnuQYz3reIIo3sF9ofPlyQMsBQelnnAuRgbMDEuaUvP5QF59WZOVQUJXus2e1cbZ9UlBkkqefKI1Oks3ex+JsdpYKZs5R6g6BKUHkWekgmbwrZZJ7nF+IAOEAMIk0Smg0C6u7PLK/n1UYKUSleVIARxy4PGk+BEpcomQYod3rTrN154k9rEuMAIjeDBpPhgqRWp7ExBVOuAXKjdQ8eA4r4q+pQqTBJAIi6u0LJRwyRBY8q3qelKWDeMenMPdLf3APK0wWouI8KZRzic6TIpYniXTDGkZ2PKuASay6w/OkKHazTizvvNlCBHQcACaRbSFINwj7QvfX+86YZ7XVcTh2C1T6hfPIGS9EGyDxW/b5IQdihhWxSmMwX4jKOg4Ek+gt+3juh3TBjXpWEZMCziTgumMhEuVJ849dz/qBPCl94xDxWQVilNxfNYWIHuk6PU8anUCBW/es+yCBF56n1V0k1d1CgRegZN+zikDCV94B0mGj4xB11F0VnlWUJ4VA9u5wmCRu9q10qMWzEm0hgEnzVylAB+4X2keoIs8q6zhsNliBmkTkSfyNV5dnJXySjrpbO0d/EkJtnlXqkyAmpV9UUYK2R2ak1q68Cj2rUN0FiElHzbDi+zba8Kyy6w5iUqYRUZRkNSlh1pRUAJiEqzs/cS0HGZdcG56V6jgsATo/T3pilLt39XtWECT802YV1m0ATGrDs0pA0vRJkWqxLrPZBguRgk/K/6W3BOBJhWvDs6Ig4VMOHnmBHo+Y2X8i1GghUmGS7rzQ8vSCkLQmbeZJJJNcxDjUmGfV7zikf34wT3JNSwWASWCexBulcoha9Ky28qS8hxUXd90UIiJPYtUdP7MfH91cc2XCAfdJ5K7cqxBJatIOUHyehDTCO/CsMpA08yR4hnXqrBAheRLOJGpm/5IKgjwpYOoOeUhWrBtiJ571Mx2HhBC19O6SCuh1hzglMK6I21v241WIzDBpHaZLKhwJknqe5PvzrABI7EZjToS72FN7uxyk4cxzG26LM3xf5+UMX/+PqE+9JlVtGAAAAABJRU5ErkJggg==" title="Nvuti"><a class="nav-link active" data-toggle="tab" href="#dice-game"></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#battle"><img style="width:140px; height:75px" src="https://im0-tub-ru.yandex.net/i?id=d7d499646e3b02037c5edc8e3e13b7c2-l&n=13 title="Battle"><a class="nav-link" data-toggle="tab" href="#battle"></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#crash"><img style="width:140px; height:75px" src="https://im0-tub-ru.yandex.net/i?id=12b746785255b2f4066bb4e0b3c7cdd7-l&n=13 title="crash"><a class="nav-link" data-toggle="tab" href="#crash"></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#mines"><img style="width:140px; height:75px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAaQAAAFYCAMAAAArwnhlAAACiFBMVEUAaP8AAAAAZf8AZ/8adP8AZf8GWtv///+l/3payjCG7V+R7VrHIxaj9WwUcf/rSygObf/J/7ARbv8Kav8FW+EEXelBgeMFXef1nXYHaf8DYfACY/gBY/sCYPMEXuvi/tH6dk3T+sT/11F54lHX5fnr/+Fgzjb5//Yeat9dzDP6/P+Y8nEWZd2m9nBm0jre6vud8nvB/6Or/oILXdzO/7b7//r2/vOm9XmT7lwncOC2/pOo+Htjzzvx/evG/6zw9v6UuO+CrO3p++Jo0z7z/u99qOz2+f/D/qeO7mjo8P4RYtyg9HR3petPiubl/9i59py595Sl84c1S2aK7mTT4fiGr+3e/8+t94lt1kRq0kPOKxqWv/+Pte+x/oriQCJPlP/M3ffX/8O6/JrE2PZtnurL+bCR8Gx62FeLsu7s++bF+Ky++p+e8W7n/d3h99nd99PX9c3Q+riL62Rx1Exrpf/t/+VHheTZ/snR9cPT/77D+KSv9ZSz+I6h93aK3Wr+8Oji+9il5oya4n6T4HXI3v+vzv//9fNck+f7rpiW8GLtVzXsUS7W5v96rv8sf/+80/U5fOLzno2G5V7WMx271f8hef+oxfK06Z/takvtXz2Ftf9dnf//+/e1zvShwPH6y8C89aaa8Wr5gFqkyP+wy/P82dH70sn5wbOv+IHykn77e0/VPixCjf+bvfD94NqM6lj8j043hv/H87e97Kuv6Jj0k23te2ZSRFdlmen1tqn8lHP1hWaB41j+tE9z20r+5+D9pH+B22DhYU7YTDj/6Z3/4nu7Zlj/yFD8oU//7r/9vKfJl5f/5YlYaoF7R0vf3tSfqre9KB7w2LP/7rKVoK6qm1qIfVqqVDkYieK/AAAABHRSTlNgAMdKmgd4ngAAFWtJREFUeNrs3N1PUnEcx/Fq4KdzWkysdD2ti0zUIkyFIoPKzCiDcrCyLbbKxnpcTyt1kSu7cF7FuvGu2daFN60tu+iitfWfdfjx8OV4yEHji/3a930jMseA174/zjlyzga39I+3aaMg/fMJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgYJkgathbStzdPI2lrdtlob/PDb3LZ2dWxvZDv2uu21eVwNzdP2N0geV6PzuKmdvA+/d3tLo+twV7TTxdDOepDIiO9tVL+zPfweMmpcO9yUi6V6kVpdHLXyPnx5xeto4Wg3rXUultpqQ2J+Gh77nLK9yO0tHO3iWWYoT21I3E+Dc7mgF7mnhaUOWu2YqhPJVeq/QQqf/pTqrK3Jz3FBWgekCx96UU+pnCC5qKYgdadQZ6PzgkQ1BWkSGL4UM52N39/qzJ8dBnpzgkQ1AemiZdS133R2MOpdJhwqcwUIDAgSxY40cB6+E8aESfWZquQ5rzfqrzJKZvIuMC9IFDvSbWDOMHrIKDn8Uv285bU64lR6ZZpXgZQgUdxIAwEEuwzD2F+eo2HgnmlBeFW3HEj5T6+7QFyQKGak28Abw4rWu/Hgo5hl5S2WXmV01LR6CUwKEsWERIOELsOqx4yVlJasW7FoCSm6bEcaU38TAdoFiWJF+p4fJNXTabOi+yWjwecjQ47VTo3SJ0GiWJECwAlDteLLkFG2ZHTTByT89tVONQKEBYliRJoHvhmqOeB1acGjD6QE8j2xb9upLgGfBYliROosDtLsNKwiS4VhykSLS90ICl0mpBJkMoTebkHiRKJBWjTy/foKq9DXPvX+H/GqrgRRzFfeeLhqmjRKpwSpCUip/CDRcpcxVccLY3QA1D4/IdEojXYLEjtSXA1SsZXQrKkaV0YzoUqj0j6tP2aWWwKuCxI70g3gTBnp2eJE4bCqMtoHKjRj3VFY8LImlfRh9JAgMSPFgRWDOqGO38XO5Ze6CKgDg4ptmTbAaZTuCBIz0jvgmlHZj+Jh1Zs+IgpOFfeXIn5rtUtWIsWCODkgSKxIF3oxbdiaKBxWfQgqMljeX9q3deuQaeseEBckVqR2YM6O1JPsUztHVEIRqdVvZDBbOG5HjQN3BIkfyd77KO0cWfluKqOpYJFrOWlH6gOuCxIrUhh4vLBwzGrLl2IL/enjVLpfpe5StzJd9n4BpwWJDUkVAB5ssZfevFaHDXuPgHZB4kU6Czz/aEe6upbRQcPeLNApm+DMSAOTQMSudCxd+yC9BZATJEYkVXfAoZStYZDI6LYcFuJFIqUaR+mMzWgOwHc5Cs6NREo1jdKY00j+6UcxIjmVjvX/AenaKqPeefmOA8WCREqdwEil0lANg/QmbyRf6aIYkUjpQcUoVUeaWGUUl2+wUtxIpESjdNxp9MpuNBqXsyoodiRSok+lxMxag/TNMnoh5ydR/EhOpQfPgamqg0RGcqafi2JHIqVQWWkskti8qp+VRifb5ZzZZiM5lc6l/zhIi5ZRTk5sbjqSU2mh2iCRkVwioOlIdHYzKfVXH6SeFeB8Tq7jsC5IpDRGo1RlkPJGYbnYRvORqEMpwDdWZZSGKuYoLFdEWT8kUnKO0v6yUSAsl635zd5d/joNhXEcf8P2Y8NdB8UulyHDCTp0MAjuDBgaXEJwCMN9uDvDggYIEiy4u/87PD1lPTO6bpyGNvT74uby5oaTz9Ou693t+ZdIXCntUFKMrstG9rOF/jkSV0o8lOpwI/sBUCZA4koJhxIzWgzULbSf0mUKJEWpDSGdjBvdV43sR6mZBMnZaBxT4ofSb6Mhhfbz7kyDxJRatVEPpftkNJeMGtkPJTQRkqqkHEqK0bhG9pMjTYUUV2KH0i5XARlNbGQ/3tNkSHEl+VByFcwho972M1hNh/RbaSYdSLLR9t72g3JNiKQo9W9edORsMmphP83YlEhMiZwAHG1hP3LapEjO3vvA6tzCos8F/z8e3r7htM+3b6HuzSrMhmTJbRBK/2fbIJQrYkTlDN1QhO9tU8NpRNXNtqGIMVvzGPvjyxq7NU9V023NY8S0lDV2COhkZ6RSVRNuckX/kdJlRVa6iqE/vpwjOU+NShXEVaNqdVNuF2dnlmwkC2QjJXR43drQXof5spF460D5tzlMl42kNh+sPQ7TZSOx5q8N7vEBDzceAU5tDawNO8yUjSQXgtJdaSOU5jtMlI1EHYZSRJJiUAqUdZgnG4k6BTx8dC6CjZIkHceZjXevAGY64WkhlS4ptpR7AtU8VYXmqebIs3VgPvck6aokXaDvzgKXHObpT0j87pRBd+KrGXALtLzHkVdRIBKTqFe1X8lGd4FgFYd2nkqiF1C+RvUckYzeQb6a05DyUbq0B9RxSXpQW+4BO5BCDu0qOA2ofLWckAzfQZ6PodhlVs+VqAgRsWIq0gVQUYdWVZ2GVD4nJKN3kPc4DapqjkbhIKgjr589ki68ZEgvL0iP1iPLlYPToKrmgmTwhxBoEg2qQo5GXgCRd7VfXqWLhtpKr+gS4or2nYdqToOqZCakGk6e8FXq75Js9IxgriqXDZTybQzY6siQ0SeC8lZAarSjor7athCAVDIIHHnOXoiuXpCUK4eXdBF+d+NxYJ2N5MxQ4dAgdOc9XfGvkdYBICO5589e35UuXJUIK7YecmE9SPnPmEWR+vqRW51b/B3SNuVcR72LAHgjKd0FFZjv0EISMWNWROoLqmutDM2qmd6s+gCO/h3SKSDCjF4DYDcdYuce0RcgGC7r0EQSM2OWQ2rrB1bNc2doQs/GJTI0HUCXv0EqFwDeyUZf8Rsp9pBRHUHQoZ1HzIxZDmkfGdHm5OkN53uTJ+/zvwzwFuaPVHItcIS9HAE4FALOPIqAevMGWJsNSdCMWQypLTDH5ermpvjG13JN+d7kqduTLwam5o+0B8CXFz9/fP8IYM8lJHY4G5KoGbMW0jFgisvlcqsNrD93sLodbKf2aatsSDvzAf5G+SIdAvD2c/HitwcN+gQgegiUPyzT4ZAjG5KoGbMUUlsvZpMRn8Wm04DrfH/yno3TJpGqBfTIE6lKkIyKU4QkKwVLh+mjQtvo/W00Sl+zIQmbMSshXWaLTJzFwV37J+5PPiN9Etkygy3yQwoDkc8KEvUxx9+Xe4TNmIWQCr3o6mK5B6rrZCeLeEsmp00itQiYlB9SVD6QVKRvQCgnJHEzZh2kzsBjBWn1SrcaO1mou18PSJtEQgR8+SGFgBcc6T2wNickcTNmGaTCAKY1cMk1mI1lfBqblVFquUDdm5xPImsO0DcPpCLzfalIgVA4ByRxM2YZpNHACmVH5blAa1mJ70/Ot4St1zh1Etkyx+WMVDLkBeJIHz58uE1IclsP60YSOGMWQWoUQEe2yP1gdR3I9yen+uF341MnkVpJy8wNqVzUD2r9uYsMaWwp6unOMwpTWCeSwBmzCNJQZZHUimkAFjfk+5Mn7369NL7I5Yk7jE7MCemaD9TxJ7sJSEWiNp+PgFpXWheSyBmzBFIjP7rTIlkjO+KEm9Wrp7r/K9/9Ov5+o6k7cZkLc0A6HABw5sko4uFISlsYk++aHiSRM2YJpC7qIqnVs+u4WRPYGmeB171l/P1G++QdlSfqRwoBiBxgRByJM+0E4J2vA0nojFkAqbcfrRuoSAVrOvy+5UUtaZ26+7VyG2y4OyFyrKgX6RSAM/RalILEu7UeQHYlj9AZswBSD2CNKzH1ltcwpO9+PZm/7vJlbteJdAjAHX4YcSTewTMADmdFEjtj5kfyob68SF4d5R0GXbjyFrRkJ/h6wAD2uptYV6CtLqT5AHaSUWakzQcOHJRPecd1KHnEzpjpkdoCN1xJdXAPnsEuXNVaDSujTma/xsq7DF5/YJIepGv8OEpH2nyzMnWTmDZfAfx7syAJnjGzIy2MTyJv3jK6cE0+m8vVBDWsTDN1EvkVUmcdSFW2AmfIKKXdzOgACbEkOuNFgLVZkATPmNmRKgL7R4zo1q1bE7VdzTrVrMcb30yu5zD6tl8n+m54neR6AaN1IB0C1l8snhlpc2W1gyR2BIhqIwmeMbMjFXqxoFhym4pqdt+V3Bpdp7ttXuBA8T8g3eNIN+mfOwHvXk0kwTNmdiTndqB/ilI7TaQUo4L6QGF2pFPA2VF/QNrCePihtOUhENJEEjljFjjdOSt6geXJy+yjtchdLrX45gXHnFmRiniBp8X/gHQwEemAfGRlOZQ8gmfM9EjOLgAG6F9mg2SjuYCvd3akQ8DZ4jqRqCx/oeQRO2OmvwSnOqcptdG7yALZqK0zO1KQvSLpOd1tlpHOA4FyGkhiZ8wKSBmU2ulbZMEcwFfozI50DVi/+w9IVIwb3VPu4h0BwhpIQmfMAreF+Dr1LHNeqlFdMsqOFAXOFf8z0pabSQcSdQ4IaSCJnDFL3AXPuM4xOhZZMJsZ6UHaA9zKjDSK33BQbjko3QOCGkgCZ8wiv/STG43kq6SZWovkRkN0fjjSD1zUQKIkmSm2Rf2tBYBtGkjCZswyn3HIpNQ84yILEtY4i23UogtpL7B+lDYSudCZjqf5vA2PqBmz1Icj+Tr5dWynMVqL7NCVGelD2gY8LK6FlN45YL4GkqAZs9THjOWmApjBl9mzdb00pYIkI9qoRSfSJeB4jkgbgZAGkpgZs9hfVaQpzVwJLElZZC++xmnMSC9SGLiTI9JOYJ0GkpAZs9zfJ/1i73x+mgbDOH5p+42XZtlmyJTuZkwwkUT8QYIGCTKD4E2UMcPB+CPxZkI4mBBjMtDAWCQ6A0jcYTqyoCRcFrl4gH/Mriu8bm1f+rZ9Et6xzx+w8OXztCsb7/c5yvn2OObj646QzBFbpuNH0jdgTVBSnVcSYEQyYxIex3RYetLu6OVxxjtsUQvVlVQTvJLEZ0zGM7MWUyyn8833tp1xlDny/570k/Z2Jz5jcp4+d1haaA155cjRPeAHy+jz6W6L8sFBfMZkrQhgOV+7xrzazJg1HX0dEGxE6QNmPCx5SNrnPoKHnjFpyzYclm65hMzeNB0J19YUgEMxSfw/ZsPOmLyNKDYjLOe11pC2o++asKQcUBOStAFA50gKNWMy19Y4LQ21h8xeBn5rIpLY6csZEUk1bgOUEWrGpO4Wasn5opFykIUcbWScNh3d1QJIimWAQxFJ28AmR1KYGZO7AMppicWcsM7/mBmfBqtSqwA1AUnLS8AeR1KIGZO8pes/xpo5Wcxsw9ENYEoLJukXsPXZv6SPAn13YjMme5WawxKLOWE7GglcSpj3+mTI60Ka40kKPGPS9905cr45jjltZgQwpgWWtAeP7/1m3S+k8QRPUtAZk7+U0MXSYDPmwrlzrwBMhqn3rABln5LW2YXEkyQ+Yx3QHNnGpGVp0AppOXquhZFUygB1X5JWdoGCypUUbMY6od7T3dKQGZI5CiSJHSE78CNpG8gU+ZICzVhHdLC65zT/tfpvI+Of0G3GiwAOT5a0dvIpMiPIjHVGUa57zkv3n70H+j5ooSUl8m6nX2ZdHOVUPkaAGeuQNmOPnABzFEqSqvcDWwdcSSv78NEzZFDNWPI0rUHwK0mb74fJo0/RlLcXxwGscSQtVwF8iQeSxJ8xEkkJhYKU8BqEBw/HJucHNL+kVS5KHkB1x0tS7R18laoZwjNGIologzz5sgdD5ZPKwWR7x01SfZete+HTSzBjnBsB3YJ6/gb5Ho0ENon84hqUD2ZaJW3UqjAZ91cBldRoMEQlqalEPEJiiZZZJIjJtkRxKS3ColzfaUpaXq/bLV3DqwmVC/GdoEcVkkRPOhl9Rp8rrvYWYbNULe8uwaYvp6t+MQiGzOMNlSeJnt6LkSKyhKy0WUAbhVVFFcFIn4+WCx63gbO8wrQ4VykMwyKTr8ydxsX0Tc6yJItYqVRUYuop54xLkoOuJAnoSpKAriQJ6EqSAP6CeiVK9NanqERMj5J4Qm2hl/2xTLOaPK4rkaLHhSWRL6jXo3/1lMowiPffpxQCUoKSqBfU6woBqg3ZR4PsWlJIEJUUVyiw70ls/T3RDKQ1EtK0vx0lLiSJ7JtZ0ldnk5jUSEiqtD+/LihJIUEnfXV2U9eI+MfeHdtADEMxDN1/6ytV50v0NdQIeUAQOAaYp8NMpE/Za5H+gPQ9ey1S9gbplL0WKXuAdMtei5TxSNfstUgZjnTOXouUwUj37LVIGYxUZK9FylCkJnstUoYiVdlrkTIQqctei5SBSF32WqSMQ2qz1yI9QGqz1yLxSH32WiQcqc9ei8Qj9dlrkXCkPnstEou0yV6LhCJtstcioUij7LVIINIqey0SiLTKXosEIq2y1yKBSJPsta87GGmUvRaJRNpkr/0EZ5Em2WuRaKQ+e+2xEI5UZ689BX+AVGav/en3BKnKXnvHIUOR7tlrL0dmNNI5e+014x97d7CrMAgFYXhzuiUEVn3/F9VdVbSWphOG9J8HICTfvRuVmS1ypJOz17yqaKJEOjV7zfukJmKk/tlrnmM2USN1z17zZraJHqlz9prX59FGj9Qze01FwCikjtlryjaGIR2evaYRZSDSsdlramvGIh2ZvaZbaDjS39lrCqAMkP7MXtPSZYG0O3tNlZoJ0s7sNX13Nkg/Z68pJTRC+jF7TXOkFdLX2WvqPc2Qvsxe08Fqh9TMXlOUa4j0MXtNm7El0tvsNZXTpkgvs9f0gm9J4ob9PqRt9nrS8vYUimS3GYSe2Wu/GQTtQP0aipS7DYpI/liydFQm3W6aRzJQL/1PLcv9Rq6eqfnK1Ob4K7Mud5yLIzYBaYKANEFAmiAgTRCQJghIEwSkCQLSBNlDKtKB+jWlS09PVXx7+fF+A/UlIoQf3tW4PEl/vNlAfQ1Bsvj28uO9BuqXkER9e/nxFt/MFi3SKr69/Hir3zjUkCSLby8+HiSQQAIJJJBAAgkkkJ4BCSSQQAqQQAIJJJBAAgkkkEACCSSQQAIJJJBAAgkkkEACCSSQQAIJJJBAAilAAgmkR3t3jIIwEEVRFDG2Q8Bq9r9R0wXFxuLhPHLuAj4Tzk/9IUGCBAkSJEiQIEGCBAkSJEiQIEGCBAkSJEiQIEGCBGmDBAkSJEiQIEGCBAkSJEiQIC2FNLZE4+u1kpYrCxdBCq96+vXx8UsdqH//zJKjMucO7NtRYvxaB+ojv9IMvz48/gek4Lrs0SUYM/v6Z+py0Tn+/wfq58f0mR3/6B7v8GJZkAqCVBCkgiAVBKkgSAVBKghSQZAKglQQpIIgFQSpIEgFQSoIUkGQCoJUEKSCDiSt3v32Aky0tjSsyfU0AAAAAElFTkSuQmCC" title="Mines"><a class="nav-link" data-toggle="tab" href="#mines"></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#newdice"><img style="width:140px; height:75px" src="data:image/png;base64,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" title="Slider"><a class="nav-link" data-toggle="tab" href="#newdice"></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#coinflip"><img style="width:140px; height:75px" src="data:image/png;base64,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" title="Coinflip"><a class="nav-link" data-toggle="tab" href="#coinflip"></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#wheel"><img style="width:140px; height:75px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAaQAAAFYCAMAAAArwnhlAAAChVBMVEX/0QAAAAD/0gD/0gD/0QD/53gAmf/+gi9Qxx6uL/7Ufv6i3DL+skF4wP//0wf/1hv/5W7/1RX/4lz/30r/2Sz/2zb/5nX/53L/5Wr80QP/42H/4Vb/1yH/3T//5GX/2jH/2CdVyCKxNP7/3kUKnP3/4FESn/6yOv3953n+qz7/1BAEmv/8jUL+kjW2Q/z+43uv2yr5l1H+tjn+hzBjzCP+wCL+yRP+zwW7S/7/3Dqa2i+axr7D23NlyjdbySv+zQtYtv/+r0CN1yz+xRvx0wY4q/+1Pv73p2N5zkn+uTF50ifJZ/7BVv6Hw+j+nTn+jTNuzyVqvP8pp//Pdf7w44b71nr+ozv+vSnh1Q/Mb/6Mw8r11Yz2wXb9hzqF1St/0ynG2B5HsP++YOz53YX50Hn2unL+mDf/hDNayiByvv8eo/99wfbWgvPtxpz2tW3Zh+LHdt/YlMjmuqnZ4HfO3XWi1GXLy2KJ0Fam3C/Q1xjZ1hMVnve2Sva6U/PBaehsutnxzpj55X393nu52W6v1Wv3wjDozivq1Apiuf9Ps//FYP44qvCNxNvQj9Dbo7/qp4Dz5Xjt43j4yXj0uE7dzUBQseZgtt/fk7zn4Izno4zWzE0wp/PbjNV2vdR+v8/isbS+06njm6OqxqG4yIa9yXnk4nj3sGq92SPuzyDVgPolpPW00LHln5ne3ZLys170vEDjzjW22ib5xSXYk+6qzbWix7TpvaLK16Dsrmhvy0HOh9Sqb9PV2pnQmnb00BXhl7DifIqV0l74nVis21bGZtLMsr7Mw6exyJOCpHplxWhqo8ihysZ8oLhItrDpq6+Nm5uo15jBXd8zrcw9sb9iwnlXwyqMz4jw0tBrAAAABHRSTlNfAMdKMk+QaQAAGxFJREFUeNrs1ltqxDAQRNEkuH8lWU8jj2SD0U92MPvfWCAbCCFjp8vU3cKhWnqbmPI+3omkPiIBRCSAiAQQkQAiEkBEAohIABEJICIBRCSAiAQQkQAiEkBEAohIABEJICIBRCSAiAQQkQC6I5Ix0726AZKZHzG1Y/i6OFeyfFecW7pfQ0vbbtHRkJGM3drwTn6u9PVI++cEGijSHNu6yG8rPmyIs8JDMo/ms/yhHiLYprCQTAxdXpEbaZ5gAkKyrcorc2EHOX0gSCYOJyfknwiDQkAycc1yWl2/k3okE0eWk6tP3T8J5Ug2FLkkHxW/T5qRTKpyXeVQe/b0ItmR5eLqpnNOWpF2L/+RaxqZVCJ9UWP3PG0DYQDHl3tZHCckJI6SQCIlIFwcRSZiiFjIUFkMTdSKpBJ1BtQ4UTvkC2RAYauyIYGQkBBTBlC3Su0AS4YOgNSvVNOiWpSzfQbn7vgt/gB/3XPPWc6nIS+phHhTT8BI8kIMPsV+q3tgWpY1sE0GlmWaB91WBQaXjQKxCBdJXlBgIJWuOTCmuobJ+po+NQZmt/KCMwkWSa4pQfJYxlTDlDq6YdGnWhJp6AkVSU5SD7qWaeh9HJxmWK0Xl0mkSPNpykDWtIOfoTO1PkIKRVE2PXEiReNU24FpaDgEHeODf6hYEghBlEhyguYIDXQcIt307bSYAwIQJFJNYVnIcX1zDL1lBfj3KkSkaAb6qFg6ngENIXR+sw29pPjPPAEiyUXo48Do45m4Qn+ML0bQQ4bvnidCpFzaZ1WYaHhWrtG90tEl9MD1jx7/SH4LQ5dwiMKcdo7xtxWPBSIKuOEeKep9jEwdz9IVemC443E71QAvvCPVvBNpeLau0X9Ke+6Z4rzWPL6RXsW5JsKdEkIBMinzgAuukeYVnomcaUefKSEDDnhGKnrt3Bpm4BaRlU7dMi3yGHn8Iskeo66lYxbsaedmuAHJlAJgjlukaAy62TcwG1fIw8kZJFsArPGKlIeuBh3MyC3ydHgMibIyYItTpCJ009UxK50h8lbaWRHkYuIQSc5CFxUDP0u1aSvfadqqftPO18l3SBKLApZ4RJIzYa/dzXKv0VbVuvSIqrYbvTI51y3yt7o3ggSpAmCIQ6S5dIgLQ7Vs15H81dVGr4kf6A8RjXPyYUoCdthHyilhPY2avXZdCkRtlKuU086xekq8mRKAGeaRCilINgkWqKFKT6O270P9QrTGXyHBEmCFdaRCCM/Xapl8guipvaYz7SiUNoiVZMAG40h5SGb2AxSSwqD+WEYBHI04PpjYRkpCMgNTsguF5Wfk7esAnU5IIy/OphLDSK6N9nXae6guhedNxLb5bhVRWr6Aj2WYVGIXybVRV6M7RKoUJivy16fdEqJ0yussMYyUh0RWH1PoOYnCmnb/7NJOvcMRn3uJXaQCJJqwTuRMO8cXykzjbUIlwACjSIUnrwzVXl0K3SBiC57p/JLHe4lVpFwKElR0/0RBtoW1ta33tvX19bvP1taa77RzbH6mWh/OOPx7YBRpTiGudRr285ubc+lpKgri+GaqKYm3iggU8RGplYpotClIusCGGEO0GolCfC00isHG14aNxsdColE3Wo3W4AtiiEZDAuiOuDBxZ+I3sqRie++cczu3zFzv4fcVfpmZ/8w9LU3RnqFUX1dvNyjo7epLDfWruh3WRKmm2Cf/PwP6I8lqVl4ZdhATnbufvi5kB1F0lepH3Q5xlhDIO2ZDiAYQxRdJVktNjpKD1QV1gweKomzdDnN0gGApHUK0giS+SFpfk6PhTBVBveCd7pKoR0iPl553Ej9PWQOiyEtqU66wZ6qcFxJuhlJYEJ3uvqer9Izs76jBUrMFgshL2kRzRO90Q12wVMYmsnpNR6vnvLSvByJ5SRFlr3N31KnvdP3FMcRC/n0O6aEHiLSfQVxckrXa+zw6LNHmMNHRkzpL9+PV0sOcjxFPXFK95/0omdApKhYRM4W0bjINeE7ijREQQlpSm+c7Q2dGUBEmn66x5cXe+hYehCU1hBS4OjqsUwRSTM/V1vLin/26tcpK2t7k8aaaTMgrwozN1dTyPh7z6Z2XpCT1QLrivdWlQJrCI3XLq/LlAn1fkhlLopJ6QpjTbo7UobsX5IlO5pT3B/fB9Ay9ErdAAElJEdUSe9HlDqTsdF3gD1NzysEUI3xRl96WBCVZzdrwTY8MqW7wjULWs6UO9OFiM/AjKGmtt2A36Henw0QnVEeiuKeIt9oCduQkteoeNNAdpcBv8llFyHM95b26K/81XUiSutk9IURvNI38ZT7t1dJz+YYnJqlNfVWlO+rvhv9BdHIVxnVhSosfHqQkRdwGEnYUhFa3SD7rzVLMOZbagBkpSS1etthEMFrdIvNpbx3vYbvwSiskqcfLhjQYlFZXQpnyRuIetqWNwIuMJKsJn753GOOoyKinJN7xTfqGxy9JuSIdoO+wQ/D/KeSQpZjLqdWRw5ss4EREUsRD+h4OUGSoJI8s3Xe5442LXodEJNXTm11nQB0BTGfxtZXe8NYAK/ySGuinBuyoD4LCFPp88cDl8OBIePXACLsk5a3huCbZJdH3oy4IDvPoncp+0lM8/rsDv6R19DU2EWRHRUuoli4RVlr+GM4tSfmG64Iu2AW315WYytIj3jO5F178knpwajijGUhBzQxlxpyW9q3Q8tZxwgM22CVZTdTUkMwE3hHAdI48ll6F7GwCLtglbSCnhkQAd1hMgT6W0lLXcDZJ+kI6QBtI/RBMRp1jSbst3TgmVErcknAhndcMpMDd63RMksfSuNBU4pKkj3a7SQNpT2AdAbynjqXYC5mAxyxpE/VoNxjoBclO1LEujWhz+O2QjRbggVlSM7GQjhgQ7MqM5dB5iFZKrcACr6TN1EJKmBEadOHhErGU1gMLvJLqiYU0bM5AQmMJJTxUSuzHcFZJEWIhJTPmDCT1WNpPLKW1wAGrpK3EQho0aSApx9JInFZKjRYwwCnJaqTtSJ1mDaQSo8Rl6bXAawdOSevwsYGSGnrBCNK0l3g37vKncE5JLeg3FBeV9yDzmt0CY8TskOZ/g8coKUI7fyczhiW7RSZo2eEVf3Tgk4TfcbWfURaSaclukWiWVkpv2V938UnC9+8n6kIyMDWUKNCm0jP2WzifpAZa/h42MjWossNR3fOuF9zvhvgkbUWxYaWKjJGpQbksDdAeDjH0OyZJeElqP129kPaAWdizw33do2PufscmCXe7HcodKdCvgxAoO5BK6Rtzv+OShP8d8tTyKySASVIpPWfud1yS8EnowvIrJID5HOWTRfwu72mIQxK923UaXkgAE6QL3ixvv+OStBV1u+VYSKiU4ppVibffcUlyPkBp/Kr6aG7oQaiSn5R/iIq3sz7eZ5KE73Y7d/74ji5CxhcSwJStlEY0t6FPrPc7Hkn4ud2dcJGiJ9sdPGN+ITm/pA9Q8t1qWBo8kvBXisfhEtsqPHUafGwoM0WJDvF2zqcOPJKskJObRUFlT6Vz+KC5Vzv9BS9OOYX3wJLgkdSAsl3YxpbfRU9JY8/fdkYpn5XGOUM4iyT8KelN0YzT07un5seGBaI5wtXhoT3rwpLgkbTRKelWGHOwbubXl3+SDI0NKDpo+l3HMcaP6ByS8EjatQU72lJXZMFTgH+MRCNP6XezjJchFkmtTkmXw5i9dX+ZefPBpK/mmGiW0O+eM/5TIYukDSiAK7tdmZlfYDL2A15M/VGJcVPikISfgJ8LY+oqeQkmM0bZZ+1DaTssARZJ6DPFNuxop03SPTCak4Qfwnzi+z0Zh6Q1lJF0qNLRVTCbCcKDlHG+f5NkkIRX2ethzIlKSe/AbPKEEP6Qb51lkIRzwzV1AC/zBczmD3tn8iNTHMTxSz1p3Yll2tIdsbXGhEQcHIZBRGQOdCekHYwL4UJw4NCxRLiJMTgwQzDImIM1lpixROLgICISQfw9umPJ666fVCX1Je/VzPdf+OS9qvrW8isekJPwJbjMAQCJjzeclELSM0q5uhVB6Q2s8YeAVGClrPOQRDSiCEqjsPVZAKQpmrxhSxzSQ0q7niiC0hDMc7BD4n7DhQAkVyGpGZTkSmkA1p21Q+K3G15zRj0tkNLsCf3SqDzpcB+2TQaANFfhN3TFGd2g9GtEbs8u70SldwBIi3lXlqniKyS1BaVt/zi9s0Pizl1JyBteUvpVVHisz1FzDgBI01jrnKvmyLj7qX553HgnKgc3Q+IZ+BHJb0jtCEpcw7LncAq1AWOHNF2Rgff4KmWbGpHTuwGUxWqGxMuk80Jy95Y86Jqc3l1HNWftkGYo7NWKn4ZfrPEntdBPoHxwO6SZikmhirfkri292z8pqE7QNXc7JF7LChn4JXKhqpyDXwVVs3ZIeUUt2+suA29roS9RVLNkkBXSYsWAQ81dBk40KhdKt0GWgxkSNxwED/we+dB72Qd/DhoYskLiWy97A5D8lUlEd+Rqths0amyHVJBdoZI3D7ypugAJ6AtZIXHr7rRgOFwhH6rLlsPNxEI6FIDkz3AguiZDGgKtN9shtV9QGwuMCnmauQvO3p1NOKRZsgm+wlvLTwnpFGjS2A6JLfmNE0hPBEjAXsV/gdTlz19tc1g3JBvSlAlIf4U0CJq8w0M6MgHpD6SkfEmkgeQ+JiX8d8cgjU0kDr81lJjsbqJO+iukm4mBxByHcQJJ4TjsTEwxy8buxol31wop4QZrQW5VLI1DOkw+VFe0KhIDaZ48ZVzy2E8akSE9SEw/qUPRPo9DOkg+pOjMvgANg9shzWGDKMKMQ4pPP8U1LEN6lJgZh7xirbnX1VbzT3XLgyjbEzMtNJcNRwpzd4/JhfrFka5yFNdsMsg+wSqPGff52pjlC0qKMeMCGWSFNJ8N7AtjxhfJg+7Kq37nUEuzdkgLFKsvXf4sh8uyvzqAemLbDmmqwgbv8VfN1hVzKKgbAYhNP3mmq+SvUHqvMBxQZ6ftkGi24mqNr8tCTXXLZdJtlAkOgDRPs1bhbvelKi9VPEK5QgBIcxSFUp+39O6uvENW7kzQHYdFirM1Xd6aFXV5G/M67H47ANJMloMLbb+DDty7YTm5G4xQ25gASAsUp9RKWWfGUL9ipwJWJgEgLdPc1+/1FZRiIUm55zeXDLJDotkKH7zPV1CqK54j2w7LwBGQOpjFKmQO91K/Njssm0InIljLDwEpr8gclmZdVUpVOSQN4JI7BKT5miOsNU+jxpqQtBPngSMgTY0UYw59njzWegukcEh6gbNXEZD4i357pKCU8iusa6tiSCp34o4ZIyBx9+51qFLyc1+oeDT37nOVhSTW8UM5dxBIed5S4ur18787nmuowak/4K6G58BnmZw7CKQZrJwNBKWKn3bF0wai35x0V3I7yCIIpGWaoNST9WI6bMrF9O77FyEk2f0GCCSapnmcp+Zl2PhYLq5VmXXfOKfBCPhEPQbSYtUzV15M1pVxRmsyTa3/9pWNgePefMFAmhm1a0Xof+dj4e9MLq5dmV9a/+FrmRl3kD4FYSBNj7h9x1Xz0VTa3fa3a+gPp09lloADHovDQKJpmiS84uLpl+JR9rdr5XSiAeljBHw8iUCQ8hpnaGnWw0m147m4NmeYFjY4XYVWSSBIC1T/uy0OrPDiyhZI+zIhvYpYV9YiECRu390Kvqydfteh9UPamAlqbQR9+RwEiToCpgNXNv1ZeOuHtDUMaTtr+JmEgrRa9b+rZNPeRd+RY2mD+LcrkFEoSDwJH5scssLT/rj2Sp42cK0FJ+AGSLxdwaeNeesv3Zc+f3BzNq1NRFEY3pwDmQ4kjf2Mteq0lJQu0iyy0GAq1EFKdRHoJlJIQt24qFSt0iZYqR9QENR2JYIbwVIKIhRBUFcigj/LuhGT997MrZ57m/FZ6A94OO/5uJlW/BYCo7RL0T8iJgnz7pmHZGNeSgcmhTQnnXZikjDvFr3/rpTMCukui17AicQk0UnlewUe8GK8K2XyeLZDZial005O0vnoVQkX2texuuA1fFxkka/iaScnaYqB+8pSiu3jX7gOhaRiVzzt5CThPsu3o0tpOUbv6HtGhTTH0pssCUrqB0nXs8pSiuns0DY1VBNGS9IJEkBOUnJIdXVArsRzdsjkjQqpxK30kwBykmic8UP06FJaicmv9xu+UUd6wi0MJUkAQUlpBh546gte/H4YHvotFAPN/P0QTkICSEjSr0o3PQVjC/G7hreHXTmh5p6NsUFU0hnDUjrXFngx+GV43Yd3JBUz2wwfUwggKSnZqyklnB1i9mZR8WFqUHLPytggKolGDUsp2xOvlbZtjfXnDQtpmESQlZQc1JQSzg5xakvtDamYMCykARJBVhL1qUsJWYhTW6r7rRS0hWRl/iZhSWlW7kpIric+baniw63BaEfiUZJBWBKNsPLsgDyNTVsK12FFUlOa5FakCklaUoq1Fzz8qCwWH/+FeQg7s6sd95EQUpKglPAYjhNeHI54mbwPk53Z+ZunSAhxSSkGpu97Bittz343jniZAx/WWA2r1gpJXBJNsNkTLbal5e77XUpmz4eGpGGNWxmUKyR5SWk2HMOxLa103Qtg3YeGZDh+8ziJISlJX0qLWU/9aNHG6y5bl8DRfELHY2b4kkIMeUlp1swOyLnuttTwjRvSHMOOJIi8JBpnZEPTlsDSJeoaoI6KN3SOgl1upVeykGxISvYycHPM09zD21jplukhA46gIemPdnyGRJGXRAOMPPOUjF3r6c4ZL7N3BEefJhnekQSxIolOM7JhbKkbtlrYj+AxtlPY8SmSxI6kU4xsZjWWFtot7R//N89h3twRHlZ5goSRlwTHIfh7kjCId9m1FRzB8A2THeyxgliSNDXIyANzS28u0jFSWQdHNb2jmR1u4zzJYkeSena4nvPU5NDS6+MaH2Csgyck/NLF8tRAtiTRSUY+ehrOoaXl43m6gKiDJTZy+uYUCWNNUpoV3NZb6pbIg6iDOoKGBEc7aaxJolFWcMvTJl5XRF5L1GE/Qkrb3MZwkqSxJyl5mpHpDU/D5YUuiLyWqMO5DglWGVckcexJohR32JaQ7EIP8tJlMWXgoAr7Edy+nYSdPUnwgSb8+S68PSD7r5x1pkpe68h8aDhtI+xsSqITrOC53tKVHgUrbq5EIdzq4F4HrDGssWmygFVJU0McdWrFmzjy0v6Dbaax7isogiM4q7YyQDawKon6OXLEw58fI/svrGaeLun82RudHJV2uJ0RsoJdSdTHCqaXvBZgyEOWbWqqwMUbxzpkZpcZX/qsYFWSZg7n6xteZGNCTVZe1qGKIOp0jlbZ0vSNWJaEbQktYeRpNL26RNJkmqAIok5JcJeB82QJ25LoLKtYvO9FRh6y/052hEBFGHXmjibIFtYl0aixJYw85OV7sea0VYeJDqJOQ3CB7W1IiH1JNKK2lPNMIg9ZfiPxc+Swkfe1VIOjOxpKkzWsS4LhAWopqpiQlVf/di3KNGGegzKKyDrgLNnDgSSa6lVb2vA6kVvo6cDzxlaG/oqwuQcxB93oyI4GyCIuJFFqkE1mPMw8Pd99f33vyKLCZh1SDoa6CGZUjsbJJk4k0VlWW1ryOpLVZ943/5BfopqmosIKCAKKZZSC+xEyQlZxI4kGWMn0A68z5zSZ98H/g3y9UQn1qjLhVrN+gBGH1AKUgrcg5GSSrOJIEvWxms9eBFcX1GkH5A/26o1ms7K1tRWG4eG/lUqz0ajv5X1DqpB0yNw2I8O2HbmSRBMMwMuFeTU98aWpoSJkbZKR3imyjCtJekt3stGarkHaOVKEb3zoKE22cScpOcJqNu97Bpog7QSZD0wUzVxgBUMpso47SZQ8wWqu4/iA5K5ZSrsiKFJT2mUFgy4cOZREyZOs4faYF83lpxbSbracMGPtodLRKXKAS0n6WuI7OQ/Qp953sSK6YagoeMLH6MilpE6WFpc8I7JXDz29FTFUKyRMKa2yu36EOJUE0wNEnpGnp7P2DWHUIb2uHIEk20ywjs0Nz4wviaBcLf5DH5oHQ0ZTHc7ejnAuifpYx/Rnz4gfiV8UQJShoCBxJOZ2WMnwFLnCvSQaZS0fTYopl/jNjXJttmjsp1qGCopk5jEDcK+zjntJ1M9app+NGaRdK0EhQlVxtjoPfsxY22Y1Iy4dgSQXnBpiLZtLRmmHBIVCuTxfq1Wr1dlDDv+rzZfLhQJM2eaU7rKGcXIJSHJCepj1PM91Hu4SjgjuTbKGAXLKsUhqOT4gjyDzIO0csLbDGobOkltAkiOSfdyBxVsRaWeduVXWcTpNjgFJzugf5A7cXNKlXZCwT+kCa5lIkmtAkjtSw9yJO0vHlXaln+3ZTW7aUBDAcVWdkbJ6Nv7CMgabWCiIRbtGsrP2AXqDrCtVAuRtJLNNBbvuuuIQdMcJuup9akLStE1iG4J5M+j9rvDXjOfJ+RBfNQYJ5EUC0cGKTBK2XXki3QcJJEYq2LhvpqtfF880kIjG6+iR3Eig9bDc5y+XJ9x2aYwlHBvkkBwJhIkVbn78/W76edGYfjbBAqmrbkdypEKoY4WP3/9svcvGtl0yW2KpSIAs8iOBGGClm68fmtx2/WyK5Vwf5CEQaTdMlW7vrhradul8gUh4jIBEJBAR1jC8vUsaKLTEKp4GUtGItDvz6vg2P2Knfp1C6IxBOhqRAOw21vMpTvvHuBQ28QJrGIxAPiqRQJhY13Aye1OoJMuXWIvnAwVkIgG0DMQ9Qs2zZP9S1+ksXmJNegA0EIoEEPbwmfJS+SZNauZZZ7N4hfU5XQFEkIoEYLm4t+FqOt9k6fr6pcHqJ+t0M8unS9yPE5FJRC4SQODiwRaryWQax3mex4XpZLUY4mFMCvfCA4KRQBSZjuUsElGMVLA8lKdN51u0QzQSgN9BOVybXCKykQBapoMn51lAEdlIAML28JTaUQtoIhypoJltPBHDIrjn7lGPBCACA5vndqkOUYF+JGi+k9uV/i+iFItIBWE31cmNqBcCLpEKIjR1PC6nY5Pecg8YRdpqjQ0Hj6QX+XQvhX8wi7Sl2QMd38YxuiGbQAAMI22NrMjQD+vjmbbGKhAA00j3hG+bnl4/T6/TtXh8gv7DOdKOaPlBNDB6r9Vqu17HHFv8pucJ/0hPxEjz/TC0gsAOAssKfV9rsU7z6JwinTEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViQEViYEikkLd+3e/Ae3xXVF+qxd5AAAAAElFTkSuQmCC"" title="Wheel"><a class="nav-link" data-toggle="tab" href="#wheel"></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#CF"><img style="width:140px; height:75px" src="https://im0-tub-ru.yandex.net/i?id=5e6217cbf3d3c68572733808f884380f-l&n=13"<a class="nav-link" data-toggle="tab" href="#CF"></a></li>

                
                        </ul>
                            
                        <div class="tab-content" id="profile-details">
                            <!-- WHEEL -->
                            
                            <div class="tab-pane fad" id="wheel">
                                <div class="KotDev.fun">
                                <div class="game-tbl">
                                    <center>
                                    <div id="activeBorder" class="wheel-circle" style="margin-bottom:160px">
                                    <img id="x50" src="../images/wheel.svg" class="relll" style="position:relative">
                                    <div class="arrow-chance" style="margin-top:-23%"> <i class="fas fa-location-arrow" id="chanceArrow"></i> </div>
                                   </div>
                                    </center>
                                    </div>
                                   <div class="right-side bets-tbl">
                                       <center>
                                       <div class="amount-bet box" >
                                    <div class="title text-uppercase"><span style="color:blue">Сумма ставки</div>
                                    <div class="content amount-bet-content">
                                        <div class="amout-bet-content-inp" style="width:150%">
                                            <input class="input-bordered text-center" type="number" value="5" id="amountBetInputWheelGame" onkeyup="chanceGameCalculate()" onkeydown="chanceGameCalculate()" style="width: auto;"> </div>
                                            </div>
                                             </div>
                                            
                                      <div class="dice-game-box-percent">
                                                <button style="color: #000000;" class="btn btn-wheel-black dice-game-box-percent-btn" onclick="wheel('2')">x2</button>
                                                <button style="color: #000000;" class="btn btn-danger btn-wheel-red dice-game-box-percent-btn" onclick="wheel('3')">x3</button>
                                                </div><div class="dice-game-box-percent">
                                                <button class="btn btn-wheel-blue dice-game-box-percent-btn" onclick="wheel('5')" style="background: #345ed7;color: #fff;">x5</button>
                                                <button class="btn btn-wheel-yellow dice-game-box-percent-btn" onclick="wheel('50')" style="background: #eed152;color: #fff;border: 0;">x50</button>
                            </div><br>
                            
                            </center>
                        </div>
                </div>
                                </div>
                                
                                 <!-- WHEEL -->
                            
                            <div class="tab-pane fad" id="crash">
                                <div class="KotDev.fun">
                                 <div v-if="$mq.below('767px')" class="playing-field_mobile">
                                 <div>СКОРО
                                 </div>
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
      <div class="playing-field w-100">
    <span class="playing-field__title text-black-50 text-center d-block">Чтобы начать игру укажите ставку (СКОРО)</span>
                                </div>
                                 <div class="container pl-3 pl-lg-5 pr-3 pr-lg-5 pb-5">
         <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 text-center">

                <div class="animation-right">
                    <span class="text-black-50 playing-field__left-title"><span style="color:#000000">Введите ставку(СКОРО)</span>
                     <input type="number" onchange="minMax();updateProfit();" placeHolder="<?=$min_bet?>" id="BetSize" value="<?=$min_bet?>" class="w-100 text-center rateInput__input-number" style="font-size: 20px;">
                       <div onClick="plusbet();" class="position-absolute rateInput__plus-button disable-selection">
             </div>
                    <div class="input-group position-relative rateInput">
                    
                     <span class="text-black-50 playing-field__left-title"><span style="color:#000000">Автовывод(СКОРО)</span>
                    <div class="input-group position-relative rateInput">
                     <input title="Оставьте пустым, чтобы не включать" type="number" placeholder="0.00" min="1.00" max="99.99" id="AutoTake"  class="w-100 text-center rateInput__input-number" style="font-size: 20px;">
 <div class="col-12 col-lg-6 w-100 text-center game-content order-7 order-lg-6 m-auto">

                <div class="row">
                    <div class="col-6 col-lg-12">
                        <div  id="crashPanel" style="position:relative" class="d-flex justify-content-center align-items-center game-content__percent">

                         <span id="biggCrash" class="game-content__percent_big disable-selection"><span style="color:#000000">1.</span>
                            <span class="game-content__percent_small disable-selection">.</span>
                         <span id="smalllCrash" class="game-content__percent_small disable-selection"><span style="color:#000000">00</span>
                         <span class="game-content__percent_small disable-selection"><span style="color:#000000">x</span>
                        <input id="smallCrash" value="0.0" hidden/>
                        <input id="smalCrash" value="00" hidden/>
                        <input id="bigCrash" value="1" hidden/>
<svg height="210" width="100%" style="position:absolute;z-index: -1;left: 10%;">

                          <line id="crashline" x1="0" y1="120" x2="0" y2="100" style="stroke:rgb(255,0,0);stroke-width:2;display:none" />


</svg>

                    </div>
                     </div>
                     <div class="col-6 col-lg-12 d-flex align-items-center justify-content-center">
                        <button id="playBtn" onKeyDown="if(event.keyCode==13 || event.keyCode==32){return false;}" onClick="crashBet();return false;" class="main-button disable-selection">
                             <span><span style="color:#000000">Играть</span>
                        </button>
                        </div>
 

                           </div>
                           </div>
                           </div>
                           <div class="d-flex justify-content-end align-items-center">
                            <div class="mr-3 mobile-nav-content__avatar-container">
                                <a href="<?=$home_url?>profile">
                                    <img src="<?=$ava?>" alt="<?=$name?>" class="mobile-nav-content__avatar">
                                </a>
                            </div>
                            </div>

                

                            </div>
                             </div>
                              </div>
                            </div>
                             <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 text-center order-6 order-sm-6 order-md-6 order-lg-6 order-xl-6">

                <div class="animation-left playing-field__user-can-win">
                    <span class="text-black-50 playing-field__left-title"><span style="color:#000000">Возможный выгрыш</span>
                    <div>
                    
                        <input type="text" placeHolder="0.00" id="ProfitCrash" class="w-100 text-center rateInput__input-number"
                               disabled="disabled">
                    </div>

            </div>
            
                             </div>
                              </div>
                               </div>
                                </div>
                                </div>
                                <!-- Колла/Фанта -->
                            <div class="tab-pane fad" id="CF">
                                <div class="game-tbl">
                               <center>
                                   <div id="coin">
                                    <div class="side-a"><img src="https://im0-tub-ru.yandex.net/i?id=71618573800f9f039ba0785a61d22b55-l&n=13" /></div>
                                    <div class="side-b"><img src="https://im0-tub-ru.yandex.net/i?id=fadc93b9fe38f9b07c5b774d80822380-l&n=13" /></div>    
                                        </div>
                               </center>
                           </div>
                           <div class="bets-tbl" id="betsss">
                               <div class="amount-bomb box">
                                    <div class="title text-uppercase text-center"> <span style="color:#000000">Сделать ставку </div>
                                    <div class="content">
                                        <input style="width:100%;" class="input-bordered text-center" id="coinflipBet" value="5" placeholder="Сумма ставки">
                                  <div class="dice-game-box-percent coinflipButtons">

                                                <button  type="button" style="color:brown;width:50%" class="text-center btn btn-success #fff" onclick="coinflipbet('1')">Колла<sup>x2</sup></button>
                                                
                                                </button>
                                                <button type="button" style="color:yellow;width:50%" class="text-center btn btn-success #000000" onclick="coinflipbet('2')"><center>Фанта<sup>x2</sup></center>
                                                </button>
                                                </div><center>
                                            </center></div>
                                            


                                </div>
                           </div>
                             </div>
                              <!-- IOS/ANDROID -->
                            <div class="tab-pane fad" id="AI">
                                <div class="game-tbl">
                               <center>
                                   <div id="coin">
                                    <div class="side-a"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/IOS_logo.svg/1024px-IOS_logo.svg.png" /></div>
                                    <div class="side-b"><img src="https://im0-tub-ru.yandex.net/i?id=dfddabcc0c773f47f0150aa98fe1180f&n=13" /></div>    
                                        </div>
                               </center>
                           </div>
                           <div class="bets-tbl" id="betsss">
                               <div class="amount-bomb box">
                                    <div class="title text-uppercase text-center"> <span style="color:blue">Сделать ставку </div>
                                    <div class="content">
                                        <input style="width:100%;" class="input-bordered text-center" id="coinflipBet" value="5" placeholder="Сумма ставки">
                                  <div class="dice-game-box-percent coinflipButtons">

                                                <button <style="color:brown> type="button" style="color:brown;width:50%" class="text-center btn btn-success #fff" onclick="coinflipbet('1')">IOS<sup>x2</sup></button>
                                                
                                                </button>
                                                <button type="button" style="color:yellow;width:50%" class="text-center btn btn-success #fff" onclick="coinflipbet('2')"><center>ANDROID<sup>x2</sup></center>
                                                </button>
                                                </div><center>
                                            </center></div>


                                </div>
                           </div>
                             </div>
                            <!-- COINFLIP -->
                            <div class="tab-pane fad" id="coinflip">
                                <div class="game-tbl">
                               <center>
                                   <div id="coin">
                                    <div class="side-a"><img src="../images/orel.png" /></div>
                                    <div class="side-b"><img src="../images/reshka.png" /></div>    
                                        </div>
                               </center>
                           </div>
                           <div class="bets-tbl" id="betsss">
                               <div class="amount-bomb box">
                                    <div class="title text-uppercase text-center"> <span style="color:blue">Сделать ставку </div>
                                    <div class="content">
                                        <input style="width:100%;" class="input-bordered text-center" id="coinflipBet" value="5" placeholder="Сумма ставки">
                                  <div class="dice-game-box-percent coinflipButtons">

                                                <button type="button" style="color: #fff;width:33%" class="text-center btn btn-success dice-game-box-percent-btn" onclick="coinflipbet('1')">Орёл<sup>x2</sup></button>
                                                <button type="button" style="color: #fff;width:33%" class="text-center btn btn-success dice-game-box-percent-btn btn-wheel-red" onclick="coinflipbet('30')">Ребро<sup>x10</sup>
                                                </button>
                                                <button type="button" style="color: #fff;width:33%" class="text-center btn btn-success dice-game-box-percent-btn btn-wheel-yellow" onclick="coinflipbet('2')"><center>Решка<sup>x2</sup></center>
                                                </button>
                                                </div><center>
                                            </center></div>


                                </div>
                           </div>
              
                            </div>
                            <!-- SLIDER -->
                            <div class="tab-pane fad" id="newdice">
                                <div class="game_chance">
				<p class="game_chance_txt">
				<span style="color:#000000">	Шанс на победу <br></br>					<span class="game_chance_value" style="color:#000000">
						<span id="one" class="percent_box">50.00</span>%
					</span>
				</p>
				<p class="game_chance_txt">
				<span style="color:#000000">	Выплата	<br></br>					<span class="game_chance_value">
						<span id="winner">1.98</span>x
					</span>
				</p>
			</div>
                             <div class="wrap_range">
				<div class="index__home__indicator__inner index__home__indicator__inner--line" style="display:none;">
					<div class="index__home__indicator__inner__number is-rolling is-hidden " style="transform: translate(-45%, 20px);">
						<div class="index__home__indicator__inner__number__roll is-negative ">
							<img alt="vk.com/id321223555" src="/cub.svg" class="roll-img"><span id="nums">0.00</span>
						</div>
					</div>
				</div>
				
				<div style="margin-top:30px">
<div class="row no-gutters height-100">
				<input type="range" oninput="fun1()" id="r1" name="chance" style="width:100%;background: -webkit-linear-gradient(left, rgb(241, 2, 96) 0%, rgb(241, 2, 96) 50%, rgb(8, 229, 71) 50%, rgb(8, 229, 71) 100%);" min="2" value="50" max="98" step="0.01" class="range rangeFindOne">
                                    
			</div><br>
			<br>
			<br>
			<input style="float:left" class="input-bordered text-center col-md-4 dice-input" id="betSizeDice" value="1" placeholder="Сумма ставки">
		
		
			<button style="color:#000000; float:right" onclick="betdice()" class="btn btn-light btn-block col-md-4" id="betDice">Сделать ставку <i class="fas fa-coins"></i></button>
			<br>
                            </div>
                            </div>
                            </div>

                            <!-- MINES -->
                           
                            <div class="tab-pane fad" id="mines">
                                 <center>
                                <div class='mine-game-tbl'>
                                   <div class="minefield">
								<button class="mine" data-number="1" disabled=""><span style="color:#000000"><span style="color:#000000">1</button>
								<button class="mine" data-number="2" disabled=""><span style="color:blue"><span style="color:#000000">2</button>
								<button class="mine" data-number="3" disabled=""><span style="color:blue"><span style="color:#000000">3</button>
								<button class="mine" data-number="4" disabled=""><span style="color:blue"><span style="color:#000000">4</button>
								<button class="mine" data-number="5" disabled=""><span style="color:blue"><span style="color:#000000">5</button>
								<button class="mine" data-number="6" disabled=""><span style="color:blue"><span style="color:#000000">6</button>
								<button class="mine" data-number="7" disabled=""><span style="color:blue"><span style="color:#000000">7</button>
								<button class="mine" data-number="8" disabled=""><span style="color:blue"><span style="color:#000000">8</button>
								<button class="mine" data-number="9" disabled=""><span style="color:blue"><span style="color:#000000">9</button>
								<button class="mine" data-number="10" disabled=""><span style="color:blue"><span style="color:#000000">10</button>
								<button class="mine" data-number="11" disabled=""><span style="color:blue"><span style="color:#000000">11</button>
								<button class="mine" data-number="12" disabled=""><span style="color:blue"><span style="color:#000000">12</button>
								<button class="mine" data-number="13" disabled=""><span style="color:blue"><span style="color:#000000">13</button>
								<button class="mine" data-number="14" disabled=""><span style="color:blue"><span style="color:#000000">14</button>
								<button class="mine" data-number="15" disabled=""><span style="color:blue"><span style="color:#000000">15</button>
								<button class="mine" data-number="16" disabled=""><span style="color:blue"><span style="color:#000000">16</button>
								<button class="mine" data-number="17" disabled=""><span style="color:blue"><span style="color:#000000">17</button>
								<button class="mine" data-number="18" disabled=""><span style="color:blue"><span style="color:#000000">18</button>
								<button class="mine" data-number="19" disabled=""><span style="color:blue"><span style="color:#000000">19</button>
								<button class="mine" data-number="20" disabled=""><span style="color:blue"><span style="color:#000000">20</button>
								<button class="mine" data-number="21" disabled=""><span style="color:blue"><span style="color:#000000">21</button>
								<button class="mine" data-number="22" disabled=""><span style="color:blue"><span style="color:#000000">22</button>
								<button class="mine" data-number="23" disabled=""><span style="color:blue"><span style="color:#000000">23</button>
								<button class="mine" data-number="24" disabled=""><span style="color:blue"><span style="color:#000000">24</button>
								<button class="mine" data-number="25" disabled=""><span style="color:blue"><span style="color:#000000">25</button>	
                                </div>
                                </div>	
                                <div class='mine-bets-tbl' >
                                    <input style="width:100%;" class="input-bordered text-center" id="amountBetInputBomb" value="1" placeholder="Сумма ставки"><br>
                                    <button id="startmines" class="btn btn-primary" style="width:49%; box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px;margin-bottom:8px;" onclick="startgame()">Начать игру</button>
                                    <button id="finishmines" class="btn btn-primary" style="width:49%; box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px;margin-bottom:8px;" onclick="finishgame()" disabled="">Забрать</button>
                                    <br>
                                    
                                    <div class='select-bomb' style=''>
                                       
                    <p><span>Число мин:</span></p>
                   
                                        <span class="btn btn-xs btn-auto select-bomb-min circle" data-select="3">3</span>
                                        <span class="btn btn-xs btn-auto select-bomb-min circle" data-select="5">5</span>
                                        <span class="btn btn-xs btn-auto select-bomb-min circle" data-select="10">10</span>
                                        <span class="btn btn-xs btn-auto select-bomb-min circle" data-select="24">24</span>
                                        
                                        
                                    </div>
                                    <br>
                                    <div style='display:inline-block; float:left'>
                                    <p><span style='margin-top:7px'><span style="color:#000000">Следующий икс:</span></p>
                                    <p><span class="" style="font-size:44px;" id="MineProfit">1.00</span> <span style="font-size:44px;"><span style="color:#000000"> X</span></p>
                                    </div>
                                    <div style='display:inline-block; float:right'>
                                    <p><span style='margin-top:7px'><span style="color:#000000">Выигрыш:</span></p>
                                    <p><span class="" style="font-size:44px;" id="win"><span style="color:#000000">0.00</span> <span style="font-size:44px;"><span style="color:#000000"> Р</span></p>
                                    </div>
                                </div>
                                </div>
                               
                                
                                <!-- END -->
                            
                            <!-- BATTLE -->
                            <div class="tab-pane fad" id="battle">
                           
                            <center>
    <div class="cg_graph_block game-tbl" style="">
    <div class="cursor"><i class="fas fa-sort-up"></i></div>
    <div class="battle-roulette no-copy">
      <div class="counter flex">
        <span id="timer" style="font-size: 40px;text-align: center;">
          <span style="display: block;font-size: 15px;color: gray;font-weight: 100;"><span style="color:blue"><span style="color:#000000">Возможный выигрыш</span>
          <num style="font-size:28px" id="ProfitBattle"><span style="color:#000000">2.00</num>
          </span></div>
    <svg id="cricle"  version="1" xmlns="http://www.w3.org/2000/svg" width="250" height="250" viewBox="0 0 400 400" >
      <defs><linearGradient id="grad2" x1="0%" y1="0%" x2="0%" y2="100%">
          <stop offset="0%" style="stop-color:#5dc0ff;stop-opacity:1"></stop>
          <stop offset="100%" style="stop-color:#0b6cee;stop-opacity:1"></stop>
          </linearGradient></defs>
          <defs><linearGradient id="grad1" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" style="stop-color:#ff7365;stop-opacity:1;"></stop>
            <stop offset="100%" style="stop-color:#f92e7f;stop-opacity:1"></stop>
            </linearGradient></defs>
            <g class="chart" transform="translate(200, 200)">
              <g class="timer" transform="translate(0,0)">
                <g class="bets" id="circle" style="transform: rotate(0deg); transition: transform 4s cubic-bezier(0.15, 0.15, 0, 1);">
                  <path id="blue" fill="url(#grad2)" d="M1.1021821192326179e-14,-180A180,180,0,1,1,1.1021821192326179e-14,180L9.491012693391987e-15,155A155,155,0,1,0,9.491012693391987e-15,-155Z" transform="rotate(0)" style="opacity: 1;"></path>
                  <path id="red" fill="url(#grad1)" d="M1.1021821192326179e-14,180A180,180,0,1,1,-3.3065463576978534e-14,-180L-2.847303808017596e-14,-155A155,155,0,1,0,9.491012693391987e-15,155Z" transform="rotate(0)" style="opacity: 1; "></path>
                  </g></g></g></svg>
                  </div>
                  </div>
 
                         
                            
                            <div class="col-md-6 bets-tbl" style="">
                            <div class="row">
                            <!-- INPUTS -->
                            <div class="col-6">
                                                    <div class="input-item input-with-label">
                                                        <label for="full-name" class="input-item-label text-center"><span style="color:blue">Сумма</label>
                                                        <input autocomplete="off" id="BetSizeBattle" onkeyup="profitbattle();" class="input-bordered text-center" value="1">
                                                    </div><!-- .input-item -->

                                                    
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-item input-with-label"><label for="full-name" class="input-item-label text-center"><span style="color:blue">Процент</label><input autocomplete="off" class="input-bordered text-center" type="text" name="full-name" value="50" id="BetPerBattle" onkeyup="battlechance(this); profitbattle()" ></div><!-- .input-item -->
                                                   
                                                </div>
                                                  
                            <!-- END INPUTS -->
                            <!-- <div class="row" style="margin-top:-7px"> -->
                                                        <div class="col-6">
                                                            <span class="card-sub-title card-tyy1 text-center">0 - <span id="MinRangeBattle">499</span></span>
                                                            <div id="BattleMin" class="input-item input-with-label"><a id="redselect" onclick="select_team('red', 'blue')" style="" class="btn btn-light btn-block btn-outline"><i class="fa fa-angle-down "></i> <span style="color:red">Красный</a></div><!-- .input-item -->
                                                        </div>
                                                        <div class="col-6">
                                                            <span class="card-sub-title card-tyy1 text-center"><span id="MaxRangeBattle">500</span> - 999</span>
                                                            <div id="BattleMax" class="input-item input-with-label btn-block"><a id="blueselect" style="" onclick="select_team('blue', 'red')" class="btn btn-light btn-block btn-outline"><i class="fa fa-angle-up "></i> <span style="color:blue">Синий</a></div><!-- .input-item -->
                            
                                                        </div>
                            
                            </div>
                            <button style="color:#fff; " onclick="battlebet()" class="btn btn-light btn-block" id="createBetBattle">Сделать ставку <i class="fas fa-coins"></i></button>
                            <div id="error_battle" style="display:none;pointer-events: none; box-shadow: rgba(255, 105, 114, 0.14) 0px 5px 23px 0px;" class="btn  btn-block bg-danger"></div>
                            
                           <div id="success_battle" style="display:none;pointer-events: none; box-shadow: rgba(255, 105, 114, 0.14) 0px 5px 23px 0px;" class="btn  btn-block bg-success"></div>
                            </div>
                            </div> <!-- ROW -->
                            </center>
                            <div class="tab-pane fade active show" id="dice-game">
                                <div style="margin-top:30px">

                                    <div class="row no-gutters height-100">
                                        <div class="col-md-6 ">

                                            <div class="row">
                                                <div class="col-12 mobileProfit">
                                                    <ul class="token-info-list text-center" style="padding-bottom:0px">
                                                        <li class="" style="font-size:64px;margin-top:-47px" id="BetProfitD">1.11</li>
                                                        <span class="card-sub-title card-tyy">Возможный выигрыш</span>
                                                    </ul>

                                                </div>
                                                <div class="col-6">
                                                    <div class="input-item input-with-label">
                                                        <label for="full-name" class="input-item-label text-center"><span style="color:blue">Сумма</label>
                                                        <input autocomplete="off" id="BetSize" onkeyup="validateBetSizeD(this);updateProfit()" class="input-bordered text-center" value="1">
                                                    </div><!-- .input-item -->

                                                    <div class="d-sm-flex justify-content-center" style="width:100%;margin:0">
                                                        <span class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;" onclick="var x = ($('#BetSize').val()*2);$('#BetSize').val(parseFloat(x.toFixed(2)));updateProfit()">Удвоить</span>
                                                        <span onclick="$('#BetSize').val(Math.max(($('#BetSize').val()/2).toFixed(2), 1));updateProfit()" class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;margin-left:5px">Половина</span>
                                                    </div>

                                                    <style>
                                                        .tll{
                                                            margin-left:-15px; margin-top:6px
                                                        }
                                                   @media (max-width: 576px) {
                                                       .tll{
                                                           margin-left:19px; margin-top:6px
                                                       }
                                                    }
                                                    </style>
                                                    <div class="d-sm-flex justify-content-center tll" style="">
                                                        <span onclick="var max = $('#userBalance').attr('myBalance');$('#BetSize').val(Math.max(max,1));updateProfit()" class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;">Макс</span>
                                                        <span onclick="$('#BetSize').val(1);updateProfit()" class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;margin-left:5px">Мин</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-item input-with-label"><label for="full-name" class="input-item-label text-center"><span style="color:blue">Процент</label><input autocomplete="off" class="input-bordered text-center" type="text" name="full-name" value="90" id="BetPercent" onkeyup="validateBetPercentD(this);updateProfit()"></div><!-- .input-item -->
                                                    <div class="d-sm-flex justify-content-center" style="width:100%;margin:0">
                                                        <center>
                                                                                                                <span class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;" onclick="$('#BetPercent').val(Math.min(($('#BetPercent').val()*2).toFixed(2), 95));updateProfit()">Удвоить</span>
                                                        <span class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;" onclick="$('#BetPercent').val(Math.max(($('#BetPercent').val()/2).toFixed(2).replace(/.00/g, ''), 1));updateProfit()">Половина</span>
                                                    </center></div>
                                                    <div class="d-sm-flex justify-content-center tll">
                                                        <span class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;" onclick="$('#BetPercent').val(95);updateProfit()">Макс</span>
                                                        <span class="badge badge-dim badge-md badge-light" style="min-width:0px!important; padding: 4px 6px;margin-left:5px" onclick="$('#BetPercent').val(1);updateProfit()">Мин</span>
                                                    </div>
                                                </div>

                                                <div class="col-12 text-center hbetf" style="margin-top:30px ">
                                                    <center style="font-size:12px"><span style="color:blue">Hash игры:</center>
                                                    <span id="hashBet">
                                                       <span style="color:blue"> 7638577a6ed7805e1f4de47f163cafab0beeacb0a66c58423181c6c32061d09d435f485ba81bf4be8621c6e2b500c181d8fb2b407b419d901d64e027bbc5e26c


                                                    </span>
                                                </div>


                                            </div>
                                            <script>
                                                function validateBetPercentD(inp) {
                                                    if (inp.value > 95) {
                                                        inp.value = 95;
                                                    }


                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                        .replace(/[^\d,.]*/g, '')
                                                        .replace(/([,.])[,.]+/g, '$1')
                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                }

                                            </script>
                                            <script>
                                                function validateBetSizeD(inp) {

                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                        .replace(/[^\d,.]*/g, '')
                                                        .replace(/([,.])[,.]+/g, '$1')
                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                }

                                            </script>


                                        </div>
                                        <div class="col-md-1 "></div>
                                        <div class="col-md-5 height-100">
                                            <div class="token-info  ">
                                                <div class="heded">
                                                    <ul class="token-info-list text-center desProfit">
                                                        <li class="" style="font-size:64px;margin-top:-47px" id="BetProfit">19</li>
                                                        <span class="card-sub-title card-tyy">Возможный выигрыш</span>
                                                    </ul>
                                                    <div class="row" style="margin-top:-7px">
                                                        <div class="col-6">
                                                            <span class="card-sub-title card-tyy1 text-center">0 - <span id="MinRange"></span></span>
                                                            <div id="buttonMin" class="input-item input-with-label"><a onclick="betMin()" style="color:#fff" class="btn btn-light btn-block">Меньше</a></div><!-- .input-item -->
                                                        </div>
                                                        <div class="col-6">
                                                            <span class="card-sub-title card-tyy1 text-center"><span id="MaxRange"></span> - 999999</span>
                                                            <div id="buttonMax" class="input-item input-with-label btn-block"><a style="color:#fff" onclick="betMax()" class="btn btn-light btn-block">Больше</a></div><!-- .input-item -->
                                                        </div>
                                                        <div class="col-12" style="margin-top:-20px">
                                                           <div style="background:#fff;padding:0px 20px!important" class="btn  btn-block"></div>

                                                        </div>

                                                        <div class="col-12">
                                                            <center>
                                                                <div id="betLoad" class='cssload-loader' style="background: none;display:none">
                                                                    <div class='cssload-inner cssload-one'></div>
                                                                    <div class='cssload-inner cssload-two'></div>
                                                                    <div class='cssload-inner cssload-three'></div>
                                                                </div>
                                                            </center>
                                                            <div id="succes_bet" style="background: linear-gradient(to right, #0ACB90, #2BDE6D);display:none;pointer-events:none;box-shadow: 0 5px 23px 0 rgba(0, 215, 126, 0.27);" class="btn btn-success btn-block"></div>


                                                        </div>
                                                        <div class="col-12">
                                                            <div id="error_bet" style="display:none;pointer-events:none; box-shadow: 0 5px 23px 0 rgba(255, 105, 114, 0.14);" class="btn  btn-block bg-danger"></div>
                                                        </div>


                                                    </div>
                                                    <center id="checkBet" data-toggle="modal" data-target="#checkDiceModal" style="text-align: center; margin-top:5px;display:none;-webkit-user-select: none;-moz-user-select: none; cursor:pointer" href="">Проверить игру</center>
                                                    <div class="modal fade" id="checkDiceModal" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-md modal-dialog-centered">
                                                            <div class="modal-content"><a style="cursor:pointer" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                                                                <div class="popup-body" id="modalDice">


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <script>
                            function exit() {
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
					
										},	
                                                                                data: {
                                                                                    type: "exit"
                                                                                  
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               
					location.reload(true);
                                                                return 
                                            }else{
                                               
				alert('Что-то пошло не так, обратитесь в поддержку...');
                                            }
                                        }   
   });
                              
}
                                  //bets 
                                                        function betMin() {
                                    var nwin = $('#MinRange').html();
                                    var win = ((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2);
                                    var sum = $('#BetSize').val();
                                    var coef = win - sum;
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
					$('#betLoad').css('display', '');
  $('#error_bet').css('display', 'none');
   $('#succes_bet').css('display', 'none');
										},	
                                                                                data: {
                                                                                    type: "minbet",
                                                                                  win: coef,
                                                                                  sum: sum,
                                                                                   nwin: nwin,
                                                                                  per: $('#BetPercent').val()
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                          $('#betLoad').css('display', 'none');
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               
                                               
					$('#error_bet').css('display', 'none');							   
				$('#succes_bet').show();																		$('#succes_bet').html('Выиграли <b>' +obj.fullwin+ '</b>');
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return 
                                            }else{
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance); 
				$('#succes_bet').css('display', 'none');								$('#error_bet').html(obj.error);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return $('#error_bet').css('display', '');
												
											}
                                        }
                                    });
                                                          
}
                                                     
                                  function betMax() {
                                    var nwin = $('#MaxRange').html();
                                    var win = ((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2);
                                    var sum = $('#BetSize').val();
                                    var coef = win - sum;
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
											
$('#betLoad').css('display', '');
  $('#error_bet').css('display', 'none');
   $('#succes_bet').css('display', 'none');
										},	
                                                                                data: {
                                                                                    type: "maxbet",
                                                                                    win: coef,
                                                                                    sum: sum,
                                                                                    nwin: nwin,
                                                                                    per: $('#BetPercent').val()
                                                                                  
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                          $('#betLoad').css('display', 'none');
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
											   
			$('#error_bet').css('display', 'none');																			$('#succes_bet').html('Выиграли <b>' +obj.fullwin+ '</b>');
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return $('#succes_bet').css('display', '');
                                            }else{
                                               $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
$('#succes_bet').css('display', 'none');									$('#error_bet').html(obj.error);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash);                                                               return $('#error_bet').css('display', '');
												
											}
                                        }
                                    });
}                                                           
                                                        

                                                    </script>

                                                    <script>
                                                        function updateProfit() {
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#BetProfitD').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                    }

                                                                    function sss() {
                                                                        $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
                                                                    }
                                                                    $('#BetPercent').keyup(function() {
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                    });
                                                                    $('#BetSize').keyup(function() {
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                    });
                                                        
                                                        function updateBalance(start, end) {

                var el = document.getElementById('userBalance');

                od = new Odometer({
                    el: el,
                    value: start
                });

                od.update(end);
                                                            
                var elMob = document.getElementById('userBalanceMob');

                odelMob = new Odometer({
                    el: elMob,
                    value: start
                });

                odelMob.update(end);
            }
                                                                </script>




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <style>
                                    .effect-shine {
  -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.6) 30%, #000 50%, rgba(0,0,0,.6) 70%);
  -webkit-mask-size: 200%;
  animation: shine 2s infinite;
}

@-webkit-keyframes shine {
  from {
    -webkit-mask-position: 150%;
  }
  
  to {
    -webkit-mask-position: -50%;
  }
}
                                    
                                    
                                </style>
                                
                                <div class="card-head has-aside" style="margin-top:80px">
                                    <h4 class="card-title"><span style="color:blue">Сейчас онлайн </h4>
                                    <div style="margin-left: 177px;display: inline-block;position: absolute;" class="circle-online pulse-online"></div>
                                    <span id='oe' style="margin-left: 194px;display: inline-block;position: absolute;margin-top: 3px;"><?=$online?> </span>
                                    
                                    <div class="card-opt"><a style="opacity: 0.8;font-weight: bolder;" onclick="$('.jghtt').fadeToggle(); $('.ngh').toggle();" class="link link-light ">
                                        <span class="ngh"><em class="ti ti-angle-down" style="font-size: 17px;cursor:pointer"></em></span>
                                        <span class="ngh" style="font-weight: 400; display: none;font-size: 17px;cursor:pointer"><em class="ti ti-angle-up"></em></span>
                                        </a><div class="toggle-class dropdown-content"><ul class="dropdown-list"><li><a href="#">30 days</a></li><li><a href="#">1 years</a></li></ul></div></div>
                                </div>
                                <table class="table jghtt tnx-table table-responsive text-center" style="margin-top:20px">
                                   
                                            
                                        </tr>

                                        <tr style="opacity:0">
                                           
                                                
                                            </td>
                                            <td class="text-danger" style="font-weight:600">0.00</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div><!-- .tab-pane -->
                            

                        </div>
                    </div> <!-- .card-innr -->
                </div> <!-- .content-area -->
            </div><!-- .col -->



            <div class="main-content col-lg-9" id="support" style="display:none" >
                    <div class="loader-support " id="loaderSupport" style="display:none">
                                    <svg viewBox="0 0 80 80">
                                        <circle id="test" cx="40" cy="40" r="32"></circle>
                                    </svg>
                                </div>

                    <script>

                        function  chsel(){
                        $('#notch').hide();
                        if ($('#typet').val() == 1){
                            $('#notch_m').html('Обязательно укажите дату, платежную систему, сумму и детали платежа (комментарий, номер транзакции и т.д.)');
                            $('#notch').show();
                        }
                        if ($('#typet').val() == 2){
                            $('#notch_m').html('Обязательно укажите ID вывода (первый столбец в истории)');
                            $('#notch').show();
                        }
                    }
                    
                    </script>

                    <div class="content-area card">
                        
                        
                        <div class="content-area " id="createTicket" style="display:none">
                            <div class="card-innr card-innr-fix">
                                <div class="card-head has-aside">
                                    <h4 class="card-title">Новый тикет</h4>
                                    <div class="card-opt"><a onclick="$('#createTicket').hide();$('#listTickets').fadeIn(1000);" style="cursor:pointer;color:#2c80ff" class="link ucap  "><em class="fas fa-arrow-left mr-2"></em> Назад</a></div>
                                </div>
                                <div class="gaps-1x"></div><!-- .gaps -->

                                <div class="input-item input-with-label"><label class="input-item-label ">Раздел</label>

                                    <div class="select-wrapper">
                                        <select id="typet" class="input-bordered" autocomplete="off" onchange="chsel()">
                                            <option style="display:none;"></option>
                                            <option value="1">Проблема с пополнением</option>
                                            <option value="2">Проблема с выводом</option>
                                            <option value="3">Сотрудничество</option>
                                            <option value="4">Жалобы/предложения</option>
                                            <option value="5">Другое</option>
                                        </select></div>

                                </div>
                                <div class="input-item input-with-label"><label class="input-item-label ">Тема</label><input id="sub" class="input-bordered" type="text" autocomplete="off"></div>
                                <div class="input-item input-with-label"><label class="input-item-label ">Сообщение</label><textarea id="mes" class="input-bordered input-textarea" autocomplete="off"></textarea>
                                </div>
                                <div id="notch" class="token-calc-note note note-plane mb-10" style="display:none"><em class="fas fa-info-circle text-light"></em><span style="font-size: 13px !important;
margin-bottom: 15px;" class="note-text text-light" id="notch_m"></span></div>

                                <div id="te" class="note note-plane note-danger note-sm pdt-1x pl-0" style="color: rgba(255,104,104,0.9) !important;display:none"></div>
                                <div class="gaps-1x"></div>

                                <button id="sbt" class="btn btn-primary" onclick="sendTicket()">Отправить</button>

                            </div><!-- .card-innr -->
                        </div>
                        
                        <div class="token-transaction  card-full-height" id="listTickets" style="display:none">
                            <div class="card-innr">
                                <div class="card-head has-aside">
                                    <h4 class="card-title">Служба поддержки</h4>
                                    <div class="card-opt"><a onclick="$('#listTickets').hide();$('#createTicket').fadeIn(1000);" style="cursor:pointer;color:#2c80ff" class="link ucap  "><em class="fas fa-plus mr-2 mb-1"></em> Создать тикет </a></div>
                                </div>
                                
                             <div id="pqfwf"></div>


                                


                            </div>
                        </div>
                    
                        <div class="chat-wrap" id="chat" style="display:none;height: auto!important;">
                        </div>

                        <script>
                            
                            
                            function closeTicket(id){
                                
                                 $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    data: {
                                        id: id,
                                        type: 'closeTicket',
                                        sid: Cookies.get('sid')
                                        
                                    },
                                    success: function(data) {
                                     var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            return supStart();
                                        }
                                    }
                                });
                                
                            }
                                
                                function showIdTicket(id) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        $('#loaderSupport').show();
                                    },
                                    data: {
                                        type: 'showIdTicket',
                                        sid: Cookies.get('sid'),
                                        id: id
                                    
                                    },
                                    success: function(data) {
                                        $('#loaderSupport').hide();
                                        
                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            $('#listTickets').hide();
                                            $('#createTicket').hide();
                                            $('#chat').show();
                                            $('#chat').html(obj.success.text);
                                            $('input').focus();
        var block = document.getElementById("scbd");
                                            block.scrollTop = block.scrollHeight;
                                            
     $('[data-target="ch"]').each(function (index, value) { 
  $(this).html($(this).text().replace(/([^\S]|^)(((https?\:\/\/)|(www\.))(\S+))/gi,  function(match, space, url){
      var hyperlink = url;
      if (!hyperlink.match('^https?:\/\/')) {
        hyperlink = 'http://' + hyperlink;
      }
      return space + '<a target="_blank" style="color: black;box-shadow: 0 1px 0 currentColor;"href="' + hyperlink + '">' + url.toLowerCase() + '</a>';
    }));
});
                                            
                                            
                                            
                                        }

                                    }
                                });
                                
                            }
                                
                                
                            function sendMes(nti){

                              
                                if ($('#mesT').val() == "") {
                                    $('#tee').css('display', 'block');
                                    return $('#tee').html('Введите сообщение');
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        $('#tee').css('display', 'none');
                                        $('#sbtM').addClass('disabled');
                                    },
                                    data: {
                                        type: 'sendMessage',
                                        id: nti,
                                        sid: Cookies.get('sid'),
                                        mes: $('#mesT').val()
                                    },
                                    success: function(data) {
                                        $('#sbtM').removeClass('disabled');
                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            $('#chdi').html($('#chdi').html() + '<div class="chat-messages-item self"><div class="chat-messages-content"><div class="chat-messages-bubble"><p>' + obj.success.mes + '</p></div><ul class="chat-messages-info"><li><a href="#"></a></li></ul></div></div>');
                                            var block = document.getElementById("scbd");
                                            block.scrollTop = block.scrollHeight;
                                            return $('#mesT').val('');
                                        }else{
                                           
                                        $('#tee').html(obj.error.text);
                                        $('#tee').css('display', 'block');
                                        }

                                    }
                                });
                                

                            }
                            
                            
                            
                            
                            
                            function supStart() {
                                
                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        $('#loaderSupport').show();
                                    },
                                    data: {
                                        type: 'getTicketList',
                                        sid: Cookies.get('sid')
                                    },
                                    success: function(data) {
                                        $('#loaderSupport').hide();
                                        
                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                           $('.new-mes').hide();
                                           $('#listTickets').show();
                                           $('#chat').hide();
                                           return $('#pqfwf').html(obj.success.text);
                                        } 

                                    }
                                });
                                
                            }
                            
                            
                            function sendTicket() {
                                //$('#te').css('display', 'none');

                                if ($('#typet').val() < 1 || $('#typet').val() > 5) {
                                    $('#te').css('display', 'block');
                                    return $('#te').html('Укажите раздел');
                                }
                                if ($('#sub').val() == "") {
                                    $('#te').css('display', 'block');
                                    return $('#te').html('Укажите тему');
                                }
                                if ($('#mes').val() == "") {
                                    $('#te').css('display', 'block');
                                    return $('#te').html('Введите сообщение');
                                }


                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        $('#te').css('display', 'none');
                                        $('#sbt').addClass('disabled');
                                    },
                                    data: {
                                        type: 'createTicket',
                                        sid: Cookies.get('sid'),
                                        cr: $('#typet').val(),
                                        sub: $('#sub').val(),
                                        mes: $('#mes').val()
                                    },
                                    success: function(data) {
                                        $('#sbt').removeClass('disabled');
                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            showIdTicket(obj.success);
                                            
                                            // return false;
                                        } else {

                                            $('#te').html(obj.error.text);
                                            $('#te').css('display', 'block');
                                        }

                                    }
                                });



                            }

                        </script>




                    </div> <!-- .content-area -->
                </div><!-- .col -->
              
            <div class="main-content col-lg-9" id="profile" style="display:none">
                <div class="content-area card">
                    <div class="card-innr">
                        <div class="card-head">
                            <h4 class="card-title">Ваш профиль</h4>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal-data">Изменить пароль</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Социальные сети</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#design">Настройка темы</a></li>
                        </ul><!-- .nav-tabs-line -->
                        <div class="tab-content" id="profile-details">
                            <div class="tab-pane fade show active" id="personal-data">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item input-with-label"><label for="full-name" class="input-item-label">Новый пароль</label><input id="resetPass" class="input-bordered" type="password"></div><!-- .input-item -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item input-with-label"><label for="full-name" class="input-item-label">Повторите пароль</label><input id="resetPassRepeat" class="input-bordered" type="password"></div><!-- .input-item -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a id="error_resetPass" class="btn  btn-block btnError bg-danger " style="display:none; color:#fff;margin-bottom:15px; margin: 0 auto"></a>
                                        <a id="succes_resetPass" class="btn  btn-block btnSuccess" style="display:none; color:#fff; cursor:default;  margin-bottom:10px;    background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109));">Пароль изменен</a>
                                    </div>
                                </div>
                                <div class="gaps-1x"></div><!-- 10px gap -->
                                <div class="d-sm-flex justify-content-between align-items-center"><button class="btn btn-primary" style=" box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);" onclick="resetPass()">Изменить</button>

                                    <script>

                                        function resetPass() {
										if ($('#resetPass').val() == ''){
										$('#error_resetPass').show();
										return $('#error_resetPass').html('Введите пароль');
										}
										if ($('#resetPass').val().length < 5){
										$('#error_resetPass').show();
										return $('#error_resetPass').html('Пароль от 5 символов');
										}
									if ($('#resetPass').val() != $('#resetPassRepeat').val()){
										$('#error_resetPass').show();
										return $('#error_resetPass').html('Пароли не совпадают');
									}
									$.ajax({
                                        type: 'POST',
                                        url: 'action.php',
										beforeSend: function() {
											$('#error_resetPass').hide();
											$('#succes_resetPass').hide();
										},	
                                        data: {
                                            type: "resetPassPanel",
                                            sid: Cookies.get('sid'),
                                            newPass: $('#resetPass').val()
                                        },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               $("#succes_resetPass").show();
											 
																						 return false;
                                            }else{
												$('#error_resetPass').show();
												return $('#error_resetPass').html(obj.error);
											}
                                        }
                                    });
                                    
                                }
								</script>






                                    <div class="gaps-2x d-sm-none"></div>
                                </div>

                            </div><!-- .tab-pane -->
                            
                            <div class="tab-pane fade" id="settings">
                                                        
                            Привязан аккаунт: <a href="<?=$social_link?>" target="_blank"><?=$social_link?></a>
                                                            </div>
                                                             <div class="tab-pane fade" id="design">
                                                        
                            Тема: <a href="/?mod=night"><span style="color:blue">Темная</a>  <li class="active"><a href="/"><span style="color:blue">Обычная</a></li>
                                                            </div><!-- .tab-pane -->
                            

                        </div><!-- .tab-content -->
                    </div><!-- .card-innr -->
                </div>
            </div>
        
<div class="main-content col-lg-9" id="ref" style="display:none">
                <div class="content-area card">
                    <div class="card-innr">
                        <div class="card-head">
                            <h5 class="card-title card-title-md"><span style="color:blue">Приглашайте друзей и зарабатывайте</h5>
                        </div>
                        <div class="card-text">
                            <p><span style="color:blue">Получайте <strong>10% сразу на баланс</strong> с каждого пополнения реферала.</p>
                        </div>
                        <div class="referral-form">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 font-bold">Ваша ссылка</h5>
                            </div>
                            <div class="copy-wrap mgb-1-5x mgt-1-5x"><span class="copy-feedback"></span><em class="fa fa-link"></em><input type="text" class="copy-address" <span style="color:blue" value="http://<?=$linksite?>/?i=<?=$id?>" disabled=""><button class="copy-trigger copy-clipboard" data-clipboard-text="http://<?=$linksite?>/?i=<?=$id?>"><em class="ti ti-files"></em></button></div><!-- .copy-wrap -->
                        </div>

                        <div class="note note-plane note-light note-md font-italic"><em class="fas fa-info-circle"></em><p style="padding-top: 3px;"><span style="color:blue">Pеферальная ссылка изменена</p></div>
                        <ul class="share-links" style="display:none">
                            <li>Поделиться : </li>
                            <li><a href="#"><em class="fab fa-google-plus-g"></em></a></li>
                            <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                            <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                            <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                        </ul>
                    </div>
                </div>


                                <div class="d-sm-flex justify-content-center">

                    <div class="content-area card col-lg-12" style="border-radius:0 6px 6px 0">
                        <div class="card-innr">
                            <style>
                                #example1_filter2{
                                    display:none;
                                }
                                #example1_length{
                                    display:none;
                                }
                                @media (max-width:500px) {
                                    #example1_paginate {
                                            display: inline-grid;
                                    }
                                }
                                @media (max-width:451px) {
                                    #example1 {
                                            display: block!important;
                                    }
                                }
                            </style>
                            <table id="example1" class="display table-responsive dataTable no-footer" style="width:100%;    display: inline-table;">
                                <thead>
                                    <tr>

                                        <th style="width:20%" class="text-center"><span style="color:blue">ID</th>
                                        <th style="width:20%" class="text-center"><span style="color:blue">Дата</th>
                                        <th style="width:40%" class="text-center"><span style="color:blue">Логин</th>
                                        <th style="width:20%" class="text-center"><span style="color:blue">Прибыль (Всего: 0)</th>


                                    </tr>
                                </thead>
                                <tbody class="">
                                    
                                    
                                      <?php 
while($row = mysql_fetch_array($result_ref)) {
 
$id_ref = $row['id'];
$date = $row['date_reg'];
$log_ref = $row['login']; 
echo "<tr class='text-center odd' role='row'><td class='sorting_1'>$id_ref</td><td>$date</td><td style='text-transform: capitalize!important;'>$log_ref</td><td>0.00</td></tr>";

  }
  
                                      ?>
      
                                      </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- .col -->
            </div><!-- .col -->


            <div class="main-content col-lg-9" id="bonus" style="display:none">
                <div class="card-innr card">
                    <div class="status status-empty">
                        <div class="status-icon"><em class="ti ti-gift"></em></div><span class="status-text text-dark"><span style="color:blue">Получайте бонус</span>
                        <div class="row">
                            
                                                        <div class="offset-md-3 col-md-6">
                                <div style="transform: scale(0.65);" class="g-recaptcha" data-sitekey="<?=$sitekey?>"></div>
                            </div>

                            <div class="offset-md-3 col-md-6">
                                    <a class="btn btn-primary" style=" box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px;" id="butPromo" onclick="getDaily()">Получить</a>
                            </div><!-- .col -->
                                                        
                        </div>
                        <a id="error_promo" class="btn  btnError bg-danger " style="display:none; color:#fff;margin-bottom:15px; margin: 0 auto;margin-top: 25px;cursor:default;"></a>
                        <a id="succes_promo" class="btn btnSuccess" style="margin-top: 25px; display:none; color:#fff; cursor:default;  margin-bottom:10px;    background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109));"></a>
                    </div>
                </div>
                <p class="text-light text-center"><em class="fas fa-info-circle" style="font-size:11px"></em><span style="color:blue"> Депозит для вывода средств 30р</p>
            </div>


            <script>
                function getPromo() {
										if ($('#g-recaptcha-response').val() == ''){
										$('#error_promo').show();
										return $('#error_promo').html('Поставьте галочку');
										}
									
										
									$.ajax({
                                        type: 'POST',
                                        url: 'action.php',
										beforeSend: function() {
											$('#butPromo').html('<div class="loader"></div>').addClass("disabled");
										},	
                                        data: {
                                            type: "getQiwi",
                                            sid: Cookies.get('sid'),
											rc: $('#g-recaptcha-response').val()
                                        },
                                        success: function(data) {
                                            $('#butPromo').html('Получить').removeClass("disabled");
											$('#error_promo').hide();
                                            var obj = jQuery.parseJSON(data);
                                            if ('success' in obj) {
                                               $("#succes_promo").show();
											  $('#succes_promo').html(obj.success.text);
											  $('#promoBalance').html(obj.success.promo_balance);
											  updateBalance(obj.success.balance, obj.success.new_balance);
											  grecaptcha.reset();
																						 return false;
                                            }else{
												grecaptcha.reset();
												$('#error_promo').show();
												$("#succes_promo").hide();
												return $('#error_promo').html(obj.error.text);
											}
                                        }
                                    });
                                    
                                }
                
                </script>


            
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#example1").dataTable({
                        "aoColumnDefs": [{
                            'bSortable': false,
                            'aTargets': [1, 2]
                        }],
                        "order": [
                            [5, "desc"]
                        ]
                    });
                });

            </script>

        </div><!-- .container -->
    </div><!-- .container -->
</div><!-- .page-content -->
<div class="footer-bar">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8">

            </div><!-- .col -->
            <div class="col-md-4 mt-2 mt-sm-0">
                <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                       
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .footer-bar -->

<div class="modal fade" id="modalDeposit" tabindex="-1">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">


                <p>Выберите способ оплаты:</p>

                <ul class="pay-list guttar-15px">
                    <input id='systemPay' style="display:none"></input>
                     <!--                 
                    <li class="pay-item" onclick="$('#systemPay').val('3')"><input type="radio" class="pay-check" name="pay-option" id="pay-coin"><label class="pay-check-label" for="pay-coin">
                            <img src="../images/qiwipay.png" style="height: 35px;margin: 10px;" alt="pay-logo"></label></li> -->

                    <li class="pay-item" onclick="$('#systemPay').val('1')"><input type="radio" class="pay-check" name="pay-option" id="pay-paypal"><label class="pay-check-label" style='height:65px' for="pay-paypal"><img src="../images/fk-logo.png" alt="pay-logo" style="height: 40px;margin: 10px;"></label></li>
                       <!--
                    <li class="pay-item" onclick="$('#systemPay').val('2')"><input type="radio" class="pay-check" name="pay-option" id="pay-paypal1"><label class="pay-check-label" for="pay-paypal1"><img src="../images/pa.png" alt="pay-logo" style="    height: 22px;width: 70px;margin-top: 16px;margin-bottom: 16px;"></label></li> -->

                </ul><label for="token-address" class="input-item-label">Сумма:</label>
                <div class="input-item input-with-label"><input class="input-bordered col-6" type="text" id="depositSize" value="100" style=""><span class="input-note">* Все комиссии берем на себя</span></div>
                
                
                
                
                <ul class="d-flex flex-wrap align-items-center guttar-30px">
                    <li><a onclick="deposit_default()"  class="btn btn-primary" style="color:#fff; box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);" id='depositButton'>Далее</a></li>
                    <a id="error_deposit" style="color: rgb(255, 255, 255); display:none" class="btn btnError bg-danger "></a>

                </ul>
                
                <div class="gaps-2x"></div>
                <hr>
                <div class="gaps-2x"></div>

                <table class="table tnx-table">
                    <thead>
                        <tr>
                            <th>Номер операции</th>
                            <th>Дата</th>
                            <th>Сумма</th>

                        </tr><!-- tr -->
                    </thead><!-- thead -->
                    <tbody id="lastDepN">
                        <?php 
while($row = mysql_fetch_array($result_deps)) {
 
$id_dep = $row['transaction'];
$date_dep = $row['data'];
$sum_dep = $row['suma']; 
echo "<tr>
                    <td>$id_dep</td>
                    <td>$date_dep</td>
                    <td>$sum_dep</td>
                    </tr>";

  }
  
                                      ?>              
                                      </tbody><!-- tbody -->
                    <center id="loadpw" style="display:none">Загрузка...</center>
                </table>
    <script>
    
    
    
    function deposit() {
						if ( $('#systemPay').val() > 3 || !$.isNumeric($('#systemPay').val())){
							$('#error_deposit').show();
							return $('#error_deposit').html('Укажите систему пополнения');
						}
						if ( $('#depositSize').val() == ''){
							$('#error_deposit').show();
							return $('#error_deposit').html('Введите сумму');
						}
						
						if (!$.isNumeric($('#depositSize').val())){
							$('#error_deposit').show();
							return $('#error_deposit').html('Введите корректную сумму');
						}
						$.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: {
                        type: "deposit",
                        sid: Cookies.get('sid'),
                        system: $('#systemPay').val(),
                        size: $('#depositSize').val()
                    },
					  beforeSend: function(data) {
						
						$('#depositButton').addClass('disabled').html('<div class="loader"></div>');
					},
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        if ('success' in obj) {
							window.location.href = obj.success.location;
                        }

                        if ('error' in obj) {
                            $('#depositButton').removeClass('disabled').html('Далее');
                            $('#error_deposit').show();
                            return $('#error_deposit').html(obj.error.text);
                        }

                    }
                });
						
					}
    
    
        
        function getNowDeposits(){
                            if ($('#lastDepN').html() !== ""){
                                return;
                            }
                            $.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: {
                        type: "getLasterDep",
                        sid: Cookies.get('sid')
                    },
					  beforeSend: function(data) {
						$('#loadpw').show();
					},
                    success: function(data) { 
                        $('#loadpw').hide();
                        var obj = jQuery.parseJSON(data);
                      
                        if ('success' in obj) {
                            return $('#lastDepN').html(obj.success.text);
                        }else{
                            $('#loadpw').html("Ошибка");
                        }


                    }
                });
                        }
        
        
    </script>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- Modal End -->


<div class="modal fade" id="withdraw" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">


                <div class="row">
                    <div class="col-md-6">
                        <div class="input-item input-with-label"><label for="swalllet" class="input-item-label">Выберите систему </label><select autocomplete="off" class="select-bordered select-block select2-hidden-accessible" id="hide_search" onchange="withdrawSelect()" tabindex="-1" aria-hidden="true">
                                <optgroup label="Платежные системы">
                                    <option value="4">Qiwi</option>
                                    <option value="2">Payeer</option>
                                    <option value="3">WebMoney</option>
                                    <option value="1">Яндекс.Деньги</option>
                                </optgroup>
                                <optgroup label="Мобильная связь (Россия)">
                                    <option value="5">Билайн</option>
                                    <option value="6">Мегафон</option>
                                    <option value="7">МТС</option>
                                    <option value="8">Теле 2</option>
                                </optgroup>
                                <optgroup label="Банковские карты (Россия)">
                                    <option value="9">VISA</option>
                                    <option value="10">MASTERCARD</option>
                                </optgroup>
                            </select></div><!-- .input-item -->
                    </div><!-- .col -->
                </div><!-- .row -->
                <div class="input-item input-with-label"><label for="token-address" class="input-item-label">Укажите реквизиты:</label><input autocomplete="off" placeholder="+79XXXXXXXXX" class="input-bordered" id="walletNumber" value=""><span class="input-note" id="cardLL" style="display:none">Только для РФ</span></div>
                <div class="input-item input-with-label"><label class="input-item-label">Сумма:</label><input autocomplete="off" class="input-bordered" id="WithdrawSize" value=""></div>
                <span class="text-light  d-inline-flex align-items-center"><span class="mb-0"><small id="limitsW">От <b><?=$min_withdraw_sum?></b> до <b>75000</b> рублей за одну выплату</small></span> <span class="badge badge-disabled ml-2">Комиссия: 0%</span></span>



                <a id="error_withdraw" class="btn  btn-block btnError bg-danger " style="display:none; color:#fff;margin-bottom:15px; margin: 0 auto;margin-top: 10px;"></a>
                <a id="succes_withdraw" class="btn  btn-block btnSuccess" style="margin-top: 10px;display:none; color:#fff; cursor:default;  margin-bottom:10px;    background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109));">Выплата успешно создана</a>
                <div class="gaps-2x"></div>
                <div class="d-sm-flex justify-content-between align-items-center"><button id="withB" onclick="createwithdraw();" class="btn btn-primary" style="width:100px;box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);">Вывести</button></div>



                <script>
                    function withdraw() {
                        if ($('#WithdrawSize').val() == '' || $('#walletNumber').val() == '' || $('#hide_search').val() == '') {
                            $('#error_withdraw').show();
                            return $('#error_withdraw').html('Заполните все поля');
                        }
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            beforeSend: function() {
                                $('#withB').addClass('disabled');
                                $('#withB').html('<div class="loader" style="height:23px;width:23px"></div>');


                            },
                            data: {
                                type: "withdraw",
                                sid: Cookies.get('sid'),
                                system: $('#hide_search').val(),
                                size: $('#WithdrawSize').val(),
                                wallet: $('#walletNumber').val()
                            },
                            success: function(data) {
                                $('#error_withdraw').hide();
                                $('#succes_withdraw').hide();

                                $('#withB').removeClass('disabled');
                                $('#withB').html('Выплата');
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {

                                    $('#succes_withdraw').show();
                                    $('#emptyHistory').hide();
                                    var tt = $('#withdrawT').html();
                                    $('#withdrawT').html(obj.success.add_bd + tt);
                                    updateBalance(obj.success.balance, obj.success.new_balance);
                                }

                                if ('error' in obj) {
                                    $('#error_withdraw').show();
                                    return $('#error_withdraw').html(obj.error.text);
                                }

                            }
                        });
                    }


                    function withdrawSelect() {
                        $('#cardLL').hide();
                        $('#walletNumber').val('');
                        var e = $('#hide_search').val();
                        if (e >= 5 && e <= 8) {
                            $('#nameWithdraw').html('Номер телефона:');
                            $('#walletNumber').attr('placeholder', '');
                        }
                        if (e >= 1 && e <= 4) {
                            if (e == 4) {
                                $('#walletNumber').attr('placeholder', '+79XXXXXXXXX');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 2) {
                                $('#walletNumber').attr('placeholder', 'P1000000');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 1) {
                                $('#walletNumber').attr('placeholder', '410011499718000');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 3) {
                                $('#walletNumber').attr('placeholder', 'R123456789000');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            $('#nameWithdraw').html('Номер кошелька:');
                        }
                        if (e >= 9) {
                            $('#nameWithdraw').html('Номер карты:');
                            $('#cardLL').show();

                            if (e == 10) {
                                $('#walletNumber').attr('placeholder', '512107XXXX785577');
                                $('#limitsW').html('От <b>1200</b> до <b>75000</b> рублей за одну выплату');
                            } else {
                                $('#walletNumber').attr('placeholder', '412107XXXX785577');
                                $('#limitsW').html('От <b>1200</b> до <b>75000</b> рублей за одну выплату');
                            }
                        }
                    }



                    function getLasterMyWithdraws() {
                        /*if ($('#withdrawT').html() !== ""){
                            return;
                        }*/
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "getLasterMyWithdraws",
                                sid: Cookies.get('sid')
                            },
                            beforeSend: function(data) {
                                $('#loadmyd').show();
                            },
                            success: function(data) {
                                $('#loadmyd').hide();
                                var obj = jQuery.parseJSON(data);

                                if ('success' in obj) {
                                    $('#withdrawT').html(obj.success.text);
                                    return $('#gnext').html(obj.success.text1);
                                } else {
                                    $('#loadmyd').html("Ошибка");
                                }


                            }
                        });
                    }


                    function removeWithdraw(id) {
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "removeWithdraw",
                                sid: Cookies.get('sid'),
                                id: id
                            },
                            success: function(data) {
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    $('#' + id + '_his').fadeOut('slow');
                                    updateBalance(obj.success.balance, obj.success.new_balance);
                                }
                            }
                        });
                    }


                    function showWithdrawHistory(start) {

                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "withdrawHistory",
                                sid: Cookies.get('sid'),
                                start: start
                            },
                            success: function(data) {
                                if (data == 'null') {
                                    $("#withdrawHistoryLoad").hide();
                                    return $("#gnext").hide();
                                }
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    $("#withdrawHistoryLoad").hide();
                                    var tt = $('#withdrawT').html();
                                    $('#withdrawT').html(tt + obj.success.add);
                                    $('#gnext').html(obj.success.next);
                                }
                            }
                        });

                    }

                </script>





                <div class="gaps-2x"></div>
                <hr>
                <div class="gaps-2x"></div>

                <table class="table tnx-table table-responsive" id="withdrawT">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">ID</th>
                            <th class="text-center">Дата</th>
                            <th class="text-center">Реквизиты</th>
                            <th class="text-center">Сумма</th>
                            <th class="text-center" style="width:10%">Статус</th>

                        </tr><!-- tr -->
                    </thead><!-- thead -->
                    <tbody>
									<?php
                                      while($row = mysql_fetch_array($result2)) {
$id_w = $row['id'];
$sum_w = $row['sum'];
$ps = $row['ps'];
$wallet = $row['wallet'];                                   
$date_w = $row['date'];
$status = $row['status'];
if($status == 0) {
$remove = "<em class='ti ti-close' style='color:red;cursor:pointer' onclick="."removeWithdrawUser('$id_w')"."></em>";
$badge = "<span class='badge badge-warning'>Ожидание</span>";
}
if($status == 1) {
$remove = '';
$badge = "<span class='badge badge-success'>Выполнено</span>";
}
if($status == 2) {
$remove = '';
$badge = "<span class='badge badge-danger'>Отклонено</span>";
}                                      
echo "<tr class='text-center' style='cursor:default!important' id='$id_w'><td>$remove</td><td>$id_w</td><td>$date_w</td><td style='overflow-x: auto;'><img src='images/$ps.png'> $wallet</td><td>$sum_w</td><td>$badge</td></tr>";                                        
}
                                      ?>
                   
                                      
                                      
                    </tbody><!-- tbody -->
                </table>
                <center id="gnext"></center>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>


<div class="modal fade" id="startBonus" tabindex="-1">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>

            <div class="popup-body">
                

                <div class="form-step-head card-innr" style="border:0">
                    <div class="step-head">
                        <div class="step-number">02</div>
                        <div class="step-head-text">
                            <h4>Вступите в нашу группу</h4><a href="<?=$group?>" target="_blank"><?=$group?></a>
                        </div>
                    </div>
                </div>
                <div class="gaps-1x"></div>
                <a class="btn btn-primary" id="bonBut" onclick="getBonus()" style="box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);color:#fff;margin:0 auto;display: table;">Получить бонус</a>
                <a class="btn" id="success_bonuss" style="background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109));color:#fff;margin:0 auto; display: none;">Бонус получен</a>
                <center id="error_bonuss1"  style="margin-top:15px;display: none;"><a id="error_bonuss" class="btn btnError bg-danger " style="color:#fff;margin-top:10px auto;"></a></center>

                
                <div class="gaps-4x"></div>
                <center id="xrqexr" style="font-size:11px;margin-top:15px;opacity:0.7;cursor:pointer" onclick="hideBonus()">Больше не показывать предложение</center>

                <script>
                    
                    function getBonus() {

                $.ajax({
                                            type: 'POST',
                                            url: 'action.php',
                                             beforeSend: function(data) {
                                                        $('#bonBut').addClass('disabled');
                                                        $('#bonBut').html('<div class="loader" style="height:23px;width:23px"></div>');
                                                    },
                                            data: {
                                                type: 'getBonus',
                                                sid: Cookies.get('sid'),
                                                a:  Cookies.get('ab')
                                            },
                                            success: function(data) {
                                                $('#success_bonuss').hide();
                                                $('#error_bonuss1').hide();
                                                $('#bonBut').removeClass('disabled');
                                                        $('#bonBut').html('Получить бонус');
                                             var obj = jQuery.parseJSON(data);
                                                if ('success' in obj) {
                                                    
                                                        $('#bonBut').hide();
                                                        $('#xrqexr').hide();
                                                        //Cookies.set('ab', '1'); 
                                                        $('#success_bonuss').css('display','table');
                                                        updateBalance(obj.success.balance, obj.success.new_balance);
                                                     window.location.href = '';
                                                    return;
                                                   
                                                } 
                                                if ('error' in obj) {
                                                    $('#error_bonuss1').show();
                                                    return $('#error_bonuss').html(obj.error.text);
                                                }
                                            }
                                        });
            }
                    
                    
                    function hideBonus() {
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "hideBonus",
                                sid: Cookies.get('sid'),
                            },
                            success: function(data) {
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    window.location.href = '';
                                }
                            }
                        });
                    }

                </script>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- Modal End -->

<script src="../script/jquery.bundle.js"></script>
<!--<script src="../script/datatables.min.js"></script> -->
<script>


var jgjger = setInterval(function() {
  console.log("%cОстановитесь!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЕсли кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;");
  
}, 2000);

setTimeout(function() {
  clearInterval(jgjger);
  console.log("%cОстановитесь!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЕсли кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;");
  
}, 30000);
    
  
</script>
    
<script src="../script/script.js"></script>
<div class="footer-bar">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <ul class="footer-links">
                    <li><a href="/terms.php"><span style="color:blue">Пользовательское соглашение</a></li>
                    <li><a href="/policy.php"><span style="color:blue">Политика конфеденциальности</a></li>
                </ul>
                <a href="//showstreams.tv/"><img style="width:70px; height:20px" src="//www.free-kassa.ru/img/fk_btn/6.png" title="Бесплатный видеохостинг"></a>
            </div><!-- .col -->
            <!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div>
                                      <!-- MODAL -->
<div class="modal fade show" id="promo" tabindex="-1" style="display: none; ">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a style="cursor:pointer" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body" style=''>
    <center>
   <span style="color:blue"> Введите промокод<br>
<input type='text' style='width:250px;' class='input-bordered' id='promoactive' value='' placeholder='Промокод'><br>
  
    <!-- ОПОВЕЩЕНИЯ -->
    <div id="succes_promoactive" style="width:250px; margin-top:5px; display:none; background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109)); pointer-events: none; box-shadow: rgba(0, 215, 126, 0.27) 0px 5px 23px 0px;" class="btn btn-success btn-block"></div>
                                      
    <div id="error_promoactive" style="width:250px; margin-top:5px; display:none;pointer-events:none; box-shadow: 0 5px 23px 0 rgba(255, 105, 114, 0.14);" class="btn  btn-block bg-danger"></div>                                  
    <!-- КОНЕЦ -->  
    <button id="activebutton"  class="btn btn-primary" style=" box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px; width:250px" onclick="activepromo()">Активировать</button><br>
 
  
                                      <br><br>
                                   <?php if($is_admin == 0) { ?>    
                               <!-- СОЗДАНИЕ ПРОМОКОДА -->
                                      
 <span style="color:blue">Cистема "создания промокодов" удалена<br>
   <?php } ?>
  <?php if($is_admin == 1) { ?>
 
  <!-- СОЗДАНИЕ ПРОМОКОДА -->
                                      
  Название промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createname' value='' placeholder='Название'><br><br>
  Сумма промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createsum' value='' placeholder='Сумма'><br><br>
   Кол-во активаций промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createactive' value='' placeholder='Кол-во активаций'><br> 
     <!-- ОПОВЕЩЕНИЯ -->
    <div id="succes_promocreate" style="width:250px; margin-top:5px; display:none; background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109)); pointer-events: none; box-shadow: rgba(0, 215, 126, 0.27) 0px 5px 23px 0px;" class="btn btn-success btn-block"></div>
                                      
    <div id="error_promocreate" style="width:250px; margin-top:5px; display:none;pointer-events:none; box-shadow: 0 5px 23px 0 rgba(255, 105, 114, 0.14);" class="btn  btn-block bg-danger"></div>                                  
    <!-- КОНЕЦ -->                                   
    <button id="createbutton" class="btn btn-primary" style=" box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px; width:250px" onclick="createpromo()">Создать</button><br>
</center>
                        <?php } ?>
                         <?php if($is_admin == 2) { ?>
 
  <!-- СОЗДАНИЕ ПРОМОКОДА -->
                                      
  Название промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createname' value='' placeholder='Название'><br><br>
  Сумма промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createsum' value='' placeholder='Сумма'><br><br>
   Кол-во активаций промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createactive' value='' placeholder='Кол-во активаций'><br> 
     <!-- ОПОВЕЩЕНИЯ -->
    <div id="succes_promocreate" style="width:250px; margin-top:5px; display:none; background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109)); pointer-events: none; box-shadow: rgba(0, 215, 126, 0.27) 0px 5px 23px 0px;" class="btn btn-success btn-block"></div>
                                      
    <div id="error_promocreate" style="width:250px; margin-top:5px; display:none;pointer-events:none; box-shadow: 0 5px 23px 0 rgba(255, 105, 114, 0.14);" class="btn  btn-block bg-danger"></div>                                  
    <!-- КОНЕЦ -->                                   
    <button id="createbutton" class="btn btn-primary" style=" box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px; width:250px" onclick="createpromo()">Создать</button><br>
</center>
                        <?php } ?>
                         <?php if($is_admin == 3) { ?>
 
  <!-- СОЗДАНИЕ ПРОМОКОДА -->
                                      
  Название промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createname' value='' placeholder='Название'><br><br>
  Сумма промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createsum' value='' placeholder='Сумма'><br><br>
   Кол-во активаций промокода<br>
<input type='text' style='width:250px;' class='input-bordered' id='createactive' value='' placeholder='Кол-во активаций'><br> 
     <!-- ОПОВЕЩЕНИЯ -->
    <div id="succes_promocreate" style="width:250px; margin-top:5px; display:none; background: linear-gradient(to right, rgb(10, 203, 144), rgb(43, 222, 109)); pointer-events: none; box-shadow: rgba(0, 215, 126, 0.27) 0px 5px 23px 0px;" class="btn btn-success btn-block"></div>
                                      
    <div id="error_promocreate" style="width:250px; margin-top:5px; display:none;pointer-events:none; box-shadow: 0 5px 23px 0 rgba(255, 105, 114, 0.14);" class="btn  btn-block bg-danger"></div>                                  
    <!-- КОНЕЦ -->                                   
    <button id="createbutton" class="btn btn-primary" style=" box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:#fff;margin-top: 10px; width:250px" onclick="createpromo()">Создать</button><br>
</center>
                        <?php } ?>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>
<style>
.actives
{
    color:#fff;
}
            
                       .circle {
                           border:1px solid rgba(149,147,147,0.5); 
                           color:gray;
                           background:#fff;
                       }
                       .circle:hover {
                           
                           color:#fff;
                           
                       }
                   </style>
                  
                   <input for="navs-toggle" type="checkbox" id="navs-toggle" hidden>
    <nav class="navs" style="background-color:White!important;">
        <label for="navs-toggle" class="navs-toggle"<span style="color:blue" onclick style="transform: rotate(-90deg); font-weight: 700;"><span style="color:blue">ЧАТ</label>
        <center onclick="window.location.href='/'" class="desktop-nav" style="cursor:pointer;font-weight: 600;padding: 5px;color: #000;font-size: 25px;">ЧАТ</center>
        <hr>
<div style="width:110%;background-color:white!important;height:70%; overflow-y:scroll" class='chat-main vladimir-kot vk.com/id321223555'>
        <!-- Вот в этих 2-х div-ах будут идти наши сообщения из чата -->
        <div class="chat r4">
     
                 <strong><div style="padding:5px" id="chat_area"><!-- Сюда мы будем добавлять новые сообщения --></div></strong>
        </div></div><div style="width:110%;padding-top:10px;background-color:white!important;">
   
            <table style="width: 100%;" class="vladimir-kot vk.com/id321223555">
                <tr>
                    
                    <td></td>
                    <td></td>
                </tr>
                <tr>
         
                     <td><hr><span id="messe" style="color:red"></span><div class="chat-down" id="chat-down-1">
					<input class="chat-input" placeholder="Введите текст..." autocomplete="off" id="inputChat1" onkeydown="if(event.keyCode==13){ addChat(1); }">
					<button class="chat-send"  > <i class="fab fa-telegram" onclick="addChat(1);"></i> </button>
				</div><hr></td>
                </tr>
            </table>
        
        
    </nav></div>
</body>


                                      
                             
</html>


