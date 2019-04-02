<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style>
        body, html {
            height: 100%;
        }


        .wrap{
            /* background: #3d434799; */
			/* background-image: url("<?= Url::to('@web/img/dust_scratches.png')?>"); */
            /* background-image: url("<?= Url::to('@web/img/paper_1.png')?>"); */
            /* background-image: url("*/<?//= Url::to('@web/img/bg-flood.jpg')?>/*");*/

			background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
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
        /*For Bootstrap Kartik Date Picker Widget*/
        .input-group-addon{
            padding: 1px;
        }
    </style>
    <style>
        .datacard-index {
            overflow: auto;
            overflow-y: hidden;
        }

    </style>
    <style>
        .grid-box{
            overflow: auto;
            height: 600px;
            border: solid thin;
            padding: 10px;

        }

    </style>
    <style>
        .datacard-create, .datacard-update, .datacard-view, .card{
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
    </style>
    <style>
        a[disabled] {
            pointer-events: none;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/google-palette@1.1.0/palette.js"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-inverse navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],

            Yii::$app->user->isGuest ? (
                [
					'label' => 'Login',
					'url' => ['/user/login']
				]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
			Yii::$app->user->isGuest ? (
                [
					'label' => 'Register',
					'url' => ['/user/register']
				]
            ) : (
               [
                'label' => 'Profile',
                'url' => ['/user/profile']
				]
            )


        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; NSET <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>

<script>

$('form.warn-lose-changes').on('change keyup keydown', 'input, textarea, select', function (e) {
    $(this).addClass('changed-input');
});
$(window).on('beforeunload', function (e) {
    if ($('.changed-input').length) {
        //return 'You haven\'t saved your changes.';
    }
});
    /*window.protectedFormChanged = false;
	window.protectedFormSubmitted=false;
	
    $('body').on('change', 'form.warn-lose-changes :input', function(){
		alert ('form changed');
        protectedFormChanged = true;
    });

	$('form.warn-lose-changes').onsubmit = function(){alert('form submitted');protectedFormSubmitted = true;};
	
    $(window).on('beforeunload', function(){
        if (protectedFormChanged && !protectedFormSubmitted)
            return 'You have unsaved changes, are you sure you wish to leave this page?';
    });*/
var WarnBeforeAccidentallyDiscardUnsavedChanges = (function () {

  var anyDirtyInputFields = false;
  var unloadTriggeredBySubmit = false;
  var warningMessage = "Ungespeicherte Änderungen vorhanden!";
  var confirmationMessage = "Möchten Sie diese Seite wirklich verlassen?";
  var skipWarningClass = "skip_pending_changes_warning";

  function init() {
    skipFormsWithOverwrittenSubmit();
    observeInputFieldsForChanges();
    observeSubmitEvents();
    bindAlertMethod();
  }

  // API method for others which need to know for unsaved changes
  function isUnsavedChangeConfirmed() {
    if (isUnsavedChangePresent()) {
      return confirm(warningMessage + "\n\n" + confirmationMessage);
    } else {
      return true;
    }
  }

  // opens a confirmation dialog if unsaved changes are present
  function bindAlertMethod() {
    $(window).on('beforeunload', function() {
      if (isUnsavedChangePresent() && !unloadTriggeredBySubmit) {
        return warningMessage;
      }
    });
  }

  function isUnsavedChangePresent() {
    var unsavedChanges = false;

    // objects providing an isDirty() method
    unsavedChanges = unsavedChanges || anyDirtyCkeditors();
    // elements which have to be observed manually
    unsavedChanges = unsavedChanges || anyDirtyInputFields;

    return unsavedChanges;
  }


  // dirty check helper methods

  function anyDirtyCkeditors() {
    var anyDirty = false;
    if(typeof CKEDITOR != 'undefined') {
      _.each(CKEDITOR.instances, function(instance) {
        anyDirty = anyDirty || instance.checkDirty();
      });
    }
    return anyDirty;
  }


  // observer helpers

  // Using a css class as marker may make developers awere of the
  // special form behavior when inspecting the form classes
  function skipFormsWithOverwrittenSubmit() {
    _.each($('form input[type=submit]'), function(submitInput) {
      if (!!$(submitInput).attr('onclick')) {
        $(submitInput).closest('form').addClass(skipWarningClass);
      }
    });
  }

  function observeInputFieldsForChanges() {
    var $forms = $('form:not(.' + skipWarningClass + ')');
    var $inputs = $forms.find(
      'input:not(.' + skipWarningClass + '), ' +
        'textarea:not(.' + skipWarningClass + '), ' +
        'select:not(.' + skipWarningClass + ')');
    $inputs.on('change', function() {
      anyDirtyInputFields = true;
    });
  }

  function observeSubmitEvents() {
    $('form').submit(function() {
      unloadTriggeredBySubmit = true;
    });
  }

  return {
    init: init,
    isUnsavedChangeConfirmed: isUnsavedChangeConfirmed
  };

}());

$(WarnBeforeAccidentallyDiscardUnsavedChanges.init);
</script>
</html>
<?php $this->endPage() ?>
