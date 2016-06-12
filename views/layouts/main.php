<?php

/** @var $this \yii\web\View */
/** @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Кродирование']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Кродирование']);
$this->registerMetaTag(['name' => 'title', 'content' => $this->title]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='yandex-verification' content='6721c497dd2fba14'/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> :: Агентство Сохранения Рода</title>
    <link rel="shortcut icon" href="/images/ico.png">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" style="padding: 5px 0px 5px 10px;">
                    <img src="/images/logo2.png" height="40">
                </a>
                <a class="navbar-brand" href="/" style="padding: 5px 0px 5px 30px;">
                        <img src="/images/logo3.png" height="40">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?= Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'items'   => [
                        ['label' => 'О нас', 'url' => ['site/about']],
                        ['label' => 'Статьи', 'url' => ['site/articles']],
                        ['label' => 'Услуги', 'items' => [
                            ['label' => 'Уход', 'url' => ['site/out']],
                            ['label' => 'Переход', 'url' => ['site/trasfere']],
                            ['label' => 'Приход', 'url' => ['site/in']],
                        ]],
                        ['label' => 'Мастера', 'url' => ['masters/index']],
                        ['label' => 'Сотрудничество', 'url' => ['site/diller']],
                        ['label' => 'Контакты', 'url' => ['site/contact']],
                    ],
                ]);
                ?>

                <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <?php
                            /** @var \app\models\User $u */
                            $u = Yii::$app->user->identity;
                            ?>
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <a
                                    href="<?= \yii\helpers\Url::to(['site/login'])?>"
                                    style="padding: 5px 10px 5px 10px;"
                                    >
                                <?= Html::img('/images/RM_Symbol_Blue.png', [
                                    'height' => '40px',
                                    'class'  => 'img-circle'
                                ]) ?>
                                    </a>
                            <?php } else { ?>
                            <a
                                href="#"
                                class="dropdown-toggle"
                                data-toggle="dropdown"
                                aria-expanded="false"
                                role="button"
                                style="padding: 5px 10px 5px 10px;"
                                >
                                <?= Html::img($u->getAvatar(), [
                                    'height' => '40px',
                                    'class'  => 'img-circle'
                                ]) ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= \yii\helpers\Url::to(['cabinet/profile']) ?>">Мой профиль</a></li>

                                <?php if ($u->isAdmin()) { ?>
                                    <li class="divider"></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['admin_subscribe/index']) ?>">Рассылки</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['admin_article/index']) ?>">Статьи</a></li>
                                <?php } ?>
                                <?php if ($u->hasRole(\app\models\User::USER_ROLE_ADMIN_AURA)) { ?>
                                    <li><a href="/admin/certificates">Сертификаты</a></li>
                                <?php } ?>

                                <li class="divider"></li>

                                <li><a href="<?= \yii\helpers\Url::to(['site/logout']) ?>" data-method="post"><i
                                            class="glyphicon glyphicon-off" style="padding-right: 5px;"></i>Выйти</a>
                                </li>
                            </ul>
                            <?php } ?>
                        </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="container">
        <?= $content ?>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="modalInfo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Информация</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left" style="font-size: 90%;">&copy; Агентство Сохранения Рода <?= date('Y') ?> &middot;
            <a href="http://www.galaxysss.ru/">Галактический Союз Сил Света</a> &middot;
            <a href="http://www.galaxysss.ru/category/money/425">Progressive Spirit</a> &middot;
            при поддержке Владык Кармы и Хранителей Судьбы и при участии <a href="http://www.galaxysss.ru/category/study/171" target="_blank">Академии Родоведения</a></p>
    </div>
</footer>

<?php $this->endBody() ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter33868184 = new Ya.Metrika({
                    id:33868184,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/33868184" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
<?php $this->endPage() ?>
