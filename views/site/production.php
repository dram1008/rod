<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Продукция';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs("$('.col-lg-4 img').tooltip({title:'Подробнее'})");
$this->registerJs("$('.btn-order').tooltip({title:'Заказать'})");
?>
<style>
    .col-lg-4 {
        padding-bottom: 60px;
    }
</style>
<div class="site-about">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <h2 class="page-header"><span class="label label-default">220 В</span></h2>

    <div class="row">
        <?php foreach (\app\models\Product::query(['v' => 220])->orderBy(['kvt' => SORT_ASC])->all() as $item) { ?>
            <div class="col-lg-4">
                <h3><?= $item['name'] ?></h3>
                <a href="<?= \yii\helpers\Url::to(['production_item', 'id' => $item['id']]) ?>">

                                        <img src="<?= $item['image'] ?>" width="100%" class="thumbnail"/>
</a>
                <p><span style="font-size: 400%;"><?= $item['kvt'] ?></span> кВт, <span class="label label-default">220 В</span>
                </p>
                <a href="<?= \yii\helpers\Url::to(['site/buy', 'id' => $item['id']]); ?>" class="btn btn-success btn-order"
                   style="width: 100%"><?= \Yii::$app->formatter->asCurrency((int)$item['price']) ?></a>
            </div>
        <?php } ?>
    </div>


    <h2 class="page-header"><span class="label label-default">380 В</span></h2>

    <div class="row">
        <?php foreach (\app\models\Product::query(['v' => 380])->orderBy(['kvt' => SORT_ASC])->all() as $item) { ?>
            <div class="col-lg-4">
                <h3><?= $item['name'] ?></h3>
                <a href="<?= \yii\helpers\Url::to(['production_item', 'id' => $item['id']]) ?>">
                    <img src="<?= $item['image'] ?>" width="100%" class="thumbnail"/>
                </a>

                <p><span style="font-size: 400%;"><?= $item['kvt'] ?></span> кВт, <span class="label label-default">380 В</span>
                </p>
                <a href="javascript:void(0);" class="btn btn-success"
                   style="width: 100%"><?= \Yii::$app->formatter->asCurrency((int)$item['price']) ?></a>
            </div>
        <?php } ?>
    </div>

    <hr>
    <?= $this->render('../blocks/share', [
        'url'         => \yii\helpers\Url::current([], true),
        'image'       => \yii\helpers\Url::to('/images/controller/site/index/3.jpg', true),
        'title'       => 'Купить генератор Теслы',
        'description' => 'Электрогенератор вырабатывает электроэнергию, не потребляя какого-либо топлива. Время работы не ограничено. Не нужно ветра, солнца, воды и т.п.',
    ]) ?>

</div>
