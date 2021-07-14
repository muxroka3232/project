<?php
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

?>
<?=GridView::widget([ 
    'id'=>'crud-datatable',
    'dataProvider' => $model->getPrixodList($model->id),
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '30px',
        ],
        [
            'attribute'=>'goods_id',
            'content' => function($data){
                return $data->goods->name;
            }
        ],
        [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'cost',
        ],
        [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'count',
        ],
        [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'amount',
            'content' => function($data){
                return $data->getAmount();
            }
        ],
        [
            'class'    => 'kartik\grid\ActionColumn',
            'template' => ' ',
        ]
    ],
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
])?>
