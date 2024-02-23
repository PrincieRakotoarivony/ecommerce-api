<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php // echo GridView::widget([
        // 'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        // 'columns' => [
        //     ['class' => 'yii\grid\SerialColumn'],

        //     'id',
        //     'name',
        //     'image',
        //     'price',
        //     'category_id',
            //'test_datetime',
        //     [
       //          'class' => ActionColumn::className(),
      //           'urlCreator' => function ($action, Product $model, $key, $index, $column) {
        //             return Url::toRoute([$action, 'id' => $model->id]);
                //  }
            // ],
        // ],
    // ]); ?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item', // The view file for rendering each item
    'layout' => "{items}", // Specify the layout with the pager
    'options' => ['class' => 'row'],
    'itemOptions' => ['class' => 'col-lg-4 col-md-6 col-sm-12']
]) ?>

<div class="text-center">
    <?= LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]) ?>
</div>

</div>
