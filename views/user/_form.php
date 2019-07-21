<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

$genders = User::listGenders();
?>

<div class="user-form address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList($genders) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => 'width: 150px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
