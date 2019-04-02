<?php

/* @var $this yii\web\View */

$this->title = 'DESINVENTAR';
?>
    <style>


        .card {
            width: 30em;
            background-color: #fff;
            display: block;
            overflow-y: hidden;
            color: #212121;
            text-overflow: ellipsis;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
            border-left: 1px solid #eeeeee;
            border-right: 1px solid #eeeeee;
            border-top: 1px solid #eeeeee;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            border-bottom: 2px solid #e0e0e0;
            -webkit-box-shadow: 0px 5px 0px 0px rgba(102, 102, 102, 0.4);
            -moz-box-shadow: 0px 5px 0px 0px rgba(102, 102, 102, 0.4);
            box-shadow: 0px 5px 0px 0px rgba(102, 102, 102, 0.4);
        }

        .card .controls {
            content: "";
            display: block;
            height: 2.5em;
            width: 100%;
            list-style: none;
            margin: 0;
            padding: 0;
            border-top: 1px solid #eee;
        }

        .card .controls li {
            position: relative;
            font-family: "Open Sans";
            z-index: 1;
            color: #424242;
            font-size: 1.1em;
            height: 100%;
            display: inline-block;
            float: left;
            width: 33.33333%;
            text-align: center;
        }

        .card .controls li:hover {
            cursor: pointer;
            color: #fff;
            transition: color .175s;
        }

        .card .controls .read:after {
            position: absolute;
            content: " ";
            z-index: -2;
            display: block;
            background: #0090FF;
            height: 120%;
            width: 100%;
            margin-top: 0;
            transition: transform .175s;
        }

        .card .controls .views:after {
            position: absolute;
            content: " ";
            z-index: -2;
            display: block;
            background: #5CB85C;
            height: 120%;
            width: 100%;
            margin-top: 0;
            transition: transform .175s;
        }

        .card .controls .comment:after {
            position: absolute;
            content: " ";
            z-index: -2;
            display: block;
            background: #D9534F;
            height: 120%;
            width: 100%;
            margin-top: 0;
            transition: transform .175s;
        }

        .card .controls li:hover::after {
            transform: translateY(-80%);
            transition: transform .175s;
            margin-top: 0;
        }

        .card .controls li p {
            padding-top: 0px;
            display: inline-block;
            vertical-align: middle;
        }

        .card .controls li p .text-a {
            padding-top: 15px;

        }

        .card h1 {
            font-family: "Open Sans";
            font-size: 3em;
            font-weight: normal;
            padding-top: 0;
            margin-top: 0.3em;
            margin-left: 0.7em;
            margin-bottom: 0;
            color: #0090FF;
        }

        .card .desc-text {
            font-family: "Open Sans";
            color: #212121;
            font-size: 1em;
            padding-top: 0.4em;
            padding-left: 1.75em;
            padding-right: 1.75em;
            padding-bottom: 0.6em;
            text-overflow: ellipsis;
            word-wrap: break-word;
            overflow: hidden;
            max-height: 10.5em;
            line-height: 1.5;
        }
    </style>

    <div class="card">
        <h1><i class="fa fa-facebook"></i> Data Card</h1>
        <p class="desc-text text-justify">
            Entries of disaster events collected from various sources ...
        </p>
        <ul class="controls">
            <li class="read">
                <i class="fa fa-book"></i>
                <a href="<?= \yii\helpers\Url::toRoute('datacard/datacard/create') ?>" class="btn btn-primary"><p
                            class="text-a">+Add</p></a>
            </li>
            <li class="views">
                <i class="fa fa-eye"></i>
                <a href="<?= \yii\helpers\Url::toRoute('datacard/datacard') ?>" class="btn btn-primary"><p
                            class="text-a">View</p></a>
            </li>
            <li class="comment">
                <i class="fa fa-comment"></i>
                <a href="<?= \yii\helpers\Url::toRoute('datacard/datacard/download-page') ?>" class="btn btn-primary"><p
                            class="text-a">Download</p></a>
            </li>

        </ul>
    </div>

<hr>
<?php if (isset(Yii::$app->user->identity) && Yii::$app->user->identity->isAdmin):?>
    <div class="card">
        <h1><i class="fa fa-facebook"></i> User Management</h1>
        <p class="desc-text text-justify">
            Manage user, roles, permissions ...
        </p>
        <ul class="controls">
            <li class="read">
                <i class="fa fa-book"></i>
                <a href="<?= \yii\helpers\Url::toRoute('user/admin') ?>" class="btn btn-primary"><p
                            class="text-a">Admin</p></a>
            </li>
			<li class="read">
                <i class="fa fa-log"></i>
                <a href="<?= \yii\helpers\Url::toRoute('/logvisitor') ?>" class="btn btn-primary"><p
                            class="text-a">Log Visitor</p></a>
            </li>
        </ul>
    </div>
<?php endif;?>