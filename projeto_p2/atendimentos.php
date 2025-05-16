<?php
    require_once("cabecalho.php");

    function retornaAtendimentos(){
        require("conexao.php");

        try{
            $sql = "SELECT * FROM atendimento";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die("Erro ao consultar os atendimentos: " . $e->getMessage());
        }
    }

    $atendimentos = retornaAtendimentos();
?>

<h2>Atendimentos</h2>
<a href="novo_atendimento.php" class="btn btn-success mb-3">Novo Atendimento</a>

<?php
    if (isset($_GET['cadastro']) && $_GET['cadastro'] == true){
        echo '<p class="text-success">Registro salvo com sucesso!</p>';
    } elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == false){
        echo '<p class="text-danger">Erro ao inserir o registro!!</p>';
    }

    if (isset($_GET['edicao']) && $_GET['edicao'] == true){
        echo '<p class="text-success">Registro alterado com sucesso!</p>';
    } elseif (isset($_GET['edicao']) && $_GET['edicao'] == false){
        echo '<p class="text-danger">Erro ao alterar o registro!!</p>';
    }

    if (isset($_GET['exclusao']) && $_GET['exclusao'] == true){
        echo '<p class="text-success">Registro excluído com sucesso!</p>';
    } elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == false){
        echo '<p class="text-danger">Erro ao excluir o registro!!</p>';
    }
?>

<table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor (R$)</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($atendimentos as $a): ?>
        <tr>
            <td><?= $a['id'] ?></td>
            <td><?= $a['nome'] ?></td>
            <td><?= $a['descricao'] ?></td>
            <td><?= number_format($a['valor'], 2, ',', '.') ?></td>
            <td>
                <a href="editar_atendimento.php?id=<?= $a['id'] ?>" class="btn btn-warning">Editar</a>
                <a href="consultar_atendimento.php?id=<?= $a['id'] ?>" class="btn btn-info">Consultar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
    require_once("rodape.php");
?>
