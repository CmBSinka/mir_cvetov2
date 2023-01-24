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


    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">Товар</th>
            <th scope="col">Цена</th>
            <th scope="col">Количество</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $carts=\app\models\Cart::find()->where(['user_id'=>Yii::$app->user->identity->id])->all();
        $product = \app\models\Product::find();
        foreach ($carts as $cart){
            echo "<tr>";
            echo "<td>" .  $cart->getProduct()->one()->name ."</td>";
            echo "<td>" .  $cart->getProduct()->one()->price ."</td>";
            echo "<td>" .  $cart->count ."</td>";
            ?> <td>
                <button class="btn btn-primary" onclick="add_product(<?=$cart->product_id?>,1)">+</button>
                <button  class="btn btn-danger" onclick="add_product(<?=$cart->product_id?>,-1)">-</button>
            </td>
            <?php
            echo "</tr>";

        }
        $total=0;
        // ['attribute'=>'Товар', 'value'=> function($data){return $data->getProduct()->One()->name;}],
        //$total=$cart->count;
        ?>
        </tbody>
    </table>


    <a href="../order/create"><button class="btn btn-primary">Оформить заказа</button></a>
