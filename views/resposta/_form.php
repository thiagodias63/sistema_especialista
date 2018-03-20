<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resposta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resposta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reposta_certa')->textInput() ?>

    <?= $form->field($model, 'cod_variavel')->textInput() ?>

    <?= $form->field($model, 'cod_pergunta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
