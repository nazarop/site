<?php
session_start();
require("inc/bd.php");
require("inc/site_config.php");
if(isset($_SERVER['HTTPS'])) {
    $is_http = "https";
}
if(!isset($_SERVER['HTTPS'])) {
    $is_http = "http";
}
if($_SESSION['login'] != '') {
  header('Location: /');
}

$refid = $_SESSION['ref'];
$s = file_get_contents('https://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
$user = json_decode($s, true);
$user['network']; // соц. сеть, через которую авторизовался пользователь
$user['identity']; // уникальная строка определяющая конкретного пользователя соц. сети
$user['first_name']; // имя пользователя
$user['last_name']; // фамилия пользователя
$user['photo_big']; // фото пользователя
$network = $user['network'];
$firstname = $user['first_name'];
$lastname = $user['last_name'];
$name = "$firstname $lastname";
$ava = $user['photo_big'];
$hashq = $user['identity'];

$sql_select2 = "SELECT COUNT(*) FROM kot_user WHERE hash='$hashq'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{	
$logc = $row['COUNT(*)'];
}
    
        if($logc == 0) {
        if($hashq != '') {
          $datas = date("d.m.Y");      
	      $data = $datas;
          $ip = $_SERVER['REMOTE_ADDR'];
          $passgen = rand(100,1000) * rand(1,100) * rand(1,100) * 100;
            $_SESSION['login'] = 1;
			$insert_sql1 = "INSERT INTO `kot_user` (`id`,`vk_name`, `pass`, `balance`, `img`, `hash`, `social`, `ip`, `ref_id`, `date_reg`) 
	VALUES ('NULL','$name','', '$bonus_reg', '$ava', '$hashq', '$hashq', '$ip', '$refid', '$data');";
mysql_query($insert_sql1);
			$_SESSION['hash'] = $hashq;
			$_SESSION['login'] = 1;
			$home_url = 'http://'.$_SERVER['HTTP_HOST'] .'/';
            header('Location: ' . $home_url);
    
        }
        }
       if($logc == 1) {
         if($hashq != '') {
         $selecter = "SELECT * FROM kot_user WHERE hash = '$hashq'";
         $result3 = mysql_query($selecter);
         $row1 = mysql_fetch_array($result3);
		 if($row1)
		{	
		$hashlog = $row1['hash'];
         
		}
         
          $_SESSION['hash'] = $hashlog;
           $_SESSION['login'] = 1;
          $home_url = 'http://'.$_SERVER['HTTP_HOST'] .'/';
            header('Location: ' . $home_url);
       }
       }

require("inc/site_config.php"); 
  ?>

<!DOCTYPE html>

<html lang="ru" class="js">

<head>
    <script src="https://kit.fontawesome.com/6cce539f85.js"></script>
  <meta name="yandex-verification" content="24b16affb97ea5f1">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style type="text/css">

        .swal-icon--error {

            border-color: #f27474;

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

            background-color: #f27474;

            display: block;

            top: 37px;

            border-radius: 2px

        }



        .swal-icon--error__line--left {

            -webkit-transform: rotate(45deg);

            transform: rotate(45deg);

            left: 17px

        }

input {
    background-color: #101a2d80;
    color: chocolate;
    border-radius: 255px 5px;
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

            border-color: #f8bb86;

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

            background-color: #f8bb86

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

                border-color: #f8d486

            }



            to {

                border-color: #f8bb86

            }

        }



        @keyframes pulseWarning {

            0% {

                border-color: #f8d486

            }



            to {

                border-color: #f8bb86

            }

        }



        .swal-icon--success {

            border-color: #a5dc86

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

            background-color: #a5dc86;

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

            border-color: #c9dae1

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

            background-color: #c9dae1

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

            background-color: #7cd1f9;

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

            background-color: #78cbf2

        }



        .swal-button:active {

            background-color: #70bce0

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

            background-color: #efefef

        }



        .swal-button--cancel:not([disabled]):hover {

            background-color: #e8e8e8

        }



        .swal-button--cancel:active {

            background-color: #d7d7d7

        }



        .swal-button--cancel:focus {

            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(116, 136, 150, .29)

        }



        .swal-button--danger {

            background-color: #e64942

        }



        .swal-button--danger:not([disabled]):hover {

            background-color: #df4740

        }



        .swal-button--danger:active {

            background-color: #cf423b

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

            background-color: #fff;

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

            border-color: #6db8ff

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

    <meta name="author" content="Rocket Cash">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?=$sitename?> - официальный сайт - сервис мгновенных игр</title>

    <meta name="description" content="Rocket Cash - Настоящий сайт Нвути. Все комиссии берем на себя, бонус при регистрации. Произведем выплаты за 24 часа на любую платежную систему."><!-- Fav Icon -->

    <link rel="shortcut icon" href="favicon.ico"><!-- Site Title  -->

    <!-- Vendor Bundle CSS -->

    <script src="https://d3js.org/d3-path.v1.min.js"></script>

	<script src="https://d3js.org/d3-shape.v1.min.js"></script>  

	<link rel="stylesheet" href="../css/wnoty.css">

    <link rel="stylesheet" href="../css/fa.css">

    <link rel="stylesheet" href="../css/ti.css">   

    <link rel="stylesheet" href="../css/vendor.bundle.css">

    <link rel="stylesheet" href="../css/loader-0.css">

    <link rel="stylesheet" href="../css/style.css" id="layoutstyle">

    <link rel="stylesheet" href="../css/datatables.min.css">

    <script src="../script/jquery-latest.min.js"></script>

    <script src="../script/odometr.js"></script>

    <script src="../script/js.cookie.js"></script>

    <script src="../ajax/functions.js"></script>

    <script src="../ajax/func.js"></script>

    <script src="../ajax/wheel.js"></script>

    <script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&amp;render=explicit" async="" defer=""></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

                              function historys() {

if(navigator.onLine) {

 $.ajax({

            url: 'core.php',

            timeout: 10000,

            success: function(data) {

				var obj = jQuery.parseJSON(data);

                $("#responses").prepend(obj.game);

				$('#responses').children().slice(15).remove();

				$("#oes").html(obj.online);

            },

            error: function() {

            }

        });

		} else {

}

		}

		

		setInterval('historys()',300);

            </script>



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

    <meta name="author" content="<?=$sitename?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$sitename?> - официальный сайт - сервис мгновенных игр</title>
    <meta name="description" content="<?=$sitename?> - Настоящий сайт Нвути. Все комиссии берем на себя, бонус при регистрации. Произведем выплаты за 24 часа на любую платежную систему."><!-- Fav Icon -->
    <link rel="shortcut icon" href="favicon.ico"><!-- Site Title  -->
    <!-- Vendor Bundle CSS -->
    <script src="https://d3js.org/d3-path.v1.min.js"></script>
	<script src="https://d3js.org/d3-shape.v1.min.js"></script>  
	<link rel="stylesheet" href="../css/wnoty.css">
    <link rel="stylesheet" href="../css/fa.css">
    <link rel="stylesheet" href="../css/ti.css">   
    <link rel="stylesheet" href="../css/vendor.bundle.css">
    <link rel="stylesheet" href="../css/loader-0.css">
    <link rel="stylesheet" href="../css/style.css" id="layoutstyle">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>
    <script src="../ajax/functions.js"></script>
    <script src="../ajax/func.js"></script>
    <script src="../ajax/wheel.js"></script>
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
                              function historys() {
if(navigator.onLine) {
 $.ajax({
            url: 'core.php',
            timeout: 10000,
            success: function(data) {
				var obj = jQuery.parseJSON(data);
                $("#responses").prepend(obj.game);
				$('#responses').children().slice(15).remove();
				$("#oes").html(obj.online);
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('historys()',300);
            </script>

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
                         <li class="active"><a href="/">Главная</a></li>
                        <li><a href="/check.php">Честная игра</a></li>
                        <li><a href="/faq.php">FAQ</a></li>
                        <li><a href="/support.php">Контакты</a></li>
                        <li><a href="/withdraws.php">Выплаты</a></li>

                    </ul>

                    
                     
                        
                        <ul class="navbar-menu mmmob">
                         <li class="active"><a href="/">Главная</a></li>
                        <li><a href="/check.php">Честная игра</a></li>
                        <li><a href="/faq.php">FAQ</a></li>
                        <li><a href="/support.php">Контакты</a></li>
                        <li><a href="/withdraws.php">Выплаты</a></li>

                    </ul>
                        
                        
                        
                        
                    </ul>
                    
                    
                    
                    <ul class="navbar-btns">
                        <li><a href="<?=$group?>" target="_blank" class="btn btn-sm btn-outline btn-light"><em style="color: #3b5998;" class="fab fa-vk"></em><span>Вконтакте</span></a></li>
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
                                                    <h1>FeelGames</h1>
                                                   <p>Если вы не знаете, чем заняться сегодня вечером, то рекомендуем вам обратить внимание на <b>онлайн игру FeelGames</b>. Интернет сервис FeelGames.bar представляет собой состязание с выбором суммы и шанса победы. Здесь не только увлекательные развлечения, но и множество преимуществ.</p>
                                                    <h2>FeelGames - мобильная версия</h2>
                                                    <p>Глобальный прогресс не стоит на месте и сегодня есть у каждого возможность играть в нвути онлайн с мобильных устройств. Наш настоящий сайт nvuti полностью адаптивен к вашим гаджетам. Официальный сайт становится доступен вне дома, будь-то работа, школа или парк.</p>
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
                                                    
                                                    <h4>Быстрые выплаты на настоящем сайте Нвути</h4>
                                                    <p>Программисты нашего официального сайта тащтельно слядет за игрой нвути. Благодаря им, вывод осуществляется за считанные минуты на любую платежную систему электронных денег.</p>
                                                    <p>Хотим заметить, что выплата возможна только на кошелек с которого был пополнен баланс на сайте нвути. Это одна из мер безопасности сайта FeelGames для защиты вашего баланса аккаунта от мошенников.</p>

                                                </div>
                                            </div>
<div class="page-content">
    <div class="container">
        <div class="row">
                        <div class="aside sidebar-right col-lg ">
                <div class="content-area card">

                    <div class="card-innr">
                        <div id="enterBlock">
                            <div class="card-head has-aside">
                                
                                 <ul class="row guttar-20px guttar-vr-20px">
                                     </ul>
                                    <ul class="col"><div id="uLogin" data-ulogin="display=buttons;fields=photo_big,first_name,last_name;mobilebuttons=0;redirect_uri=<?=$is_http?>%3A%2F%2F<?=$_SERVER['HTTP_HOST']?>/login.php;"><a href="#" data-uloginbutton="google" style='width:100%' class="btn btn-outline btn-dark btn-facebook btn-block"><i class="fab fa-google" style='color:#ff4e33;' aria-hidden="true"></i><span>google</span></a></div></ul>
                              <script src="//ulogin.ru/js/ulogin.js"></script>
                                </ul>
                                 <h4 class="card-title"></h4>
                            </div>
                            <div style="margin-top:8px">
                                <ul class="row guttar-1000px guttar-vr-20px">
                              

                                    <li class="col"><div id="yLogin" data-ulogin="display=buttons;fields=photo_big,first_name,last_name;mobilebuttons=0;redirect_uri=<?=$is_http?>%3A%2F%2F<?=$_SERVER['HTTP_HOST']?>/login.php;"><a href="#" data-uloginbutton="vkontakte" style='width:100%' class="btn btn-outline btn-dark btn-facebook btn-block"><i class="fab fa-vk" style='color:#2c80ff;' aria-hidden="true"></i><span>Вконтакте</span></a></div></li>

                              <script src="//ulogin.ru/js/ulogin.js"></script>
                              </ul>
                               <h4 class="card-title"></h4>
                            </div>
                            <div style="margin-top:8px">
                                <ul class="row guttar-20px guttar-vr-20px">
                              

                                    <li class="col"><div id="fLogin" data-ulogin="display=buttons;fields=photo_big,first_name,last_name;mobilebuttons=0;redirect_uri=<?=$is_http?>%3A%2F%2F<?=$_SERVER['HTTP_HOST']?>/login.php;"><a href="#" data-uloginbutton="facebook" style='width:100%' class="btn btn-outline btn-dark btn-facebook btn-block"><i class="fab fa-facebook" style='color:#000080;' aria-hidden="true"></i><span>facebook</span></a></div></li>

                              <script src="//ulogin.ru/js/ulogin.js"></script>
                              </ul>
                              <div style="margin-top:8px">
                                <ul class="row guttar-20px guttar-vr-20px">
                              

                                    <li class="col"><div id="gLogin" data-ulogin="display=buttons;fields=photo_big,first_name,last_name;mobilebuttons=0;redirect_uri=<?=$is_http?>%3A%2F%2F<?=$_SERVER['HTTP_HOST']?>/login.php;"><a href="#" data-uloginbutton="odnoklassniki" style='width:100%' class="btn btn-outline btn-dark btn-facebook btn-block"><i class="fab fa-odnoklassniki" style='color:#ffa500;' aria-hidden="true"></i><span>одноклассники</span></a></div></li>

                              <script src="//ulogin.ru/js/ulogin.js"></script>
                             
                                </ul>
                                <div class="sap-text"><span>Логин</span></div>

                                <div class="input-item"><input type="text" id="userLogin" placeholder="Логин" class="input-bordered"></div>
                                                               <div class="sap-text"><span>ПАРОЛЬ</span></div>


                                <div class="input-item"><input id="userPass" type="password" placeholder="Пароль" class="input-bordered"></div>

                                <div style="transform: scale(0.65);margin-left: -42px;margin-top: -17px;" class="g-recaptcha" data-sitekey=""></div>

                                <a id="butEnter" class="btn btn-primary btn-block" style="box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:white" onclick="login_default()">Войти</a>

                                <a id="loadEnter" class="btn btn-primary btn-block disabled" style="box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); display:none">

                                    <div class="loader"></div>

                                </a>

                                <div class="btn btn-danger btn-block" id="error_enter" style="margin-top:15px;display:none;pointer-events:none"></div>                        


                                <div class="gaps-2x"></div>
                                <div class="gaps-2x"></div>


                            </div>
                        </div>

                        <div id="registerBlock" style="display:none">
                            <div class="card-head has-aside">
                                <h4 class="card-title">Регистрация</h4>
                            </div>
                            <div style="margin-top:8px">
                                <div class="input-item"><input type="text" id="userRegsiter" placeholder="Логин" class="input-bordered"></div>
                                <div class="input-item"><input id="userPassRegister" type="password" placeholder="Пароль" class="input-bordered"></div>
                                <div class="input-item"><input id="userPassRegister1" type="password" placeholder="Повторите пароль" class="input-bordered"></div>
                                <div class="input-item"><input type="checkbox" class="input-checkbox input-checkbox-md" id="CheckBox_9"><label style="text-transform: unset;" for="CheckBox_9">Cоглашаюсь с <a href="/terms.php" target="_blank" rel="noopener noreferrer">Пользовательским соглашением</a></label></div>
                                <div style="transform: scale(0.65);margin-left: -42px;margin-top: -17px;" class="g-recaptcha" data-sitekey="<?=$sitekey?>"></div>
                                <div id="butRegister" class="btn btn-primary btn-block" style="box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);" onclick="register_default()">Зарегистрироваться</div>
                                <div class="btn btn-danger btn-block" id="error_register" style="margin-top:15px;display:none;pointer-events:none"></div>


                                <div class="gaps-2x"></div>
                                <div class="gaps-2x"></div>
                                <div onclick="$('#registerBlock').hide();$('#enterBlock').fadeIn(1200);" class="form-note text-center">Есть аккаунт? <strong style="color:#2c80ff;cursor:pointer">Войти</strong></div>


                            </div>
                        </div>


                        <script>

                            function login() {
                                if ($('#userLogin').val().length < 4) {
                                    $('#error_enter').css('display', 'block');
                                    return $('#error_enter').html('Логин от 4 символов');
                                }
                                if ($('#userPass').val() == '') {
                                    $('#error_enter').css('display', 'block');
                                    return $('#error_enter').html('Введите пароль');
                                }

                                if ($('#g-recaptcha-response').val() == '') {
                                    $('#error_enter').css('display', 'block');
                                    return $('#error_enter').html('Поставьте галочку');
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        
                                        $('#butEnter').html('<div class="loader" style="height:23px;width:23px"></div>');
                                        $('#butEnter').addClass('disabled');
                                        $('#error_enter').hide();
                                        
                                    },
                                    data: {
                                        type: "login",
                                        login: $('#userLogin').val(),
                                        rc: $('#g-recaptcha-response').val(),
                                        pass: $('#userPass').val()
                                    },
                                    success: function(data) {
                                        $('#butEnter').html('Войти');
                                        $('#butEnter').removeClass('disabled');
                                

                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            Cookies.set('sid', obj.success.sid, { expires: 365,path: '/',secure:true });
                                            Cookies.set('login', $('#userLogin').val(), { expires: 365,path: '/',secure:true });
                                            window.location.href = '';
                                            // return false;
                                        }else{
                                            grecaptcha.reset();
                                       
                                        $('#error_enter').html(obj.error);
                                        $('#error_enter').css('display', 'block');
                                        }


                                    }
                                });
                            }
                            
                            function register() {
                                if ($('#userRegsiter').val().length < 4) {
                                    $('#error_register').css('display', 'block');
                                    return $('#error_register').html('Логин от 4 символов');
                                }
                                if ($('#userPassRegister').val() == '') {
                                    $('#error_register').css('display', 'block');
                                    return $('#error_register').html('Введите пароль');
                                }
                                if ($('#userPassRegister1').val() !== $('#userPassRegister').val()) {
                                    $('#error_register').css('display', 'block');
                                    return $('#error_register').html('Пароли не совпадают');
                                }
                                
                                if($('#CheckBox_9').prop('checked')) {
    
                                } else {
                                    $('#error_register').css('display', 'block');
                                                                    return $('#error_register').html('Соглашение');
                                }
                                

                                if ($('#g-recaptcha-response-1').val() == '') {
                                    $('#error_register').css('display', 'block');
                                    return $('#error_register').html('Поставьте галочку');
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        $('#butRegister').html('<div class="loader" style="height:23px;width:23px"></div>').addClass('disabled');
                                        $('#error_register').hide();
                                    },
                                    data: {
                                        type: "register",
                                        login: $('#userRegsiter').val(),
                                        ref: Cookies.get('ref'),
                                        rc: $('#g-recaptcha-response-1').val(),
                                        pass: $('#userPassRegister').val()
                                    },
                                    success: function(data) {
                                        $('#butRegister').html('Зарегистрироваться').removeClass('disabled');
                                        $('#error_register').hide();
                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            Cookies.set('sid', obj.success.sid, { expires: 365,path: '/',secure:true });
                                            Cookies.set('login', $('#userLogin').val(), { expires: 365,path: '/',secure:true });
                                            window.location.href = '';
                                            // return false;
                                        }else{
                                            grecaptcha.reset(1);
                                       
                                        $('#error_register').html(obj.error);
                                        $('#error_register').show();
                                        }


                                    }
                                });
                            }
                        
                        
                        </script>


                    </div>
                </div>

            </div>

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
 background:#758698
}
.chat-status-idle:after {
 background:#ffc100
}
.chat-status-active:after {
 background:#00d285
}
.chat-status.circle:after {
 top:2px;
 right:2px
}
.chat-time {
 font-size:12px;
 color:#758698
}
.chat-time .icon {
 font-size:11px;
 color:#b9d2f2
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
 color:#00d285
}
.chat-lock .icon {
 color:#495463;
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
 background:#000;
 content:'';
 opacity:.4;
 transition:all .4s
}
.self .chat-attachment:before {
 opacity:.7;
 background:#2c80ff
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
 color:#495463;
 background:#fff
}
.self .chat-attachment-download:hover {
 color:#2c80ff
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
 background:#d2dde9;
 padding:5px 20px;
 display:flex;
 align-items:center;
 justify-content:space-between
}
.chat-contacts-heading .toggle-tigger {
 color:#758698;
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
 color:#758698
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
 border-bottom:1px solid #e6effb
}
.chat-contacts-item:hover,
.chat-contacts-item.current,
.chat-contacts-item.active {
 background:#f7fafd
}
.chat-contacts-item.unseen p {
 font-weight:500;
 color:#292f37
}
.chat-contacts-content {
 padding-left:10px;
 transition:all .4s
}
.chat-contacts-content .chat-name {
 margin-bottom:3px
}
.chat-contacts-content p {
 color:#758698;
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
 border-bottom:1px solid #d2dde9
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
 color:#2c80ff
}
.chat-messages-tools>li>a.show-information.active {
 color:#2c80ff;
 background:#e6effb
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
 color:#758698;
 font-size:13px
}
.chat-messages-sap:before {
 position:absolute;
 top:50%;
 height:1px;
 left:0;
 right:0;
 background:#e6effb;
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
 background:#f7fafd;
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
 background:#2c80ff;
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
 color:#495463
}
.chat-messages-actions>a:hover {
 color:#2c80ff
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
 color:#758698
}
.chat-messages-info li a:hover {
 color:#2c80ff
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
 color:#495463;
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
 color:#758698;
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
 color:#495463
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
 color:#758698;
 top:2px
}
.chat-member-action .dropdown-content {
 margin-top:-3px
}
.chat-member-position {
 color:#758698;
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
  border-left:1px solid #d2dde9;
  border-right:1px solid #d2dde9
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
                        color:#007dff!important;cursor:default;
                    }
                
                </style>

            <style>


        .loader-support {
  --path: #253992;
  --dot: #2c80ff;
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
                        color:#007dff!important;cursor:default;
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

