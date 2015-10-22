<?php

use yii\helpers\Url;
use app\services\GsssHtml;
use yii\helpers\Html;

$this->title = 'Генераторы';

$this->registerJs(<<<JS
$('.buttonDelete').click(function (e) {
        e.preventDefault();
        if (confirm('Подтвердите удаление')) {
            var id = $(this).data('id');
            ajaxJson({
                url: '/admin/articleList/' + id + '/delete',
                success: function (ret) {
                    infoWindow('Успешно', function() {
                        $('#newsItem-' + id).remove();
                    });
                }
            });
        }
    });

    // Сделать рассылку
    $('.buttonAddSiteUpdate').click(function (e) {
        e.preventDefault();
        if (confirm('Подтвердите')) {
            var buttonSubscribe = $(this);
            var id = $(this).data('id');
            ajaxJson({
                url: '/admin/articleList/' + id + '/subscribe',
                success: function (ret) {
                    infoWindow('Успешно', function() {
                        buttonSubscribe.remove();
                    });
                }
            });
        }
    });
JS
);
?>

<div class="container">
    <h1 class="page-header">Генераторы</h1>


    <div class="col-lg-6">
        <?= \yii\grid\GridView::widget([
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query'      => \app\models\Product::query(),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]),
            'columns'      => [
                'id',
                'name',
                'v',
                'kvt',
                'price',
                [
                    'header' => 'Редактировать',
                    'content' => function ($model, $key, $index, $column) {
                        return Html::a('Редактировать', ['admin_products/edit', 'id' => $model['id']], [
                            'class' => 'btn btn-primary'
                        ]);
                    }
                ]
            ]
        ]) ?>
    </div>


    <div class="col-lg-6">
        <div class="row">
            <!-- Split button -->
            <div class="btn-group">
                <a href="<?= Url::to(['admin_products/add']) ?>" class="btn btn-default">Добавить</a>

            </div>
        </div>
    </div>
</div>