<?php

/* @var $this yii\web\View */
/* @var $item app\models\Product */

use yii\helpers\Html;

$this->title = $item->getField('name');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .col-lg-4 {
        padding-bottom: 60px;
    }
</style>
<div class="site-about">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>


    <div class="row">
        <div class="col-lg-4">
            <img src="<?= $item->getField('image') ?>" class="thumbnail"/>

        </div>
        <div class="col-lg-8">
            <?= $item->getField('content') ?>
            <hr>
            <h2 class="center-block block-center" style="text-align: center;">
                <?= \Yii::$app->formatter->asCurrency((int)$item->getField('price')) ?>
            </h2>
            <hr>
            <a href="<?= \yii\helpers\Url::to(['site/buy', 'id' => $item->getId()]) ?>" class="btn btn-success btn-lg" style="width: 100%">
                Заказать
            </a>
        </div>
    </div>


    <hr>
    <?= $this->render('../blocks/share', [
        'url'         => \yii\helpers\Url::current([], true),
        'image'       => \yii\helpers\Url::to($item->getField('image'), true),
        'title'       => $item->getField('name'),
        'description' => strip_tags($item->getField('content')),
    ]) ?>

</div>
