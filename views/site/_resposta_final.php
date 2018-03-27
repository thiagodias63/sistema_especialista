<?php
use app\models\Formulario;
use app\models\Variavel;
$form = Formulario::findOne(['cod_formulario' => $cod_formulario]);
$variavel = Variavel::findOne(['cod_variavel' => $form['diagnostico_final']]);
$resp = ($resposta) ? ' Verdadeira ' : ' Falsa ';
$class = ($resposta) ? 'success' : 'danger';
?>
<div class="jumbotron">
    <div class="alert alert-<?= $class ?>">
        <h3> Através das respostas do formulario podemos constatar que: </h3>
        <h3> A afirmação de <?= $variavel['desc_variavel'] ?> é <?= $resp ?><h3>
    </div>
</div>