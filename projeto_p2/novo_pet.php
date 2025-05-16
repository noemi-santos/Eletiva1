<?php
    require_once("cabecalho.php");

    function retornaTutores(){
        require ("conexao.php");
        try{
            $sql = "SELECT * FROM tutores";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();

        } catch(Exception $e){
            die("Erro ao consultar tutores: ". $e->getMessage());
        }
    }
    
    function inserirPet($chip, $nome_pet, $idade_pet, $raca_pet, $tutores_cpf){
        require("conexao.php");
        try{
            $sql = "INSERT INTO pets (chip, nome_pet, idade_pet, raca_pet, tutores_cpf) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$chip, $nome_pet, $idade_pet, $raca_pet, $tutores_cpf]))
                header('location: pets.php?cadastro=true');
            else
                header('location: pets.php?cadastro=false');

        } catch(Exception $e){
            die("Erro ao inserir pet: ". $e->getMessage());
        }
    }

    $tutores = retornaTutores();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $chip = $_POST['chip'];
        $nome_pet = $_POST['nome_pet'];
        $idade_pet = $_POST['idade_pet'];
        $raca_pet = $_POST['raca_pet'];
        $tutores_cpf = $_POST['tutores_cpf'];
        inserirPet($chip, $nome_pet, $idade_pet, $raca_pet, $tutores_cpf);
    }
?>

<h2> Novo Pet </h2>

<form method="post">
    <div class="mb-3">
        <label for="chip" class="form-label">Chip (ID)</label>
        <input type="number" id="chip" name="chip" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="nome_pet" class="form-label">Nome do Pet</label>
        <input type="text" id="nome_pet" name="nome_pet" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="idade_pet" class="form-label">Idade do Pet</label>
        <input type="number" id="idade_pet" name="idade_pet" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="raca_pet" class="form-label">Raça do Pet</label>
        <input type="text" id="raca_pet" name="raca_pet" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="tutores_cpf" class="form-label">Tutor (CPF)</label>
        <select id="tutores_cpf" name="tutores_cpf" class="form-select" required>
            <option value="">Selecione o tutor</option>
            <?php foreach($tutores as $t): ?>
                <option value="<?= $t['cpf'] ?>"><?= $t['nome_tutor'] ?> - <?= $t['cpf'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="button" class="btn btn-secondary" onclick="history.back();">Voltar</button>
</form>

<?php 
    require_once("rodape.php");
?>
