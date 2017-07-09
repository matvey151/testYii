<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?php
    /**
     * Внимание костыль!
     * TODO разобраться как правильно сделать подобный поиск
     */
    ?>
    <?= $form->field($model, 'second_name')->label('Поиск по телефону или фамилии') ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
