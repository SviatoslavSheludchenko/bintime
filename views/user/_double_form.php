<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

$genders = User::listGenders();
?>

<div class="user-form address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'gender')->dropDownList($genders) ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>

    <hr style="width: 100%; color: black; height: 1px; background-color:black;" />

    <h2>User's Adress</h2>

    <hr style="width: 100%; color: black; height: 1px; background-color:black;" />

    <?= $form->field($address, 'postcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'house')->textInput() ?>

    <?= $form->field($address, 'apartment')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => 'width: 150px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
