<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Отзыв №<?=$feedback['id'];?>

        <a href="<?=PATH;?>admin/feedback/delete?id=<?=$feedback['id'];?>"
           class="btn btn-danger btn-xs delete">Удалить</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Панель управления</a></li>
        <li class="active"><a href="<?=PATH;?>admin/feedback?page=1">Список отзывов</a></li>
        <li class="active">Петиция №<?=$feedback['id'];?></li>
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
                                <th colspan="1">Номер отзыва</th>
                                <td colspan="1"><?=$feedback['id'];?></td>
                            </tr>
                            <tr>
                                <th colspan="1">Дата отзыва</th>
                                <td colspan="1"><?=$feedback['created'];?></td>
                            </tr>
                            <tr>
                                <th colspan="4">Текст отзыва</th>
                            </tr>
                            <tr>
                                <td colspan="4"><?=$feedback['text'];?></td>
                            </tr>
                            <tr>
                                <th>Автор отзыва</th>
                                <td><?=$feedback['name'];?> <?=$feedback['last_name'];
                                    ?></td>
                            </tr>
                            <tr>
                                <th>Емайл</th>
                                <td><a href="<?=$feedback['email'];?>"><?=$feedback['email'];?></a></td>
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