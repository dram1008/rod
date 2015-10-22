<?php

namespace app\controllers;

use app\models\Form\NewPassword;
use app\models\Form\Request;
use app\models\Log;
use app\models\Product;
use app\models\User;
use cs\base\BaseController;
use cs\web\Exception;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class CabinetController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout'],
                'rules' => [
                    [
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionRequests()
    {
        return $this->render([
            'items' => \app\models\Request::query(['user_id' => \Yii::$app->user->id])->all(),
        ]);
    }

    public function actionProfile()
    {
        $model = \app\models\Form\Profile::find(Yii::$app->user->getId());
        if ($model->load(Yii::$app->request->post()) && ($fields = $model->update())) {
            Yii::$app->user->identity->cacheClear();
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render([
                'model' => $model,
            ]);
        }
    }

}
