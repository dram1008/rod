<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Отправление к РОДУ НЕБЕСНОМУ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <p><img src="/images/controller/site/out/header.jpg" width="100%" class="thumbnail"/></p>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>
                Агентство Сохранения Рода предоставляет жителям земли Уникальное Торговое Предложение.
            </p>

            <p>
                Ритуал «Отправление к РОДУ НЕБЕСНОМУ» - это процедура воссоединения души умершего человека с его Родом
                Небесным. Суть ее заключается в том, что тело сжигается на костре, на чистом воздухе на чистой Земле с
                направлением души к предкам и Роду Небесному.
            </p>

            <p><img src="/images/controller/site/out/1.jpg" width="100%" class="thumbnail"/></p>

            <p>

                Это событие является праздником в каждом Роду, так как душа исполнила свою Земную Миссию и
                воссоединяется с Родом Небесным. Вы можете встретить этот ритуал под альтернативным названием
                «кРОДирование».
            </p>

            <p>

                Ритуал проводит «Агентство Сохранения Рода» – агентство, предоставляющее услуги сопровождения души в
                тонкий мир и воссоединение с Родом Небесным, консалтинговые услуги по действиям в промежуточном
                состоянии между уходом и приходом на Землю, и здоровые роды на Земле по законам космоса.
            </p>

            <p>

                Агентство действует по Лицензии от Хранителей Судьбы и Владык Кармы и при участии
                «<a href="http://www.galaxysss.ru/category/study/171" target="_blank">Академии Родоведения</a>».
                Благословения были получены в период сакрального Сентября
                2015 г. и ранее при передаче знаний из Академии Родоведения.
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

            <p>

                Наша организация проходит «под ключ» куда включено<br>

                - Принятие тела из Морга.<br>

                - Переезд на Священное Место.<br>

                - Проведение ритуала.

            </p>
            <?php $this->registerJs("$('.buttonOrder').tooltip()")?>
            <a href="#" class="btn btn-success btn-lg text-center buttonOrder" title="Заказать" style="width: 100%;">
                100 000 руб.*
            </a>
            <p>* возможен бартер</p>

            <iframe width="100%" height="315" class="thumbnail" src="https://www.youtube.com/embed/Xm-SXRdBLGo" frameborder="0" allowfullscreen></iframe>
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
