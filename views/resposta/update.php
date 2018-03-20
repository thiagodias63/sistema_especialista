<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resposta */

$this->title = 'Update Resposta: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Respostas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_resposta, 'url' => ['view', 'id' => $model->cod_resposta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resposta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
