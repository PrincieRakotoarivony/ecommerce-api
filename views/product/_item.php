<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $model */
?>

<div class="card" style="width: 100%;">
<?= Html::img('/' . $model->image, ['alt' => 'Uploaded Image', 'class' => 'card-img-top']); ?>
  <div class="card-body">
    <h5 class="card-title"><?= Html::encode($model->name) ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>