<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerguntaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pergunta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod_pergunta') ?>

    <?= $form->field($model, 'desc_pergunta') ?>

    <?= $form->field($model, 'ordem') ?>

    <?= $form->field($model, 'proximo_no') ?>

    <?= $form->field($model, 'cod_formulario') ?>

    <?php // echo $form->field($model, 'cod_variavel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
