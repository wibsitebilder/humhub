<?php

use humhub\modules\comment\widgets\Form;
use humhub\modules\content\components\ContentActiveRecord;
use humhub\modules\ui\view\components\View;
use humhub\widgets\bootstrap\Html;
use humhub\widgets\modal\Modal;

/* @var $this View */
/* @var $object ContentActiveRecord */

?>

<?php Modal::beginDialog(['header' => Yii::t('CommentModule.base', 'Comments')]) ?>
<div class="modal-body comment-container comment-modal-body" style="margin-top:0">
    <div id="userlist-content">
        <div class="well well-small" id="comment_<?= $id ?>">
            <div class="comment" id="comments_area_<?= $id ?>">
                <?= $output ?>
            </div>
            <?= Form::widget(['object' => $object]); ?>
        </div>
    </div>
</div>
<?php Modal::endDialog() ?>

<script <?= Html::nonce() ?>>
    // scroll to top of list
    $(".comment-modal-body").animate({scrollTop: 0}, 200);

    <?php if(empty(trim($output))) : ?>
    $('#comment_<?= $id ?>').find('.comment_create hr').hide();
    <?php endif; ?>
</script>
