<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Сервис';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <img src="/images/controller/site/service/122.jpg" width="100%" class="thumbnail center-block"/>
        </div>
        <div class="col-lg-4">
            <p class="lead">Наши гармонизированные братья сделают все в лучшем виде.<br>Только так.<br>Здесь и Сейчас.
            </p>

            <p>Гарантия: 3 года</p>

            <p>Расчетный срок службы от 10 лет</p>
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
