<?php

namespace app\controllers;

use app\models\Product;
use cs\base\BaseController;
use Yii;

class Admin_productsController extends AdminBaseController
{
    public function actionIndex()
    {
        return $this->render([
        ]);
    }

    public function actionAdd()
    {
        $model = new \app\models\Form\Product();
        if ($model->load(Yii::$app->request->post()) && $model->insert()) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render([
                'model' => $model,
            ]);
        }
    }

    public function actionEdit($id)
    {
        $model = \app\models\Form\Product::find($id);
        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render([
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        \app\models\Form\Product::find($id)->delete();

        return self::jsonSuccess();
    }

}
