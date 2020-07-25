<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Панель управления</a></li>
        <li class="active"><a href="<?=PATH;?>admin/user?page=1">Список пользователей</a></li>
    </ol>
    <h1>Список пользователей</h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" name="all_petitions">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Логин</th>
                                <th>Фамилия</th>
                                <th>Имя</th>
                                <th>Отчество</th>
                                <th>Email</th>
                                <th>Телефон</th>
                                <th>Пол</th>
                                <th>Возраст</th>
                                <th>Профессия</th>
                                <th>Город</th>
                                <th>Роль</th>
                                <th>Статус</th>
                                <th>Создан</th>
                                <th>Изменён</th>
                                <th>IP</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user):?>
                                <?php $class = $user['status'] == 'Одобрена' ? 'success' : '';?>
                                <tr class="<?=$class;?>">
                                    <td><?=$user['id'];?></td>
                                    <td><a href="<?=ADMIN;?>/user/view?id=<?=$user['id'];?>"><?=$user['login'];?></a></td>
                                    <td><?=$user['surname'];?></td>
                                    <td><?=$user['name'];?></td>
                                    <td><?=$user['middle_name'];?></td>
                                    <td><?=$user['email'];?></td>
                                    <td><?=$user['phone'];?></td>
                                    <td><?=$user['gender'];?></td>
                                    <td style="text-align: center"><?=$user['age'];?></td>
                                    <td><?=$user['profession'];?></td>
                                    <td><?=$user['city'];?></td>
                                    <td><?=$user['role'];?></td>
                                    <td style="text-align: center"><?=$user['status'];?></td>
                                    <td><?=$user['created'];?></td>
                                    <td><?=$user['modified'];?></td>
                                    <td><?=$user['ip'];?></td>
                                    <td><a href="<?=ADMIN;?>/user/view?id=<?=$user['id'];?>"><i class="fa fa-fw
                                fa-eye"></i> </a><a class="delete" href="<?=ADMIN;
                                        ?>/user/delete?id=<?=$user['id'];?>"><i class="fa fa-fw
                                fa-close text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p><?=count($users);?><?php if($count == 1){
                                echo ' пользователь';
                            } else {
                                if ($count > 1 && $count < 5){
                                    echo ' пользователя';
                                } else {
                                    echo ' пользователей';
                                }
                            }?></p>
                        <?php if ($pagination->countPages > 1):?>
                            <?=$pagination;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->