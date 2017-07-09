<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Phone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phone-form">

    <?php $form = ActiveForm::begin(); ?>

    <div id="fieldsPrototype" class="fieldsBlock">
        <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
        <?=Html::ActiveHiddenInput($model, 'client_id')?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
