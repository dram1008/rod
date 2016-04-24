<?php

/* @var $this yii\web\View */

$this->title = 'Главная';
$this->registerJs("$('.carousel').carousel()");
?>
<div class="site-index">
    <h1 class="page-header text-center">
        Агентство Сохранения Рода
    </h1>

    <?php $this->registerJs("$('.carousel').carousel()"); ?>
    <div id="carousel-example-generic" class="carousel slide thumbnail" data-ride="carousel" style="
    margin-bottom: 60px;
">
       <!-- Indicators -->

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="/images/controller/site/index/0.jpg" alt="...">
            </div>
            <div class="item">
                <img src="/images/controller/site/index/1.jpg" alt="...">
            </div>
            <div class="item">
                <img src="/images/controller/site/index/2.jpg" alt="...">
            </div>
            <div class="item">
                <img src="/images/controller/site/index/3.jpg" alt="...">
            </div>
            <div class="item">
                <img src="/images/controller/site/index/6.jpg" alt="...">
            </div>
            <div class="item">
                <img src="/images/controller/site/index/4.jpg" alt="...">
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
        <div class="col-sm-4">
            <a href="<?= \yii\helpers\Url::to(['site/out']) ?>">
                <img src="/images/controller/site/index/s1.jpg" class="img-circle center-block" width="140"
                     height="140"/>
            </a>

            <h2 class="center-block text-center">Уход души</h2>

            <p class="center-block text-center">Ритуал «Отправление к РОДУ НЕБЕСНОМУ» - это процедура воссоединения души
                умершего человека с его Родом Небесным</p>
        </div>
        <div class="col-sm-4">
            <a href="<?= \yii\helpers\Url::to(['site/trasfere']) ?>">
                <img src="/images/controller/site/index/s2.jpg" class="img-circle center-block" width="140"
                     height="140"/>
            </a>

            <h2 class="center-block text-center">Странствия души</h2>

            <p class="center-block text-center">Консалтинговые услуги по действиям в промежуточном состоянии между
                уходом и приходом на Землю</p>
        </div>
        <div class="col-sm-4">
            <a href="<?= \yii\helpers\Url::to(['site/in']) ?>">
                <img src="/images/controller/site/index/s3.jpg" class="img-circle center-block" width="140"
                     height="140"/>
            </a>

            <h2 class="center-block text-center">Приход души</h2>

            <p class="center-block text-center">Призывание Великой Души. Здоровые роды на Земле по законам космоса.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <a href="<?= \yii\helpers\Url::to(['site/union']) ?>">
                <img src="/images/controller/site/index/s4.jpg" class="img-circle center-block" width="140"
                     height="140"/>
            </a>

            <h2 class="center-block text-center">Союз Богов</h2>

            <p class="center-block text-center">Свадьба ведическая, Славянская и Космическая</p>
        </div>
    </div>

    <?php
    $isShowForm = false;
    if (Yii::$app->user->isGuest) {
        if (!isset(Yii::$app->request->cookies['subscribeIsStarted'])) {
            $isShowForm = true;
        }
    } else {
        if (Yii::$app->user->identity->getField('subscribe_is_rod', 0) == 0) {
            $isShowForm = true;
        }
    }

    if ($isShowForm) {
        ?>
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
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formSubscribeName" placeholder="Имя">

                                    <p class="help-block help-block-error hide">Это поле должно быть заполнено
                                        обязательно</p>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <input type="email" class="form-control" id="formSubscribeEmail" placeholder="Email">

                                <p class="help-block help-block-error hide">Это поле должно быть заполнено
                                    обязательно</p>
                            </div>
                            <button type="button" class="btn btn-default" style="width: 100%;" id="formSubscribeSubmit">
                                Подписаться
                            </button>
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
        'image'       => \yii\helpers\Url::to('/images/controller/site/index/0.jpg', true),
        'title'       => 'Агентство Сохранения Рода',
        'description' => 'Агентство, предоставляющее услуги сопровождения души в тонкий мир и воссоединение с Родом Небесным, консалтинговые услуги по действиям в промежуточном состоянии между уходом и приходом на Землю, и здоровые роды на Земле по законам космоса.',
    ]) ?>

</div>
