<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\datacard\models\Datacard */
/* @var $districts  */

$this->title = 'Create Data Card';
$this->params['breadcrumbs'][] = ['label' => 'Datacards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datacard-create">

    <h3 style="text-align: center;vertical-align: middle;"><strong><?= Html::encode($this->title) ?></strong></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'districts'=>$districts,
    ]) ?>

</div>
