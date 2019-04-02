<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180119_084933_creeatetable_localbodies
 */
class m180119_084933_creeatetable_localbodies extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('localbodies', [
            'id' => Schema::TYPE_PK,
            'DDGN' => Schema::TYPE_STRING, //
            'DCOD' => Schema::TYPE_STRING, //
            'district' => Schema::TYPE_STRING, //
            'local_bodies' => Schema::TYPE_STRING, //
            'type' => Schema::TYPE_STRING, //
            'state' => Schema::TYPE_STRING, //
            'changed_ga_pa' => Schema::TYPE_STRING, //
        ]);
        $this->insertExcelData();
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('localbodies');
        echo "m180119_084933_creeatetable_localbodies reverted successfully.\n";
        return true;
    }

    public function testDown()
    {
        return $this->insertExcelData();
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

        $localBodies = $data['LocalBodies'];
        //$region = $data['Region'];
        //$ecology = $data['Ecology'];
        echo '********************************************';

        $excel_fields = ['DDGN', 'DCOD', 'District', 'Localbodies', 'Type', 'State', 'Changed_GaPa'];
        $db_fields = ['DDGN', 'DCOD', 'district', 'local_bodies', 'type', 'state', 'changed_ga_pa'];
        $rows = [];
        foreach ($localBodies as $localBody) {
            $row = [];
            foreach ($excel_fields as $excel_field){
                array_push($row,$localBody[$excel_field]);
            }
            array_push($rows, $row);
        }

        $connection = Yii::$app->db;
        $numberAffectedRows =$connection->createCommand()->batchInsert('localbodies', $db_fields, $rows)->execute();
        $isSuccess = ($numberAffectedRows === count($rows));
        return $isSuccess;
    }

}
