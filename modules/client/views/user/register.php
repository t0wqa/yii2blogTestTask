<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    <div class="field">
        <label class="label">Имя</label>
        <div class="control">
            <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'class' => 'input']) ?>
        </div>
    </div>
    <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <?= $form->field($model, 'email')->textInput(['class' => 'input']) ?>
        </div>
    </div>
    <div class="field">
        <label class="label">Пароль</label>
        <div class="control">
            <?= $form->field($model, 'password')->passwordInput(['class' => 'input']) ?>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <?= Html::submitButton('Signup', ['class' => 'button is-link', 'name' => 'signup-button']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>