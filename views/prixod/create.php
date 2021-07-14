<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use johnitvn\ajaxcrud\CrudAsset; 
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model app\models\Prixod */

	 Pjax::begin(['enablePushState' => false, 'id' => 'crud1-datatable-pjax']);
?>
<div class="prixod-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
<?php Pjax::begin(); ?>    
		
        
	<?php Pjax::end(); ?>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "options" => [
        "tabindex" => false,
    ],
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

