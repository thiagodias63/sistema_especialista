<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Variavel */

$this->title = 'Create Variavel';
$this->params['breadcrumbs'][] = ['label' => 'Variavels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variavel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
