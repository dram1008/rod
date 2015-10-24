<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <p><img src="/images/controller/site/about/header.jpg" width="100%" class="thumbnail"/></p>

    <div class="col-lg-8 col-lg-offset-2">
        <p>
        «Агентство Сохранения Рода» – агентство, предоставляющее услуги сопровождения души в тонкий мир и воссоединение
        с Родом Небесным, консалтинговые услуги по действиям в промежуточном состоянии между уходом и приходом на Землю,
        и здоровые роды на Земле по законам космоса.
    </p>

    <p>
        Миссией Агентства является:<br>
        ~ Сохранять силу рода и преумножать ее.<br>
        ~ Смягчить кармическую ответственность перед Владыками Кармы и Хранителями Судьбы.<br>
        ~ Рассказывать как себя вести в промежуточном (переходном) состоянии между жизнями.<br>
        ~ Помогать людям рожать БОГатырей и БОГинь способных воплотить на Земле РАЙ и дающие сакральные знания для сверхспособностей.<br>
        ~ Заключать Божественные союзы для Вечной и преумножющейся Любви.
    </p>

    <p>
        Агентство действует по Лицензии от Хранителей Судьбы и Владык Кармы и при участии
        «<a href="http://www.galaxysss.ru/category/study/171">Академии Родоведения</a>».
        Благословения были получены в период сакрального Сентября 2015 г. и
        ранее при передаче знаний из Академии Родоведения.
    </p>

    <p>
        В нашем распоряжении есть:<br>
        - Чистая Земля<br>
        - Священник<br>
        - Музыка для проведения торжества<br>
        - Ведущий для гармоничной организации<br>
        - Юридическое сопровождение<br>
        - Транспортные услуги для доставки именинника торжества и гостей
    </p>
        </div>

    <hr>
    <?= $this->render('../blocks/share', [
        'url'         => \yii\helpers\Url::current([], true),
        'image'       => \yii\helpers\Url::to('/images/controller/site/index/3.jpg', true),
        'title'       => 'Купить генератор Теслы',
        'description' => 'Электрогенератор вырабатывает электроэнергию, не потребляя какого-либо топлива. Время работы не ограничено. Не нужно ветра, солнца, воды и т.п.',
    ]) ?>
</div>
