<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Редактирование петиции №<?=$petition['id'];?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=PATH;?>user"><i class="fa fa-dashboard"></i> Личный кабинет</a></li>
        <li class="active">Петиция №<?=$petition['id'];?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <form action="<?=PATH;?>petition/edit" name="edit" method="post" role="form"
                          data-toggle="validator">
                        <div class="form-group has-feedback">
<!--                            <label for="destination"><h5>№</h5></label>-->
                            <input type="hidden"
                                   id="id"
                                   name="id"
                                   class="form-control"
                                   placeholder= ""
                                   value="<?=$petition['id'];?>">
                            <span class="glyphicon form-control-feedback" aria-
                                  hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="destination"><h5>Куда обращаетесь?</h5></label>
                            <input type="text"
                                   id="destination"
                                   name="destination"
                                   class="form-control"
                                   placeholder= "Куда или к кому Вы обращаетесь?"
                                   value="<?=$petition['destination'];?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-
                                  hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="title"><h5>Название петиции</h5></label>
                            <input type="text"
                                   id="title"
                                   name="title"
                                   class="form-control"
                                   placeholder="Введите название"
                                   value="<?=$petition['title'];?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-
                                  hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="description"><h5>Краткое описание</h5></label>
                            <input type="text"
                                   id="description"
                                   name="description"
                                   class="form-control"
                                   placeholder="Краткое описание"
                                   value="<?=$petition['description'];?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-
                                  hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="text"><h5>Введите текст обращения</h5></label>
                            <textarea
                                    rows="50"
                                    id="text"
                                    name="text"
                                    class="form-control"
                                    placeholder="Введите текст обращения"
                                    value="<?=$petition['text'];?>">
                            </textarea>
                            <span class="glyphicon form-control-feedback" aria-
                                  hidden="true"></span>
                        </div>
                        <b class="form-group has-feedback">
                            <label><h5>Автор петиции: </h5></label>
                            <?php echo $_SESSION['user']['login'];?>
                        </b>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary"
                            name="submit"
                            type="submit"
                            id="sumbit"
                            value="submit">Редактировать петицию</button>
                </div>
                </form>
            </div>
        </div>
        </div>
</section>
<!-- /.content -->