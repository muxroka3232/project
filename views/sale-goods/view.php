<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SaleGoods */
?>
<div class="sale-goods-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sale_id',
            'goods_id',
            'amount',
            'cost',
        ],
    ]) ?>

</div>
