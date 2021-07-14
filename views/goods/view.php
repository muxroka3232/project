<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */
?>
<div class="goods-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kod',
            'name',
        ],
    ]) ?>

</div>
