<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 03/04/2019
 * Time: 11:55
 */

namespace app\modules\datacard\models;


use yii\base\Model;

class DatacardQueryForm extends Model
{
    public $location_state;
    public $location_district;
    public $location_localbody;
    public $event_type;
    public $event_cause;

    public function rules(){
        return [
            // Define validation rules here
        ];
    }
}