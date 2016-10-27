<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NsShoplistCRUD */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ns-shoplist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 's_id') ?>

    <?= $form->field($model, 'current_money') ?>

    <?= $form->field($model, 'express') ?>

    <?= $form->field($model, 'buytime') ?>

    <?= $form->field($model, 's_addr') ?>

    <?php // echo $form->field($model, 's_username') ?>

    <?php // echo $form->field($model, 's_phone') ?>

    <?php // echo $form->field($model, 'u_id') ?>

    <?php // echo $form->field($model, 'g_id') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
