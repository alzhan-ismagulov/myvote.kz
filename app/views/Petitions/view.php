<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=PATH;?>">Главная</a></li>
        <li class="breadcrumb-item"><a href="<?=PATH;?>petitions">Список петиций</a></li>
        <li class="breadcrumb-item">Петиция <?=$petition['id'];?></li>
    </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="user-form col-md-8">
            <div class="feedback-title">
                <h2 class="h6"><b><?=$petition['title'];?></b></h2>
            </div>
            <div class="feedback-content">
                <div class="petition-requisites">
                    <p class="small">
                        <b>Номер петиции: </b><?=$petition['id'];?>
                        <b>Дата создания: </b><?=$petition['created'];?>
                        <b>Автор: </b><?=$petition['name'];?>
                        <b>Проголосовало:</b> <?php $petition_id = $petition['id'];
                        $countVouting = R::count('vote', 'petition_id = ?', [$petition_id]);
                        echo $countVouting; ?>
                    </p>
                </div>
                <div class="petition-image-view">
                    <p><img src="<?=PATH;?>public/images/<?=$petition['image'];?>" alt="" class="petition-img-view"></p>
                </div>
                <div class="petition-destination-view">
                    <p><b><?= $petition['destination']; ?></b></p>
                </div>
                <div class="petition-text-view">
                    <p><?=$petition['text'];?></p>
                </div>
                <hr>
            </div>
            <section id="vote">
                        <?php if (!isset($_SESSION['user'])){
                                echo '<b>Для голосования необходимо авторизироваться</b>';
                            } else {?>
                                <section id="button">
                                    <form action="<?=PATH;?>petitions/vote" name="create" method="post" role="form" data-toggle="validator">
                                        <input type="hidden" name="petition_id" value="<?=$petition['id'];?>">
                                        <input type="hidden" name="user_id" value="<?=$_SESSION['user']['id'];?>">
                                        <?php
                                        $user_id = $_SESSION['user']['id'];
                                        $petition_id = $petition['id'];
                                        $petition = \R::find('vote', 'petition_id = ? AND user_id = ?',
                                            [$petition_id, $user_id]);
                                        if(!$petition){
                                        ?>
                                            <div class="form-group">
                                                <button class="btn btn-primary"
                                                    name="submit"
                                                    type="submit"
                                                    id="sumbit"
                                                    value="submit">Проголосовать
                                                </button>
                                            </div>
                                        <?php } else {?>
                                            <div class="already-vote col-md-8">
                                                <b>Вы уже проголосовали</b>
                                            </div>
                                        <?}?>
                                    </form>
                                </section>
                            <?}?>
                    <p></p>
            </section><!---vote--->

            <section id="comments">
                <div class="col-md-8">
                    <h5>Комментарии:</h5>
                    <div class="comment">
                        <?php foreach ($comments as $comment):?>
                            <div class="comment">
                                <div class="comment-name"><b><?= $comment['name']; ?></b></div>
                                <div class="comment-date"  style="font-size: 10px"><?=$comment['created'];?></div>
                                <div class="comment-text"><p class="mb-0"><?=$comment['text'];?></p></div>
                            </div>
                            <hr>
                        <?php endforeach;?>
                    </div>

                    <p><h5>Оставьте комментарий</h5></p>
                    <?php if (!isset($_SESSION['user']['id'])){?>
                    <p><br /><b>Для комментирования, необходимо войти в систему</b></p>
                    <?} else {?>
                    <form action="<?=PATH;?>comments/create" name="comments" method="post" role="form"
                          data-toggle="validator">
                    <div class="row vertical-gap">
                        <div class="form-group col-md-6">
                            <input name="user_id" id="user_id" value="<?=$_SESSION['user']['id'];?>" hidden >
                            <input name="petition_id" id="petition_id" value="<?=$_GET['id'];?>"
                                   hidden >
                        </div>
                        <div class="form-group col-12">
                            <textarea class="form-control form-control-style-3" name="text" id="text" rows="8"
                                      cols="80"
                                      placeholder="Комментарий..."></textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary"
                                        name="submit"
                                        type="submit"
                                        id="sumbit"
                                        value="submit">Оставить комментарий
                                </button>
                        </div>
                    </div>
                </form>
                    <?}?>
            </div>
        </div>
            </div>
            </section>

        </div>
    </div>
</div>