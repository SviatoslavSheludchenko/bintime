<?php

use yii\helpers\Html;

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-create">

    <h2><?= Html::encode($this->title) ?></h2>
    <hr style="width: 100%; color: black; height: 1px; background-color:black;" />

    <?=
    $this->render('_double_form', [
        'user' => $user,
        'address' => $address
    ])
    ?>

</div>
