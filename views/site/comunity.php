<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Наша Команда';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header"><?= Html::encode($this->title) ?></h1>

<h2 class="page-header">Мастера</h2>
<div class="col-lg-4">
    <img src="/images/controller/site/comunity/dm.jpg" style="width: 100%;" class="thumbnail" alt="Дмитрий Анатольевич">
    <p>Дмитрий Анатольевич</p>
</div>
<div class="col-lg-4">
    <img src="/images/controller/site/comunity/dm.jpg" style="width: 100%;" class="thumbnail" alt="Дмитрий Анатольевич">
    <p>Дмитрий Анатольевич</p>
</div>
<div class="col-lg-4">
    <img src="/images/controller/site/comunity/dm.jpg" style="width: 100%;" class="thumbnail" alt="Дмитрий Анатольевич">
    <p>Дмитрий Анатольевич</p>
</div>


<h2 class="page-header">Музыка</h2>

<div class="col-lg-4">
    <img src="/images/controller/site/comunity/dm.jpg" style="width: 100%;" class="thumbnail" alt="Дмитрий Анатольевич">
    <p>Дмитрий Анатольевич</p>
</div>
<div class="col-lg-4">
    <img src="/images/controller/site/comunity/dm.jpg" style="width: 100%;" class="thumbnail" alt="Дмитрий Анатольевич">
    <p>Дмитрий Анатольевич</p>
</div>
<div class="col-lg-4">
    <img src="/images/controller/site/comunity/dm.jpg" style="width: 100%;" class="thumbnail" alt="Дмитрий Анатольевич">
    <p>Дмитрий Анатольевич</p>
</div>




<?= $this->render('../blocks/share', [
    'url'         => \yii\helpers\Url::current([], true),
    'image'       => \yii\helpers\Url::to('/images/controller/site/index/3.jpg', true),
    'title'       => 'Купить генератор Теслы',
    'description' => 'Электрогенератор вырабатывает электроэнергию, не потребляя какого-либо топлива. Время работы не ограничено. Не нужно ветра, солнца, воды и т.п.',
]) ?>
