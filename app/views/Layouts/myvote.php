<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <?=$this->getMeta();?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
<section>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="petition/create">Создать</a>
                    <a class="nav-link" href="petitions">Посмотреть</a>
                </li>
                <li class="nav-item dropdown">
                    <? if(!empty($_SESSION['user'])):?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=h($_SESSION['user']['name']);?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="
                            <?php
                            $user = $_SESSION['user'];
                            if ($user['role'] == 'admin'){
                                echo 'admin';} else {
                                echo 'user';
                            };?>">Личный кабинет</a>
                            <a class="nav-link" href="user/logout">Выход</a>
                        </div>
                    <?php else: ?>
                        <a href="#loginModal" class="nav-link" data-toggle="modal" data-target="#loginModal">Вход</a>
                        <!-- Modal -->

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
                                        <form method="post" action="user/login" id="login" role="form" data-toggle="validator">
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
                                            <div class="text-muted text-right">
                                                Забыли пароль? <a class="" href="recover">Восстановление пароля</a>
                                            </div>
                                            <div class="text-muted text-right">
                                                Нет аккаунта? <a class="" href="signup">Регистрация</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</section>

<div class="contaner" name="alertMessage">
    <div class="row">
        <div class="col-md-12">
            <?=alertMessage();?>
        </div>
    </div>
</div>
<?=$content;?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/public/js/jquery-3.5.1.min.js"></script>
<script src="/public/js/validator.min.js"></script>
<script src="/public/js/popper.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
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
<script src="/public/userlte/bower_components/ckeditor/ckeditor.js"></script>
<script src="/public/userlte/my.js"></script>
</body>
</html>