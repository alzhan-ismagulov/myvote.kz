<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=PATH;?>">Главная</a></li>
        <li class="breadcrumb-item">Поиск</li>
    </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="user-form col-md-8">
            <div class="search-title">
                <h2 class="h6"><b>Результат поиска</b></h2>
            </div>
            <div class="search-content">
                <hr>
                <?php foreach ($petitions as $petition):?>
                    <div class="col-lg-8">
                        <div class="">
                            <div class="">
                                <p><a href="<?=PATH;?>petitions/view?id=<?=$petition['id'];?>"><?=$petition['title']; ?></a></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

<div class="text-center">
    <?php if ($pagination->countPages > 1):?>
        <?=$pagination;?>
    <?php endif;?>
</div>