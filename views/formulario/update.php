<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Formulario */

$this->title = 'Update Formulario: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Formularios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_formulario, 'url' => ['view', 'id' => $model->cod_formulario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="formulario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
