<?php
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Html;

?>
<div class="groups-form">
  <?php $form = ActiveForm::begin(['options' => ['method' => 'get', 'autocomplete'=>"off",'action'=>'index' ]]); ?>
      <div class="row">
          <div class="col-md-4">
              <label>From date</label>
              <?= kartik\date\DatePicker::widget([
                  'name' => 'from_date',
                  'value' => isset($_POST['from_date']) ? $_POST['from_date'] : '',
                  'options' => [ 'placeholder' => 'Выберите'],
                  'size' => kartik\select2\Select2::SMALL,
                  'layout' => '{picker}{input}',
                  'pluginOptions' => [
                      'autoclose'=>true,
                      'startView'=>'year',
                      'format' => 'yyyy-m-d',
                      'todayHighlight' => true,
                  ]
              ]);?>

          </div>
          <div class="col-md-4">
              <label>To date</label>
              <?= kartik\date\DatePicker::widget([
                  'name' => 'to_date',
                  'value' => isset($_POST['to_date'])? $_POST['to_date']  :'',
                  'options' => [ 'placeholder' => 'Выберите'],
                  'size' => kartik\select2\Select2::SMALL,
                  'layout' => '{picker}{input}',
                  'pluginOptions' => [
                      'autoclose'=>true,
                      'startView'=>'year',
                      'format' => 'yyyy-m-d',
                      'todayHighlight' => true,
                  ]
              ]);?>
          </div>
          <div class="col-md-1">
              <label>.</label>
              <div class="form-group">
                  <?= Html::submitButton("Поиск <i class='fa fa-search'></i>", ['class' => 'btn btn-primary']) ?>
              </div>
          </div>
      </div>
  <?php ActiveForm::end(); ?>
</div>
