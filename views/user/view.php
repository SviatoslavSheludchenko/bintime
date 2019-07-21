<?php

use app\models\User;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $model User */

$this->title = $model->login;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'login',
            'password',
            'first_name',
            'last_name',
            'gender',
            ['attribute' => 'date',
                'value' => function ($model) {
                    $date = Yii::$app->formatter->asDatetime($model->date, 'dd-MM-yyyy HH:mm');
                    return $date;
                },
                'label' => 'Creation Date'],
            'email:email',
        ],
    ])
    ?>

    <h2 class="addressTable">Addresses</h2>

    <p>
        <?= Html::a('Add address', ['/address/create/', 'id' => $_GET['id']], ['class' => 'btn btn-success', 'data-method' => "post", 'style' => 'width: 150px;']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataAddress,
        'layout' => "{items}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'postcode',
                'label' => 'Post Code'],
            ['attribute' => 'country',
                'label' => 'Country'],
            ['attribute' => 'city',
                'label' => 'City'],
            ['attribute' => 'street',
                'label' => 'Street'],
            ['attribute' => 'house',
                'label' => 'House'],
            ['attribute' => 'apartment',
                'label' => 'Apartment'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'contentOptions' => ['align' => 'right'],
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/address/update', 'id' => $model->id], [
                                    'data' => [
                                        'method' => 'post',
                                    ]
                        ]);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/address/delete', 'id' => $model->id], [
                                    'data' => [
                                        'method' => 'post',
                                    ]
                        ]);
                    }
                ],
            ],
        ],
    ]);
    ?>

    <?=
    LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
