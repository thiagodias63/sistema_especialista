<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resposta */

$this->title = 'Alterar Resposta: '.$model->desc_resposta;
$this->params['breadcrumbs'][] = ['label' => 'Respostas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_resposta, 'url' => ['view', 'id' => $model->cod_resposta]];
$this->params['breadcrumbs'][] = 'Alterar';
?>
<div class="resposta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pergunta' => $pergunta,
    ]) ?>

</div>
