<?php
require("inc/site_config.php");  
  ?>
<!DOCTYPE html>

<html lang="ru" class="js">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="<?=$sitename?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.ico"><!-- Site Title  -->
    <title><?=$sitename?> - ваш аккаунт заблокирован</title><!-- Vendor Bundle CSS -->
    <meta name="description" content="<?=$sitename?> - Настоящий сайт Нвути. Все комиссии берем на себя, бонус при регистрации. Произведем выплаты за 24 часа на любую платежную систему.">
    <link rel="stylesheet" href="../css/vendor.bundle.css">
    <link rel="stylesheet" href="../css/loader-0.css">
    <link rel="stylesheet" href="../css/style.css" id="layoutstyle">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>

</head>

<body class="page-user no-touch">

    <div class="topbar-wrap" style="padding-top: 0px;">
        <div class="topbar is-sticky">
            <div class="container">
                <div class="">
                    <style>
                        @media (max-width: 991px) {
                            .desktop-nav {
                                margin-top: -55px;
                            }

                        }

                    </style>
                    <ul class="topbar-nav d-lg-none">
                        <li class="topbar-nav-item relative"><a class="toggle-nav">
                                <div class="toggle-icon"><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span></div>
                            </a></li>
                    </ul>
                    <center onclick='window.location.href="/"' class="desktop-nav" style="cursor:pointer;font-weight: 600;padding: 5px;color: #fff;font-size: 25px;"><?=$sitename?></center>
                </div>
            </div><!-- .container -->
        </div><!-- .topbar -->
        <div class="navbar">
            <div class="container">

                <div class="navbar-innr">

                    <ul class="navbar-menu">
                       <li><a href="/">Главная</a></li>
                        <li><a href="/check.php">Честная игра</a></li>
                        <li><a href="/faq.php">FAQ</a></li>
                        <li><a href="/support.php">Контакты</a></li>
                        <li><a href="/withdraws.php">Выплаты</a></li>

                    </ul>
                    <ul class="navbar-btns">
                        <li><a href="<?=$group?>" target="_blank" class="btn btn-sm btn-outline btn-light"><em style="color: #3b5998;" class="fab fa-vk"></em><span>Вконтакте</span></a></li>
                    </ul>
                </div><!-- .navbar-innr -->
            </div><!-- .container -->
        </div><!-- .navbar -->
    </div><!-- .topbar-wrap -->
    <div class="page-content">
        <div class="page-header page-header-kyc">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7 text-center">
                <h2 class="page-title">Ваш аккаунт заблокирован. Возможные причины</h2>
                <p class="large"></p>
            </div>
        </div>
    </div><!-- .container -->
</div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div class="kyc-status card mx-lg-4">
                        <div class="card-innr">
                            
                            <div class="content">
                              
                             <div class="terms__wrapper">


            <h5>1. У вас имеется более 1-го аккаунта</h5>
            <p>1.1. Вы используете сторонние скрипты для подкрутки (увеличения шанса выигрыша)
            </p>
            <p>1.2. Махинации с реф. системой
            </p>
            <p>1.3. Оскорбление участников сайта, администрации</p>
            <p>1.4. Выдавание себя за администрацию данного сайта</p>
            

          </div>
                        </div>
                    </div><!-- .card -->
               
                </div>
            </div>
        </div><!-- .container -->
    </div>
<div class="footer-bar">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <ul class="footer-links">
                    <li><a href="/terms.php">Пользовательское соглашение</a></li>
                    <li><a href="/policy.php">Политика конфеденциальности</a></li>
                </ul>
            </div><!-- .col -->
            <!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div>

        <script src="../script/jquery.bundle.js"></script>
        <script src="../script/script.js"></script>
        <script>
        
        var jgjger = setInterval(function() {
  console.log("%cОстановитесь!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЕсли кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;");
  
}, 2000);

setTimeout(function() {
  clearInterval(jgjger);
  console.log("%cОстановитесь!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЕсли кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;");
  
}, 30000);
    </script>

</body>

</html>