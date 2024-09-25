<?php

use humhub\modules\admin\models\forms\StatisticSettingsForm;
use humhub\modules\ui\form\widgets\CodeMirrorInputWidget;
use humhub\widgets\DataSaved;
use humhub\widgets\form\ActiveForm;
use humhub\widgets\bootstrap\Html;

/* @var $model StatisticSettingsForm */

?>
<?php $this->beginContent('@admin/views/setting/_advancedLayout.php') ?>

<p><?= Yii::t('AdminModule.settings', 'You can add a statistic code snippet (HTML) - which will be added to all rendered pages.') ?></p>
<br>

<?php $form = ActiveForm::begin(['acknowledge' => true]); ?>

<?= $form->errorSummary($model); ?>

<div class="form-group">
    <?= $form->field($model, 'trackingHtmlCode')->widget(CodeMirrorInputWidget::class); ?>
</div>

<hr>

<?= Html::submitButton(Yii::t('AdminModule.settings', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => ""]); ?>

<?= DataSaved::widget(); ?>

<?php ActiveForm::end(); ?>

<?php $this->endContent(); ?>
