<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=PATH;?>user"><i class="fa fa-dashboard"></i> Личный кабинет</a></li>
    </ol>
    <h1>Список моих петиций</h1>
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
                                <th>Название</th>
                                <th width="150">Статус</th>
                                <th width="40">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($petitions as $petition):?>
                                <?php if ($petition['status'] == 'Одобрена'){
                                    $class = 'success';
                                } else {
                                    if ($petition['status'] == 'Отклонена'){
                                        $class = 'warning';
                                    } else {
                                        if ($petition['status'] == 'Удалена'){
                                            $class = 'danger';
                                        } else {
                                            $class = '';
                                        }
                                    }
                                }?>
                                <tr class="<?=$class;?>">
                                    <td><?=$petition['id'];?></td>
                                    <td><?=$petition['created'];?></td>
                                    <td><a href="<?=PATH;?>user/viewPetition?id=<?=$petition['id'];?>"><?=$petition['title'];?></a></td>
                                    <td><?=$petition['status'];?></td>
                                    <td><a href="<?=PATH;?>user/viewPetition?id=<?=$petition['id'];?>"><i class="fa
                                    fa-fw
                                fa-eye"></i> <?php if ($petition['status'] !== 'Удалена'){?>
                                        </a>
                                        <a class="delete" href="<?=PATH;
                                        ?>petition/delete?id=<?=$petition['id'];?>"><i class="fa fa-fw
                                fa-close text-danger"></i></a><?}?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p><?=count($petitions);?> <?php
                            if ($count = 1){
                                echo 'петиции';
                            } else {
                                if($count > 1 && $count < 5){
                                    echo 'петиции';
                                } else {
                                    if($count = 5 && $count > 5){
                                        echo 'петиций';
                                    }
                                }
                            }
                            ?></p>
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