<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RespostaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Respostas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resposta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Resposta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cod_resposta',
            'reposta_certa',
            'cod_variavel',
            'cod_pergunta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
