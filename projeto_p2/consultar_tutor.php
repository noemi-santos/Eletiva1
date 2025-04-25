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

    function excluirTutor($cpf){
        require("conexao.php");
        try{
            $sql = "DELETE FROM TUTORES WHERE cpf=?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([ $cpf])){
                header('location: tutores.php?exclusao=true');
            } else {
                header('location: tutores.php?exclusao=false');
            }

        }catch (Exception $e){
            die("Erro ao excluir o tutor: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $cpf = $_POST['cpf'];
        excluirTutor($cpf);
    } else {
        $tutores = consultarTutor($_GET['cpf']);
    }

?>

<h2> Consultar tutores</h2>

<form method="post">

<input type="hidden" name="cpf" value="<?= $tutores['cpf'] ?>" >
                        
    <div class="mb-3">
        <p>CPF: <b><?= $tutores['cpf'] ?> </b> </p>
    </div>
                    
    <div class="mb-3">
        <p>NOME: <b><?= $tutores['nome_tutor'] ?> </b> </p>
    </div>
                    
    <div class="mb-3">
        <p>Data_Nascimento: <b><?= $tutores['data_nascimento'] ?> </b> </p>
    </div>
                    
    <div class="mb-3">
        <p>TELEFONE: <b><?= $tutores['telefone'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p class="text-danger">Deseja excluir esse registro</p>
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="tutores.php" class="btn btn-secondary">Voltar</a>

    </div>
                
<?php

    require_once("rodape.php");

?>