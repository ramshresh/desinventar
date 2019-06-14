<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <style>
            /*  Override Bootstrap size         */
            /* bootstrap.css */
            .selection{
                font-size: 12px;
                line-height: 2;
            }
            .form-group {
                margin-bottom: 2px;
            }
            .input-group-addon,.form-control{
                height: 16px;
                padding: 1px 3px;
                font-size: 9px;
                border-radius: 2px;

            }
            .form-control {
                display: block;
                width: 100%;
                height: 16px;
                padding: 1px 3px;
                font-size: 9px;
                border-radius: 2px;

            }
            h3, .h3 {
                margin-top: 5px;
                margin-bottom: 2px;
            }
            .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
                padding: 1px;
            }
            .help-block:empty {
                display: none;
            }
        </style>

        <style>
            .datacard-create, .datacard-update, .datacard-view {
                background: #fcf8e3;
                padding: 10px;
                position:relative;
                box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            }
            textarea
            {
                width:100%;
                resize: none;
            }

            .datacard-listcard{
                background: #f0f0f0;
                padding: 10px;
                margin: 15px;
                position:relative;
                box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            }
            span.sub{
                vertical-align: sub;
                font-size: smaller;
            }
            .hidden {
                display: none;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
