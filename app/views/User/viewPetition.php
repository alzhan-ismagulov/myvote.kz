<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Просмотр петиции
    <a href="<?=PATH;?>petition/edit?id=<?=$petition['id'];?>" class="btn btn-default btn-xs"> Редактировать</a>
    </h1>
    <p class="small" style="color: red">Внимание. Одобренные петиции редактировать запрещено</p>
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=PATH;?>user"><i class="fa fa-dashboard"></i> Личный кабинет</a></li>
        <li class="active">Петиция №<?=$petition['id'];?></li>
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
                                        <th colspan="1">Номер петиции</th>
                                        <td colspan="1"><?=$petition['id'];?></td>
                                        <th colspan="1">Статус</th>
                                        <td colspan="1"><?=$petition['status'];?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="1">Дата петиции</th>
                                        <td colspan="1"><?=$petition['created'];?></td>
                                        <th colspan="1" width="200">Дата последнего изменения</th>
                                        <td colspan="1"><?=$petition['modified'];?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Назначение петиции</th>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><?=$petition['destination'];?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Наименование петиции</th>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><?=$petition['title'];?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Описание петиции</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?=$petition['description'];?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Текст петиции</th>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><?=$petition['text'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Проголосовало</td>
                                        <td><?=$countVouting;?> - <a href="<?=PATH;
                                        ?>voteList?petition_id=<?=$petition['id'];
                                            ?>">Посмотреть список</a></td>
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
