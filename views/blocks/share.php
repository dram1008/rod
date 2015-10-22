<?php

/** @var $url */
/** @var $image */
/** @var $title */
/** @var $summary */
/** @var $description */

use yii\helpers\Html;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;
use cs\services\Url as csUrl;

$this->registerMetaTag(['name' => 'og:image', 'content' => $image]);
$this->registerMetaTag(['name' => 'og:url', 'content' => $url]);
$this->registerMetaTag(['name' => 'og:title', 'content' => $title]);
$this->registerMetaTag(['name' => 'og:description', 'content' => $description]);

?>

<?php \app\assets\SocialButtons::register($this); ?>

<div class="row" style="padding-bottom: 40px; padding-top: 40px;">
    <div class="col-lg-4">
        <a class="btn btn-block btn-social btn-facebook"
           href="<?= (string)(new csUrl('http://www.facebook.com/sharer.php', [
               'u' => $url,
           ])) ?>" target="_blank">
            <i class="fa fa-facebook"></i> Поделиться в Facebook
        </a>
    </div>
    <div class="col-lg-4">
        <a class="btn btn-block btn-social btn-vk"
           href="<?= (string)(new csUrl('http://vkontakte.ru/share.php', ['url' => $url])) ?>" target="_blank">
            <i class="fa fa-vk"></i> Поделиться в VK
        </a>
    </div>
    <div class="col-lg-4">
        <a class="btn btn-block btn-social btn-odnoklassniki"
           href="<?= (string)(new csUrl('http://www.odnoklassniki.ru/dk', [
               'st._surl' => $url,
               'st.cmd'   => 'addShare',
               'st.s'     => 1
           ])) ?>" target="_blank">
            <i class="fa fa-odnoklassniki"></i> Поделиться в Odnoklassniki
        </a>
    </div>

</div>