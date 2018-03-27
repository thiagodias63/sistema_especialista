
<?php

use app\models\Pergunta;
use app\models\Resposta;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
$this->title = 'Respondendo ao formulario';
$form = ActiveForm::begin();
foreach(Pergunta::find()->where(['cod_formulario' => $cod_formulario])->orderby('ordem')->all() as $pergunta){ ?>
    <h4><?= $pergunta->desc_pergunta ?></h4>
    <?php foreach(Resposta::find()->where(['cod_pergunta' => $pergunta->cod_pergunta])->all() as $respota){?>
        <input type="radio" id="<?= $respota->cod_resposta?>" name="Pergunta[<?= $respota->pergunta->cod_pergunta ?>]" value="<?= $respota->cod_resposta ?>" required>
        <label for="<?= $respota->cod_resposta ?>"> <?= $respota->desc_resposta ?></label>
        <br>
    <?php } ?>
<?php } ?>
    <div class="form-group">
        <?= $form->field($respostas, 'cod_resposta')->hiddenInput()->label(''); ?>
        <?= Html::submitButton('Finalizar', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
<?php 
/*id="Resposta[<?= $respota->pergunta->cod_pergunta ?>]"
<?=  $form->field($respota, 'desc_resposta')->radio()->label(''); ?>
/*<input type="radio" name="resp" id="resp-<?= $respota->cod_resposta ?>" value="<?= $respota->cod_resposta*/ 
/*$items = ArrayHelper::map(,'cod_resposta','desc_resposta');
echo $form->field($respostas, 'cod_resposta')->radioList($items, ['class'=>'radio input-lg'])->label('');*/
?>