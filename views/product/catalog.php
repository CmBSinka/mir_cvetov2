<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;


$categories=\app\models\Category::find()->all();



echo "    <h1>Каталог товаров</h1>
  <style>
   .gty {
    border: 1px solid red;
    padding: 10px;
   }
  </style>
  <div class='gty'>
  <h2>Сортировка</h2>
  <div>
  <p><a href='https://pr-yanulyavichus.сделай.site/product/catalog?sort=price'>↑</a>По цене<a href='https://pr-yanulyavichus.сделай.site/product/catalog?sort=-price'>↓</a></p>
    <p><a href='https://pr-yanulyavichus.сделай.site/product/catalog?sort=name'>↑</a>По имени<a href='https://pr-yanulyavichus.сделай.site/product/catalog?sort=-name'>↓</a></p>
    <p><a href='https://pr-yanulyavichus.сделай.site/product/catalog?sort=country'>↑</a>По стране<a href='https://pr-yanulyavichus.сделай.site/product/catalog?sort=-country'>↓</a></p>
  </div>
  
  </div>
";?>
<div class="dropdown">


    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Выберите категорию
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <?php
            $items='';
            foreach ($categories as $category) {
                $items .= " <li><a class='dropdown-item' href='/product/catalog?ProductSearch[category_id]={$category->id}'>$category->categoria</a></li>";
            }
            echo $items;

            ?>
        </ul>
    </div>

</div>
<?php $products=$dataProvider->getModels();
echo "<div class='d-flex flex-row flex-wrap justify-content-start border border-1 border-info align-items-end'>";
foreach ($products as $product){
if ($product->count>0) {
    echo "<div class='card m-1' style='width: 22%; min-width: 300px;'>
    <a href='/product/view?id={$product->id}'><img src='{$product->image}'class='card-img-top' style='max-height: 300px;' alt='image'></a>
<div class='card-body'>
<h5 class='card-title'>{$product->name}</h5>
<p class='text-danger'>{$product->price} руб</p>";
echo (Yii::$app->user->isGuest ? "<a href='/product/view?id={$product->id}' class='btn btn-primary'>Просмотр товара</a>": "<p onclick='add_product({$product->id},1)' class='btn btn-primary'>Добавить в корзину</p>");
    echo "</div>
</div>";}
}
echo "</div>";
?>
<div class="product-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




</div>
