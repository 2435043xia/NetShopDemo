<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = '充值账户';
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <h4>现有金额：<?= $model->money?></h4>
            <?php $form = ActiveForm::begin()?>

            <?= $form->field($model,'money',['inputOptions' => ['value' => '0']])->label("充值金额")?>

            <?= Html::submitButton('确定充值',['class' => 'btn btn-primary', 'name' => 'charge-button'])?>

            <?php ActiveForm::end()?>
        </div>
    </div>
</div>
