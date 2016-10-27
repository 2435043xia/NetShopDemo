<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NsGoods */

$this->title = '创建新商品';
$this->params['breadcrumbs'][] = ['label' => '商品管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ns-goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
