<?php

require("../inc/bd.php"); 
require("../inc/site_config.php"); 
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
if($last_check == 1) {
  ?>
  <meta name="yandex-verification" content="24b16affb97ea5f1">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style type="text/css">

    .btn-primary.btn {

    background: rgb(44, 128, 255);

    }

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

<link rel="stylesheet" href="../css/vendor.bundle.css">
<link rel="stylesheet" href="../css/loader-0.css">
<link rel="stylesheet" href="../css/style.css?v=1575178639" id="layoutstyle">
<link rel="stylesheet" href="../css/datatables.min.css">
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
                       
                        .mmmob {
                            display: none;
                        }
                        @media (max-width: 991px) {
                        
                          .form-control {
                        margin-left:-10px;
                        width:90%;
                        }
                          .form-group { 
                         width:100%;   
                        }
                          input { width:100%; }
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
                        <li class="active"><a href="/admin">Настройки сайта</a></li>
                        <li ><a href="/admin/users">Пользователи</a></li>
                        <li ><a href="/admin/promo">Промокоды</a></li>
                        <li ><a href="/admin/deps">Пополнения</a></li>
                        <li ><a href="/admin/withdraws">Выплаты</a></li>
                      <li><a href="/admin/bot">Настройка ботов</a></li>
                        <li ><a href="/admin/stat">Статистика сайта</a></li>
                       <li ><a href="/admin/percent">Шансы</a></li>
                       <li ><a href="/inc/main.php">Выйти</a></li>
                    </ul>
                    <ul class="navbar-menu mmmob">
                        <li class="active"><a href="/admin">Настройки сайта</a></li>
                        <li ><a href="/admin/users">Пользователи</a></li>
                        <li ><a href="/admin/promo">Промокоды</a></li>
                        <li ><a href="/admin/deps">Пополнения</a></li>
                        <li ><a href="/admin/withdraws">Выплаты</a></li>
                      <li><a href="/admin/bot">Настройка ботов</a></li>
                        <li ><a href="/admin/stat">Статистика сайта</a></li>
                       <li ><a href="/admin/percent">Шансы</a></li>
                        <li ><a href="/inc/main.php">Выйти</a></li>
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
                      
			<h4 class="card-title card-title-lg" style='float:left; padding-top:8px;'>Настройки</h4>
                      <button id='saved' class="btn-ccc btn btn-sm btn-outline btn-light input-bordered" style="float:right; width:130px;" onclick="saves()">Сохранить</button><br><br>
                      <hr>
		</div>
                      <!-- НАЧАЛО -->
                      <center>
   <div class="row" id="setting-tbl" style="margin-right:2%;margin-left:2%;width:100%;">
                                                        <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Название сайта</label>
                                                            <input type="text" class="input-bordered" id="sitename" placeholder="Название сайта" value="<?=$sitename?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Домен сайта</label>
                                                            <input type="text" class="input-bordered" id="sitedomen" placeholder="Домен сайта" value="<?=$sitedomen?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Ссылка на группу VK</label>
                                                            <input type="text" class="input-bordered" id="sitegroup" placeholder="Ссылка на группу VK" value="<?=$group?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Ссылка на сообщения VK</label>
                                                            <input type="text" class="input-bordered" id="sitesupport" placeholder="Ссылка на сообщения VK" value="<?=$site_support?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Секретный ключ сайта</label>
                                                            <input type="text" class="input-bordered" id="sitesecret" placeholder="Ключ сайта" value="<?=$sitekey?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Мин. бонус в раздаче</label>
                                                            <input type="text" class="input-bordered" id="minbonus" placeholder="Мин бонус" value="<?=$min_bonus_s?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Макс. бонус в раздаче</label>
                                                            <input type="text" class="input-bordered" id="maxbonus" placeholder="Макс бонус" value="<?=$max_bonus_s?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Мин. сумма вывода</label>
                                                            <input type="text" class="input-bordered" id="minwithdraw" placeholder="Мин вывод" value="<?=$min_withdraw_sum?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Депозит для вывода</label>
                                                            <input type="text" class="input-bordered" id="depwithdraw" placeholder="Депозит для вывода" value="<?=$dep_withdraw?>"/>
                                                          </div>
                                                        </div>
                      
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Мин. сумма ставки</label>
                                                            <input type="text" class="input-bordered" id="minbet" placeholder="Мин ставка" value="<?=$min_bet?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Макс. сумма ставки</label>
                                                            <input type="text" class="input-bordered" id="maxbet" placeholder="Макс ставка" value="<?=$max_bet?>"/>
                                                          </div>
                                                        </div>
                                                         <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Мин. шанс выигрыша</label>
                                                            <input type="text" class="input-bordered" id="minper" placeholder="Мин шанс" value="<?=$min_per?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Макс. шанс выигрыша</label>
                                                            <input type="text" class="input-bordered" id="maxper" placeholder="Макс шанс" value="<?=$max_per?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Бонус за регистрацию</label>
                                                            <input type="text" class="input-bordered" id="bonusreg" placeholder="Бонус за регистрацию" value="<?=$bonus_reg?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Прибавить к онлайну</label>
                                                            <input type="text" class="input-bordered" id="fakeonline" placeholder="Фейк онлайн" value="<?=$fake_online?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Частота ставок ботов (1к = 1сек)</label>
                                                            <input type="text" class="input-bordered" id="fakeinterval" placeholder="1" value="<?=$fake_interval?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>ID группы VK</label>
                                                            <input type="text" class="input-bordered" id="idgroup" placeholder="12345" value="<?=$idvk?>"/>
                                                          </div>
                                                        </div>   
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Токен группы VK</label>
                                                            <input type="text" class="input-bordered" id="token" placeholder="gvuegvue76784bkdd" value="<?=$tokenvk?>"/>
                                                          </div>
                                                        </div>                                   
                      <div class="form-group">
                      <div class="col-lg-12" style="">
                                                            <label>Мин. сумма пополнения</label>
                                                            <input type="text" class="input-bordered" id="mindep" placeholder="1" value="<?=$min_sum_dep?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>ID FK</label>
                                                            <input type="text" class="input-bordered" id="fkid" placeholder="ID мерчанта FK" value="<?=$fk_id?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Секрет 1 FK</label>
                                                            <input type="text" class="input-bordered" id="fksecret1" placeholder="Секрет 1 FK" value="<?=$fk_secret_1?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Секрет 2 FK</label>
                                                            <input type="text" class="input-bordered" id="fksecret2" placeholder="Секрет 2 FK" value="<?=$fk_secret_2?>"/>
                                                          </div>
                                                        </div>
                     
                      
                      </div>
                     
                      </center>
                       <!-- КОНЕЦ -->
		</div>
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
<!-- SCRIPT -->
    <script>
    function saves() {
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
			   $('#saved').html('Сохранение..');
										},	
                                                                                data: {
         type: "save_edit",
         sitename: $("#sitename").val(),
         sitedomen: $("#sitedomen").val(),
         sitegroup: $("#sitegroup").val(),
         sitesupport: $("#sitesupport").val(),                                    
         sitesecret: $("#sitesecret").val(),
         minbonus: $("#minbonus").val(),
         maxbonus: $("#maxbonus").val(),                                                            
         minwithdraw: $("#minwithdraw").val(),                                         
         bonusreg: $("#bonusreg").val(),  
         fkid: $("#fkid").val(),                                                                                                                        fksecret1: $("#fksecret1").val(),
         fksecret2: $("#fksecret2").val(),
         //new
         depwithdraw: $("#depwithdraw").val(),   
                                                                                  
         minbet: $("#minbet").val(),     
                                                                                  
         maxbet: $("#maxbet").val(), 
                                                                                  
         minper: $("#minper").val(), 
                                                                                  maxper: $("#maxper").val(),
                                                                                  
         fakeonline: $("#fakeonline").val(),
                                                                                  
         fakeinterval: $("#fakeinterval").val(),
                                                                                  
         mindep: $("#mindep").val(),
         token: $("#token").val(),
         idgroup: $("#idgroup").val()  
                                                                                                                            },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {

                //$("#succes_edit").show();                               
				$("#saved").html("Сохранить");
                     //$("#setting-tbl").load("index.php #setting-tbl");
                                            
                                                              
                                            }else{
                //$("#error_edit").show();                               
				//$("#error_edit").html(obj.error);
                                            }
                                        }   
   });
}
    </script>
    <!-- END -->
<script src="../script/jquery.bundle.js"></script>
<script src="../script/datatables.min.js"></script>
<script src="../script/script.js?v=2"></script>
<script src="../script/jquery-3.2.1.min.js"></script>
</body>
</html>
<?php } else { header('Location: ../error404'); } ?>