<?php
$this->registerCssFile("css/goods.css");

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
?>
<div>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'buy-form']); ?>

            <?= $form->field($model, 's_addr') ?>
<!--            <a class="address" data-toggle="modal" data-target="#addrs">添加收货地址</a>-->
<!--            --><?php //Modal::begin([
//                'id' => 'addrs',
//                'header' => '添加收货地址',
//            ])?>
<!--            <select id="region">-->
<!--                --><?php
//                $provinces = $region->where(['parent_id' => '1'])->all();
//                foreach($provinces as $province)
//                {
//                    echo "<option value='".$province->REGION_ID."'>". $province->REGION_NAME ."</option>";
//                }
//                ?>
<!--            --><?php //Modal::end()?>

            <?= $form->field($model, 's_username') ?>

            <?= $form->field($model, 's_phone') ?>

            <?= $form->field($model, 'surePwd')->passwordInput() ?>

            <div class="form-group">
                <div class="alert" role="alert"><?= Yii::$app->session->getFlash('nomoney')?></div>
                <?= Html::submitButton('确定购买', ['class' => 'btn btn-primary', 'name' => 'buy']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script>
    $("#region").bind("change",function () {
        var selected = $(this);
        $.ajax({
            url: '<?= \yii\helpers\Url::toRoute(['/goods/city'])?>',
            type: 'get',
            data: {'parent_id': $(this).val()},
            success: function (data) {
                selected.next().append("<option>请选择<option>")
                var jsondata = $.parseJSON(data)
                for(var temp in jsondata)
                {
                    selected.next().append("<option value='"+jsondata[temp]["REGION_ID"]+"'>"+ jsondata[temp]["REGION_NAME"] +"</option>")
                }
            }
        })
    });
</script>