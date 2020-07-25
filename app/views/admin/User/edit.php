<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Пользователь №<?=$user['id'];?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Панель управления</a></li>
        <li class="active">Пользователь №<?=$user['id'];?></li>
    </ol>
</section>
<section>
    <div class="col-md-12" style="margin-left: 30px"><h1>Редактирование профиля</h1></div>
    <div class="container" style="margin-left: 30px">
        <div class="row"">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?=ADMIN;?>/user/edit" id="edit" name="edit" role="form"
                          data-toggle="validator">
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
                                   value=""
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
                                   value="<?=$user['surname'];?>"
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
                                   value="<?=$user['name'];?>"
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
                                   value="321"
                                   required>
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
                                   value="<?=$user['profession'];?>"
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
                                   value="<?=$user['city'];?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary"
                                    name="submit"
                                    type="submit"
                                    id="sumbit"
                                    value="submit">Подтвердить</button>
                        </div>
                    </form>
                    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
