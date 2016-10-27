<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NsUser */

$this->title = 'Create Ns User';
$this->params['breadcrumbs'][] = ['label' => 'Ns Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ns-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
