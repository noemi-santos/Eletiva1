<?php
    require_once("cabecalho.php");

    function consultarPet($chip) {
        require("conexao.php");
        $sql = "SELECT * FROM pets WHERE chip = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$chip]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function alterarPet($chip, $nome, $idade, $raca, $tutores_cpf) {
        require("conexao.php");
        $sql = "UPDATE pets SET nome_pet = ?, idade_pet = ?, raca_pet = ?, tutores_cpf = ? WHERE chip = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nome, $idade, $raca, $tutores_cpf, $chip])) {
            header("Location: pets.php?edicao=true");
        } else {
            header("Location: pets.php?edicao=false");
        }
    }

    function listarTutores() {
        require("conexao.php");
        $sql = "SELECT cpf, nome_tutor FROM tutores";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $chip = $_POST['chip'];
        $nome = $_POST['nome_pet'];
        $idade = $_POST['idade_pet'];
        $raca = $_POST['raca_pet'];
        $tutores_cpf = $_POST['tutores_cpf'];
        alterarPet($chip, $nome, $idade, $raca, $tutores_cpf);
    } else {
        $pet = consultarPet($_GET['chip']);
        $tutores = listarTutores();
    }
?>

<h2> Editar Pet </h2>

<form method="post">
    <div class="mb-3">
        <label for="chip" class="form-label">Chip:</label>
        <input type="text" id="chip" name="chip" class="form-control" value="<?= $pet['chip'] ?>" readonly>
    </div>

    <div class="mb-3">
        <label for="nome_pet" class="form-label">Nome:</label>
        <input type="text" id="nome_pet" name="nome_pet" class="form-control" value="<?= $pet['nome_pet'] ?>" required>
    </div>

    <div class="mb-3">
        <label for="idade_pet" class="form-label">Idade:</label>
        <input type="number" id="idade_pet" name="idade_pet" class="form-control" value="<?= $pet['idade_pet'] ?>" required>
    </div>

    <div class="mb-3">
        <label for="raca_pet" class="form-label">Raça:</label>
        <input type="text" id="raca_pet" name="raca_pet" class="form-control" value="<?= $pet['raca_pet'] ?>" required>
    </div>

    <div class="mb-3">
        <label for="tutores_cpf" class="form-label">Tutor:</label>
            <select id="tutores_cpf" name="tutores_cpf" class="form-control" required>
                <?php foreach($tutores as $tutor): ?>
                    <option value="<?= $tutor['cpf'] ?>" <?= ($tutor['cpf'] == $pet['tutores_cpf']) ? 'selected' : '' ?>>
                        <?= $tutor['nome_tutor'] ?> (<?= $tutor['cpf'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="pets.php" class="btn btn-secondary">Voltar</a>
</form>

<?php
    require_once("rodape.php");
?>
