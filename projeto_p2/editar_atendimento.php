<?php
    require_once("cabecalho.php");

    function consultarAtendimento($id){
        require("conexao.php");
        try {
            $sql = "SELECT * FROM atendimento WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $atendimento = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$atendimento){
                die("Erro ao consultar o registro!");
            } else {
                return $atendimento;
            }
        } catch (Exception $e) {
            die("Erro ao consultar atendimento: " . $e->getMessage());
        }
    }

    function alterarAtendimento($id_antigo, $id, $nome, $descricao, $valor){
        require("conexao.php");
        try {
            $sql = "UPDATE atendimento SET id = ?, nome = ?, descricao = ?, valor = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$id, $nome, $descricao, $valor, $id_antigo])) {
                header('location: atendimentos.php?edicao=true');
            } else {
                header('location: atendimentos.php?edicao=false');
            }
        } catch (Exception $e) {
            die("Erro ao alterar o atendimento: " . $e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $id_antigo = $_POST['id_antigo'];
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        alterarAtendimento($id_antigo, $id, $nome, $descricao, $valor);
    } else {
        $atendimento = consultarAtendimento($_GET['id']);
    }
?>

<h2>Alterar Atendimento</h2>

<form method="post">
    <input type="hidden" name="id_antigo" value="<?= $atendimento['id'] ?>">

    <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input value="<?= $atendimento['id'] ?>" type="number" id="id" name="id" class="form-control" readonly>
    </div>

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input value="<?= $atendimento['nome'] ?>" type="text" id="nome" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea id="descricao" name="descricao" class="form-control" rows ="4" required><?= $atendimento['descricao'] ?> </textarea>
    </div>

    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input value="<?= $atendimento['valor'] ?>" type="number" step="0.01" id="valor" name="valor" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php
    require_once("rodape.php");
?>
