<?php

namespace app\controllers;

use app\models\Product;
use app\models\Request;
use cs\base\BaseController;
use Yii;

class Admin_requestsController extends AdminBaseController
{
    public function actionIndex()
    {
        return $this->render();
    }

    public function actionView($id)
    {
        return $this->render([
            'item' => Request::find($id),
        ]);
    }

}
