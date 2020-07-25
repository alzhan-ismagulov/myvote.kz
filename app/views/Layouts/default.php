<!doctype html>
<html lang="en">
<base href="/">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=PATH;?>public/css/style2.css">
    <?=$this->getMeta();?>
</head>
<body>
<section name="header">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">MYVOTE</a>
        <nav class="navbar navbar-dark">
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Петиции
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?=PATH;?>petition/create">Создать</a>
                        <a class="dropdown-item" href="<?=PATH;?>petitions">Посмотреть</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=PATH;?>feedback/create">Отзывы <span class="sr-only">(current)
                        </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=PATH;?>participant">Участники проекта <span class="sr-only">(current)
                        </span></a>
                </li>
                <li class="nav-item dropdown">
                    <? if(!empty($_SESSION['user'])):?>
                        <a class="nav-link dropdown-toggle float-right" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=h($_SESSION['user']['name']);?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="
                                <?php
                            $user = $_SESSION['user'];
                            if ($user['role'] == 'admin'){
                                echo 'admin';} else {
                                echo 'user';
                            };?>">Личный кабинет</a>
                            <a class="dropdown-item" href="<?=PATH;?>user/logout">Выход</a>
                        </div>
                    <?php else: ?>
                        <a href="#loginModal" class="nav-link dropdown-toggle" data-toggle="modal" data-target="#loginModal">Вход</a>
                        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
                             aria-labelledby="loginModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="loginModalLabel">Аутентификация</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?=PATH;?>user/login" id="login" role="form"
                                              data-toggle="validator">
                                            <div class="form-group has-feedback">
                                                <input type="text" name="login" class="form-control" id="login" placeholder="Login" required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Вход</button>
                                            </div>
                                            <div>Забыли пароль? <a class="recover" href="<?=PATH;
                                            ?>recover">Восстановление пароля</a>
                                            </div>
                                            <div>Нет аккаунта? <a class="signup" href="<?=PATH;?>signup">Регистрация</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </li>
            </ul>
            <form action="<?=PATH;?>search" method="post" autocomplete="off" class="form-inline my-2 my-lg-0">
                <input type="text" class="search form-control mr-sm-2" id="search" name="search">
                <button type="submit" class="btn btn-primary">Поиск</button>
            </form>
        </div>
    </nav>
</section>

<section name="content">
    <div class="contaner" name="alertMessage">
        <div class="row">
            <div class="col-md-12">
                <?=alertMessage();?>
            </div>
        </div>
    </div>
    <?=$content;?>
</section>

<section name="footer">
    <footer>
        <div class="footer-logo">
            <p><b>MYVOTE</b> 2020. Все права соблюдены</p>
        </div>
    </footer>
</section>

<script src="/public/js/jquery-3.5.1.min.js"></script>
<script src="/public/js/validator.min.js"></script>
<script src="/public/js/popper.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/5c432f4121.js" crossorigin="anonymous"></script>
<script type="application/javascript">
    var tId;
    $("#messageBox").hide().slideDown();
    clearTimeout(tId);
    tId=setTimeout(function(){
        $("#messageBox").hide();
    }, 3000);
</script>
<script type="application/javascript">
    $('#loginModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Аутентификация ')
        modal.find('.modal-body input').val(recipient)
    })
</script>
</body>
</html>