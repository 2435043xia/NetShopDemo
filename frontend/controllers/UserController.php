<?php
namespace frontend\controllers;
use yii;
use yii\web\Controller;
use backend\models\NsUser;
use common\models\NsShoplist;
use yii\filters\AccessControl;
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }
    public function actionIndex()
    {
        $model = NsUser::find()->where(['id' => Yii::$app->user->getId()])->one();
        $shoplist = NsShoplist::find();
        return $this->render('index', [
            'model' => $model,
            'shoplist' => $shoplist
        ]);
    }
    public function actionCharge()
    {
        $model = NsUser::find()->where(['id' => Yii::$app->user->getId()])->one();
        if ($model->load(Yii::$app->request->post())) {
            $save = NsUser::find()->where(['id' => Yii::$app->user->getId()])->one();
            $save->money = $model->money;
            if ($save->save()) {
                $this->goBack();
            }
        }
        return $this->render('charge', [
            'model' => $model
        ]);
    }
}