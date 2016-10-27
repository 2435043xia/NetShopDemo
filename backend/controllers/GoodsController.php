<?php

namespace backend\controllers;

use Yii;
use common\models\NsGoods;
use backend\models\NsGoodsCRUD;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GoodsController implements the CRUD actions for NsGoods model.
 */
class GoodsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all NsGoods models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NsGoodsCRUD();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NsGoods model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NsGoods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NsGoods();
        $model->g_image = UploadedFile::getInstance($model,'g_image');

        if ($model->load(Yii::$app->request->post()) && $model->g_image && $model->validate() && $model->save()) {
            if(!file_exists(__DIR__ . '/../../frontend/web/cover/'.$model->g_id)) {
                mkdir(__DIR__ . '/../../frontend/web/cover/' . $model->g_id);
            }
            try{$model->g_image->saveAs(__DIR__ . '/../../frontend/web/cover/'.$model->g_id.'/'.$model->g_id.'.'.substr(strrchr($model->g_image->name, '.'), 1));}
            catch(Exception $e)
            {
            }
            return $this->redirect(['view', 'id' => $model->g_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NsGoods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->g_image = UploadedFile::getInstance($model,'g_image');
        if ($model->load(Yii::$app->request->post())&& $model->g_image && $model->validate() && $model->save()) {
            if (!file_exists(__DIR__ . '/../../frontend/web/cover/' . $model->g_id)) {
                mkdir(__DIR__ . '/../../frontend/web/cover/' . $model->g_id);
            }
            try {
                unlink(__DIR__ . '/../../frontend/web/cover/' . $model->g_id . '/' . $model->g_id . $model->g_img);
                $model->g_image->saveAs(__DIR__ . '/../../frontend/web/cover/' . $model->g_id . '/' . $model->g_id . '.' . substr(strrchr($model->g_image->name, '.'), 1));
            } catch (Exception $e) {
            }
            return $this->redirect(['view', 'id' => $model->g_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NsGoods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NsGoods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NsGoods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NsGoods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
