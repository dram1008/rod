<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Доставка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-4">
            <img src="/images/controller/site/dostavka/1.jpg" width="100%" class="thumbnail"/>
        </div>

        <div class="col-lg-4">
            <img src="/images/controller/site/dostavka/2.jpg" width="100%" class="thumbnail"/>
        </div>

        <div class="col-lg-4">
            <p>Доставка возможна в любую точку планеты.</p>
            <p>Поставка в течении 35-50 дней.</p>
            <p>Отгрузка происходит только после 100% предоплаты.</p>
            <p>Доставка осуществляется через транспортную компанию "Деловые линии" или любой другой на Ваш выбор.</p>
            <p>По Москве доставка бесплатная.</p>
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
