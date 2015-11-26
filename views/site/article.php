<?php

/* @var $this yii\web\View */
/* @var $item app\models\Article */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = $item->getField('header');
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <?= $item->getField('content') ?>
        </div>
    </div>


    <hr>
    <?=

    $this->render('../blocks/share', [
        'url'         => \yii\helpers\Url::current([], true),
        'image'       => \cs\Widget\FileUpload2\FileUpload::getOriginal(\yii\helpers\Url::to($item->getImage(), true), false),
        'title'       => $item->getField('header'),
        'description' => $item->getField('description')
    ]) ?>
</div>
