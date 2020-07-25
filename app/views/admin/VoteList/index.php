<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="<?=PATH;?>"><i class="fa fa-arrow-circle-o-up"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Панель управления</a></li>
        <li><a href="<?=ADMIN;?>/petitions"><i class="fa fa-dashboard"></i> Список петиций</a></li>
        <li class="active"><a href="<?=ADMIN;?>/user?page=1">Список проголосовавших</a></li>
    </ol>
    <h1>Список проголосовавших</h1>
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
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col" width="200">Дата</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">ИИН</th>
                    <th scope="col">email</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Пол</th>
                    <th scope="col">Возраст</th>
                    <th scope="col">Профессия</th>
                    <th scope="col">Город</th>
                    <th scope="col">Ip</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($votes as $vote):?>
                    <tr>
                        <td><?=$vote['id'];?></td>
                        <td width="200"><?=$vote['created'];?></td>
                        <td><?=$vote['surname'];?></td>
                        <td><?=$vote['name'];?></td>
                        <td><?=$vote['middle_name'];?></td>
                        <td><?=$vote['iin'];?></td>
                        <td><?=$vote['email'];?></td>
                        <td><?=$vote['phone'];?></td>
                        <td><?=$vote['gender'];?></td>
                        <td><?=$vote['age'];?></td>
                        <td><?=$vote['profession'];?></td>
                        <td><?=$vote['city'];?></td>
                        <td><?=$vote['ip'];?></td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td>Всего:</td>
                    <td><?=$count;?></td>
                </tr>
                </tbody>
            </table>
        </div>
                <?php if ($pagination->countPages > 1):?>
                    <?=$pagination;?>
                <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
