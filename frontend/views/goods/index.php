<?php
use yii\helpers\Html;
$this->title= $classify->c_name . '-商品分类-' .'购物网站';
$this->registerCssFile('css/goods.css');

$this->params['breadcrumbs'][] = ['label' => '浏览商品', 'url' => ['index']];
$this->params['breadcrumbs'][] = $classify->c_name;
?>
<ul class="g_items col-lg-12">
<?php foreach($goods as $good): ?>
    <li class="col-lg-3">
        <div class="g_item">
            <div class="g_img">
                <?php
                if(file_exists('cover/'.$good->g_id)){
                    echo '<a href="'.\yii\helpers\Url::toRoute(['goods/view','g_id' => $good->g_id]).'"><img width="220px" src="cover/'.$good->g_id.'/'.$good->g_id.$good->g_img.'"></a>';
                }else{

                }
                ?>
            </div>
            <div class="g_price">
                <strong><em>¥</em><i><?= $good->g_value?></i></strong>
            </div>
            <div class="g_title">
                <em><?= $good->g_name?></em>
            </div>
            <div class="g_count">
                已卖出<em><?= $good->g_sales ?></em>件
            </div>
        </div>
    </li>
<?php endforeach;?>
</ul>
<?= \yii\widgets\LinkPager::widget([
    'pagination' => $pages,
])?>
