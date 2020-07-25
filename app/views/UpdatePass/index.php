<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=PATH;?>">Главная</a></li>
        <li class="breadcrumb-item">Отзывы</li>
    </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="user-form col-md-8">
            <div class="updatepass-title">
                <h2 class="h6"><b>Обновление пароля</b></h2>
            </div>
            <div class="updatepass-content">
                <form method="post" action="user/updatepass" id="signup" role="form" data-toggle="validator">
                    <div class="form-group has-feedback">
                        <label for="password">Введите новый пароль</label>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Новый пароль"  value="<?=isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : '';?>" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="repeat_password">Повторите новый пароль</label>
                        <input type="password" name="repeat_password" class="form-control" id="repeat_password"
                               placeholder="Повторите пароль"  value="<?=isset($_SESSION['form_data']['repeat_password'])
                            ? h($_SESSION['form_data']['repeat_password']) : '';?>" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Обновить пароль</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!--            <div class="card">-->
<!--                <div class="card-header"><h1>ОБНОВЛЕНИЕ ПАРОЛЯ</h1></div>-->
<!--                <div class="card-body">-->
<!--                    <form method="post" action="user/updatepass" id="signup" role="form" data-toggle="validator">-->
<!--                        <div class="form-group has-feedback">-->
<!--                            <label for="password">Введите новый пароль</label>-->
<!--                            <input type="password" name="password" class="form-control" id="password"-->
<!--                                   placeholder="Новый пароль"  value="--><?//=isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : '';?><!--" required>-->
<!--                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>-->
<!--                        </div>-->
<!--                        <div class="form-group has-feedback">-->
<!--                            <label for="repeat_password">Повторите новый пароль</label>-->
<!--                            <input type="password" name="repeat_password" class="form-control" id="repeat_password"-->
<!--                                   placeholder="Повторите пароль"  value="--><?//=isset($_SESSION['form_data']['repeat_password'])
//                                ? h($_SESSION['form_data']['repeat_password']) : '';?><!--" required>-->
<!--                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>-->
<!--                        </div>-->
<!--                </div>-->
<!--                <div class="card-footer">-->
<!--                    <button type="submit" class="btn btn-primary">Обновить пароль</button>-->
<!--                </div>-->
<!--                </form>-->
<!--            </div>-->
        </div>
    </div>
</div>