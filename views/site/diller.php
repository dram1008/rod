<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Диллерская программа';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <img src="/images/controller/site/diller/diller.jpg" class="thumbnail" width="100%"/>
        </div>
        <div class="col-lg-8 col-lg-offset-2">
            <p>Мы рассматриваем ваши предложения на конкурсной основе.</p>
            <p>Высылайте описание о роде вашей деятельности, необходимых объемах и ваше предложение.</p>
            <p>Фото, дата и место рождения.</p>
            <p>teslagen@galaxysss.ru</p>
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
