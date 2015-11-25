<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Приход души. Здоровые роды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <p><img src="/images/controller/site/in/header.jpg" width="100%" class="thumbnail"/></p>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>
                перинатальные услуги, теоретический и практический интенсив по естественному родительству
            </p>

            <p>
                Последовательная информация о здоровом образе жизни в беременность: сыроедении, вегетарианстве,
                закаливании, голодании, пранаяме, йоге для беременных.
            </p>

            <p>
                Подготовка к зачатию, беременности, водным родам, лотосовому рождению. Семинары и вебинары по родам.
            </p>

            <p>
                Обучение беби-йоге, динамической гимнастике, грудничковому плаванию.
            </p>

            <p>
                Послеродовое восстановление женщины: банные и повивальные практики, пеленания льняным полотенцем,
                звукорезонансный чакровый массаж тибетскими чашами и диджериду.
            </p>

            <p>
                Практические семинары по водному ребефингу в бане и сухому ребефингу под диджериду и тибетские поющие
                чаши.
            </p>

            <p>

                ❗На данный момент открыт набор на два он-лайн курса:<br>
                1. Курс подготовки к естественным родам (подробнее здесь:<br>
                https://vk.com/topic-52645074_28760487?offset=0, а также у администратора группы)<br>
                2. Семинар (5 вебинаров) по теме Беременность и сыроедение. Ссылка на мероприятие:
                https://vk.com/syroedberemen<br>
                3. Также вы можете приобрести уже изданную книгу Зои Борисовой ЗДОРОВЫЕ РОДЫ – ГАРМОНИЯ ОТ ПРИРОДЫ в
                электронном виде (336 стр., 750 рублей) (всем желающим приобрести - обращаться к администратору группы)
            </p>
            <p>
                https://vk.com/zoya_borisova

                http://vk.com/club52645074
                http://www.domrebenok.ru/blog/orgazmicheskie-rody/
            </p>

            <?php $this->registerJs("$('.buttonOrder').tooltip()") ?>
            <a href="#" class="btn btn-success btn-lg text-center buttonOrder" title="Заказать" style="width: 100%;">
                100 000 руб.
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
