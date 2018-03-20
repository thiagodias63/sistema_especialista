<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Variavel */

$this->title = 'Update Variavel: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Variavels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_variavel, 'url' => ['view', 'id' => $model->cod_variavel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="variavel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
