<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pergunta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pergunta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cod_formulario')->dropDownList(
        ArrayHelper::map($formulario, 'cod_formulario', 'desc_formulario')
    ) ?>

    <?= $form->field($model, 'cod_variavel')->dropDownList(
        ArrayHelper::map($variavel, 'cod_variavel', 'desc_variavel')
    ) ?>

    <?= $form->field($model, 'desc_pergunta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ordem')->textInput() ?>

    <?= $form->field($model, 'proximo_no')->dropDownList(
        [
            '0'=> 'E', 
            '1'=> 'Ou', 
        ]
        ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
