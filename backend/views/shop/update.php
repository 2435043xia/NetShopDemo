<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NsShoplist */

$this->title = '修改订单: ' . ' ' . $model->s_id;
$this->params['breadcrumbs'][] = ['label' => '订单管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->s_id, 'url' => ['view', 'id' => $model->s_id]];
$this->params['breadcrumbs'][] = '更改订单';
?>
<div class="ns-shoplist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
