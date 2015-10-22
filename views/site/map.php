<?php

/* @var $this yii\web\View */
/* @var $lat  */
/* @var $lng  */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Доставка в ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?=
    (new \app\services\GoogleMaps())->map([
        'width'     => '100%',
        'height'    => '400',
        'pointList' => [[
            'lng'         => $lng,
            'lat'         => $lat,
            'name'        => 'Точка доставки',
            'description' => 'Земля, Россия, Москва, Moscow City, Башня Эволюция',
            'image'       => '',
            'url'         => '',
        ]],
    ]) ?>

</div>
