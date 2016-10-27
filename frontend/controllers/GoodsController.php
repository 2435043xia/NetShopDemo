<?php
namespace frontend\controllers;

use backend\models\NsUser;
use common\models\User;
use Faker\Provider\zh_TW\DateTime;
use yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\Session;
use common\models\NsShoplist;
use common\models\NsGoods;
use common\models\NsClassify;
use common\models\NsRegion;

class GoodsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => yii\filters\AccessControl::className(),
                'only' => ['buy','cart'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }
    public function actionIndex($c_id)
    {
        $query = NsGoods::find();
        $classifyQ = NsClassify::find();
        $goods = $query->where(['c_id' => $c_id])->orderBy('g_id desc');
        $classify = $classifyQ->where(['c_id' => $c_id])->one();
        $pages = new Pagination(['totalCount' => $goods->count(),'pageSize' => '10']);
        $model = $goods->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',[
            'goods' => $model,
            'pages' => $pages,
            'classify' => $classify,
        ]);
    }
    public function actionView($g_id)
    {
        $queryGoods = NsGoods::find();
        $queryClassify = NsClassify::find();
        $good = $queryGoods->where(['g_id' => $g_id])->one();
        $classify = $queryClassify->where(['c_id' => $good->c_id])->one();
        return $this->render('view',[
            'good' => $good,
            'classify' => $classify
        ]);
    }
    public function actionBuy($g_id,$g_count)
    {
        if(!Yii::$app->user->isGuest) {
            $model = new NsShoplist();
            $region = NsRegion::find();
            $u_id = Yii::$app->user->identity;
            $good = NsGoods::find()->where(['g_id' => $g_id])->one();
            if ($model->load(Yii::$app->request->post())) {
                    $current_money = $good->g_value * $g_count;
                    $model->buytime = date('y-m-d h:i:s', time());
                    $model->u_id = $u_id->getId();
                    $model->s_count = $g_count;
                    $model->g_id = $g_id;
                    $model->express = null;
                    $model->current_money = $current_money;
                    if (User::findByUsername($u_id->username)->validatePassword($model->surePwd) && $model->save()) {
                        return $this->goHome();
                    }else{
                        Yii::$app->session->setFlash('nomoney', '未知错误');
                    }
                }
            return $this->render('buy', [
                'model' => $model,
                'region' => $region
            ]);
        }else{
            $this->goHome();
        }
    }
    public function actionCart($g_id = 0)
    {
        if(!Yii::$app->user->isGuest) {
            if (!((new Session())->isActive))
                session_start();
            if ($g_id != 0) {
                if (isset($_SESSION[Yii::$app->user->identity->username]['cart'][$g_id])) {
                    $_SESSION[Yii::$app->user->identity->username]['cart'][$g_id]++;
                } else {
                    $_SESSION[Yii::$app->user->identity->username]['cart'][$g_id] = 1;
                }
                $this->redirect(['goods/cart']);
            } else{
                if (!isset($_SESSION[Yii::$app->user->identity->username]['cart']))
                {
                    $_SESSION[Yii::$app->user->identity->username]['cart'] = null;
                }
            }
            $model = NsGoods::find();
            return $this->render('cart', [
                'model' => $model
            ]);
        }else{
            $this->goHome();
        }
    }
    public function actionSession($g_id,$g_count)
    {
        if(!((new Session())->isActive))
            session_start();
        $_SESSION[Yii::$app->user->identity->username]['cart'][$g_id] = $g_count;
    }
    public function actionDelete($g_id)
    {
        if(!((new Session())->isActive))
            session_start();
        unset($_SESSION[Yii::$app->user->identity->username]['cart'][$g_id]);
        if(!isset($_SESSION[Yii::$app->user->identity->username]['cart'][$g_id]))
        {
            return $this->redirect(['goods/cart']);
        }
    }
    public function actionCity($parent_id)
    {
        return json_encode(NsRegion::find()->asArray()->where(['parent_id' => $parent_id])->all());
    }
}