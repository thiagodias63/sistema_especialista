<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kolyunya\yii2\widgets\bootstrap\RadioList;
$this->title = 'Trabalho de Inteligência Artificial';
?>
<div class="site-index">
    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <h3>Selecione o formulario</h3>
        <?php $items = ArrayHelper::map($formulario->find()->all(),'cod_formulario','desc_formulario') ?>
        <?=  $form->field($formulario, 'cod_formulario')->radioList($items, ['class'=>'radio input-lg'])->label(''); ?>        
        <div class="form-group">
            <?= Html::submitButton('Começar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php /* <?php foreach($formulario->find()->all() as $formulario){ ?>
<?= $form->field($formulario, 'cod_formulario')->radio(
[//'value' => $formulario->cod_formulario,
'label' => $formulario->desc_formulario,]); ?>
<?php } */ ?>
<!-- <label for="form-<?= $formulario->cod_formulario ?>"> <?= $formulario->desc_formulario ?></label>
<input type="radio" name="form" id="form-<?= $formulario->cod_formulario ?>">
<br> -->
<?php // $form->field($formulario, 'cod_formulario')->inline()->radioList($formularios); ?>