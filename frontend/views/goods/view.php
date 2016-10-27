<?php
$this->title = $good->g_name;
$this->params['breadcrumbs'][] = ['label' => '浏览商品', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $classify->c_name, 'url' => ['goods/index','c_id' => $classify->c_id]];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('css/good-view.css');
?>
<div class="goods-view">
    <div class="g-header row">
        <div class="main-img">
            <img width="350px" src="cover/<?= $good->g_id.'/'.$good->g_id.$good->g_img?>">
        </div>
        <div class="buy-main col-lg-6">
            <div class="m-title"><h3><?= $good->g_name?></h3></div>
            <div class="ano-title"></div>
            <div class="g_price">
                <b>惊 爆 价：</b><strong><em>¥</em><i><?= $good->g_value?></i></strong>
            </div>
            <div class="buy">
                <a href="<?=\yii\helpers\Url::toRoute(['goods/buy','g_id' => $good->g_id,'g_count' => 1]) ?>" type="button" class="btn btn-primary">购买</a>
                <a href="<?=\yii\helpers\Url::toRoute(['goods/cart','g_id' => $good->g_id]) ?>" type="button" class="btn">加入购物车</a>
            </div>
        </div>
        <div class="comment">
            相关产品
        </div>
    </div>
    <div class="row g-content">
        <div class="title"><h1>商品详情</h1></div>
        <div><?=$good->g_content?></div>
    </div>
</div>
