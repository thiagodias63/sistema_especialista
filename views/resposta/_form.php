<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resposta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resposta-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'cod_pergunta')->dropDownList(
        ArrayHelper::map($pergunta, 'cod_pergunta', 'desc_pergunta')
    ) ?>

    <?= $form->field($model, 'desc_resposta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reposta_certa')->dropDownList(
        [
            '0' => 'Não',
            '1' => 'Sim'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
