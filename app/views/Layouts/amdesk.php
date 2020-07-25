<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Сайт петиций</title>
    <link rel="icon" type="image/png" href="/public/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:url"           content="<?=PATH;?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="MyVOTE.kz - сайт петиций" />
    <meta property="og:description"   content="Сайт петиций" />
    <meta property="og:image"         content="<?=PATH;?>public/images/logo.png" />

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700%7cMaven+Pro:400,500,700" rel="stylesheet"><!-- %7c -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/public/vendor/bootstrap/dist/css/bootstrap.min.css">

    <!-- Fancybox -->
    <link rel="stylesheet" href="/public/vendor/fancybox/dist/jquery.fancybox.min.css">

    <!-- Pe icon 7 stroke -->
    <link rel="stylesheet" href="/public/vendor/pixeden-stroke-7-icon/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    <!-- Swiper -->
    <link rel="stylesheet" type="text/css" href="/public/vendor/swiper/dist/css/swiper.min.css">

    <!-- Bootstrap Select -->
    <link rel="stylesheet" type="text/css" href="/public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

    <!-- Dropzone -->
    <link rel="stylesheet" type="text/css" href="/public/vendor/dropzone/dist/min/dropzone.min.css">

    <!-- Quill -->
    <link rel="stylesheet" type="text/css" href="/public/vendor/quill/dist/quill.snow.css">

    <!-- Font Awesome -->
    <script defer src="/public/vendor/fontawesome-free/js/all.js"></script>
    <script defer src="/public/vendor/fontawesome-free/js/v4-shims.js"></script>

    <!-- Amdesk -->
    <link rel="stylesheet" href="/public/css/amdesk.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="/public/css/custom.css">

    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="/public/vendor/jquery/dist/jquery.min.js"></script>


</head>


<body>
<!--        Header-->
<nav class="dx-navbar dx-navbar-top dx-navbar-collapse dx-navbar-sticky dx-navbar-expand-lg dx-navbar-dropdown-triangle dx-navbar-autohide">
    <div class="container">
        <a href="/" class="dx-nav-logo">
            <div class="dx-widget-title">MYVOTE</div>
<!--            <img src="/public/images/logo.png" alt="" width="88px">-->
        </a>
        <button class="dx-navbar-burger">
            <span></span><span></span><span></span>
        </button>
        <!--        Главное меню-->
        <div class="dx-navbar-content">
            <ul class="dx-nav dx-nav-align-left">
                <li class="dx-drop-item"><a href="/">Главная</a></li>
                <li class="dx-drop-item"><a href="#">Петиции</a>
                    <ul class="dx-navbar-dropdown">
                        <li><a href="<?=PATH;?>petitions">Посмотреть</a></li>
                        <li><a href="<?=PATH;?>petition/create">Создать</a></li>
                    </ul>
                </li>
                <li class="dx-drop-item"><a href="<?=PATH;?>feedback/create">Контакты</a></li>
            </ul>

            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <form action="<?=PATH;?>search" method="post" autocomplete="off" class="dx-form
                    dx-form-group-inputs">
                        <input type="text" class="search" id="search" name="search">
                        <button type="submit" class="btn btn-primary">Поиск</button>
                    </form>
                </div>
            </div>
            <!--        /Главное меню-->
            <!--        Меню входа-->
            <ul class="dx-nav dx-nav-align-right">
                <li>
                    <? if(!empty($_SESSION['user'])):?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=h($_SESSION['user']['name']);?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="<?=PATH;?><?php
                            $user = $_SESSION['user'];
                            if ($user['role'] == 'admin'){
                                echo 'admin';} else {
                                echo 'user';
                            };?>">Личный кабинет</a>
                            <a class="nav-link" href="<?=PATH;?>user/logout">Выход</a>
                        </div>
                    <?php else: ?>
                    <a data-fancybox data-touch="false" data-close-existing="true" data-src="#login"
                       href="<?=PATH;?>user/login">Вход</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--        /Header-->
<div class="contaner" name="alertMessage">
    <div class="row">
        <div class="col-md-12">
            <?=alertMessage();?>
        </div>
    </div>
</div>
<?=$content;?>

    <!-- START: Footer -->
    <footer class="dx-footer">
        <div class="dx-box-1">
            <div class="container">
<!--                <div class="row vertical-gap lg-gap">-->
<!---->
<!--                    <div class="col-sm-6 col-lg-3">-->

                        <div class="dx-widget-footer">
                            <div class="dx-widget-title">
<!--                                <a href="--><?//=PATH;?><!--" class="dx-widget-logo">-->
                                    MyVOTE
<!--                                    <img src="/public/images/logo.png" alt="" width="88px">-->
<!--                                </a>-->
                            </div>
                            <div class="dx-widget-text">
                                <p class="mb-0">&copy; 2020 <span class="dib">All rights reserved.</span> <span
                                            class="dib">Alzhan Ismagulov</span></p>
                            </div>
                            <div class="dx-widget-text">

                            </div>
                        </div>

<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </footer>
    <!-- END: Footer -->
</div>

<div class="dx-popup dx-popup-signin" id="login">
    <button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></button>
    <div class="dx-signin-content dx-signin text-center">
        <h1 class="h3 text-white mb-30">Вход</h1>
        <form method="post" action="<?=PATH;?>user/login" class="dx-form" id="login" role="form"
              data-toggle="validator">
            <div class="form-group has-feedback">
                <input type="text" name="login" class="form-control" id="login" placeholder="Логин" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" id="pasword" placeholder="Пароль" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="modal-footer">
<!--                <button type="submit" class="btn btn-primary">Вход</button>-->
                <button type="submit" href="<?=PATH;?>user/login" class="dx-btn dx-btn-block dx-btn-popup">Вход</button>
            </div>
            <div class="text-muted text-right">
                Забыли пароль? <a class="" href="<?=PATH;?>recover">Восстановление пароля</a>
            </div>
            <div class="text-muted text-right">
                Нет аккаунта? <a class="" href="<?=PATH;?>signup">Регистрация</a>
            </div>
        </form>
    </div>
</div>

<div class="dx-popup dx-popup-signin" id="reset-password">
    <button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></button>
    <div class="dx-popup-content dx-signin text-center">
        <h1 class="h3 text-white mb-30">Reset Password</h1>

        <form action="#" class="dx-form">
            <div class="dx-form-group-md">
                <input type="email" class="form-control form-control-style-4" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="dx-form-group-md">
                <button class="dx-btn dx-btn-block dx-btn-popup">Reset My Password</button>
            </div>
        </form>
    </div>
</div>



<!-- START: Scripts -->

<!-- Object Fit Images -->
<script src="/public/vendor/object-fit-images/dist/ofi.min.js"></script>

<!-- Popper -->
<script src="/public/vendor/popper.js/dist/umd/popper.min.js"></script>

<!-- Bootstrap -->
<script src="/public/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!--<script src="/public/js/typeahead.bundle.js"></script>-->
<!--<script src="/public/js/main.js"></script>-->

<!-- Fancybox -->
<script src="/public/vendor/fancybox/dist/jquery.fancybox.min.js"></script>

<!-- Cleave -->
<script src="/public/vendor/cleave.js/dist/cleave.min.js"></script>

<!-- Validator -->
<script src="/public/vendor/validator/validator.min.js"></script>

<!-- Sticky Kit -->
<script src="/public/vendor/sticky-kit/dist/sticky-kit.min.js"></script>

<!-- Jarallax -->
<script src="/public/vendor/jarallax/dist/jarallax.min.js"></script>
<script src="/public/vendor/jarallax/dist/jarallax-video.min.js"></script>

<!-- Isotope -->
<script src="/public/vendor/isotope-layout/dist/isotope.pkgd.min.js"></script>

<!-- ImagesLoaded -->
<script src="/public/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

<!-- Swiper -->
<script src="/public/vendor/swiper/dist/js/swiper.min.js"></script>

<!-- Gist Embed -->
<script src="/public/vendor/gist-embed/gist-embed.min.js"></script>

<!-- Bootstrap Select -->
<script src="/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- Dropzone -->
<script src="/public/vendor/dropzone/dist/min/dropzone.min.js"></script>

<!-- Quill -->
<script src="/public/vendor/quill/dist/quill.min.js"></script>

<!-- The Amdesk -->
<script src="/public/js/amdesk.min.js"></script>
<script src="/public/js/amdesk-init.js"></script>
<!-- END: Scripts -->


<script type="application/javascript">
    var tId;
    $("#messageBox").hide().slideDown();
    clearTimeout(tId);
    tId=setTimeout(function(){
        $("#messageBox").hide();
    }, 3000);
</script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v7.0" nonce="hQdbCXCx"></script>

</body>
</html>
