<!doctype html>
<html lang="en">
<head>
    <?=$this->getMeta();?>
</head>
<body>
<div class="col-md-12" style="margin-left: 30px"><h1>Регистрация</h1></div>
<div class="container" style="margin-left: 30px">
    <div class="row"">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="user/signup" id="signup" role="form" data-toggle="validator">
                        <div class="form-group has-feedback">
                            <label for="login">Логин</label>
                            <input type="text"
                                   id="login"
                                   name="login"
                                   class="form-control"
                                   placeholder="Введите логин"
                                   value="<?=isset($_SESSION['form_data']['login']) ?
                                       h($_SESSION['form_data']['login']) : '';?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="password">Пароль</label>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control"
                                   data-minlength="6"
                                   placeholder="Введите пароль"
                                   data-error="Пароль должен включать в себя не менее 6 символов"
                                   pattern="[a-zA-Z0-9]+"
                                   value="<?=isset($_SESSION['form_data']['password']) ?
                                       h($_SESSION['form_data']['password']) : '';?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="login">Фамилия</label>
                            <input type="text"
                                   id="surname"
                                   name="surname"
                                   class="form-control"
                                   placeholder="Ваша фамилия"
                                   value="<?=isset($_SESSION['form_data']['surname']) ?
                                       h($_SESSION['form_data']['surname']) : '';?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name">Имя</label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   class="form-control"
                                   placeholder="Ваше имя"
                                   value="<?=isset($_SESSION['form_data']['name']) ?
                                       h($_SESSION['form_data']['name']) : '';?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="middle_name">Отчество</label>
                            <input type="text"
                                   id="middle_name"
                                   name="middle_name"
                                   class="form-control"
                                   placeholder="Ваше имя"
                                   value="<?=isset($_SESSION['form_data']['middle_name']) ?
                                       h($_SESSION['form_data']['middle_name']) : '';?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   id="email"
                                   placeholder="Email"
                                   value="<?=isset($_SESSION['form_data']['email']) ?
                                       h($_SESSION['form_data']['email']) : '';?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="phone">Телефон</label>
                            <input type="text"
                                   id="phone"
                                   name="phone"
                                   class="form-control"
                                   placeholder="phone"
                                   value="<?=isset($_SESSION['form_data']['phone']) ?
                                       h($_SESSION['form_data']['phone']) : '';?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="gender">Пол</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="-1" disabled label="Выберите пол" selected></option>
                                <option value="Мужской">Мужской</option>
                                <option value="Женский">Женский</option>
                            </select>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="gender">Возраст</label>
                            <select name="age" id="age" class="form-control" required>
                                <option value="-1" disabled label="Выберите возраст" selected></option>
                                <?php
                                for ($i=16; $i<120;$i++){
                                    echo '<option>' . $i . '</option>';
                                }
                                ?>
                            </select>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="profession">Профессия</label>
                            <input type="text"
                                   id="profession"
                                   name="profession"
                                   class="form-control"
                                   placeholder="profession"
                                   value="<?=isset($_SESSION['form_data']['profession']) ?
                                       h($_SESSION['form_data']['profession']) : '';?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="city">Город проживания</label>
                            <input type="text"
                                   id="city"
                                   name="city"
                                   class="form-control"
                                   placeholder="Ваш город"
                                   value="<?=isset($_SESSION['form_data']['city']) ?
                                       h($_SESSION['form_data']['city']) : '';?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary"
                                    name="submit"
                                    type="submit"
                                    id="sumbit"
                                    value="submit">Registration</button>
                        </div>
                    </form>
                    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>