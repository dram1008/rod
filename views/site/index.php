<?php

/* @var $this yii\web\View */

$this->title = 'Тесла Ген';
$this->registerJs("$('.carousel').carousel()");
?>
<div class="site-index">
    <h1 class="page-header"><?= \yii\bootstrap\Html::encode($this->title) ?> <small>энергосистемы и источники питания здесь и сейчас</small></h1>

    <?php $this->registerJs("$('.carousel').carousel()"); ?>
    <div id="carousel-example-generic" class="carousel slide thumbnail" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="/images/controller/site/index/3.jpg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="/images/controller/site/index/4.jpg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="/images/controller/site/index/5.jpg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <img src="/images/controller/site/index/cvetok-life2.jpg" class="img-circle center-block" width="140" height="140"/>
            <h2 class="center-block text-center">Вечная батарея</h2>
            <p class="center-block text-center">Электрогенератор вырабатывает электроэнергию, не потребляя какого-либо топлива. Для выработки электроэнергии также нет необходимости во внешней энергии ветра, солнца, воды и т.п.</p>
        </div>
        <div class="col-lg-4">
            <img src="/images/controller/site/index/f4.jpg" class="img-circle center-block" width="140" height="140"/>
            <h2 class="center-block text-center">Тихий</h2>
            <p class="center-block text-center">Уровень шума в момент регулирования<br> не более 30 дБ<br>для сравнения Тихий шепот	- 35 дБ, Спокойный разговор - 70 дБ</p>
        </div>
        <div class="col-lg-4">
            <img src="/images/controller/site/index/f5.jpg" class="img-circle center-block" width="140" height="140"/>
            <h2 class="center-block text-center">Работает всегда</h2>
            <p class="center-block text-center">Время работы не ограничено. Расчетный срок службы от 10 лет</p>
        </div>
    </div>

    <hr>

    <p>Общий принцип работы самозапитки: работа ротовертера + умножитель энергии.</p>

    <p>Аккумулятор служит только для запуска генератора. При отключении аккумулятора может работать. Время работы
        неограниченно.</p>

    <p>Рабочий диапазон температуры окружающей среды, °С -35...+40</p>

    <p>Гарантия: 3 года</p>

    <p>Услуги сервисного обслуживания</p>


    <h2 class="page-header">Новости</h2>
    <div class="row">
        <div class="col-lg-4">
            <p style="font-size: 70%;color: #888;">27 сен 2015 г.</p>
            <h3>C 5 октября ожидается повышение цен на генераторы</h3>
            <img src="/images/controller/site/index/news/news1.jpg" width="100%" class="thumbnail"/>
        </div>
    </div>

    <h2 class="page-header">Цены</h2>


    <table class="table table-hover table-striped" style="width: 100%; max-width: 500px;">
        <tr>
            <th>Мощность, кВт</th>
            <th>Напряжение, В</th>
            <th>Цена, тыс. руб</th>
        </tr>
        <?php foreach (\app\models\Product::query()->orderBy([
            'v'   => SORT_ASC,
            'kvt' => SORT_ASC,
        ])->all() as $item) {
            ?>
            <tr>
                <td><?= $item['kvt'] ?></td>
                <td><?= $item['v'] ?></td>
                <td><?= Yii::$app->formatter->asDecimal($item['price']/1000, 0) ?></td>
            </tr>
        <?php }?>

    </table>

    <h2 class="page-header">Принцип работы</h2>
    <div class="row">
        <div class="col-lg-4">
            <img src="/images/controller/site/index/p.jpg" width="100%" class="thumbnail"/>
        </div>
        <div class="col-lg-4">
            <p>Есть генератор.</p>
            <p>Он соединен напрямую с двигателем который его раскручивает.</p>
            <p>Генератор питает двигатель.</p>
            <p>Генератор вырабатывает в четыре раза больше чем потребляет двигатель.</p>
            <p>Получаемая разница и идет на выход.</p>
            <p>Для исключения потерь существует умножитель энергии, который построен на магнитах, которые отталкиваясь друг от друга дают дополнительный импульс движения (это и есть секретная формула Теслы которую мы освоили). Все это обеспечивается встроенной электроникой.</p>
            <p>Заводится от аккумулятора. Потом работает автономно и выдает бесконечно указанную мощность.</p>
        </div>
        <div class="col-lg-4">
            <img src="/images/controller/site/index/magnit.jpg" width="100%" class="thumbnail"/>
        </div>
    </div>


    <hr>

    <div class="jumbotron">
        <h1>Заказ:</h1>
        <p>teslagen@galaxysss.ru</p>
        <p><a class="btn btn-primary btn-lg" href="/production" role="button">Выбрать модель</a></p>
    </div>



    <?php
    $isShowForm = false;
    if (Yii::$app->user->isGuest) {
        if (!isset(Yii::$app->request->cookies['subscribeIsStarted'])) {
            $isShowForm = true;
        }
    }

    if ($isShowForm) { ?>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <?php
                $this->registerJs(<<<JS
// форма подписки
    {
        function setCookie (name, value, expires, path, domain, secure) {
            document.cookie = name + "=" + escape(value) +
            ((expires) ? "; expires=" + expires : "") +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            ((secure) ? "; secure" : "");
        }
        $('#formSubscribeSubmit').click(function() {
            var object;
            object = $('#formSubscribeName');
            if (object.length > 0) {
                if (object.val() == '') {
                    object.parent().addClass('has-error').find('.help-block-error').html('Это обязательное поле').show().removeClass('hide');
                    object.focus();

                    return;
                }
            }
            object = $('#formSubscribeEmail');
            if (object.val() == '') {
                object.parent().addClass('has-error').find('.help-block-error').html('Это обязательное поле').show().removeClass('hide');
                object.focus();

                return;
            }
            ajaxJson({
                url: '/subscribe/mail',
                data: {
                    email: $('#formSubscribeEmail').val(),
                    name: $('#formSubscribeName').val()
                },
                success: function(ret) {
                    var parentForm = $('#formSubscribe').parent();
                    $('#formSubscribe').remove();
                    parentForm.append(
                        $('<p>', {
                            class: 'alert alert-success'
                        }).html('Вы успешно подписались на рассылку')
                    );
                    setCookie('subscribeIsStarted', 1);
                    showInfo('Вам на почту выслано подтверждение, пройдите пожалуйста на почту');
                },
                errorScript: function(ret) {
                    object = $('#formSubscribeEmail');
                    object.parent().addClass('has-error').find('.help-block-error').html(ret.data).show().removeClass('hide');
                }
            });
        });
        $('#formSubscribeName, #formSubscribeEmail').on('input', function() {
            $(this).parent().removeClass('has-error').find('.help-block-error').hide();
        });
    }
JS
                );
                ?>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Подписаться на рассылку</h3>
                    </div>
                    <div class="panel-body">
                        <form id="formSubscribe">
                            <?php if (Yii::$app->user->isGuest) {?>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formSubscribeName" placeholder="Имя">
                                    <p class="help-block help-block-error hide">Это поле должно быть заполнено обязательно</p>
                                </div>
                            <?php }?>
                            <div class="form-group">
                                <input type="email" class="form-control" id="formSubscribeEmail" placeholder="Email">
                                <p class="help-block help-block-error hide">Это поле должно быть заполнено обязательно</p>
                            </div>
                            <button type="button" class="btn btn-default" style="width: 100%;" id="formSubscribeSubmit">Подписаться</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <p class="alert alert-success">Вы успешно подписались на рассылку</p>
            </div>
        </div>
        <?php } ?>


    <hr>
    <?= $this->render('../blocks/share', [
        'url'         => \yii\helpers\Url::current([], true),
        'image'       => \yii\helpers\Url::to('/images/controller/site/index/3.jpg', true),
        'title'       => 'Купить генератор Теслы',
        'description' => 'Электрогенератор вырабатывает электроэнергию, не потребляя какого-либо топлива. Время работы не ограничено. Не нужно ветра, солнца, воды и т.п.',
    ]) ?>

</div>
