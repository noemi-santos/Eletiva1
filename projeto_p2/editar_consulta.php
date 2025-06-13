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

function consultarConsulta($id_consulta){
    require("conexao.php");
    try{
        $sql = "SELECT * FROM consulta WHERE id_consulta = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_consulta]);
        $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$consulta){
            die("Consulta não encontrada!");
        }
        return $consulta;
    } catch(Exception $e){
        die("Erro ao consultar consulta: " . $e->getMessage());
    }
}

function alterarConsulta($id_consulta, $data_consulta, $pets_chip, $atendimento_id){
    require("conexao.php");
    try{
        $sql = "UPDATE consulta SET data_consulta = ?, pets_chip = ?, atendimento_id = ? WHERE id_consulta = ?";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute([$data_consulta, $pets_chip, $atendimento_id, $id_consulta])){
            header("Location: consultas.php?edicao=true");
        } else {
            header("Location: consultas.php?edicao=false");
        }
    } catch(Exception $e){
        die("Erro ao alterar consulta: " . $e->getMessage());
    }
}

$pets = retornaPets();
$atendimentos = retornaAtendimentos();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_consulta = $_POST['id_consulta'];
    $data_consulta = $_POST['data_consulta'];
    $pets_chip = $_POST['pets_chip'];
    $atendimento_id = $_POST['atendimento_id'];
    alterarConsulta($id_consulta, $data_consulta, $pets_chip, $atendimento_id);
} else {
    $consulta = consultarConsulta($_GET['id']);
}

?>

<h2>Editar Consulta</h2>

<form method="post">

    <input type="hidden" name="id_consulta" value="<?= $consulta['id_consulta'] ?>">

    <div class="mb-3">
        <label for="data_consulta" class="form-label">Data da Consulta</label>
        <input type="date" id="data_consulta" name="data_consulta" class="form-control" required value="<?= substr($consulta['data_consulta'], 0, 10) ?>">
    </div>

    <div class="mb-3">
        <label for="pets_chip" class="form-label">Pet</label>
        <select id="pets_chip" name="pets_chip" class="form-select" required>
            <?php foreach($pets as $p): ?>
                <option value="<?= $p['chip'] ?>" <?= ($consulta['pets_chip'] == $p['chip']) ? "selected" : "" ?>>
                    <?= $p['nome_pet'] ?> (Chip: <?= $p['chip'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="atendimento_id" class="form-label">Tipo de Atendimento</label>
        <select id="atendimento_id" name="atendimento_id" class="form-select" required>
            <?php foreach($atendimentos as $a): ?>
                <option value="<?= $a['id'] ?>" <?= ($consulta['atendimento_id'] == $a['id']) ? "selected" : "" ?>>
                    <?= $a['descricao'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="consultas.php" class="btn btn-secondary">Voltar</a>

</form>

<?php require_once("rodape.php"); ?>
