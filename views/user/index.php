<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success', 'data-method' => "post", 'style' => 'width: 150px;']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'login',
                'label' => 'Login'],
            ['attribute' => 'email',
                'label' => 'Email'],
            ['attribute' => 'first_name',
                'label' => 'First Name'],
            ['attribute' => 'last_name',
                'label' => 'Last Name'],
            ['attribute' => 'gender',
                'label' => 'Gender'],
            ['attribute' => 'date',
                'value' => function ($model) {

                    $date = Yii::$app->formatter->asDatetime($model->date, 'dd-MM-yyyy HH:mm');
                    return $date;
                },
                'label' => 'Creation Date'],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['align' => 'right'],
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], [
                                    'data' => [
                                        'method' => 'post',
                                    ]
                        ]);
                    }
                ]],
        ],
    ]);
    ?>


</div>
