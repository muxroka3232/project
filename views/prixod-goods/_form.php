<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SaleGoods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prixod-goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prixod_id')->widget(kartik\select2\Select2::classname(), [
        'data' => $model->getPrixodList(),
        'options' => ['placeholder' => 'Выберите ...'],
        'size' => kartik\select2\Select2::SMALL,
        'pluginOptions' => [
            'tags' => true,
            'allowClear' => true,
        ],
    ])?>

    <?= $form->field($model, 'goods_id')->widget(kartik\select2\Select2::classname(), [
        'data' => $model->getGoodsList(),
        'options' => ['placeholder' => 'Выберите ...'],
        'size' => kartik\select2\Select2::SMALL,
        'pluginOptions' => [
            'tags' => true,
            'allowClear' => true,
        ],
    ])?>

    <?= $form->field($model, 'amount')->dropdownList([
         1 => 'dona',
         2 => 'kilogramm'
         ],
         ['prompt'=>'Select']
    ); ?>

    <?= $form->field($model,'cost')->textInput(['type'=>'number', 'min'=>0]) ?>
    
    <?= $form->field($model,'count')->textInput(['type'=>'number', 'min'=>0]) ?>

  
    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
