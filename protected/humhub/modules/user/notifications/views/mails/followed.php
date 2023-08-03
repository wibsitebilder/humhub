<?php

/* @var $this yii\web\View */
/* @var $viewable humhub\modules\user\notifications\Followed */
/* @var $url string */
/* @var $date string */
/* @var $isNew boolean */
/* @var $originator \humhub\modules\user\models\User */
/* @var $source yii\db\ActiveRecord */
/* @var $contentContainer ContentContainerActiveRecord */
/* @var $space humhub\modules\space\models\Space */
/* @var $record Notification */
/* @var $html string */

/* @var $text string */

use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\notification\models\Notification;
use humhub\widgets\mails\MailButtonList;
use humhub\widgets\mails\MailContentContainerInfoBox;

?>

<?php $this->beginContent('@notification/views/layouts/mail.php', $_params_); ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
        <tr>
            <td style="font-size: 14px; line-height: 22px; font-family:Open Sans,Arial,Tahoma, Helvetica, sans-serif; color:<?= Yii::$app->view->theme->variable('text-color-highlight', '#555555') ?>; font-weight:300; text-align:left;">
                <?= $viewable->html(); ?>
            </td>
        </tr>
        <tr>
            <td height="10"></td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #eee;padding-top:10px;">
                <?= MailContentContainerInfoBox::widget(['container' => $originator]) ?>
            </td>
        </tr>
        <tr>
            <td height="10"></td>
        </tr>
        <tr>
            <td>
                <?=
                MailButtonList::widget(['buttons' => [
                    humhub\widgets\mails\MailButton::widget(['url' => $url, 'text' => Yii::t('UserModule.notification', 'View Online')])
                ]]);
                ?>
            </td>
        </tr>
    </table>
<?php
$this->endContent();
