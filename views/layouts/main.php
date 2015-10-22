<?php

/** @var $this \yii\web\View */
/** @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Генератор Теслы Купить, Арендовать, Бестопливный генератор, Вечный двигатель, Диллерская программа, Доставка в любую точку планеты, Сервисное обслуживание']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Генератор Теслы Купить, Арендовать, Бестопливный генератор, Вечный двигатель, Диллерская программа, Доставка в любую точку планеты, Сервисное обслуживание']);
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
    <title><?= Html::encode($this->title) ?> :: Генератор Теслы Купить, Арендовать, Бестопливный генератор, Диллерская
        программа, Доставка в любую точку планеты, Сервисное обслуживание</title>
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
                <a class="navbar-brand" href="/" style="padding: 0px 0px 0px 0px;">
                    <img src="/images/logo.png" height="50">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?= Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'items'   => [
//                        ['label' => 'О проекте', 'url' => ['site/about']],
                        ['label' => 'Продукция', 'url' => ['site/production']],
//                        ['label' => 'Хозяинам домов', 'url' => ['site/house']],
//                        ['label' => 'Промышленное использование', 'url' => ['site/prom']],
                        ['label' => 'Тест драйв', 'url' => ['site/rent']],
                        ['label' => 'Сервис', 'url' => ['site/service']],
                        ['label' => 'Доставка', 'url' => ['site/dostavka']],
                        ['label' => 'Диллерская программа', 'url' => ['site/diller']],
                        ['label' => 'Контакты', 'url' => ['site/contact']],
                    ],
                ]);
                ?>

                <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
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
                                <?= Html::img(Yii::$app->user->identity->getAvatar(), [
                                    'height' => '40px',
                                    'class'  => 'img-circle'
                                ]) ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= \yii\helpers\Url::to(['cabinet/requests']) ?>">Мои заказы</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['cabinet/profile']) ?>">Мой профиль</a></li>

                                <?php if (Yii::$app->user->identity->isAdmin()) { ?>
                                    <li class="divider"></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['admin_subscribe/index']) ?>">Рассылки</a></li>
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
        <p class="pull-left">&copy; Тесла Ген <?= date('Y') ?> &middot;
            <a href="http://www.galaxysss.ru/">Галактический Союз Сил Света</a> &middot;
            <a href="http://www.galaxysss.ru/category/money/425">Progressive Spirit</a> &middot;
            при поддержке Архангела Метатрона и INDRA FAMILY</p>
    </div>
</footer>

<?php $this->endBody() ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter32845652 = new Ya.Metrika({
                    id:32845652,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
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
<noscript><div><img src="https://mc.yandex.ru/watch/32845652" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
<?php $this->endPage() ?>
