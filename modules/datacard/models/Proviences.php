<?php

namespace app\modules\datacard\models;

use Yii;

/**
 * This is the model class for table "proviences".
 *
 * @property int $id
 * @property int $number
 * @property string $name
 * @property int $no_of_districts
 */
class Proviences extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proviences';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number', 'name', 'no_of_districts'], 'required'],
            [['id', 'number', 'no_of_districts'], 'integer'],
            [['name'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'name' => 'Name',
            'no_of_districts' => 'No Of Districts',
        ];
    }
}
