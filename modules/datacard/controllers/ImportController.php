<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 02/02/2018
 * Time: 13:32
 */

namespace app\modules\datacard\controllers;

use app\modules\datacard\models\Localbody;
use Yii;
use app\modules\datacard\models\Datacard;
use app\modules\datacard\models\ImportForm;
use app\modules\datacard\models\Region;
use lucasguo\import\components\Importer;
use moonland\phpexcel\Excel;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\UploadedFile;

class ImportController extends Controller
{

    public function actionIndex()
    {
        $model = new ImportForm();


        $uploadFile = UploadedFile::getInstance($model, 'file');
        if ($uploadFile) {
            $importer = new Importer([
                'file' => $uploadFile,
                'modelClass' => Datacard::className(),
                'skipRowsCount' => 1, // description lines and header lines should be skipped
                'columnMappings' => [
                    [
                        'attribute' => 'data_card_no',
                        'required' => true, // if set this to true, the row that missing this value will be skipped. As in the example line 6 will be skipped
                        'translation' => function ($orgValue) {

                            return $orgValue;
                        }
                    ],
                    [
                        'attribute' => 'location_placename',
                        'required' => true, // if set this to true, the row that missing this value will be skipped. As in the example line 6 will be skipped
                        'translation' => function ($orgValue) {
                            echo json_encode($orgValue);
                            return $orgValue;
                        }
                    ]
                ],
                'validateWhenImport' => true, //if set this attribute to true, importer will help you validate the models and report the validation errors by $importer->validationErrors
            ]);

            try {
                $datacards = $importer->import();

            } catch (InvalidFileException $e) {
                $model->addError('file', 'Invalid import file.');

            }
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }

    /**
     * @return string
     */
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


        echo implode(',', $db_fields);
        exit;


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


        $fp = fopen(\Yii::getAlias('@data') . '/DataCardsEntries.csv', 'w');
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

    public function actionExcelOld()
    {
        $db_fields = [
            'data_card_no', //"Serial_No"
            'event_date', //"Year","Month","Day",
            'event_type', //"Event"
            'event_cause', //"Cause",
            'event_description',//"Cause_Desc",
            'event_duration',//"Duration__",
            'event_magnitude', //"Magnitude",
            'event_centre',//"CENTER",
            'location_state',//"STATE_CODE"
            'location_region',//"region",
            'location_district',//"DIST_NAME",--??"district",??
            'location_localbody',//"GaPa_NaPa",
            'location_wardno',//"NEW_WARD_N",
            'location_placename',// "Place",
            'effect_people_dead_t',//"Dead_Peopl",
            'effect_people_injured_t',//"Injured_Pe",
            'effect_people_missing_t',// "Missing_Pe",
            'effect_people_affected_t',//"Affected_P",
            'effect_people_victim_t',//"Victims"
            'effect_people_rescued_t',//"Evacuated",
            'effect_people_relocated_t',//"Relocated",
            'damage_house_building_complete',//"Destroyed",
            'damage_house_building_partial',//"Affected_H",
            'damage_infra_road_quantity',//"Affected_R",
            'damage_infra_medical_quantity',//"Medical_Ce",
            'damage_infra_educational_quantity',//"Education",
            'total_loss_value_rs',//"Losses_Val",
            'total_loss_value_usd',//"Losses__US",
            'comment',//"Comments",
            'metadata_source',// "Informatio",
            'metadata_collected_by',//"Inserted_B",
            'effect_loss_land_quantity',
            'effect_loss_livestock_quantity',//"Livestock",
            'effect_loss_agri_quantity', //Farming_an
            'effect_loss_livestock_quantity', //Livestock
            'latitude',//"POINT_Y",
            'longitude',//"POINT_X",
            'old_localunit',//"village"

            'created_at', // "Insertion"
            'event_date', //EXTRA 1: 'event_date','Year','Month','Day',
            'location_ecology', //EXTRA 2: 'Auto calculate',
        ];

        $field_maps = [
            'data_card_no' => "Serial_No",
            'event_date' => ["Year", "Month", "Day"],
            'event_type' => "Event",
            'event_cause' => "Cause",
            'event_description' => "Cause_Desc",
            'event_duration' => "Duration__",
            'event_magnitude' => "Magnitude",
            'event_centre' => "CENTER",
            'location_state' => "STATE_CODE",
            'location_region' => "region",
            'location_district' => "district",
            'location_localbody' => "GaPa_NaPa",
            'location_wardno' => "NEW_WARD_N",
            'location_placename' => "Place",
            'effect_people_dead_t' => "Dead_Peopl",
            'effect_people_injured_t' => "Injured_Pe",
            'effect_people_missing_t' => "Missing_Pe",
            'effect_people_affected_t' => "Affected_P",
            'effect_people_victim_t' => "Victims",
            'effect_people_rescued_t' => "Evacuated",
            'effect_people_relocated_t' => "Relocated",
            'damage_house_building_complete' => "Destroyed",
            'damage_house_building_partial' => "Affected_H",
            'damage_infra_road_quantity' => "Affected_R",
            'damage_infra_medical_quantity' => "Medical_Ce",
            'damage_infra_educational_quantity' => "Education",
            'total_loss_value_rs' => "Losses_Val",
            'total_loss_value_usd' => "Losses__US",
            'comment' => "Comments",
            'metadata_source' => "Informatio",
            'metadata_collected_by' => "Inserted_B",
            'metadata_collected_date' => "Insertion",
            'effect_loss_livestock_quantity' => "Livestock",
            'effect_loss_agri_quantity' => "Farming_an",
            'effect_loss_livestock_quantity' => "Livestock",
            'latitude' => "POINT_Y",
            'longitude' => "POINT_X",
            'old_localunit' => "village",
        ];

        set_time_limit(0);
        ini_set('memory_limit', '20000M');
        $fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-00.xlsx';
        $fileName = \Yii::getAlias('@data') . "/splitted/DesInventar2016-01.xlsx"; //Duplicate Datacards 77125,82070,82009,82004
        //----$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-03.xlsx';
        //$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-04.xlsx';
        //$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-02.xlsx';
        //$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-02.xlsx';
        //$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-02.xlsx';
        //$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-02.xlsx';
        //$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-02.xlsx';
        //$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-02.xlsx';
        //$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-02.xlsx';
        //$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-02.xlsx';
        //$fileName = \Yii::getAlias('@data') . '/splitted/DesInventar2016-02.xlsx';
        $config = [];
        $data = \moonland\phpexcel\Excel::widget([
            'mode' => 'import',
            'fileName' => $fileName,
            'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
            'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
            //'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);

        $datacards_rows = [];
        $flag = true;
        foreach ($data as $row) {
            $datacard = new  Datacard();
            $datacard->data_card_no = (string)$row["Serial_No"];
            $datacard->event_date = implode('-', [
                $row['Year'],
                $row['Month'],
                $row['Day'],
            ]);
            $datacard->event_type = $row["Event"];
            $datacard->event_cause = $row["Cause"];
            $datacard->event_description = $row["Cause_Desc"];
            $datacard->event_duration = (string)$row["Duration__"];
            $datacard->event_magnitude = $row["Magnitude"];
            $datacard->event_centre = $row["CENTER"];
            $datacard->location_state =(string) $row["STATE_CODE"];
            $datacard->location_region = $row["region"];
            $datacard->location_district =  $row["DISTRICT_1"];
            $datacard->location_localbody = Localbody::ddgn_from_name($row["GaPa_NaPa"]);
            $datacard->location_wardno = $row["NEW_WARD_N"];
            $datacard->location_placename = $row["Place"];
            $datacard->effect_people_dead_t = $row["Dead_Peopl"];
            $datacard->effect_people_injured_t = $row["Injured_Pe"];
            $datacard->effect_people_missing_t = $row["Missing_Pe"];
            $datacard->effect_people_affected_t = $row["Affected_P"];
            $datacard->effect_people_victim_t = $row["Victims"];
            $datacard->effect_people_rescued_t = $row["Evacuated"];
            $datacard->effect_people_relocated_t = $row["Relocated"];
            $datacard->damage_house_building_complete = $row["Destroyed"];
            $datacard->damage_house_building_partial = $row["Affected_H"];
            $datacard->damage_infra_road_quantity = $row["Affected_R"];
            $datacard->damage_infra_medical_quantity = $row["Medical_Ce"];
            $datacard->damage_infra_educational_quantity = $row["Education"];
            $datacard->total_loss_value_rs = $row["Losses_Val"];
            $datacard->total_loss_value_usd =(string) $row["Losses__US"];
            $datacard->comment = $row["Comments"];
            $datacard->metadata_source = $row["Informatio"];
            $datacard->metadata_collected_by = $row["Inserted_B"];
            $datacard->metadata_collected_date = $row["Insertion"];
            $datacard->effect_loss_livestock_quantity = $row["Livestock"];
            $datacard->effect_loss_agri_quantity = (int)$row["Farming_an"];
            $datacard->effect_loss_livestock_quantity = $row["Livestock"];
            $datacard->latitude = $row["POINT_Y"];
            $datacard->longitude = $row["POINT_X"];
            $datacard->old_localunit = $row["village"];


            if ($datacard->validate()) {
                $datacards_rows[] = $datacard->attributes;
            } else {
                $flag = false;
                echo json_encode($datacard->errors) . '<br />';
                echo json_encode($datacard->attributes). '<br />';
            }
        }
        if($flag){
            // Start here..
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $datacardModel = new Datacard;
                Yii::$app->db->createCommand()->batchInsert(Datacard::tableName(), $datacardModel->attributes(), $datacards_rows)->execute();
                $transaction->commit();
                echo 'Saved';
            } catch (Exception $e) {
                // # if error occurs then rollback all transactions
                $transaction->rollBack();
                echo 'rolled back<br />';
                echo json_encode($e).'<br />';
            }
        }
    }


}