<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal', // Set layout to horizontal
        // 'options' => ['class' => 'form-inline'], // Add form-inline class
        // 'fieldConfig' => [
            // 'horizontalCssClasses' => [
                // 'label' => 'col-sm-2', // Adjust the label column width
                // 'wrapper' => 'col-sm-10', // Adjust the input field column width
                // 'error' => '',
                // 'hint' => '',
            // ],
    // ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'test_datetime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
