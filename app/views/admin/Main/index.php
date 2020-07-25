<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Панель управления администратора
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Панель управления</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?=$countPetitions;?></h3>

                    <p>Петиции</p>
                </div>
                <div class="icon">
                    <i class=""></i>
                </div>
                <a href="<?=ADMIN;?>/petitions" class="small-box-footer">Все петиции<i class="fa
                fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=$countUsers;?></h3>
                    <p>Зарегистрировано пользователей</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?=ADMIN;?>/user" class="small-box-footer">Список пользователей <i class="fa
                fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->