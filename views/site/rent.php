<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Тест драйв';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <img src="/images/controller/site/rent/1.jpg" width="100%" class="thumbnail center-block"/>
        </div>
        <div class="col-lg-4">
            <p class="lead">Предоставляем вам бесплатно протестировать наш ТеслаГен.</p>
            <p>Для этого вам нужно только внести залоговую стоимость в размере 100% номинальной цены и если он вам не понравится мы возвращаем вам деньги и с вами больше не работаем, а если понравится - оставляйте и наслаждайтесь</p>
            <a href="/contact" class="btn btn-success btn-lg" style="width: 100%">Позвонить</a>
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
