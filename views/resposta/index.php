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
        <?= Html::a('Nova Resposta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'cod_resposta',
            [
                'attribute' => 'pergunta.cod_formulario',
                'value'=>'pergunta.formulario.desc_formulario',
            ],
            [
                'attribute'=>'cod_pergunta',
                'value'=>'pergunta.desc_pergunta',
            ],
            'desc_resposta',
            [
                //'attribute' => 'reposta_certa',
                'value' => function($model){ return $model->reposta_certa == 0 ? 'Não' : 'Sim';},
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
