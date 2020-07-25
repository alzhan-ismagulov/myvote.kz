<section id="banner">
    <div class="banner">
        <div class="banner-content">
            <div class="banner-title">Измени свой мир</div>
            <div class="banner-text">Вы можете создать новую петицию или проголосовать за уже созданную</div>
            <a href="<?PATH;?>petitions" class="banner-btn btn-voting">Голосовать</a>
        </div>
    </div>
</section>

<section id="statistic">
    <div class="col-md-12">
        <div class="container">
            <div class="row statistic-header">
                <div class="statistic-title col-md-12"><h3>Статистика</h3></div>
            </div>
            <div class="row statistic-content">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="row">
                            <div class="statistic">
                                <div class="statistic-body">
                                    <div class="statistic-title statistic-petition">
                                        <?php
                                        $petition_count = R::count('petitions');
                                        echo $petition_count; ?>
                                    </div>
                                    <div class="statistic-text">Петиций</div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="statistic">
                            <div class="statistic-body">
                                <div class="statistic-title statistic-vote">
                                    <?php
                                        $vote_count = R::count('vote');
                                        echo $vote_count;
                                    ?>
                                </div>
                                <div class="statistic-text">Голосований</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="statistic">
                            <div class="statistic-body">
                                <div class="statistic-title statistic-comment">
                                    <?php
                                    $comments_count = R::count('comments');
                                    echo $comments_count;
                                    ?>
                                </div>
                                <div class="statistic-text">Комментариев</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="statistic">
                            <div class="statistic-body">
                                <div class="statistic-title statistic-users">
                                    <?php
                                    $users_count = R::count('users');
                                    echo $users_count;
                                    ?>
                                </div>
                                <div class="statistic-text">Пользователей</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row not-petition">
            <div class="col-md-12">
            <p>Прошу помнить, что:</p>
                Понятие "петиция" не может трактоваться как коллективное письменное обращение, а "онлайн-петиция" как коллективное обращение, направленное к государственным органам в электронной форме. Поэтому информация, размещаемая на интернет-ресурсах, не позволяющих должным образом проводить процедуру подтверждения личностей (их верификации) пользователей, подписывающих ту или иную петицию, не может быть рассмотрена как поступившая в адрес государственных органов. Такую позицию Министерство по инвестициям и развитию РК выразило в ответе на официальный запрос Tengrinews.kz.
            </div>
        </div><!---row-not-petiton--->
        <div class="row red">
            <div class="col-md-12">
            <p>От себя добавлю, что данный портал предназначен только для
                сбора общественного
                мнения по
                тем или
                иным вопросам. Только до тех пор, пока органы власти не примут закон о том, что такие обращения
                граждан на сторонних ресурсах без ЭЦП будут приниматься во внимание. При составлении той или
                иной петиции граждане самостоятельно отвечают перед законом за то, что они написали или
                прокомментировали.<br><br> Администрация портала может не разделять точку зрения автора петиции.</p
            </div>
        </div>
    </div>
</section>