<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PrixodGoods */
?>
<div class="prixod-goods-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'prixod.number',
            'goods.name',
            [
                'attribute' => 'amount',
                'format'=>'raw', 
                'value' => function($model){
                    return $model->getAmount();
                }
            ],
            'cost',
            'count',
        ],
    ]) ?>

</div>
