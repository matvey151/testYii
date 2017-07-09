<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'first_name',
            'second_name',
            'patronymic',
            [
                'attribute' => 'birthday',
                'format' => ['date', 'php:d.m.Y']
            ],
            [
                'class' => 'yii\grid\DataColumn', // может быть опущено, поскольку является значением по умолчанию
                'value' => function ($data) {
                    $phones = [];
                    foreach ($data->phones as $phone){
                        $phones[] = $phone->phone_number;
                    }
                    return implode(', ', $phones); // $data['name'] для массивов, например, при использовании SqlDataProvider.
                },
                'label' => 'Телефон(ы) клиента'
            ],
            //'phones',
            // 'sex',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
