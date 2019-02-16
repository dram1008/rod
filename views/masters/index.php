<?php

/* @var $this yii\web\View */

$this->title = 'Мастера';
?>


<h1 class="page-header text-center">
    Мастера
</h1>


<div class="row">

</div>



<hr>
<?= $this->render('../blocks/share', [
    'url'         => \yii\helpers\Url::current([], true),
    'image'       => \yii\helpers\Url::to('/images/controller/site/index/0.jpg', true),
    'title'       => 'Агентство Сохранения Рода',
    'description' => 'Агентство, предоставляющее услуги сопровождения души в тонкий мир и воссоединение с Родом Небесным, консалтинговые услуги по действиям в промежуточном состоянии между уходом и приходом на Землю, и здоровые роды на Земле по законам космоса.',
]) ?>
