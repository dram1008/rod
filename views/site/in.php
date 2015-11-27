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
            <p><iframe allowfullscreen="" class="thumbnail" frameborder="0" height="315" src="https://www.youtube.com/embed/JsxMi_qaiAQ" width="100%"></iframe></p>
            <p>Фильм Дебры Паскали-Бонаро (Debra Pascali-Bonaro) "Оргазмические роды - самый большой секрет" вышел на экраны ньюйоркцев в январе 2009 года. Дебра - международный эксперт в области естественных родов с 26-летним стажем, мама пятерых детей, двое из которых - приёмные. В фильме семейные пары рассказывают о том, как они пришли к тому, чтобы рожать дома в атмосфере любви и экстаза, делятся опытом, обсуждают страхи.</p>
            <p>Вот что говорит в фильме известная акушерка Айна Мэй Гаскин о нормальном течении родов и возможности женщины испытать оргазмические переживания: «Ощутить экстаз в родах возможно — на самом деле это самая высшая точка естественного наслаждения, которая мне известна. Такое состояние лучше всего достигается, когда женщина находится в полном сознании и понимает, что она делает. У неё нет другого способа узнать, как работает её тело, кроме как испытать его в родах. Вас могут очень удивить изменения, которые произойдут в процессе родов, — вы почувствуете что-то очень мощное в себе, что вы способны на всё! Это яркое и страстное нечто поднимается и растёт. Это именно то чувство, которое мы хотим раскрыть в каждой матери!»</p>
            <iframe width="100%" class="thumbnail" height="315" src="https://www.youtube.com/embed/h-RQt5XO0uo" frameborder="0" allowfullscreen=""></iframe>


            <p>
                <a href="https://vk.com/zoya_borisova" class="btn btn-default btn-xs">https://vk.com/zoya_borisova</a>
            </p>
            <p>
                <a href="https://vk.com/zoya_borisova" class="btn btn-default btn-xs">http://vk.com/club52645074</a>
            </p>
            <p>
                <a href="https://vk.com/zoya_borisova" class="btn btn-default btn-xs">http://www.domrebenok.ru/blog/orgazmicheskie-rody/</a>
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
        'title'       => 'Приход души. Здоровые роды',
        'description' => 'Приход души. Здоровые роды',
    ]) ?>
</div>
