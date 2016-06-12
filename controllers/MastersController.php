<?php

namespace app\controllers;

use app\models\Article;
use app\models\Form\NewPassword;
use app\models\Form\Request;
use app\models\Log;
use app\models\User;
use app\services\LogReader;
use cs\base\BaseController;
use cs\web\Exception;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Response;

class MastersController extends BaseController
{

    public function actionIndex()
    {
        return $this->render();
    }

    public function actionItem($master)
    {
        return $this->render('item/'. $master);
    }
}
