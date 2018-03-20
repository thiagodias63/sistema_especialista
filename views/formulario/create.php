<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Formulario */

$this->title = 'Create Formulario';
$this->params['breadcrumbs'][] = ['label' => 'Formularios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formulario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
