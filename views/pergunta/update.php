<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pergunta */

$this->title = 'Alterar Pergunta:'.$model->desc_pergunta;
$this->params['breadcrumbs'][] = ['label' => 'Perguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_pergunta, 'url' => ['view', 'id' => $model->cod_pergunta]];
$this->params['breadcrumbs'][] = 'Alterar';
?>
<div class="pergunta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'formulario' => $formulario,
        'variavel' => $variavel,
    ]) ?>

</div>
