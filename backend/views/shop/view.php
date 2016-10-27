<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NsShoplist */

$this->title = $model->s_id;
$this->params['breadcrumbs'][] = ['label' => 'Ns Shoplists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ns-shoplist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->s_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('修改', ['delete', 'id' => $model->s_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定删除这个吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            's_id',
            'current_money',
            'express',
            'buytime',
            's_addr',
            's_username',
            's_phone',
            'u_id',
            'g_id',
        ],
    ]) ?>

</div>
