<?php

use humhub\modules\space\widgets\Image;
use humhub\widgets\PanelMenu;
use humhub\widgets\bootstrap\Html;

?>
<?php if (count($spaces) > 0) { ?>
    <div id="user-spaces-panel" class="panel panel-default members" style="position: relative;">

        <!-- Display panel menu widget -->
        <?php echo PanelMenu::widget(['id' => 'user-spaces-panel']); ?>

        <div class="panel-heading">
            <?php echo Yii::t('UserModule.base', '<strong>Member</strong> of these Spaces'); ?>
        </div>

        <div class="panel-body">
            <?php foreach ($spaces as $space): ?>
                <?php
                echo Image::widget([
                    'space' => $space,
                    'width' => 24,
                    'htmlOptions' => [
                        'class' => 'current-space-image',
                    ],
                    'link' => 'true',
                    'linkOptions' => [
                        'class' => 'tt',
                        'data-bs-toggle' => 'tooltip',
                        'data-placement' => 'top',
                        'title' => $space->name,
                    ]
                ]);
                ?>
            <?php endforeach; ?>

            <?php if ($showMoreLink): ?>
                <br>
                <br>
                <?= Html::a('Show all', $user->createUrl('/user/profile/space-membership-list'), ['class' => 'float-end btn btn-sm btn-secondary', 'data-bs-target' => '#globalModal']); ?>
            <?php endif; ?>
        </div>
    </div>
<?php } ?>
