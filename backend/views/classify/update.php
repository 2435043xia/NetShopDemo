<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NsClassify */

$this->title = '修改栏目 序号: ' . ' ' . $model->c_id;
$this->params['breadcrumbs'][] = ['label' => '栏目管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->c_id, 'url' => ['view', 'id' => $model->c_id]];
$this->params['breadcrumbs'][] = '修改栏目';
?>
<div class="ns-classify-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
