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
    <a href="#" class="btn btn-success mb-3">Novo Tutor</a>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Data_nascimento</th>
            <th>Telefone</th>
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
                <a href="#" class="btn btn-warning">Editar</a>
                <a href="#" class="btn btn-info">Consultar</a>
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