<?php
    require_once("cabecalho.php");

function consultaPet($chip){
    require("conexao.php");
    try{
        $sql = "SELECT p.*, t.nome_tutor FROM pets p INNER JOIN tutores t ON t.cpf = p.tutores_cpf WHERE p.chip = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$chip]);
        $pet = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$pet){
            die("Erro ao consultar o registro!");
        } else{
            return $pet;
        }
    } catch(Exception $e){
        die("Erro ao consultar pet: " . $e->getMessage());
    }
}

function excluirPet($chip){
    require("conexao.php");
    try{
        $sql = "DELETE FROM pets WHERE chip=?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$chip])){
            header('location: pets.php?exclusao=true');
            exit;
        } else {
            header('location: pets.php?exclusao=false');
            exit;
        }
    } catch (Exception $e){
        die("Erro ao excluir o pet: ".$e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $chip = $_POST['chip'];
    excluirPet($chip);
} else {
    $pet = consultaPet($_GET['chip']);
}

?>

<h2>Consultar Pet</h2>

<form method="post">

    <input type="hidden" name="chip" value="<?= $pet['chip'] ?>" >

    <div class="mb-3">
        <p>Chip: <b><?= $pet['chip'] ?></b></p>
    </div>

    <div class="mb-3">
        <p>Nome: <b><?= $pet['nome_pet'] ?></b></p>
    </div>

    <div class="mb-3">
        <p>Idade: <b><?= $pet['idade_pet'] ?></b></p>
    </div>

    <div class="mb-3">
        <p>Raça: <b><?= $pet['raca_pet'] ?></b></p>
    </div>

    <div class="mb-3">
        <p>Tutor: <b><?= $pet['nome_tutor'] ?></b></p>
    </div>

    <div class="mb-3">
        <p class="text-danger">Deseja excluir esse registro?</p>
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="pets.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>

<?php 
require_once("rodape.php");
?>