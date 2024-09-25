<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\topic\widgets;

use humhub\modules\content\components\ContentActiveRecord;
use humhub\widgets\modal\ModalButton;
use humhub\modules\topic\models\Topic;
use humhub\modules\content\widgets\WallEntryControlLink;
use Yii;
use yii\helpers\Url;

class ContentTopicButton extends WallEntryControlLink
{
    /**
     * @var ContentActiveRecord
     */
    public $record;

    public function renderLink()
    {
        if ($this->record->content->getStateService()->isDeleted()) {
            return '';
        }

        return ModalButton::asLink(Yii::t('TopicModule.base', 'Topics'))->icon(Topic::getIcon())
            ->load(Url::to(['/topic/content-topic', 'contentId' => $this->record->content->id]));
    }
}
