<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RespostaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resposta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod_resposta') ?>

    <?= $form->field($model, 'desc_resposta') ?>

    <?= $form->field($model, 'reposta_certa') ?>

    <?= $form->field($model, 'cod_pergunta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
