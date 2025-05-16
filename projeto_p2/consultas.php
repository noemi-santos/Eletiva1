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
<a href="nova_consulta.php" class="btn btn-success mb-3">Nova Consulta</a>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data da Consulta</th>
            <th>Nome do Pet</th>
            <th>Atendimento</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($consultas as $c): ?>
            <tr>
                <td><?= $c['id_consulta'] ?></td>
                <td><?= date("d/m/Y", strtotime($c['data_consulta'])) ?></td>
                <td><?= $c['nome_pet'] ?></td>
                <td><?= $c['descricao'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once("rodape.php"); ?>
