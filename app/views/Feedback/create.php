<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=PATH;?>">Главная</a></li>
        <li class="breadcrumb-item">Отзывы</li>
    </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="user-form col-md-8">
            <div class="feedback-title">
                <h2 class="h6"><b>Чтобы связаться с разработчиком, заполните эту форму</b></h2>
            </div>
            <div class="feedback-content">
                <form action="<?=PATH;?>feedback/create" class="dx-form" method="post" name="message">
                    <div class="box-content">
                        <div class="form-group">
                            <label for="name" class="mnt-7">Имя</label>
                            <input type="text" name="name" class="form-control form-control-style-2" id="name"
                                   placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="mnt-7">Фамилия</label>
                            <input type="text" name="last_name" class="form-control form-control-style-2"
                            id="last_name"
                                   placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="mnt-7">Email</label>
                            <input type="email" name="email" aria-describedby="emailHelp" class="form-control
                            form-control-style-2" id="email" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="text" class="mnt-7">Текст</label>
                            <textarea class="form-control form-control-style-3" name="text" id="text" rows="8"
                                      cols="80"
                                      placeholder="Комментарий..."></textarea>
                        </div>
                        <p></p>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
