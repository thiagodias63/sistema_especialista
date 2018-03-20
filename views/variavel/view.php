<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Variavel */

$this->title = $model->cod_variavel;
$this->params['breadcrumbs'][] = ['label' => 'Variavels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variavel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cod_variavel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cod_variavel], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cod_variavel',
            'desc_variavel:ntext',
        ],
    ]) ?>

</div>
