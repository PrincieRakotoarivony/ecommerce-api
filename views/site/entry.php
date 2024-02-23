<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
?>

<?= $form->field($model, 'nom')->label('Votre Nom') ?>
<?= $form->field($model, 'email')->label('Votre Email') ?>

<div class="form-group">
<?= Html::submitButton('Soumettre', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>