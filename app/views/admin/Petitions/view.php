<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Петиция №<?=$petition['id'];?>

        <a href="<?=ADMIN;?>/petitions/changeStatus?id=<?=$petition['id'];?>&status=Одобрена" class="btn btn-success
        btn-xs"> Одобрить</a>
        <a href="<?=ADMIN;?>/petitions/changeStatus?id=<?=$petition['id'];?>&status=Отклонена" class="btn btn-warning
        btn-xs"> Отклонить</Отклонить></a>
        <a href="<?=PATH;?>petition/edit?id=<?=$petition['id'];?>"
           class="btn btn-default btn-xs"> Редактировать</a>
        <?php if($petition['status'] !== 'Удалена'){ ?>
        <a href="<?=PATH;?>admin/petitions/trash?id=<?=$petition['id'];?>"
           class="btn btn-danger btn-xs delete">
            Удалить</a><?}?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Панель управления</a></li>
        <li class="active"><a href="<?=PATH;?>admin/petitions?page=1">Список петиций</a></li>
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
                                    <th colspan="4"><h2>Наименование петиции</h2></th>
                                </tr>
                                <tr>
                                    <td colspan="4"><?=$petition['title'];?></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><img src="/public/images/<?=$petition['image'];?>" alt=""></td>
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
                                    <th>Автор петиции</th>
                                    <td><?=$petition['surname'];?> <?=$petition['name'];?> <?=$petition['middle_name'];
                                    ?></td>
                                </tr>
                                <tr>
                                    <td>Проголосовало</td>
                                    <td><a href="<?=ADMIN;?>/voteList?petition_id=<?=$petition['id'];
                                    ?>"><?=$countVouting;
                                    ?></a></td>
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