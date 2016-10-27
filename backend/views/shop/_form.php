<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NsShoplist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ns-shoplist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 's_id')->textInput() ?>

    <?= $form->field($model, 'current_money')->textInput() ?>

    <?= $form->field($model, 'express')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buytime')->textInput() ?>

    <?= $form->field($model, 's_addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_username')->textInput() ?>

    <?= $form->field($model, 's_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_id')->textInput() ?>

    <?= $form->field($model, 'g_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '确定创建' : '确定修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
