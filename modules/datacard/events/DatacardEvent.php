<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 25/01/2018
 * Time: 02:32
 */

namespace app\modules\datacard\events;


use app\modules\datacard\models\Datacard;
use yii\base\Event;

class DatacardEvent extends Event
{
    /**
     * @var Datacard
     */
    private $_datacard;

    /**
     * @return Datacard
     */
    public function getDatacard()
    {
        return $this->_datacard;
    }

    /**
     * @param Datacard $form
     */
    public function setDatacard(Datacard $form)
    {
        $this->_datacard = $form;
    }
}