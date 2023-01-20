<?php

use app\models\Cart;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CartSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Carts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            'product_id',
            ['attribute'=>'Товар', 'value'=> function($data){return $data->getProduct()->One()->name;}],
            ['attribute'=>'Количество', 'value'=> function($data){return $data->count;}],
            ['attribute'=>'Управление', 'format'=>'html' , 'value'=>function($data){ return;}],
            //'count',
            //echo "<button class='btn btn-secondary' onclick='add_product2({$data->getProduct()->One()->id},1)'>+</button><tr>  </tr><button class='btn btn-secondary' onclick='add_product2({$data->getProduct()->One()->id},-1)'>-</button>";
           // ['attribute'=>'Управление', 'format'=>'html', 'value'=>function($data){return <button class='btn btn-outline-primary mr-3' onclick='update(this.parentNode.parentNode.rowIndex, 8, 1)'>+</button>}
           // <button class='btn btn-outline-primary mr-3' onclick='update(this.parentNode.parentNode.rowIndex, 8, 1)'>+</button>
            //<button class='btn btn-outline-primary mr-3' onclick='update(this.parentNode.parentNode.rowIndex, 8, -1)'>-</button>

        ],
    ]);
    ?>
    <script>

       let table=document.getElementsByTagName('table')[0];
       for(var i=2; i<table.rows.length; i++)
       {
           let cell=table.rows[i].cells[4];
           cell.innerHTML="<button class='btn btn-outline-primary mr-3' onclick='test(this.parentNode.parentNode.cells[1].innerText*1)'>+</button><tr>       </tr>" +
               "<button class='btn btn-outline-primary mr-3' onclick='add_product2({$data->getProduct()->One()->id},-1)'>-</button>";
       }
    </script>

</div>
