<?php
    require_once("cabecalho.php");

    function retornaPets(){
        require("conexao.php");
        try{
            $sql = "SELECT chip, nome_pet FROM pets";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch(Exception $e){
            die("Erro ao buscar pets: " . $e->getMessage());
        }
    }

    function retornaAtendimentos(){
        require("conexao.php");
        try{
            $sql = "SELECT id, descricao FROM atendimento";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch(Exception $e){
            die("Erro ao buscar atendimentos: " . $e->getMessage());
        }
    }

    function inserirConsulta($data, $chip, $atendimento){
        require("conexao.php");
        try{
            $sql = "INSERT INTO consulta (data_consulta, pets_chip, atendimento_id) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            if($stmt->execute([$data, $chip, $atendimento])){
                header("Location: consultas.php?cadastro=true");
            } else {
                header("Location: consultas.php?cadastro=false");
            }
        } catch(Exception $e){
            die("Erro ao inserir consulta: " . $e->getMessage());
        }
    }

    $pets = retornaPets();
    $atendimentos = retornaAtendimentos();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = $_POST['data_consulta'];
        $chip = $_POST['pets_chip'];
        $atendimento = $_POST['atendimento_id'];
        inserirConsulta($data, $chip, $atendimento);
    }
?>

<h2>Nova Consulta</h2>

<form method="post">
    <div class="mb-3">
        <label for="data_consulta" class="form-label">Data da Consulta</label>
        <input type="date" name="data_consulta" id="data_consulta" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="pets_chip" class="form-label">Pet</label>
        <select name="pets_chip" id="pets_chip" class="form-select" required>
            <option value="">Selecione um pet</option>
            <?php foreach($pets as $p): ?>
                <option value="<?= $p['chip'] ?>">
                    <?= $p['nome_pet'] ?> (Chip: <?= $p['chip'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="atendimento_id" class="form-label">Tipo de Atendimento</label>
        <select name="atendimento_id" id="atendimento_id" class="form-select" required>
            <option value="">Selecione um atendimento</option>
            <?php foreach($atendimentos as $a): ?>
                <option value="<?= $a['id'] ?>">
                    <?= $a['descricao'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <button type="button" class="btn btn-secondary" onclick="history.back();">Voltar</button>
</form>

<?php require_once("rodape.php"); ?>

