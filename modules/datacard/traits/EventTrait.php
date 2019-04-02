<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 25/01/2018
 * Time: 02:29
 */
namespace app\modules\datacard\traits;

use app\modules\datacard\events\DatacardEvent;
use app\modules\datacard\models\Datacard;

trait EventTrait
{
    /**
     * @param  Datacard      $datacard
     * @return DatacardEvent
     * @throws \yii\base\InvalidConfigException
     */
    protected function getDatacardEvent(Datacard $datacard)
    {
        return \Yii::createObject(['class' => DatacardEvent::className(), 'datacard' => $datacard]);
    }
}