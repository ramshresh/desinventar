<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 29/04/2019
 * Time: 14:52
 */

namespace app\modules\datacard\models;


use yii\base\Model;

class ImportForm extends Model
{
    public $file;

    public function rules()
    {
        return [
            ['file', 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx'],
        ];
    }

}