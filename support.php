<?php
  require("inc/site_config.php"); 
  ?>
<!DOCTYPE html>
<html lang="ru" class="js">

<head>
     <script src="https://kit.fontawesome.com/6cce539f85.js"></script>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    

    <title><?=$sitename?> - Официальный сайт. Сервис мгновенных игр.</title>
    <meta name="description" content="Nvuti - Настоящий сайт Нвути. Все комиссии берем на себя, бонус при регистрации. Произведем выплаты за 24 часа на любую платежную систему.">
    <meta name="keywords" content="maxmin, nvuti, nvuti com, nvuti регистрация, игра деньги, игра заработок, игры с выводом, игры с выводом денег, нвути, нвути сайт, онлайн игры с выводом, игры с деньгами, рубликс, драгон мани, rublix, dragon money, nvuti best, нвути бест, 1dice , nvuti.cat, nvuti.li, nvuti.bar, nvuti.best">

    <meta name="author" content="<?=$_SERVER['HTTP_HOST']?>">
    <meta name="csrf-token" content="gxNU8T0H5jmQc9FDV15dTAm1O77aQvbXwo92VpiS">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="yandex-verification" content="cde3a0095776b585" />
    <meta name="google-site-verification" content="ZVWf3QjipqtqiQiFxVWA0ZPZqkkTv-AaPHLMtUhjPTU" />

    <!-- Yandex.Metrika counter -->
    

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

    @keyframes  animateErrorIcon {
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

    @keyframes  animateXMark {
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

    @keyframes  pulseWarning {
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

    @keyframes  rotatePlaceholder {
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

    @keyframes  animateSuccessTip {
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

    @keyframes  animateSuccessLong {
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

    @keyframes  swal-loading-anim {
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

    @keyframes  showSweetAlert {
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
</style>

<link rel="stylesheet" href="/css/vendor.bundle.css">
<link rel="stylesheet" href="/css/loader-0.css">
<link rel="stylesheet" href="/css/style.css?v=1575180115" id="layoutstyle">
<link rel="stylesheet" href="/css/datatables.min.css">
<script src="/js/jquery-latest.min.js"></script>
<script src="/js/odometr.js"></script>
<script src="/js/js.cookie.js"></script>
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
                        <li class="topbar-nav-item relative" id="close-nav"><a class="toggle-nav" href="https://demo.themenio.com/tokenwiz/buy-token.html#">
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
                        <li ><a href="/">Главная</a></li>
                        <li ><a href="/check.php">Честная игра</a></li>
                        <li ><a href="/faq.php">FAQ</a></li>
                        <li ><a href="/support.php">Контакты</a></li>
                        <li ><a href="/withdraws.php">Выплаты</a></li>
                    </ul>
                    <ul class="navbar-menu mmmob">
                        <li ><a href="/">Главная</a></li>
                        <li ><a href="/check.php">Честная игра</a></li>
                        <li ><a href="/faq.php">FAQ</a></li>
                        <li ><a href="/support.php">Контакты</a></li>
                        <li ><a href="/withdraws.php">Выплаты</a></li>
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
       <div class="row">
	<div class="main-content col-12">
			<div class="content-area card">
				<div class="card-innr">
					<div class="content">
						<h4 class="text-secondary">Контакты</h4>
					 <p>Для связи с поддержкой пишите в <a target="https://vk.com/xater0" href="https://vk.com/xater0">сообщество Вконтакте</a><p>Создателем скрипта является Хейтер Холод - <a target="https://vk.com/xater0" href="https://vk.com/xater0">*тык*</a>
				</div>
			</div><!-- .card -->
		</div><!-- .col -->
	</div><!-- .row -->
</div><!-- .container -->
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
</div>
</div>
</div>


<div class="modal fade show" id="modalRules" tabindex="-1" style="display: none;">
	<div class="modal-dialog modal-dialog-md modal-dialog-centered">
		<div class="modal-content"><a class="modal-close" data-dismiss="modal" aria-label="Close"><em
					class="ti ti-close"></em></a>
			<div class="popup-body">
				<div class="static" style="font-size: 12px;">
					<h1>Пользовательское соглашение</h1>
					<h3>1. ПРЕДМЕТ И ОБЩИЕ ПОЛОЖЕНИЯ</h3>
					1.1. Настоящее соглашение представляет собой официальное предложение (оферта) на пользование
					услугами сервиса «<?=$_SERVER['HTTP_HOST']?>» и его "зеркал" (далее – «Сервис»), адресованного дееспособным
					физическим лицам, принявшим (акцептовавшим) настоящую оферту на перечисленных ниже условиях.
					<br>
					1.2. В соответствии с п. 2 ст. 437 ГК РФ данный документ является публичной офертой и в случае
					принятия изложенных ниже условий, лицо, осуществившее акцепт настоящей оферты (пользователь),
					становится Участником проекта. В соответствии с п. 3 ст. 438 ГК РФ акцепт оферты равносилен
					заключению договора на условиях, изложенных в оферте.
					<br>
					1.3. Указанное в настоящем Соглашении безоговорочно принимается Участником.
					<br>
					1.4. Услугами Сервиса могут пользоваться исключительно лица, достигшие совершеннолетия (18 лет).
					<br>
					1.5. Сервис представляет собой систему добровольных пожертвований, принадлежит его организатору
					и находится в сети Интернет непосредственно по адресу <a
						href="/"><?=$_SERVER['HTTP_HOST']?></a> (включая домены следующих уровней, относящихся к
					данным адресам, а также "зеркала" сайта в доменных зонах .ru, .cc, .com и т.д.).
					<br>
					1.6. Каждый Участник получает доступ к системе пожертвований на добровольной основе, с
					одновременной возможностью получить пожертвование от иных Участников Сервиса.
					<br>
					1.7. Отношения между Сервисом и Участником считаются надлежаще оформленными с момента акцепта
					оферты и не требуют двустороннего подписания в письменном виде.
					<br>
					1.8. Акцептом настоящей оферты для Участника признается начало использования Сервиса, его
					отдельной функции, либо прохождение процедуры регистрации на сайте.
					<br>
					1.9. Независимо от факта регистрации или авторизации Пользователя на Сайте, использование Сайта,
					включая просмотр размещенной на Сайте информации, означает согласие Участника с настоящим
					соглашением.
					<br>
					1.10. Используя и/или посещая любые разделы сайта, Участник: <br>
					• соглашается использовать средства электронной коммуникации для заключения договоров; <br>
					• отказывается от любых применимых в данном случае прав или требований, для которых необходима
					собственноручная подпись, в той степени, в которой это допускается любым применимым
					законодательным актом.
					<br>
					1.11. Если Участник не согласен принять и следовать условиям Соглашения, он не должен
					регистрировать аккаунт и/или прекратить использовать аккаунт. Дальнейшее использование Сервиса
					будет рассматриваться как согласие Участника с условиями настоящего Соглашения.
					<br>
					1.12. Участник осознает и согласен с тем, что он должен самостоятельно оценивать все риски,
					связанные с использованием Сервиса, включая оценку его надежности, полноты или полезности.
					<br>
					1.13. Администрация Сервиса осуществляет техническую поддержку Участника по вопросам, связанным
					с функциональностью Сервиса и с особенностями эксплуатации Сервиса.
					<br>
					<h3>2. УЧЁТНАЯ ЗАПИСЬ УЧАСТНИКА</h3>
					2.1. Способом непосредственной регистрации учетной записи является авторизация Участника с
					помощью регистрационных данных социальной сети «Вконтакте».
					<br>
					2.2. Участник принимает на себя обязательство хранения конфиденциальности информации,
					размещенной в его учетной записи, и доступа к своей учетной записи.
					<br>
					2.3. В случае непосредственного нарушения Участником условий настоящего соглашения, а также
					действующих законов РФ, Сервис вправе в любое время заблокировать или удалить учетную запись
					Участника без возможности ее восстановления и без объяснения причин.
					<br>
					2.4. Участник обязуется своевременно сообщить о противозаконном доступе к его учетной записи,
					противозаконном использовании его учетной записи, по средствам технической поддержки Сервиса.
					<br>
					2.5. Сервис не несет ответственности за разглашение учетной записи Участника третьим лицам и в
					случае несанкционированного доступа третьих лиц к учетной записи Участника.
					<br>
					<h3>3. ПРАВИЛА ПОЛЬЗОВАНИЯ СЕРВИСОМ. ВЫИГРЫШ.</h3>
					3.1. Пополнение баланса в Сервисе осуществляется Участником добровольно.
					<br>
					3.2. Сумма добровольного пожертвования определяется Участником исключительно по собственному
					усмотрению.
					<br>
					3.3. Участник пополняет собственный счет на Сервисе посредством специализированных платежных
					платформ «Free-Kassa» и «Piastrix». Для пополнения счёта Участнику необходимо предварительно
					перейти в личный кабинет, затем нажать «Пополнить баланс».
					<br>
					3.4. Для получения пожертвования Участнику необходимо сделать ставку в рублях РФ.
					<br>
					3.5. Выигрыш в Сервисе представляет собой получение Участником пожертвования, сумма которого
					генерируется случайным образом (билетный алгоритм).
					<br>
					3.6. Для вывода денежных средств Участнику следует предварительно перейти в личном кабинете,
					затем нажать «Вывести». Для вывода денежных средств Участнику необходимо пополнить свой баланс
					минимум на 500 рублей.
					<br>
					3.7. Минимальная сумма вывода составляет 50 рублей.
					<br>
					3.8. Для вывода денежных средств необходимо сделать ставки на 50% от суммы пополнения.
					<br>
					3.9. Игровые средства после подачи соответствующего запроса (запрос на вывод средств) Участником
					зачисляются Сервисом на игровой счет другого Участника в течение 48 часов. В том случае, если по
					истечению данного времени деньги не поступили на счёт, Участнику следует обратиться за помощью к
					специалистам технической поддержки Сервиса любым удобным способом.
					<br>
					3.10. Выигранные при использовании бонусов денежные средства нельзя снять со счета, пока все
					бонусы не отыграны х25. Отыграть бонус х25 – значит сделать в играх ставок в 25 раз больше суммы
					бонуса. Например, если Участник получил бонус в размере 100 рублей, то необходимое количество
					ставок, обозначаемое словом, равно 2500 рублей.
					<br>
					3.11. Участник может отыграть бонусы на любой игре на сайте.
					<br>
					3.12. До полного отыгрывания бонусов выплаты выигрышей не производятся.
					<br>
					<h3>4. КОНФИДЕНЦИАЛЬНОСТЬ</h3>
					4.1. Сервис гарантирует абсолютную конфиденциальность информации, предоставленной Участником
					Сервису.
					<br>
					4.2. Личные данные Участника могут быть представлены третьим лицам исключительно в случаях
					непосредственного нарушения действующих законов РФ, в случаях оскорбительного поведения, клеветы
					в отношении третьих лиц.
					<br>
					<h3>5. КАТЕГОРИЧЕСКИ ЗАПРЕЩЕНО</h3>
					5.1. Размещение информации, содержащей поддельные (неправдивые) данные.
					<br>
					5.2. Передача любой информации или материалов, способных повлечь за собой несущественный, или
					существенный вред третьим лицам, нарушить действующий закон РФ в отношении третьих лиц.
					<br>
					5.3. Размещение информации неправдоподобного характера с целью получения противозаконного
					доступа к учетной записи.
					<br>
					5.4. Размещение информации общерелигиозного, общеполитического характера.
					<br>
					5.5. Регистрация Участником более чем одной учетной записи.
					<br>
					5.6. Передача информации иным, третьим лицам, содержащей данные для доступа к личной учетной
					записи Участника.
					<br>
					5.7. Размещение оскорблений, проявление агрессии касательно Участников или администрации
					Сервиса.
					<br>
					5.8. Размещение юзерпика, содержащего элементы разврата, агрессии в любых ее проявлениях,
					элементы рекламного характера.
					<br>
					5.9. Наносить вред работе системы Сервиса.
					<br>
					5.10. Размещение информации, способной повлечь за собой вред третьим лицам.
					<br>
					<h3>6. ОТВЕТСТВЕННОСТЬ СТОРОН</h3>
					6.1. Пополняя баланс на Сервисе любыми платежными системами, тратя средства со своего баланса,
					Участник берет на себя полную ответственность за свои действия.
					<br> 6.2. Сервис никак не принуждает, не настаивает делать какие-либо действия. Также как не
					призывает и не мотивирует увеличить средства на Сервисе.
					<br> 6.3. Сервис не дает 100% гарантии, что ставки на играх Сервиса даст возможность увеличить
					средства Участника на его балансе.
					<br> 6.4. Участник соглашается с тем, что в случае потери средств со своего баланса (проигрыша)
					в той или иной игре, Сервис возврат денежных средств Участнику не производит.
					<br> 6.5. Сервис несет ответственность за хранение и обработку персональных данных Участника,
					обеспечивает конфиденциальность этих данных в процессе их обработки. Сервис не несет
					ответственности за персональные данные Участника, похищенные в результате хакерских атак.
					<br> 6.6. Сервис не несет ответственности за не работу сайта в связи с проблемами хостинга,
					ddos-атаками на сайт или хостинг, иных каких-то не зависящих от Сервиса причин.
					<br>
					<h3>7. ЗАКЛЮЧИТЕЛЬНЫЕ ПОЛОЖЕНИЯ</h3>
					7.1. Соглашение вступает в силу с даты акцепта и действует до тех пор, пока Участник или Сервис
					не расторгнут его, что может быть осуществлено в любое время. В случае расторжения Соглашения
					Участник незамедлительно прекращает использование Сервиса.
					<br>7.2. Право пользования Сервисом прекращается и Соглашение расторгается автоматически без
					уведомления об этом Участника, если Участником не будут соблюдаться условия настоящего
					Соглашения.
					<br>7.3. В случае отзыва настоящего Соглашения в течение срока его действия настоящее Соглашение
					считается прекращенным с момента отзыва. Отзыв осуществляется путем размещения соответствующей
					информации на Сервисе.
					<br>7.4. Участник не вправе уступать или передавать свои права по настоящему Соглашению без
					предварительного письменного согласия Сервиса. Администрация Сервиса может уступить все права и
					обязательства по настоящему Соглашению дочерней компании, аффилированному лицу или
					правопреемнику без согласия Участника.
					<br>7.5. В случае возникновения споров и разногласий, возникших в связи с исполнением настоящего
					Соглашения, в том числе, но не ограничиваясь, в связи с использованием Сервиса должны решаться
					путем переговоров между сторонами, которые не будут превышать 30 (тридцать) календарных дней с
					даты получения первоначального уведомления соответствующей стороной. В случае недостижения
					согласия между сторонами по спорным вопросам, все споры и разногласия должны рассматриваться
					судом по месту регистрации администрации Сервиса.
					<br>7.6. Сервис оставляет за собой право в одностороннем порядке вносить изменения в настоящее
					Соглашение. Изменения вступают в силу с момента публикации, если иной срок отдельно не оговорен.
					<br>7.7. Участник обязан самостоятельно отслеживать изменения в настоящем Соглашении. В случае
					если вследствие невыполнения настоящего обязательства у Участника возникли убытки, Сервис не
					несет за них никакой ответственности.
					<br>7.8. Использование Сервиса после внесения изменений означает безусловное принятие (акцепт)
					Участником условий обновленной редакции Соглашения.
					<br>7.9. Если какое-либо положение настоящего Соглашения будет признано недействительным
					компетентным государственным органом, остальные положения остаются неизменными и сохраняют
					полную силу и действие.
					<br>7.10. Во всем остальном, что не предусмотрено настоящим Соглашением, стороны руководствуются
					действующим законодательством Российской Федерации.
					<br>7.11. Все объекты Сервиса, в том числе элементы дизайна, текст, графические изображения,
					другие объекты, являются объектами исключительных прав Сервиса. Объекты не могут быть
					использованы без предварительного разрешения правообладателя. Использование Участником объектов
					в личных, некоммерческих, коммерческих целях, возможно при условии сохранения всех знаков охраны
					авторского права, товарных знаков, и сохранении соответствующего объекта в неизменном виде.
					Исключение составляют случаи, прямо предусмотренные законодательством РФ или настоящим
					Соглашением.
					<br>7.12. Заключая соглашение и передавая персональные данные при регистрации на Сайте, Участник
					выражает согласие на предоставление своих персональных данных для целей обработки и хранения
					Сервисом в соответствии с Политикой конфиденциальности в отношении обработки персональных
					данных, размещенной на Сайте. Обработка внесенных Участником при заключении соглашения
					персональных данных осуществляется на основании ФЗ «О персональных данных» №152-ФЗ от
					27.07.2006.

				</div>
			</div>
		</div><!-- .modal-content -->
	</div><!-- .modal-dialog -->
</div>


<div class="modal fade show" id="modalNoAzart" tabindex="-1" style="display: none;">
	<div class="modal-dialog modal-dialog-md modal-dialog-centered">
		<div class="modal-content"><a class="modal-close" data-dismiss="modal" aria-label="Close"><em
					class="ti ti-close"></em></a>
			<div class="popup-body">
				<div class="static">
					<h3>1. Является ли данный проект азартной игрой?</h3>
					<div class="inner">
						Однозначно нет.
						<br> Проект не являет собой азартную игру.
						<br> Распределение пожертвований! Каждый участник проекта получает доступ к системе
						пожертвований на добровольной основе, при этом, с одновременной возможностью получить
						пожертвование от иных пользователей в рамках проекта.
					</div>
					<h3>2. Каким образом ведется работа системы пожертвований на добровольной основе? </h3>
					<div class="inner">
						<br> 2.1. Пополнение баланса в системе осуществляется добровольно.
						<br> 2.2. Сумма добровольного пожертвования определяется участником системы исключительно по
						собственному усмотрению.
						<br> 2.3. Для получения пожертвования участнику проекта необходимо сделать ставку.
						<br> 2.4. Сумма пожертвования генерируется системой случайным образом.
					</div>
					<h3>3. Что представляет собой выигрыш в рамках данного проекта?</h3>
					<div class="inner">
						Выигрыш в системе представляет собой получение участником проекта внутриигровых денег. Сумма
						выигрыша генерируется системой случайным образом.
					</div>
					<h3>4. Существуют ли гарантии того, что проект не относится к азартным играм?</h3>
					<div class="inner">
						У нас нет проигравших!
						<br>В рамках данного проекта каждый из участников может сделать пожертвование! В свою
						очередь система служит исключительно для генерирования случайного числа.
						<br>Предварительно, все участники системы принимают соответствующее <a href="#"
							data-toggle="modal" data-target="#modalRules">Пользовательское соглашение</a>.
					</div>
					<div class="cls"></div>
				</div>
			</div>
		</div><!-- .modal-content -->
	</div><!-- .modal-dialog -->
</div><script src="/script/jquery.bundle.js"></script>
<script src="/script/datatables.min.js"></script>
<script src="/script/script.js?v=2"></script>
<script src="/script/jquery-3.2.1.min.js"></script>
</body>
</html>