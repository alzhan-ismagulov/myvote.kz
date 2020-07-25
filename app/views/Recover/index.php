<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=PATH;?>">Главная</a></li>
        <li class="breadcrumb-item">Восстановление пароля</li>
    </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="user-form col-md-8">
            <div class="recovery-title"><h2 class="h6"><b>Восстановить пароль</b></h2></div>
            <div class="signup-content">
                    <form method="post" action="user/recover" id="signup" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="email">Введите свой Email для восстановления пароля</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                   value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '';?>" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary"
                                    name="submit"
                                    type="submit"
                                    id="sumbit"
                                    value="submit">Восстановить</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>