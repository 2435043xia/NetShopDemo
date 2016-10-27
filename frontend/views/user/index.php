<?php
use yii\helpers\Html;
$this->title = "个人中心";
$this->registerCssFile('css/user.css');
?>

<div class="left-nav col-lg-3">
    nav
</div>
<div class="user-main col-lg-9">
    <div class="row">
        <img class="avatar" src="cover/1/1.jpg"/>
    </div>
    <div class="row name">
        <?= $model->username ?>
    </div>
    <div class="row detail">
        <a class="money col-lg-3">
            <p>可用余额</p>
            <p><?= $model->money?></p>
        </a>
        <a class="bought col-lg-3">
            <p>已买到的商品</p>
            <p><?= $shoplist->where(['u_id' => $model->id])->count()?></p>
        </a>
        <a class="comment">
            <p>待评论的商品</p>
            <p><?= ?></p>
        </a>
    </div>
</div>
