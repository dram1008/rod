<?php

use yii\helpers\Url;
use app\services\GsssHtml;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = 'Статьи';

$this->registerJs(<<<JS
$('.buttonDelete').click(function (e) {
        e.preventDefault();
        if (confirm('Подтвердите удаление')) {
            var id = $(this).data('id');
            ajaxJson({
                url: '/admin/certificates/' + id + '/delete',
                success: function (ret) {
                    infoWindow('Успешно', function() {
                        $('#newsItem-' + id).remove();
                    });
                }
            });
        }
    });

    $('.rowTable').click(function() {
        window.location = '/admin/certificates/' + $(this).data('id') + '/edit';
    });

JS
);
\cs\services\VarDumper::dump(1);
?>

<div class="container">
    <h1 class="page-header">Статьи</h1>

    <a href="/admin/certificates/add" class="btn btn-default">Добавить</a>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query'      => \app\models\Certificate::query()->orderBy(['datetime_given' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]),
        'tableOptions' => [
            'class' => 'table table-striped table-hover',
        ],
        'rowOptions'   => function ($item) {
            return [
                'data' => ['id' => $item['id']],
                'role' => 'button',
                'class' => 'rowTable'
            ];
        },
        'columns'      => [
            'id',
            'name:text:Название',
            'datetime_given:date:Дата выдачи',
            'passport_num:text:#',
            'passport_date:date:Дата',
            'passport_vidan:text:Выдан',
            [
                'header'  => 'Удалить',
                'content' => function ($item) {
                    return Html::button('Удалить', [
                        'class' => 'btn btn-danger btn-xs buttonDelete',
                        'data'  => [
                            'id' => $item['id'],
                        ]
                    ]);
                }
            ],
        ],
    ]) ?>
</div>