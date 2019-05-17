<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 09/05/2019
 * Time: 14:44
 */
?>

<?php
$data=[
        1=>'Provience 1',
        2=>'Provience 2',
        3=>'Provience 3',
        4=>'Provience 4 - Gandaki',
        5=>'Provience 5',
        6=>'Provience 6 - Karnali',
        7=>'Provience 7 - Sudoorpaschim',
];
echo '<label class="control-label">Provinces</label>';
echo \kartik\select2\Select2::widget([
    'name' => 'state_12',
    'data' => $data,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        //'templateResult' => new \yii\web\JsExpression('format'),
        //'templateSelection' => new \yii\web\JsExpression('format'),
        //'escapeMarkup' => $escape,
        'allowClear' => true
    ],
]);
?>
