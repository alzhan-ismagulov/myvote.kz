<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Создание петиции</h1>
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Панель управления</a></li>
        <li class="active"><a href="<?=PATH;?>admin/petitions?page=1">Список петиций</a></li>
    </ol>
</section>
            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <form action="<?=PATH;?>petition/create" name="create" enctype="multipart/form-data" method="post" role="form"
                              data-toggle="validator">
                            <div class="form-group has-feedback">
                                <label for="destination"><h5>Куда обращаетесь?</h5></label>
                                <input type="text"
                                       id="destination"
                                       name="destination"
                                       class="form-control"
                                       placeholder= "Куда или к кому Вы обращаетесь?"
                                       value="<?=isset($_SESSION['form_data']['destination']) ?
                                           h($_SESSION['form_data']['destination']) : '';?>"
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="title"><h5>Название петиции</h5></label>
                                <input type="text"
                                       id="title"
                                       name="title"
                                       class="form-control"
                                       placeholder="Введите название"
                                       value="<?=isset($_SESSION['form_data']['title']) ?
                                           h($_SESSION['form_data']['title']) : '';?>"
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="description"><h5>Краткое описание</h5></label>
                                <input type="text"
                                       id="description"
                                       name="description"
                                       class="form-control"
                                       placeholder="Описание"
                                       value="<?=isset($_SESSION['form_data']['description']) ?
                                           h($_SESSION['form_data']['description']) : '';?>"
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="text"><h5>Введите текст обращения</h5></label>
                                <textarea
                                        rows="50"
                                        id="text"
                                        name="text"
                                        class="form-control"
                                        placeholder="Введите текст обращения"
                                        value="<?=isset($_SESSION['form_data']['text']) ?
                                            h($_SESSION['form_data']['text']) : '';?>"
                                        required>
                                </textarea>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="file-upload-wrapper">
                                <input type="file" name="userfile"/>
                            </div>
                            <b class="form-group has-feedback">
                                <label for="text"><h5>Автор петиции</h5></label><br />
                                <?php echo $_SESSION['user']['name'];?> <?php echo $_SESSION['user']['surname'];?>
                            </b>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary"
                                name="submit"
                                type="submit"
                                id="sumbit"
                                value="submit">Создать петицию
                        </button>
                    </div>
                        </form>
                </div>
            </section>
    </div>
</div>