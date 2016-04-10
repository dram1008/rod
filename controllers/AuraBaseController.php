<?php

namespace app\controllers;

use app\models\User;
use cs\services\VarDumper;
use cs\web\Exception;
use Yii;
use yii\base\UserException;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\NewsItem;
use app\models\Chenneling;
use cs\base\BaseController;
use yii\web\Response;
use yii\widgets\ActiveForm;

class AuraBaseController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function() {
                            /** @var \app\models\User $user */
                            $user = \Yii::$app->user->identity;
                            VarDumper::dump($user);
                            return $user->hasRole(User::USER_ROLE_ADMIN_AURA);
                        }
                    ],
                ],
            ],
        ];
    }
}
