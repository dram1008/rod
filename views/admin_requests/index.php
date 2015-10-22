<?php

use yii\helpers\Url;
use app\services\GsssHtml;
use yii\helpers\Html;

$this->title = 'Заказы';

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
    <h1 class="page-header">Заказы</h1>


    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query'      => \app\models\Request::query()->orderBy(['datetime' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 50,
            ],
        ]),
        'columns' =>
        [
            [
                'class' => 'yii\grid\SerialColumn', // <-- here
                // you may configure additional properties here
            ],
            [
                'header' => 'Время',
                'content' => function ($model, $key, $index, $column) {
                    return Yii::$app->formatter->asDatetime($model['datetime']);
                },
            ],
            [
                'header' => 'Модель',
                'content' => function ($model, $key, $index, $column) {
                    return \app\models\Product::find($model['product_id'])->getField('name');
                },
            ],
            'name',
            'email',
            'phone',
            'point_address',
            [
                'header' => 'Комментарий',
                'content' => function ($model, $key, $index, $column) {
                    return Html::tag('pre', nl2br($model['comment']));
                },
            ],
        ]
    ]) ?>

</div>