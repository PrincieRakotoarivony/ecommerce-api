<?php
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map($categories, 'id', 'name'),
        ['prompt' => 'Sélectionner une catégorie']
    ) ?>

    <?= $form->field($model, 'test_datetime')->widget(DateTimePicker::class, [
        'options' => ['placeholder' => 'Sélectionnez la date et l\'heure'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd hh:ii',
            'todayHighlight' => true,
            'autoclose' => true,
        ],
    ]); ?>

    <?= $form->field($model, 'image_file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
