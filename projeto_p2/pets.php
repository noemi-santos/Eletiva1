<?php
    require_once("cabecalho.php");

    
    function retornaPets(){
        require("conexao.php");
        try{
            $sql = "SELECT p.*, t.nome_tutor 
                    FROM pets p
                    INNER JOIN tutores t ON t.cpf = p.tutores_cpf";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $e){
            die("Erro ao consultar pets: " . $e->getMessage());
        }
    }

    $pets = retornaPets();
?>

<h2>Pets</h2>
<a href="novo_pet.php" class="btn btn-success mb-3">Novo Pet</a>

<table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>Chip</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Raça</th>
            <th>Tutor</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pets as $p): ?>
            <tr>
                <td><?= $p['chip'] ?></td>
                <td><?= $p['nome_pet'] ?></td>
                <td><?= $p['idade_pet'] ?></td>
                <td><?= $p['raca_pet'] ?></td>
                <td><?= $p['nome_tutor'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
    require_once("rodape.php");
?>
