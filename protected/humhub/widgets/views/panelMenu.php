<?php

use humhub\modules\ui\icon\widgets\Icon;
use humhub\widgets\Link;

/* @var $id string */

?>

<ul data-ui-widget="ui.panel.PanelMenu" data-ui-init class="nav nav-pills preferences">
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#"
           aria-label="<?= Yii::t('base', 'Toggle panel menu'); ?>" aria-haspopup="true">
            <?= Icon::get('dropdownToggle') ?>
        </a>
        <ul class="dropdown-menu float-end">
            <li>
                <?= Link::instance()->action('toggle')->cssClass('panel-collapse')?>
            </li>
            <?= $this->context->extraMenus; ?>
        </ul>
    </li>
</ul>
