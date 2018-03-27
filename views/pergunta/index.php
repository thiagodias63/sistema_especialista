<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerguntaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perguntas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pergunta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nova Pergunta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'cod_pergunta',
            //'ordem',
            /*[
                'attribute' => 'proximo_no',
                'value' => function($model){ return $model->proximo_no == 0 ? 'E' : 'Ou';},
            ],*/
            [
                'attribute' => 'cod_formulario',
                'value' => 'formulario.desc_formulario'
            ],
            [
                'attribute' => 'cod_variavel',
                'value' => 'variavel.desc_variavel'
            ],
            'desc_pergunta:ntext',
            //'cod_variavel',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
