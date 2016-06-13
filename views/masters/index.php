<?php

/* @var $this yii\web\View */

$this->title = 'Мастера';
?>


<h1 class="page-header text-center">
    Мастера
</h1>


<div class="row">
    <div class="col-sm-4">
            <img src="/images/controller/masters/index/bLWg6--nPQQ.jpg"
                 class="thumbnail" width="100%"
                style="border-radius: 20px;"
                />

        <div style="height: 200px;">
            <h2 class="center-block text-center">Максим Кравцов</h2>
            <p class="center-block text-center">исследователь, коуч, психолог, просветитель, путешественник, консультант по вопросам благополучия, автор ряда публикаций и патентов.</p>
        </div>
    </div>
    <div class="col-sm-4">
            <img src="/images/controller/masters/index/12195120_10200972065380918_7501450503155675234_o.jpg"
                 class="thumbnail" width="100%"
                 style="border-radius: 20px;"
                />

        <div style="height: 200px;">
            <h2 class="center-block text-center">Денис Валерьевич</h2>
            <p class="center-block text-center">Жрец и Консультант по Родам</p>
        </div>
    </div>
    <div class="col-sm-4">
            <img src="/images/controller/masters/index/12191372_961834657217928_6427958805132840409_o.jpg"
                 class="thumbnail" width="100%"
                 style="border-radius: 20px;"
                />
        <div style="height: 200px;">
            <h2 class="center-block text-center">Святослав Архангельский</h2>
            <p class="center-block text-center">Жрец, Консультант по промежуточному состоянию</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
            <img src="/images/controller/site/index/s4.jpg"
                 class="thumbnail" width="100%"
                 style="border-radius: 20px;"
                 />

        <div style="height: 200px;">
            <h2 class="center-block text-center">Константин Александрович</h2>
            <p class="center-block text-center"></p>
        </div>
    </div>
</div>



<hr>
<?= $this->render('../blocks/share', [
    'url'         => \yii\helpers\Url::current([], true),
    'image'       => \yii\helpers\Url::to('/images/controller/site/index/0.jpg', true),
    'title'       => 'Агентство Сохранения Рода',
    'description' => 'Агентство, предоставляющее услуги сопровождения души в тонкий мир и воссоединение с Родом Небесным, консалтинговые услуги по действиям в промежуточном состоянии между уходом и приходом на Землю, и здоровые роды на Земле по законам космоса.',
]) ?>
