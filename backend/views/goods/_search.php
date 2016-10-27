<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NsGoodsCRUD */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ns-goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'g_id')->textInput()->label('序号') ?>

    <?= $form->field($model, 'g_name')->textInput(['maxlength' => true])->label('商品名称') ?>

    <?= $form->field($model, 'g_content')->widget(\yii\redactor\widgets\Redactor::className(),
        [
            'clientOptions' => [
                'imageManagerJson' => ['/redactor/upload/image-json'],
                'imageUpload' => ['/redactor/upload/image'],
                'lang' => 'zh_cn',
                'plugins' => ['clips', 'fontcolor','imagemanager']
            ]
        ]
    )->label('商品详情') ?>


    <?= $form->field($model, 'g_value')->textInput()->label('商品价格') ?>

    <?= $form->field($model, 'g_sales')->textInput()->label('销售数量') ?>

    <?php // echo $form->field($model, 'c_id') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
