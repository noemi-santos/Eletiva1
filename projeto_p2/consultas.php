<?php
    require_once("cabecalho.php");

    function retornaConsultas(){
        require("conexao.php");
        try{
            $sql = "SELECT c.*, p.nome_pet, a.descricao 
                    FROM consulta c
                    INNER JOIN pets p ON p.chip = c.pets_chip
                    INNER JOIN atendimento a ON a.id = c.atendimento_id";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch(Exception $e){
            die("Erro ao consultar consultas: " . $e->getMessage());
        }
    }

    $consultas = retornaConsultas();
?>

<h2>Consultas</h2>

    <?php
        if (isset($_GET['cadastro']) && $_GET['cadastro'] == true){
            echo '<p class="text-success">Consulta salva com sucesso!</p>';
        } elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == false){
            echo '<p class="text-danger">Erro ao salvar a consulta!</p>';
        }

        if (isset($_GET['edicao']) && $_GET['edicao'] == true){
            echo '<p class="text-success">Consulta alterada com sucesso!</p>';
        } elseif (isset($_GET['edicao']) && $_GET['edicao'] == false){
            echo '<p class="text-danger">Erro ao alterar a consulta!</p>';
        }

        if (isset($_GET['exclusao']) && $_GET['exclusao'] == true){
            echo '<p class="text-success">Consulta excluída com sucesso!</p>';
        } elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == false){
            echo '<p class="text-danger">Erro ao excluir a consulta!</p>';
        }
    ?>
<a href="nova_consulta.php" class="btn btn-success mb-3">Nova Consulta</a>

<table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data da Consulta</th>
            <th>Nome do Pet</th>
            <th>Atendimento</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($consultas as $c): ?>
            <tr>
                <td><?= $c['id_consulta'] ?></td>
                <td><?= date("d/m/Y", strtotime($c['data_consulta'])) ?></td>
                <td><?= $c['nome_pet'] ?></td>
                <td><?= $c['descricao'] ?></td>
                <td>
                    <a href="editar_consulta.php?id=<?= ($c['id_consulta']) ?>" class="btn btn-warning">Editar</a>
                    <a href="consultar_consulta.php?id=<?= ($c['id_consulta']) ?>" class="btn btn-info">Consultar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
    require_once("rodape.php"); 
?>
