<?php
use app\models\Prixod;
use app\models\PrixodGoods;
use app\models\Sale;
use app\models\SaleGoods;
use app\models\Goods;
use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;

   $start = strtotime(date('Y-m-d'));
   $end = strtotime("+1 day", $start);

   $goods = goods::find()->all();
   $prixodgoods = PrixodGoods::find()
      ->joinWith('goods')
      ->where(['goods.id' => 'goods_id'])
      ->all();
   $prixod = Prixod::find()
      ->where(['between', 'date', date('Y-m-d', $start), date('Y-m-d', $end)])
      ->count();
   $prixod_sum = PrixodGoods::find()
      ->joinWith('prixod')
      ->where(['between', 'prixod.date', date('Y-m-d', $start), date('Y-m-d', $end)])
      ->sum('cost');
   $sale = Sale::find()
      ->where(['between', 'date', date('Y-m-d', $start), date('Y-m-d', $end)])
      ->count();
   $sale_sum = SaleGoods::find()
      ->joinWith('sale')
      ->where(['between', 'sale.date', date('Y-m-d', $start), date('Y-m-d', $end)])
      ->sum('cost');

?>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?= $prixod ?></h3>

        <p>Bugungi kirimlar</p>
      </div>
      <div class="icon">
        <i class="fa fa-cart-plus"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?= $sale ?></h3>

        <p>Bugungi chiqimlar</p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- /.col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?= $prixod_sum ?></h3>
        <p>Kirim summa</p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= $sale_sum ?></h3>

        <p>Chiqim summa</p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- /.col -->
</div>
<?= ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 80,
        'width' => 400
    ],
    'data' => [
        'labels' => ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        'datasets' => [
            [
              'label' => "My First dataset",
              'backgroundColor' => "rgba(179,181,198,0.2)",
              'borderColor' => "rgba(179,181,198,1)",
              'pointBackgroundColor' => "rgba(179,181,198,1)",
              'pointBorderColor' => "#fff",
              'pointHoverBackgroundColor' => "#fff",
              'pointHoverBorderColor' => "rgba(179,181,198,1)",
              'data' => [65, 59, 90, 81, 56, 55, 40],

            ],
            [
              'label' => "My Second dataset",
              'backgroundColor' => "rgba(255,99,132,0.2)",
              'borderColor' => "rgba(255,99,132,1)",
              'pointBackgroundColor' => "rgba(255,99,132,1)",
              'pointBorderColor' => "#CD8F49",
              'pointHoverBackgroundColor' => "#9905D8",
              'pointHoverBorderColor' => "rgba(255,99,132,1)",
              'data' => [28, 48, 40, 19, 96, 27, 100],
            ]
        ]
    ]
  ]);
?>
<div class="panel panel-primary panel-hidden-controls">
  <div class="box-body">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
      <thead>
      <tr role="row">
        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mahsulot</th>
        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kirim</th>
        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Kirim summa</th>
        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Chiqim</th>
        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Chiqim summa</th>
      </tr>
      </thead>
      <tbody>    
        <?php
        // echo "<pre>";
        // print_r($goods);die;
         foreach ($goods as $value) {?>                 
        <tr role="row" class="odd">
          <td class="sorting_1"><?= $value['name']?></td>
          <td>Firefox 1.0</td>
          <td>Win 98+ / OSX.2+</td>
          <td>1.7</td>
          <td>A</td>
        </tr>
      <?php }?>
      </tbody>
    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
  </div>
</div>
