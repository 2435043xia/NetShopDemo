<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = '购物网站';
$this->registerCssFile('css/index.css');
?>
<div class="site-index">
    <div>
    <div id="carousel-index" class="test carousel slide" data-role="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-index" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-index" data-slide-to="1"></li>
            <li data-target="#carousel-index" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                1
                <div class="carousel-caption">
                    1
                </div>
            </div>
            <div class="item">
                2
                <div class="carousel-caption">
                    2
                </div>
            </div>
            <div class="item">
                3
                <div class="carousel-caption">
                    3
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-index" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-index" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <div class="container">
            <ul class="floors">
            <?php $i = 0; foreach($classifyAll as $classify):$i++;?>
                <li class="floor">
                    <a class="c_title" role="button" data-toggle="collapse" href="#<?=$classify->c_id?>" aria-expanded="false" aria-controls="goodslist" >
                        <span class="floor-id"><?=$i?>F</span> <?=$classify->c_name?>
                    </a>
                    <div class="collapse in" id="<?=$classify->c_id?>" >
                        <?php
                            $goodsCount = $goods->orderBy("g_id desc")->where(['c_id' => $classify->c_id])->count();
                        $goodsAll =  $goods->orderBy("g_id desc")->where(['c_id' => $classify->c_id])->all();
                        if($goodsCount == 0){
                            echo '<span>暂无商品</span>';
                        }
                        ?>
                        <ul class="floor-goods">
                        <?php foreach($goodsAll as $good): ?>
                            <li class="good col-lg-2">
                                <div class="g_img">
                                    <?php
                                    if(file_exists('cover/'.$good->g_id)){
                                        echo '<a href="'.\yii\helpers\Url::toRoute(['goods/view','g_id' => $good->g_id]).'"><img width="100%" src="cover/'.$good->g_id.'/'.$good->g_id.$good->g_img.'"></a>';
                                    }
                                    ?>
                                </div>
                                <div class="g_price">
                                    <strong><em>¥</em><i><?= $good->g_value?></i></strong>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
            <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>