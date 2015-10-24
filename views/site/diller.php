<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Дилерская программа';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <img src="/images/controller/site/diller/diller.jpg" class="thumbnail" width="100%"/>
        </div>
        <div class="col-lg-8 col-lg-offset-2">
            <p>У нас есть менеджерская программа.</p>
            <p>С каждого приведенного вами клиента вы получаете 10% от суммы заказа.</p>
            <p>Счет идет со второго клиента.</p>
            <hr>
            <p>Мы приглашаем к сотрудничеству:<br>
                - жрецов, священников которые проводят кРОДирование.<br>
                - повитухи, те кто готовит матерей к здоровым родам,<br>
                - консультантов по сохранению Рода.
            </p>
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
