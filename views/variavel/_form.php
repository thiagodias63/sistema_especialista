<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Variavel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="variavel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'desc_variavel')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
