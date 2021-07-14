<div class="prixod-goods-create">
    <?= $this->render('prixod-form', [
        'model' => $model,
    ]) ?>
</div>
<?= $this->render('prixod',[
 	'searchModel'=>$searchModel,
    'dataProvider'=>$dataProvider,
])?>
