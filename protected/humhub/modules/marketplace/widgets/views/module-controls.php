<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2023 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

use humhub\helpers\Html;
use humhub\modules\ui\icon\widgets\Icon;
use humhub\modules\ui\menu\MenuEntry;

/* @var MenuEntry[] $entries */
/* @var array $options */
?>

<?= Html::beginTag('ul', $options) ?>
<li class="dropdown">
    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#"
       aria-label="<?= Yii::t('base', 'Toggle stream entry menu'); ?>" aria-haspopup="true">
        <?= Icon::get('dropdownToggle') ?>
    </a>

    <ul class="dropdown-menu float-end">
        <?php foreach ($entries as $entry) : ?>
            <li>
                <?= $entry->render(['class' => 'dropdown-item']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</li>
<?= Html::endTag('ul') ?>
