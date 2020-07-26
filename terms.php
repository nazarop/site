<?php
require("inc/site_config.php");
?>
<!DOCTYPE html>

<html lang="ru" class="js">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="Nvuti">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.ico"><!-- Site Title  -->
    <title><?=$sitename?> - пользовательское соглашение</title><!-- Vendor Bundle CSS -->
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
                <h2 class="page-title">ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ</h2>
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


            <h5>1. ОБЩИЕ ПОЛОЖЕНИЯ И ТЕРМИНЫ</h5>
            <p>1.1. Данный документ является договором на использование Сервиса <?=$sitename?>.
              Ниже приведены правила и условия использования Сервиса. Пожалуйста, внимательно ознакомьтесь с
              ними.
            </p>
            <p>1.2. Сервисом могут пользоваться люди достигшие 18-ти лет.</p>
            <p>1.3. Сервис "<?=$sitename?>" - беспроигрышная онлайн игра принадлежащая
              организатору и находящейся по адресу в сети интернет <?=$_SERVER['HTTP_HOST'];?>. Организатором
              предоставляются услуги по организации развлечения, досуга и отдыха.
            </p>
            <p>1.4. Организаторы беспроигрышной онлайн игры <?=$sitename?> никого не обязывают
              проводить свой досуг на Сервисе.
            </p>

            <h5>2. УЧЕТНАЯ ЗАПИСЬ, ПАРОЛЬ, БЕЗОПАСНОСТЬ</h5>
            <p>2.1. Для открытия Учетной Записи пользователь должен зарегистрироваться с помощью логина и пароля.
            </p>
            <p>2.2. Пользователь несет полную ответственность за хранение своей
              конфиденциальной информации, за потерю доступа к своей Учетной Записи.
            </p>
            <p>2.3. Пользователь несет полную ответственность за любые, совершенные
              им действия.
            </p>
            <p>2.4. Сервис не несет ответственности за поступки, совершенные
              Пользователем в отношении третьих лиц.
            </p>
            <p>2.5. Пользователь обязуется сообщить Сервису о любом
              несанкционированном использовании его Учетной записи.
            </p>

            <h5>3. ПОЛЬЗОВАТЕЛЬ</h5>
            <p>3.1.Сервис оставляет за собой право в любой момент блокировать
              Пользователя в связи с нарушением правил использования Сервиса или законодательства.
            </p>
            <p>3.2.Неприемлемы попытки несанкционированного доступа, попытки
              нанесения вреда Сервису.
            </p>
            <p>3.3.При добавлении на сайт любой информации, запрещены оскорбления,
              вымогательства, клевета, блеф, сообщения, содержащие вредоносную информацию (в т.ч. вирусы,
              трояны, черви и т.п.), а также информация, способная нанести вред третьим
              лицам.
            </p>

            <h5>4. ЗАПРЕЩЕНО</h5>
            <p>4.1. Запрещается публиковать фальсифицированные данные.</p>
            <p>4.2. Запрещается передача любых материалов, которые могут нарушить
              интеллектуальную собственность третьих лиц.
            </p>
            <p>4.3. Запрещаются фальшивые публикации информации с целью получения
              несанкционированных доступов к информации или данным третьих лиц.
            </p>
            <p>4.4. Запрещается публикация информации религиозного и политического
              характера.
            </p>
            <p>4.5. Запрещается регистрировать более одной Учетной Записи.</p>
            <p>4.6. Запрещается передавать данные для доступа к Учетной записи
              третьим лицам.
            </p>
            <p>4.7. Запрещается оскорблять, обзывать, ставить под сомнение
              профессиональную квалификацию и добросовестность физических и юридических лиц, в том числе
              Пользователей Сервиса и Администрации Сервиса.
            </p>

            <h5>5. ОТВЕТСТВЕННОСТЬ СТОРОН</h5>
            <p>5.1. Пополняя баланс на сайте любыми платежными системами, вы берете
              на себя полную ответственность за ваши действия. Сервис никак не принуждает и не настаивает
              делать какие либо действия.
            </p>
            <p>5.2. Делая ставку и устанавливая коэффициент автовывода, вы принимаете
              полную ответственность за ваши действия.
            </p>
            <p>5.3.Сервис не призывает и не мотивирует увеличить ваши средства.</p>
            <p>5.4.Сервис не дает 100% гарантии, что ставка с заданным вами
              коэффициентом автовывода увеличит ваши средства на балансе.
            </p>
            <p>5.5.Сервис ни в коем случае не обязывает и не заставляет совершать тех
              или иных действий.
            </p>
            <p>5.6 Все действия, совершенные вами в Сервисе, осуществляются исключительно
              под вашу ответственность.
            </p>

            <h5>6. ПРИНЯТИЕ УСЛОВИЙ СОГЛАШЕНИЯ (АКЦЕПТ ОФЕРТЫ)</h5>
            <p>6.1. Используя и/или посещая любые разделы Сервиса, Вы соглашаетесь
              принять и соблюдать условия настоящего Соглашения и Вы соответственно соглашаетесь использовать
              средства электронной коммуникации для заключения договоров, Вы также отказываетесь от любых
              применимых в данном случае прав или требований, для которых необходима собственноручная подпись,
              в той степени, в которой это допускается любым применимым законодательством.
            </p>
            <p>6.2. Если Вы не согласны принять и далее следовать условиям настоящего
              Соглашения, пожалуйста, не регистрируйте аккаунт и/или прекратите использовать Ваш аккаунт.
              Дальнейшее использование Сервиса будет рассматриваться как Ваше согласие с условиями настоящего
              Соглашение.
            </p>

            <h5>7. ПРАВА</h5>
            <p>7.1. Исключительное право на Сервис принадлежит Сервису.</p>
            <p>7.2. Все права на материалы, представленные на нашем сайте,
              принадлежат Правообладателям.
            </p>
            <h5>Скрипты и модули</h5>
            <p>
                <br>Создателем скрипта является Хейтер Холод - <a href="https://vk.com/xater0" target="_blank">*тык*</a>
            </p>
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