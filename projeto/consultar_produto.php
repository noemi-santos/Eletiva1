<?php
    require_once("cabecalho.php");

?>

    <h2> Consultar Produto </h2>

    <div class="mb-2">
        <p> Nome do produto: <strong> Produto 1 </strong></p>
    </div>

    <div class="mb-2">
        <p> Descrição do produto: <strong> Produto 1 </strong></p>
    </div>

    <div class="mb-2">
        <p> Valor do produto: <strong> Produto 1 </strong></p>
    </div>

    <div class="mb-2">
        <button type="submit" class="btn btn-danger">Excluir</button>
        <button type="button" class="btn btn-danger" onclick="history.back()">Voltar</button>

    </div>

<?php 
    require_once("rodape.php");