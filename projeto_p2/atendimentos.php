<?php
    require_once("cabecalho.php");

    function retornaAtendimentos(){
        require("conexao.php");

        try{
            $sql = "SELECT * from atendimento";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(); //pega todos os registros do banco de dados e retorna como um array

        } catch (Exception $e) {
            die ("Erro ao consultar os atendimentos: ".$e -> getMessage());
        }   
    }

    $atendimento = retornaAtendimentos();
?>


<h2>Atendimentos</h2>
    <a href="#" class="btn btn-success mb-3">Novo Atendumento</a>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor</th>
        </tr>
   </thead>
    <tbody>
        <?php

            foreach($atendimento as $at): // vou trabalhar com a variavel c - categorias
        ?>
                                
        <tr>
            <td><?= $at['id'] ?></td> 
            <td><?= $at['nome'] ?></td>
            <td><?= $at['descricao'] ?></td> 
            <td><?= $at['valor'] ?></td>
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