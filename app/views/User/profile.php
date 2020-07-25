<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Пользователь №<?=$user['id'];?>
        <a href="<?=PATH;?>user/edit?id=<?=$user['id'];?>" class="btn btn-warning btn-xs"> Редактировать</a>
        <a href="<?=PATH;?>user/delete?id=<?=$user['id'];?>" class="btn btn-danger btn-xs delete"> Удалить</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=PATH;?>user"><i class="fa fa-dashboard"></i> Личный кабинет</a></li>
        <li class="active">Профиль</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <th colspan="1" width="200">Номер пользователя</th>
                                <td colspan="1"><?=$user['id'];?></td>
                            </tr>
                            <tr>
                                <th>Логин</th>
                                <td><?=$user['login'];?></td>
                            </tr>
                            <tr>
                                <th colspan="1">Фамилия</th>
                                <th colspan="1">Имя</th>
                                <th colspan="2">Отчество</th>
                            </tr>
                            <tr>
                                <td colspan="1"><?=$user['surname'];?></td>
                                <td colspan="1"><?=$user['name'];?></td>
                                <td colspan="2"><?=$user['middle_name'];?></td>
                            </tr>
                            <tr>
                                <th colspan="1">email</th>
                                <td colspan="1"><?=$user['email'];?></td>
                                <th colspan="1">Телефон</th>
                                <td colspan="1"><?=$user['phone'];?></td>
                            </tr>
                            <tr>
                                <th>Пол</th>
                                <td colspan="1"><?=$user['gender'];?></td>
                                <th>Возраст</th>
                                <td colspan="1"><?=$user['age'];?></td>
                            </tr>
                            <tr>
                                <th>Профессия</th>
                                <td colspan="1"><?=$user['profession'];?></td>
                                <th>Город</th>
                                <td colspan="1"><?=$user['city'];?></td>
                            </tr>
                            <tr>
                                <th>Дата регистрации</th>
                                <td colspan="1"><?=$user['created'];?></td>
                                <th>Дата изменения профиля</th>
                                <td colspan="1"><?=$user['modified'];?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->