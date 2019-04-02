<?php

namespace app\modules\datacard\models;

use Yii;

/**
 * This is the model class for table "ward".
 *
 * @property int $id
 * @property int $ET_ID
 * @property int $OBJECTID
 * @property int $DCODE
 * @property string $DISTRICT
 * @property int $DAN
 * @property int $DAS
 * @property string $GaPa_NaPa
 * @property string $Type_GN
 * @property int $GN_CODE
 * @property int $NEW_WARD_N
 * @property int $DDGNWW
 * @property string $CENTER
 * @property int $STATE_CODE
 * @property int $DDGN
 * @property int $Area_SQKM
 * @property int $Shape_Leng
 * @property int $ORIG_FID
 * @property string $ElimStatus
 * @property double $LONGITUDE
 * @property double $LATITUDE
 */
class Ward extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ward';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ET_ID', 'OBJECTID', 'DCODE', 'DISTRICT', 'DAN', 'DAS', 'GaPa_NaPa', 'Type_GN', 'GN_CODE', 'NEW_WARD_N', 'DDGNWW', 'CENTER', 'STATE_CODE', 'DDGN', 'Area_SQKM', 'Shape_Leng', 'ORIG_FID', 'ElimStatus', 'LONGITUDE', 'LATITUDE'], 'required'],
            [['ET_ID', 'OBJECTID', 'DCODE', 'DAN', 'DAS', 'GN_CODE', 'NEW_WARD_N', 'DDGNWW', 'STATE_CODE', 'DDGN', 'Area_SQKM', 'Shape_Leng', 'ORIG_FID'], 'integer'],
            [['DISTRICT', 'GaPa_NaPa', 'Type_GN', 'CENTER', 'ElimStatus'], 'string'],
            [['LONGITUDE', 'LATITUDE'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ET_ID' => 'Et  ID',
            'OBJECTID' => 'Objectid',
            'DCODE' => 'Dcode',
            'DISTRICT' => 'District',
            'DAN' => 'Dan',
            'DAS' => 'Das',
            'GaPa_NaPa' => 'Ga Pa  Na Pa',
            'Type_GN' => 'Type  Gn',
            'GN_CODE' => 'Gn  Code',
            'NEW_WARD_N' => 'New  Ward  N',
            'DDGNWW' => 'Ddgnww',
            'CENTER' => 'Center',
            'STATE_CODE' => 'State  Code',
            'DDGN' => 'Ddgn',
            'Area_SQKM' => 'Area  Sqkm',
            'Shape_Leng' => 'Shape  Leng',
            'ORIG_FID' => 'Orig  Fid',
            'ElimStatus' => 'Elim Status',
            'LONGITUDE' => 'Longitude',
            'LATITUDE' => 'Latitude',
        ];
    }
}
