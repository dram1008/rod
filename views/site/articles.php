<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?php foreach (\app\models\Article::query()->orderBy(['date_insert' => SORT_DESC])->all() as $item) { ?>
        <?php $article = new \app\models\Article($item) ?>
        <div class="row">
            <div class="col-lg-4">
                <a href="<?= $article->getLink() ?>">
                    <img src="<?= $article->getImage() ?>" class="thumbnail" width="100%"/>
                </a>
            </div>
            <div class="col-lg-8">
                <h3 class="page-header"><?= $item['header'] ?></h3>
                <p><?= $item['description'] ?></p>
            </div>

        </div>
    <?php
    }
    ?>



    <hr>
    <?= $this->render('../blocks/share', [
        'url'         => \yii\helpers\Url::current([], true),
        'image'       => \yii\helpers\Url::to('/images/controller/site/index/3.jpg', true),
        'title'       => 'Купить генератор Теслы',
        'description' => 'Электрогенератор вырабатывает электроэнергию, не потребляя какого-либо топлива. Время работы не ограничено. Не нужно ветра, солнца, воды и т.п.',
    ]) ?>
</div>
