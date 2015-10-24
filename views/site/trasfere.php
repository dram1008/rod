<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Переход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <p><img src="/images/controller/site/transfere/header.jpg" width="100%" class="thumbnail"/></p>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>
                Консалтинговые услуги по действиям в промежуточном состоянии между уходом и приходом на
                Землю
            </p>

            <?php $this->registerJs("$('.buttonOrder').tooltip()")?>
            <a href="#" class="btn btn-success btn-lg text-center buttonOrder" title="Заказать" style="width: 100%;">
                2 000 руб. / час
            </a>
            <hr>
            <p>
                Смягчить кармическую ответственность перед Владыками Кармы и Хранителями Судьбы (Отпускание грехов)
            </p>

            <a href="#" class="btn btn-success btn-lg text-center buttonOrder" title="Заказать" style="width: 100%;">
                20 000 руб.
            </a>
            <hr>

            <p>
                Последнее слово
            </p>

            <a href="#" class="btn btn-success btn-lg text-center buttonOrder" title="Заказать" style="width: 100%;">
                20 000 руб.
            </a>
            <hr>

            <p>
                Связь с умершей душой
            </p>

            <a href="#" class="btn btn-success btn-lg text-center buttonOrder" title="Заказать" style="width: 100%;">
                20 000 руб.
            </a>


        </div>
    </div>

    <hr>
    <?= $this->render('../blocks/share', [
        'url'         => \yii\helpers\Url::current([], true),
        'image'       => \yii\helpers\Url::to('/images/controller/site/index/3.jpg', true),
        'title'       => 'Купить генератор Теслы',
        'description' => 'Электрогенератор вырабатывает электроэнергию, не потребляя какого-либо топлива. Время работы не ограничено. Не нужно ветра, солнца, воды и т.п.',
    ]) ?>
</div>
