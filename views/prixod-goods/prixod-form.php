<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Prixod;
use yii\grid\GridView;

?>

<div class="prixod-form-form">
    <?php $form = ActiveForm::begin(); ?>
        <?php 
            $prixod = Prixod::find()->where(['id' => $model->prixod_id])->one(); 
           
        ?>
    <div class="panel panel-primary">    
    <div class="panel-heading ui-draggable-handle">
        <div class="panel-title">
            <h3 class="box-title"><?= $title ?></h3>
        </div> 
    </div> 
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                     <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Prixod number</th>
                                <th>Date create</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $prixod->number;?></td>
                                <td><?= $prixod->formatDate();?></td>
                           </tr>
                        </tbody>
                    </table>                                
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">       
                    <?= $form->field($model, 'goods_id')->widget(kartik\select2\Select2::classname(), [
                        'data' => $model->getGoodsList(),
                        'options' => ['placeholder' => 'Выберите ...'],
                        'size' => kartik\select2\Select2::SMALL,
                        'pluginOptions' => [
                            'tags' => true,
                            'allowClear' => true,
                        ],
                    ])?>
                </div>
                <div class="col-md-6">       
                    <?= $form->field($model, 'amount')->dropdownList([
                         1 => 'dona',
                         2 => 'kilogramm'
                     ],
                     ['prompt'=>'Select']
                   ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">       
                    <?= $form->field($model,'cost')->textInput(['type'=>'number', 'min'=>0]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model,'count')->textInput(['type'=>'number', 'min'=>0]) ?>
                </div>
            </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-info']) ?>
                            <?= Html::a('Закрыть', ['/prixod/index'], ['class' => 'btn btn-primary ']) ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    
</div>
                                   

