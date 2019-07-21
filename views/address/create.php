<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = 'Create Address';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/user']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['user/view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
