<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Панель управления</a></li>
        <li class="active"><a href="<?=PATH;?>admin/feedback">Список отзывов</a></li>
    </ol>
    <h1>Список отзывов</h1>
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
                                <th width="30">№</th>
                                <th width="140">Создано</th>
                                <th>Имя</th>
                                <th width="200">Фамилия</th>
                                <th width="130">Email</th>
                                <th width="50">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($feedback as $item):?>
                                <tr>
                                    <td><?=$item['id'];?></td>
                                    <td><?=$item['created'];?></td>
                                    <td><a href="<?=ADMIN;?>/feedback/view?id=<?=$item['id'];?>"><?=$item['name'];
                                            ?></a></td>
                                    <td><?=$item['last_name'];?></td>
                                    <td><?=$item['email'];?></td>
                                    <td><a href="<?=ADMIN;?>/feedback/view?id=<?=$item['id'];?>"><i class="fa fa-fw
                                fa-eye"></i> </a>
                                        <a class="delete" href="<?=PATH;
                                        ?>admin/feedback/delete?id=<?=$item['id'];?>"><i class="fa fa-fw
                                fa-close text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p><?=count($feedback);?><?php if($count == 1){
                                echo ' отзыв';
                            } else {
                                if ($count > 1 && $count < 4){
                                    echo ' отзыва';
                                } else {
                                    echo ' отзывов';
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