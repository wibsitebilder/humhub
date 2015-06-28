<?php

namespace humhub\core\comment;

/**
 * CommentModule adds the comment content addon functionalities.
 *
 * @package humhub.modules_core.comment
 * @since 0.5
 */
class Module extends \yii\base\Module
{

    /**
     * Maximum comments to load at once
     * 
     * @var int
     */
    public $commentsBlockLoadSize = 25;

}
