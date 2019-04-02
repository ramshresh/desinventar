<?php

namespace app\modules\datacard\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property int $id
 * @property string $district
 * @property int $no_of_ga_pa
 * @property string $ecology
 * @property string $region
 * @property string $zone
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_of_ga_pa'], 'integer'],
            [['district', 'ecology', 'region', 'zone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district' => 'District',
            'no_of_ga_pa' => 'No Of Ga Pa',
            'ecology' => 'Ecology',
            'region' => 'Region',
            'zone' => 'Zone',
        ];
    }
}
