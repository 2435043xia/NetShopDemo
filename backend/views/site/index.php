<?php

/* @var $this yii\web\View */

$this->title = '管理首页';
?>
<div class="site-index">
    <div class="col-lg-3">
        <dl class="admin-menu">
            <dt>管理列表</dt>
            <dd>栏目管理</dd>
            <dd>商品管理</dd>
            <dd>优惠活动</dd>
            <?php
            if(Yii::$app->user->identity->role == 30)
                echo "<dd>用户管理</dd>";
            ?>
        </dl>
    </div>
    <div class="col-lg-9">
        <div></div>
    </div>
</div>
