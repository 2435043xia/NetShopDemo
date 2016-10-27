<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NsGoods */

$this->title = '更新商品: ' . ' ' . $model->g_id;
$this->params['breadcrumbs'][] = ['label' => '商品管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->g_id, 'url' => ['view', 'id' => $model->g_id]];
$this->params['breadcrumbs'][] = '更新商品';
?>
<div class="ns-goods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
