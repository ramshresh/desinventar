<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 02/02/2018
 * Time: 13:32
 */

namespace app\modules\datacard\controllers;


use app\modules\datacard\models\Region;
use yii\web\Controller;

class ImportController extends Controller
{

    public function actionExcel()
    {
        $db_fields = [

            'data_card_no',
            'event_type',
            'event_cause',
            'event_description',
            'event_duration',
            'location_state',
            'location_region',

            'location_district',
            'location_localbody',
            'location_placename',
            'effect_people_dead_t',
            'effect_people_injured_t',
            'effect_people_missing_t',
            'effect_people_affected_t',
            'damage_house_building_complete',
            'damage_house_building_partial',
            'damage_infra_road_quantity',
            'damage_infra_medical_quantity',
            'damage_infra_educational_quantity',
            'total_loss_value_rs',
            'comment',
            'metadata_source',
            'metadata_collected_by',
            'effect_loss_land_quantity',
            'effect_loss_livestock_quantity',
            'latitude',
            'longitude',


            'event_date', //EXTRA 1: 'event_date','Year','Month','Day',
            'location_ecology', //EXTRA 2: 'Auto calculate',
        ];

        echo implode(',',$db_fields);exit;


        ini_set('memory_limit', '-1');
        $fileName = \Yii::getAlias('@data') . '/DataCardsEntries.xlsx';
        $config = [];
        $data = \moonland\phpexcel\Excel::widget([
            'mode' => 'import',
            'fileName' => $fileName,
            'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
            'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
            //'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);

        $excel_fields = [
            'Serial_No', //"data_card_no"
            'Event',//"event_type"
            'Cause',//"event_cause"
            'Cause_Desc',//"event_description"
            'Duration',//"event_duration"
            'Province',//"location_state"
            'region',//"location_region"

            'District',//"location_district"
            'GaPa_NaPa',//"location_localbody"
            'Place',//"location_placename"
            'Dead_Peopl',//"effect_people_dead_t"
            'Injured_Pe',//"effect_people_injured_t"
            'Missing_Pe',//"effect_people_missing_t"
            'Affected_P',//"effect_people_affected_t"
            'Destroyed',//"damage_house_building_complete"
            'Affected_H',//"damage_house_building_partial"
            'Affected_R',//"damage_infra_road_quantity"
            'Medical_Ce',//"damage_infra_medical_quantity"
            'Education',//"damage_infra_educational_quantity"
            'Losses_Val',//"total_loss_value_rs"
            'Comments',//"comment"
            'Informatio',//"metadata_source"
            'Inserted_B',//"metadata_collected_by"
            'Farming_an',//"effect_loss_land_quantity"
            'Livestock',//"effect_loss_livestock_quantity"
            'X',//"latitude"
            'Y', //"longitude"

            //'event_date',
            //'location_ecology'

        ];


        $entries = $data['Entries'];

        $rows = [];
        $first_row = $db_fields;
        array_push($rows, $first_row);
        foreach ($entries as $entry) {
            $row = [];
            foreach ($excel_fields as $excel_field) {
                    array_push($row, $entry[$excel_field]);
            }
            //EXTRA 1:
            $date = new \DateTime($entry['Month'] . '/' . $entry['Day'] . '/' . $entry['Year']);
            $date_str = date_format($date, 'Y-m-d');
            array_push($row, $date_str);//event_date

            //EXTRA 2:
            $ecology = Region::find()
                ->select('ecology')
                ->where(['district' => $entry['District']])
                ->asArray()->one()
            ['ecology'];

            array_push($row, $ecology); //location_ecology


            array_push($rows, $row);
        }




        $fp = fopen(\Yii::getAlias('@data').'/DataCardsEntries.csv', 'w');
        foreach ($rows as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
        $result = ['isSuccess' => true];

        /*$connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            $numberAffectedRows = $connection->createCommand()->batchInsert('datacards', $db_fields, $rows)->execute();
            $isSuccess = ($numberAffectedRows === count($rows));
            $transaction->commit();
            if ($isSuccess) {
                $result = ['isSuccess' => $isSuccess, 'numberAffectedRows' => $numberAffectedRows];

            } else {
                $result = ['isSuccess' => $isSuccess, 'numberAffectedRows' => $numberAffectedRows, 'rows' => $rows];
            }
            return $this->render('excel', ['result' => $result]);
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }*/


        return $this->render('excel', ['result' => $result]);

    }
}