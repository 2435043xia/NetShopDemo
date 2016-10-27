<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginContent('@app/views/layouts/main-layout.php') ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <div>
        <div class='card-holder'>
        <?php
        $classify = $this->params['classify'];
        $i = 1;
        foreach($classify as $class):
        ?>
            <div class='card-wrapper'>
                <a href=<?= \yii\helpers\Url::toRoute(['goods/index','c_id' => $class->c_id])?>>
                    <div class='card bg-0<?=$i?>'>
                        <span class='card-content'><?= $class->c_name?></span>
                        <div class="index-content"><?= $i.'F'?></div>
                    </div>
                </a>
            </div>
            <?php $i++;if($i>6) break;?>
        <?php endforeach?>
        </div><?= $content ?></div>
</div>
<?php $this->endContent()?>
