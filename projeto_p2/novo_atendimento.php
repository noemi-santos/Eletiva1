<?php

    require_once("cabecalho.php");

    function inserirAtendimento($nome, $descricao, $valor){
        require("conexao.php");
        try{
            $sql = "INSERT INTO ATENDIMENTO (nome, descricao, valor) VALUES (?,?,?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$nome, $descricao, $valor])){
                header('location: atendimentos.php?cadastro=true');
            } else {
                header('location: atendimentos.php?cadastro=false');
            }

        }catch (Exception $e){
            die("Erro ao inserir o atendimento: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        inserirAtendimento($nome, $descricao, $valor);
    }

?>

<h2> Novo Atendimento</h2>

<form method="post">
                        
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
                    
    <div class="mb-3">
        <label for="descricao" class="form-label">Informe a descrição</label>
        <textarea id="descricao" name="descricao" class="form-control" required=""></textarea>
    </div>
                    
    <div class="mb-3">
        <label for="valor" class="form-label">Informe o valor</label>
        <input type="number" step="0.01" id="valor" name="valor" class="form-control" required="">
    </div>
                    
    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="button" class="btn btn-secondary" onclick="history.back();">Voltar</button>
</form>

<?php
    require_once("rodape.php");
?>
