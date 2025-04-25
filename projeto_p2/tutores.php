<?php
    require_once("cabecalho.php");

    function retornaTutores(){
        require("conexao.php");

        try{
            $sql = "SELECT * from tutores";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(); //pega todos os registros do banco de dados e retorna como um array

        } catch (Exception $e) {
            die ("Erro ao consultar os tutores: ".$e -> getMessage());
        }   
    }

    $tutores = retornaTutores();
?>


<h2>Tutores</h2>
    <a href="novo_tutor.php" class="btn btn-success mb-3">Novo Tutor</a>

    <?php
        if (isset($_GET['cadastro']) && $_GET['cadastro'] == true){
            echo'<p class="text-success">Registro salvo com sucesso!</p>';
        } elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == false){
            echo'<p class="text-danger">Erro ao inserir o registro!!</p>';
        }

    
        if (isset($_GET['edicao']) && $_GET['edicao'] == true){
            echo'<p class="text-success">Registro alterado com sucesso!</p>';
        } elseif (isset($_GET['edicao']) && $_GET['edicao'] == false){
            echo'<p class="text-danger">Erro ao alterar o registro!!</p>';
        }

        
        if (isset($_GET['exclusao']) && $_GET['exclusao'] == true){
            echo'<p class="text-success">Registro excluido com sucesso!</p>';
        } elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == false){
            echo'<p class="text-danger">Erro ao excluir o registro!!</p>';
        }
    ?>


    <table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Data_nascimento</th>
            <th>Telefone</th>
            <th></th>
        </tr>
   </thead>
    <tbody>
        <?php

            foreach($tutores as $t): // vou trabalhar com a variavel c - categorias
        ?>
                                
        <tr>
            <td><?= $t['cpf'] ?></td> 
            <td><?= $t['nome_tutor'] ?></td>
            <td><?= $t['data_nascimento'] ?></td> 
            <td><?= $t['telefone'] ?></td>
            <td>
                <a href="editar_tutor.php?cpf=<?=$t['cpf'] ?>" class="btn btn-warning">Editar</a>
                <a href="consultar_tutor.php?cpf=<?= $t['cpf'] ?>" class="btn btn-info">Consultar</a>
            </td>
        </tr>
        <?php
endforeach;
        ?>                        
 </tbody>
</table>
                

<?php
    require_once("rodape.php");
?>