<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;

$articles=\app\models\Product::find()->orderBy(['data'=>SORT_DESC])->limit(5)->all();
$items=[];

foreach ($articles as $article){
    $items[]="<div class='bg-dark m-2 p-2 d-flex flex-column justify-content-center'>
    <h1 class='text-primary text-center m-2'>{$article->name}</h1>
    <img class='m-auto w-50' src='{$article->image}' alt='photo'/></div>";
}
echo yii\bootstrap5\Carousel::widget(['items'=>$items]);

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
