<?php

    require_once("cabecalho.php");


    function consultarTutor($cpf){
        require("conexao.php");
        try{
            $sql = "SELECT* FROM tutores WHERE cpf = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$cpf]);
            $tutores = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$tutores){
                die("Erro ao consultar o registro!");
            } else{
                return $tutores;
            }

        } catch (Exception $e){
            die("Erro ao consultar tutor: ". $e->getMessage());
        }

    }

    function alterarTutor($cpf_antigo, $cpf, $nome, $data_nascimento, $telefone){
        require("conexao.php");
        try{
            $sql = "UPDATE TUTORES SET nome_tutor = ?, data_nascimento = ?, telefone = ?, cpf=? WHERE cpf=?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$nome, $data_nascimento, $telefone, $cpf, $cpf_antigo])){
                header('location: tutores.php?edicao=true');
            } else {
                header('location: tutores.php?edicao=false');
            }

        }catch (Exception $e){
            die("Erro ao alterar o tutor: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $cpf = $_POST['cpf'];
        $cpf_antigo = $_POST['cpf_antigo'];
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $telefone = $_POST['telefone'];
        alterarTutor($cpf_antigo, $cpf, $nome, $data_nascimento, $telefone);
    } else {
        $tutores = consultarTutor($_GET['cpf']);
    }

?>

<h2> Alterar tutores</h2>

<form method="post">

<input type="hidden" name="cpf_antigo" value="<?= $tutores['cpf'] ?>" >
                        
    <div class="mb-3">
        <label for="cpf" class="form-label">Informe o cpf</label>
        <input value="<?= $tutores['cpf'] ?>"  type="number" id="cpf" name="cpf" class="form-control" readonly>
    </div>
                    
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome</label>
        <input value="<?= $tutores['nome_tutor'] ?>"  type="text" id="nome" name="nome" class="form-control" required="">
    </div>
                    
    <div class="mb-3">
        <label for="data_nascimento" class="form-label">Informe a data de nascimento</label>
        <input value="<?= $tutores['data_nascimento'] ?>"  type="date" id="data_nascimento" name="data_nascimento" class="form-control" required="">
    </div>
                    
    <div class="mb-3">
        <label for="telefone" class="form-label">Informe o telefone</label>
        <input value="<?= $tutores['telefone'] ?>" type="number" id="telefone" name="telefone" class="form-control" required="">
        </div>
                    
    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="tutores.php" class="btn btn-secondary">Voltar</a>
</form>
            

<?php

    require_once("rodape.php");

?>