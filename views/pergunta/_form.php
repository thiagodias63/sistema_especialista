<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pergunta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pergunta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ordem')->textInput() ?>

    <?= $form->field($model, 'proximo_no')->textInput() ?>

    <?= $form->field($model, 'cod_formulario')->textInput() ?>

    <?= $form->field($model, 'cod_variavel')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
