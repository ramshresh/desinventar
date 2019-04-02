<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\datacard\models\Localbody */

$this->title = 'Create Localbody';
$this->params['breadcrumbs'][] = ['label' => 'Localbodies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localbody-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
