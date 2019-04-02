<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m180119_104109_creeatetable_regions
 */
class m180119_104109_creeatetable_regions extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('regions', [
            'id' => Schema::TYPE_PK,
            'district' => Schema::TYPE_STRING, //
            'no_of_ga_pa' => Schema::TYPE_INTEGER, //
            'ecology' => Schema::TYPE_STRING, //
            'region' => Schema::TYPE_STRING, //
            'zone' => Schema::TYPE_STRING, //
        ]);
        $this->insertExcelData();
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('regions');
        echo "m180119_104109_creeatetable_regions reverted successfully.\n";
        return true;
    }

    /**
     * Reading Excel Data
     */
    public function insertExcelData()
    {
        $fileName = dirname(__DIR__) . '/data/geographical/data_main_nepal.xlsx';
        $config = [];
        $data = \moonland\phpexcel\Excel::widget([
            'mode' => 'import',
            'fileName' => $fileName,
            'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
            'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
            //'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);

        $regions = $data['Region'];
        //$region = $data['Region'];
        //$ecology = $data['Ecology'];
        echo '********************************************';

        $excel_fields = ['DISTRICT', 'no of GaPa', 'Ecology', 'Region', 'Zone'];
        $db_fields = ['district', 'no_of_ga_pa', 'ecology', 'region', 'zone'];
        $rows = [];
        foreach ($regions as $region) {
            $row = [];
            foreach ($excel_fields as $excel_field){
                array_push($row,$region[$excel_field]);
            }
            array_push($rows, $row);
        }

        $connection = Yii::$app->db;
        $numberAffectedRows =$connection->createCommand()->batchInsert('regions', $db_fields, $rows)->execute();
        $isSuccess = ($numberAffectedRows === count($rows));
        return $isSuccess;
    }

}
