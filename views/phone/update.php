<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Phone */

$this->title = 'Редактирование телефона';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['client/index']];
$this->params['breadcrumbs'][] = ['label' => $model->client->second_name, 'url' => ['client/view', 'id'=>$model->client_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
