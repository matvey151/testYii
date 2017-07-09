<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->second_name;
?>
<div class="client-view">

    <h1><?= Html::encode($model->second_name) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'second_name',
            'patronymic',
            [
                'attribute' => 'birthday',
                'format' => ['date', 'php:d.m.Y']
            ],
            [
                'attribute' => 'sex',
                'value' => function ($data) {
                    $emumSex = [
                        'male' => 'Мужской',
                        'female' => 'Женский'
                    ];
                    return $emumSex[$data->sex];
                },
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d.m.Y H:i:s']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:d.m.Y H:i:s']
            ]
        ],
    ]) ?>

    <h2>Телефоны клиента</h2>
    <p>
        <?= Html::a('Добавить телефон', ['phone/create', 'client_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>
    <table id="w0" class="table table-striped table-bordered detail-view">
        <thead>
        <tr>
            <th>#</th>
            <th>Номер телефона</th>
            <th class="action-column">&nbsp;</th>
        </tr>
        </thead>
        <?php foreach ($model->phones as $key => $phone): ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $phone->phone_number ?></td>
                <td>
                    <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['phone/update', 'id' => $phone->id]) ?>
                    <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['phone/delete', 'id' => $phone->id], [
                        'data' => [
                            'confirm' => 'Точно удалить?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
