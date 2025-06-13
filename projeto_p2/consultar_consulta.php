<?php
require_once("cabecalho.php");

function consultarConsulta($id_consulta){
    require("conexao.php");
    try{
        $sql = "SELECT c.id_consulta, c.data_consulta, p.nome_pet, p.chip, a.descricao 
                FROM consulta c
                INNER JOIN pets p ON p.chip = c.pets_chip
                INNER JOIN atendimento a ON a.id = c.atendimento_id
                WHERE c.id_consulta = ?";
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

function excluirConsulta($id_consulta){
    require("conexao.php");
    try{
        $sql = "DELETE FROM consulta WHERE id_consulta = ?";
        $stmt = $pdo->prepare($sql);
        if($stmt->execute([$id_consulta])){
            header("Location: consultas.php?exclusao=true");
        } else {
            header("Location: consultas.php?exclusao=false");
        }
    } catch(Exception $e){
        die("Erro ao excluir consulta: " . $e->getMessage());
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_consulta = $_POST['id_consulta'];
    excluirConsulta($id_consulta);
} else {
    $consulta = consultarConsulta($_GET['id']);
}

?>

<h2>Consultar Consulta</h2>

<div class="mb-3">
    <p><b>ID:</b> <?= $consulta['id_consulta'] ?></p>
</div>
<div class="mb-3">
    <p><b>Data da Consulta:</b> <?= $consulta['data_consulta'] ?></p>
</div>
<div class="mb-3">
    <p><b>Pet:</b> <?= $consulta['nome_pet'] ?> (Chip: <?= $consulta['chip'] ?>)</p>
</div>
<div class="mb-3">
    <p><b>Atendimento:</b> <?= $consulta['descricao'] ?></p>
</div>

<form method="post">
    <input type="hidden" name="id_consulta" value="<?= $consulta['id_consulta'] ?>">
    <p class="text-danger">Deseja excluir essa consulta?</p>
    <button type="submit" class="btn btn-danger">Excluir</button>
    <a href="consultas.php" class="btn btn-secondary">Voltar</a>
</form>

<?php require_once("rodape.php"); ?>
