<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Sale;
use app\models\Goods;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'sale_id',
        'filter' => ArrayHelper::map(Sale::find()->all(),'id','number'),
        'content' => function($data){
            return $data->sale->number;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'goods_id',
        'filter' => ArrayHelper::map(Goods::find()->all(),'id','name'),
        'content' => function($data){
            return $data->goods->name;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'amount',
        'content' => function($data){
            return $data->getAmount();
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
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   