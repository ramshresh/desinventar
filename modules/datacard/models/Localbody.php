<?php

namespace app\modules\datacard\models;

use Yii;

/**
 * This is the model class for table "localbodies".
 *
 * @property int $id
 * @property string $DDGN
 * @property string $DCOD
 * @property string $district
 * @property string $local_bodies
 * @property string $type
 * @property string $state
 * @property string $changed_ga_pa
 */
class Localbody extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localbodies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DDGN', 'DCOD', 'district', 'local_bodies', 'type', 'state', 'changed_ga_pa'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'DDGN' => 'Ddgn',
            'DCOD' => 'Dcod',
            'district' => 'District',
            'local_bodies' => 'Local Bodies',
            'type' => 'Type',
            'state' => 'State',
            'changed_ga_pa' => 'Changed Ga Pa',
        ];
    }
}
