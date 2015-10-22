<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model cs\base\BaseForm */
/* @var $id int идентификатор генератора */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Подтверждение email и вход в личный кабинет';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-contact">
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Вы успешно установили пароль.
        </div>

    <?php else: ?>


        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
                'id' => 'contact-form',
                'enableAjaxValidation' => true,
            ]); ?>
            <?= $form->field($model, 'password1')->label('Пароль')->passwordInput() ?>
            <?= $form->field($model, 'password2')->label('Пароль')->passwordInput() ?>

            <hr>
            <div class="form-group">
                <?= Html::submitButton('Установить', [
                    'class' => 'btn btn-primary',
                    'name'  => 'contact-button',
                    'style' => 'width:100%',
                ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    <?php endif; ?>

</div>
