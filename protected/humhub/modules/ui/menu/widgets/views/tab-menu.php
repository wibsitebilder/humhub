<?php

use humhub\helpers\Html;
use humhub\modules\ui\menu\MenuEntry;
use humhub\modules\ui\menu\widgets\DropdownMenu;
use humhub\modules\ui\view\components\View;

/* @var $this View */
/* @var $menu DropdownMenu */
/* @var $entries MenuEntry[] */
/* @var $options [] */
?>

<?= Html::beginTag('div', $options) ?>
<ul class="nav nav-tabs">
    <?php foreach ($entries as $entry): ?>
        <li class="nav-item<?= $entry->getIsActive() ? ' active' : '' ?>">
            <?= $entry->render(['class' => 'nav-link']) ?>
        </li>
    <?php endforeach; ?>
</ul>
<?= Html::endTag('div') ?>
