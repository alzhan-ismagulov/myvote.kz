<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=PATH;?>">Главная</a></li>
        <li class="breadcrumb-item">Список петиций</li>
    </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p><h3>Закрепленная петиция</h3></p>
            <div class="petition">
                <div class="row">
                    <div class="petition-img col-md-3">
                        <img src="<?=PATH;?>public/images/9a5f26a3bedaff421a3d5dcf224b8494.jpg" alt=""
                             class="petition-img-view">
                    </div>
                    <div class="petition-content col-md-8">
                        <p><h4><a href="<?=PATH;?>petitions/view?id=1">Присвоить русскому языку статус второго государственного в Республике Казахстан</a></h4></p>
                        <p><b>Номер петиции:</b> 1    <b>Дата создания:</b>
                            2020-07-25 14:08:44      <b>Автор:</b>
                            Альжан Исмагулов     <b>Проголосовало:</b> <?php $petition_id = 1;
                                                        $countVouting = R::count('vote', 'petition_id = ?', [$petition_id]);
                                                        echo $countVouting; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <p><h3>Список петиций</h3></p>
    <?php foreach ($petitions as $petition):?>
            <div class="petition">
                <div class="row">
                    <div class="petition-img col-md-3">
                        <img src="<?=PATH;?>public/images/<?=$petition['image'];?>" alt=""
                             class="petition-img-view">
                    </div>
                    <div class="petition-content col-md-8">
                        <p><h4><a href="<?=PATH;?>petitions/view?id=<?= $petition['id']; ?>"><?= $petition['title'];
                        ?></a></h4></p>
                        <p><b>Номер петиции:</b> <?=$petition['id'];?>    <b>Дата создания:</b> <?=$petitions[0]['created'];?>      <b>Автор:</b>
                            <?=$petition['name'];?>     <b>Проголосовало:</b> <?php $petition_id = $petition['id'];
                            $countVouting = R::count('vote', 'petition_id = ?', [$petition_id]);
                            echo $countVouting; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>
<br />
<div class="dx-blog-post-box pt-30 pb-30">
    <div class="text-center">
        <p><?=count($petitions);?><?php if($count == 1){
                echo ' петиция';
            } else {
                if ($count > 1 && $count < 5){
                    echo ' петиции';
                } else {
                    echo ' петиций';
                }
            }?></p>

        <?php if ($pagination->countPages > 1):?>
            <?=$pagination;?>
        <?php endif;?>
    </div>
</div>
<!-- /.row -->
</section>
<!-- /.content-->