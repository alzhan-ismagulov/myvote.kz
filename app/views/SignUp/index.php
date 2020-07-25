<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=PATH;?>">Главная</a></li>
        <li class="breadcrumb-item">Регистрация</li>
    </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="user-form col-md-8">
            <div class="signup-title"><h2 class="h6"><b>Регистрация</b></h2></div>
            <p class="small" style="color: red">Внимание! Ваши данные, такие как ИИН и телефон не будут видны
                даже для тех, кто
                создал
                петицию. Автор сможет обратиться к Вам только в комментариях, для открытия личных данных. Все данные,
                может увидеть только администратор портала.
            </p>
            <div class="signup-content">
                <form method="post" action="signup" id="signup" class="dx-form" role="form" data-toggle="validator">
                    <div class="box-content">
                        <div class="form-group">
                            <label for="login" class="mnt-7">Логин</label>
                            <input type="text" class="form-control form-control-style-2" id="login" name="login"
                                   placeholder="Ваш ник в системе"
                                   value="<?=isset($_SESSION['form_data']['login']) ?
                                       h($_SESSION['form_data']['login']) : '';?>"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="mnt-7">Пароль</label>
                            <input type="password" class="form-control form-control-style-2" id="password"
                                   name="password"
                                   placeholder="Ваш пароль" required>
                        </div>
                        <div class="form-group">
                            <label for="surename" class="mnt-2">Фамилия</label>
                            <input type="text" class="form-control form-control-style-2" id="surname"
                                   name="surname"
                                   placeholder="Введите Вашу фамилию" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="mnt-2">Имя</label>
                            <input type="text" class="form-control form-control-style-2" id="name" name="name"
                                   placeholder="Введите Ваше имя" required>
                        </div>
                        <div class="form-group">
                            <label for="middle_name" class="mnt-2">Отчество</label>
                            <input type="text" class="form-control form-control-style-2" id="middle_name"
                                   name="middle_name"
                                   placeholder="Введите Ваше отчество" required>
                        </div>
                        <div class="form-group">
                            <label for="iin" class="mnt-7">ИИН</label>
                            <input type="text" class="form-control form-control-style-2" id="iin" name="iin"
                                   placeholder="Ваш ИИН" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="mnt-7">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control form-control-style-2"
                                   id="email"
                                   placeholder="Email"
                                   value="<?=isset($_SESSION['form_data']['email']) ?
                                       h($_SESSION['form_data']['email']) : '';?>"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="mnt-7">Телефон</label>
                            <input type="text" class="form-control form-control-style-2" id="line-one"
                                   name="phone"
                                   placeholder="Ваш номер телефона" required>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="mnt-7">Пол</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="-1" disabled label="Выберите пол" selected></option>
                                <option value="Мужской">Мужской</option>
                                <option value="Женский">Женский</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="age" class="mnt-7">Возраст</label>
                            <select name="age" id="age" class="form-control" required>
                                <option value="-1" disabled label="Выберите возраст" selected></option>
                                <?php
                                for ($i=16; $i<120;$i++){
                                    echo '<option>' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="profession" class="mnt-7">Профессия</label>
                            <input type="text" class="form-control form-control-style-2" id="profession"
                                   name="profession"
                                   placeholder="Кем работаете?" required>
                        </div>
                        <div class="form-group">
                            <label for="city" class="mnt-7">Город</label>
                            <input type="text" class="form-control form-control-style-2" id="city" name="city"
                                   placeholder="Город проживания" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary"
                                    name="submit"
                                    type="submit"
                                    id="sumbit"
                                    value="submit">Registration</button>
                        </div>
                    </div>
                </form>
                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
            </div>
        </div>
    </div>
</div>