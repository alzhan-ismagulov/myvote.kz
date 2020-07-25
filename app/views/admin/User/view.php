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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if($user['status']==1){?>
                <a href="<?=ADMIN;?>/user/changeStatus?id=<?=$user['id'];?>&status=0"
                   class="btn btn-warning btn-xs"> Сделать неактивным</a>
                <?php } else { ?>
                <a href="<?=ADMIN;?>/user/changeStatus?id=<?=$user['id'];?>&status=1"
                   class="btn btn-success btn-xs"> Сделать активным</a>
                <?php } ?>
                <?php if($user['role']=='user'){?>
                    <a href="<?=ADMIN;?>/user/changeRole?id=<?=$user['id'];?>&role=admin"
                       class="btn btn-success btn-xs"> Сделать администратором</a>
                <?php } else { ?>
                    <a href="<?=ADMIN;?>/user/changeRole?id=<?=$user['id'];?>&role=user"
                       class="btn btn-warning btn-xs"> Сделать пользователем</a>
                <?php } ?>
                <a href="<?=ADMIN;?>/user/edit?id=<?=$user['id'];?>"
                   class="btn btn-default btn-xs"> Редактировать</a>

                <a href="<?=ADMIN;?>/user/delete?id=<?=$user['id'];?>"
                   class="btn btn-danger btn-xs delete"> Удалить</a>
            </div>
        </div>
    </div>
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
                                <th colspan="1">Статус</th>
                                <td colspan="1"><?=$user['status'];?></td>
                            </tr>
                            <tr>
                                <th>Логин</th>
                                <td><?=$user['login'];?></td>
                                <th colspan="1">Роль</th>
                                <td colspan="3"><?=$user['role'];?></td>
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
                            <tr>
                                <th>IP-адрес</th>
                                <td colspan="4"><?=$user['ip'];?></td>
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