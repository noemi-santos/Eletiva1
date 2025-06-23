<?php

    require_once("cabecalho.php");

    function inserirTutor($cpf, $nome, $data_nascimento, $telefone){
        require("conexao.php");
        try{
            $sql = "INSERT INTO TUTORES (cpf, nome_tutor, data_nascimento, telefone) VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$cpf, $nome, $data_nascimento, $telefone])){
                header('location: tutores.php?cadastro=true');
            } else {
                header('location: tutores.php?cadastro=false');
            }

        }catch (Exception $e){
            die("Erro ao inserir o tutor: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $telefone = $_POST['telefone'];
        inserirTutor($cpf, $nome, $data_nascimento, $telefone);
    }

?>

<h2> Novos tutores</h2>

<form method="post">
                        
    <div class="mb-3">
        <label for="cpf" class="form-label">Informe o cpf</label>
        <input type="number" id="cpf" name="cpf" class="form-control" required="">
    </div>
                    
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
                    
    <div class="mb-3">
        <label for="data_nascimento" class="form-label">Informe a data de nascimento</label>
        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required="">
    </div>
                    
    <div class="mb-3">
        <label for="telefone" class="form-label">Informe o telefone</label>
        <input type="number" id="telefone" name="telefone" class="form-control" required="">
        </div>
                    
    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="button" class="btn btn-secondary" onclick="history.back();">Voltar</button>
</form>
            

<?php

    require_once("rodape.php");

?>


