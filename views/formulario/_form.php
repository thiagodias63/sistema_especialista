<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Formulario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formulario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'desc_formulario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagnostico_final')->dropDownList(
        ArrayHelper::map($variavel,'cod_variavel','desc_variavel')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
