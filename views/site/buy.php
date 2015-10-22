<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model cs\base\BaseForm */
/* @var $id int идентификатор генератора */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Заказ генератора';
$this->params['breadcrumbs'][] = $this->title;

$item = \app\models\Product::find($id)->getFields();

?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Благодарим вас за заказ.
        </div>

    <?php else: ?>


        <div class="row">
            <div class="col-lg-4">
                <h3><?= $item['name'] ?></h3>
                <a href="<?= \yii\helpers\Url::to(['production_item', 'id' => $item['id']]) ?>">
                    <img src="<?= $item['image'] ?>" width="100%" class="thumbnail"/>
                </a>
                <p><span style="font-size: 400%;"><?= $item['kvt'] ?></span> кВт, <span class="label label-default">220 В</span>
                </p>
            </div>
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin([
                    'id'                   => 'contact-form',
                    'enableAjaxValidation' => true,
                ]); ?>
                <input type="hidden" name="<?= $model->formName()?>[product_id]" value="<?= $id ?>">
                <?php if (Yii::$app->user->isGuest) { ?>
                    <?= $model->field($form, 'name') ?>
                    <?= $model->field($form, 'email') ?>
                    <?= $model->field($form, 'phone') ?>
                <?php } else { ?>
                    <p class="label label-success" style="margin-bottom: 40px">Вы уже авторизованы</p>
                    <hr>
                <?php } ?>
                <?= $model->field($form, 'point') ?>
                <?= $model->field($form, 'comment')->textarea(['rows' => 20]) ?>

                <hr>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', [
                        'class' => 'btn btn-primary',
                        'name'  => 'contact-button',
                        'style' => 'width:100%',
                    ]) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

    <?php endif; ?>

</div>
