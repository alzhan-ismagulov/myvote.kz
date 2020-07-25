<!--<div>-->
<!--    <div class="dx-comment-img">-->
<!--        <img src="/public/images/avatar-1.png" alt="">-->
<!--    </div>-->
<!--    <div class="dx-comment-cont">-->
<!--        <a href="#" class="dx-comment-name">--><?//=$comment['name'];?><!--</a>-->
<!--        <a href="#" class="dx-comment-reply">Reply</a>-->
<!--        <div class="dx-comment-text">-->
<!--            <p class="mb-0">--><?//=$comment['text'];?><!--</p>-->
<!--        </div>-->
<!--        <div class="dx-comment-date">--><?//=$comment['created'];?><!--</div>-->
<!---->
<!--        --><?php //if (isset($comment['childs'])):?>
<!--            <div class="dx-comment-text">-->
<!--                --><?//=$this->getCommentHtml($comment['childs']);?>
<!--            </div>-->
<!--        --><?php //endif;?>
<!--    </div>-->
<!--</div>-->
<div class="dx-box mt-55">
    <h2 class="h4 mb-45">Comments:</h2>
    <div class="dx-comment">
        <div>
            <div class="dx-comment-img">
                <img src="<?=PATH;?>public/images/avatar-1.png" alt="">
            </div>
            <div class="dx-comment-cont">
                <a href="#" class="dx-comment-name"><?=$comment['name'];?></a>
                <a href="#" class="dx-comment-reply">Reply</a>
                <div class="dx-comment-text">
                    <p class="mb-0"><?=$comment['text'];?></p>
                </div>
                <div class="dx-comment-date"><?=$comment['created'];?></div>

                <?php if (isset($comment['childs'])):?>
                        <?=$this->getCommentHtml($comment['childs']);?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>