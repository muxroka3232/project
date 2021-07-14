<div class="sale-goods-create">
    <?= $this->render('sale-form', [
        'model' => $model,
    ]) ?>
</div>
<?= $this->render('sale',[
 	'searchModel'=>$searchModel,
    'dataProvider'=>$dataProvider,
])?>
