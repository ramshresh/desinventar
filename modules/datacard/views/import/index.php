<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 29/04/2019
 * Time: 14:54
 */
?>

<?php $form = \kartik\form\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= \kartik\helpers\Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php \kartik\form\ActiveForm::end(); ?>