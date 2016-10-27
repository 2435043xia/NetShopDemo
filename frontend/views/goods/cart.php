<?php
use yii\widgets\ListView;
use yii\web\Session;
$this->registerCssFile("css/cart.css");

?>
<ul class="cart row">
    <li class="row">
        <div class="c-title col-lg-3">
            产品图片
        </div>
        <div class="c-title col-lg-5">
            产品名称
        </div>
        <div class="c-title col-lg-1">
            数量
        </div>
        <div class="c-title col-lg-3">
            相关操作
        </div>
    </li>
    <input id="test" type="hidden" value="<?= \yii\helpers\Url::toRoute(['goods/session'])?>">
<?php
if(!((new Session())->isActive))
    session_start();
$carts = $_SESSION[Yii::$app->user->identity->username]['cart'];
for($i=0;$i<count($carts);$i++):
?>
    <?php $good = $model->where(['g_id' => key($carts)])->one();?>
    <?php $count =  $carts[key($carts)];
    ?>
    <li class="row">
        <div class="good-img col-lg-3">
            <img width="100%" src="cover/<?= $good->g_id?>/<?= $good->g_id.$good->g_img?>">
        </div>
        <div class="good-name col-lg-5">
            <a href="<?=\yii\helpers\Url::toRoute(['goods/view','g_id' => $good->g_id]);?>"><?= $good->g_name?></a>
        </div>
        <div class="good-count col-lg-1">
            <input id="<?=key($carts)?>" class="s_count" value="<?=$count?>" maxlength="3" type="text" onchange="change(this)">
        </div>
        <div class="good-action col-lg-3">
            <a class="btn btn-primary" href="<?=\yii\helpers\Url::toRoute(['goods/buy','g_id' => $good->g_id,'g_count' => $count]) ?>">购买</a>
            <a class="glyphicon glyphicon-trash" href="<?=\yii\helpers\Url::toRoute(['goods/delete','g_id' => $good->g_id]);?>"></a>
        </div>
    </li>
<?php next($carts); endfor ?>
</ul>

<script>
    function change(count) {
        var test = $("#test").val();
        $.ajax({
            type: "get",
            url: test,
            data: {g_id: count.id,g_count: count.value},
        });
    }
</script>