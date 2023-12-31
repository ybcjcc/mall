<?php


namespace app\modules\mch\controllers\contact;



use app\modules\mch\controllers\Controller;
use app\modules\mch\models\contact\IndexForm;

class IndexController extends Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->request->isAjax) {
            if (\Yii::$app->request->isPost) {
                $form = new IndexForm();
                $form->attributes = \Yii::$app->request->post();
                $form->store = $this->store;
                $res = $form->save();
                return $this->asJson($res);
            } else {
                $form = new IndexForm();
                $form->store = $this->store;
                $res = $form->search();
                return $this->asJson($res);
            }
        }
        return $this->render('index');
    }

    public function actionResetToken()
    {
        $form = new IndexForm();
        $form->store = $this->store;
        $res = $form->resetToken();
        return $this->asJson($res);
    }
}
