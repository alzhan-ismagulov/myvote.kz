<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=PATH;?>user"><i class="fa fa-dashboard"></i> Личный кабинет</a></li>
        <li class="active">Мои голосования</li>
    </ol>
    <h1>Мои голосования</h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
<!--                    --><?php //if (!isset($votes)){
//                        echo 'Вы пока не проголосовали ни за одну петицию';
//                    } else {?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col" width="200">Дата</th>
                                <th scope="col">Наименование</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($votes as $vote):?>
                                <tr>
                                    <td><?=$vote['id'];?></td>
                                    <td width="200"><?=$vote['created'];?></td>
                                    <td>
<!--                                        <a  href="--><?//=PATH;?><!--petitions/view?id=--><?//=$petition['id'];?><!--">-->
                                            <?=$vote['title'];?>
<!--                                        </a>-->
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <?php if ($pagination->countPages > 1):?>
                        <?=$pagination;?>
                    <?php endif;?>
<!--                    --><?//}?>
                </div>
            </div>
        </div>
    </div>
</section>
