<?php
    require_once("cabecalho.php");
?>

    <h2> Editar Cadastro Pet </h2>
    
    <form method="post">

        <div class="mb-3">
            <label for="chip" class="form-label">Chip:</label>
            <input type="number" id="chip" name="chip" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>
                    
        <div class="mb-3">
            <label for="idade" class="form-label">Idade:</label>
            <input type="number" id="idade" name="idade" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="raca" class="form-label">Raça:</label>
            <input type="text" id="raca" name="raca" class="form-control" required="">
        </div>

                    
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-primary"
            onclick = "history.back();">Voltar</button>
    </form>
            

<?php 
    require_once("rodape.php");