<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 25/01/2018
 * Time: 10:58
 */

namespace app\components\behaviors;

use yii\behaviors\AttributeBehavior;
use yii\db\BaseActiveRecord;

class UUIDBehavior extends AttributeBehavior
{
    public $uuidAttribute = 'uuid';

    /**
     * {@inheritdoc}
     *
     * In case, when the property is `null`, the value of `Yii::$app->user->id` will be used as the value.
     */
    public $value;

    /**
     * @var mixed Default value for cases when the user is guest
     * @since 2.0.14
     */
    public $defaultValue;
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => [$this->uuidAttribute],
            ];
        }
    }


    /**
     * {@inheritdoc}
     *
     * In case, when the [[value]] property is `null`, the value of [[defaultValue]] will be used as the value.
     */
    protected function getValue($event)
    {
        if ($this->value === null) {
            $v4uuid = UUID::v4();
            return $v4uuid;
        }
        return parent::getValue($event);
    }

    /**
     * Get default value
     * @param \yii\base\Event $event
     * @return array|mixed
     * @since 2.0.14
     */
    protected function getDefaultValue($event)
    {
        if ($this->defaultValue instanceof \Closure || (is_array($this->defaultValue) && is_callable($this->defaultValue))) {
            return call_user_func($this->defaultValue, $event);
        }

        return $this->defaultValue;
    }

}