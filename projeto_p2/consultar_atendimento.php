<?php
require_once("cabecalho.php");

function consultarAtendimento($id){
    require("conexao.php");
    try {
        $sql = "SELECT * FROM atendimento WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("Erro ao consultar atendimento: " . $e->getMessage());
    }
}

function excluirAtendimento($id){
    require("conexao.php");
    try {
        $sql = "DELETE FROM atendimento WHERE id=?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$id])) {
            header('Location: atendimentos.php?exclusao=true');
        } else {
            header('Location: atendimentos.php?exclusao=false');
        }
    } catch (Exception $e) {
        die("Erro ao excluir atendimento: " . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    excluirAtendimento($_POST['id']);
} else {
    $atendimento = consultarAtendimento($_GET['id']);
}
?>

<h2>Consultar Atendimento</h2>

<form method="post">
    <input type="hidden" name="id" value="<?= $atendimento['id'] ?>">
    <p><b>Nome:</b> <?= $atendimento['nome'] ?></p>
    <p><b>Descrição:</b> <?= $atendimento['descricao'] ?></p>
    <p><b>Valor:</b> <?= $atendimento['valor'] ?></p>
    
    <p class="text-danger">Deseja excluir esse atendimento?</p>
    <button type="submit" class="btn btn-danger">Excluir</button>
    <a href="atendimentos.php" class="btn btn-secondary">Voltar</a>
</form>

<?php require_once("rodape.php"); ?>
