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
                <th>Chip</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Raça</th>
                <th>Tutor</th>
                <th></th>
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
                    <td>
                        <a href="editar_pet.php?chip=<?= $p['chip'] ?>" class="btn btn-warning">Editar</a>
                        <a href="consultar_pets.php?chip=<?= $p['chip'] ?>" class="btn btn-info">Consultar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php
    require_once("rodape.php");
?>
