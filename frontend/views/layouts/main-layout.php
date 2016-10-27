<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
<body>
<?php $this->beginBody() ?>

    <div class="wrap">
<?php
NavBar::begin([
    'brandLabel' => '夏浩然的购物网站',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-fixed-top navColor',
    ],
]);
$menuItems = [
    ['label' => '首页', 'url' => ['/site/index']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => '登陆', 'url' => ['/site/login']];
} else {
    $menuItems[] = ['label' => '个人中心','url' => ['/user/index']];
    $menuItems[] = ['label' => '购物车','url' => ['/goods/cart']];
    $menuItems[] = [
        'label' => '登出 (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => ['data-method' => 'post']
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>
<?= $content?>
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy;夏浩然的购物网站 <?= date('Y') ?></p>

                <p class="pull-right"></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
