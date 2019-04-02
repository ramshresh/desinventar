<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\datacard\models\Datacard */
/* @var $districts  */
/* @var $localbodies  */
/* @var $location_localbody  */

$this->title = 'Update Datacard: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Datacards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="datacard-update">

    <h3 style="text-align: center;vertical-align: middle;"><strong><?= Html::encode($this->title) ?></strong></h3>
    <?= $this->render('_form', [
        'model' => $model,
        'districts'=>$districts,
        'localbodies'=>$localbodies,
        'location_localbody'=>$location_localbody
    ]) ?>

</div>
