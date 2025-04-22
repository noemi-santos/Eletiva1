<?php
    require_once("cabecalho.php");
?>

    <h2>Pets</h2>
    <a href="novo_pet.php" class="btn btn-success mb-3">Novo Pet</a>
        <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>chip</th>
                <th>nome</th>
                <th>idade</th>
                <th>raça</th>
            </tr>
        </thead>
        <tbody>
                                
            <tr>
                <td>1</td>
                <td>Exemplo</td><td>Exemplo</td><td>Exemplo</td>
                <td>
                    <a href="editar_pet.php" class="btn btn-warning">Editar</a>
                    <a href="consultar_pets.php" class="btn btn-info">Consultar</a>
                </td>
            </tr>
                                
            <tr>
                <td>2</td>
                <td>Exemplo</td><td>Exemplo</td><td>Exemplo</td>
                <td>
                    <a href="#" class="btn btn-warning">Editar</a>
                    <a href="#" class="btn btn-info">Consultar</a>
                </td>
            </tr>

            <tr>
                <td>3</td>
                <td>Exemplo</td><td>Exemplo</td><td>Exemplo</td>
                <td>
                    <a href="#" class="btn btn-warning">Editar</a>
                    <a href="#" class="btn btn-info">Consultar</a>
                </td>
            </tr>
                                
            <tr>
                <td>4</td>
                <td>Exemplo</td><td>Exemplo</td><td>Exemplo</td>
                <td>
                    <a href="#" class="btn btn-warning">Editar</a>
                    <a href="#" class="btn btn-info">Consultar</a>
                </td>
            </tr>
                                
            <tr>
                <td>5</td>
                <td>Exemplo</td><td>Exemplo</td><td>Exemplo</td>
                <td>
                    <a href="#" class="btn btn-warning">Editar</a>
                    <a href="#" class="btn btn-info">Consultar</a>
                </td>
            </tr>
                                
        </tbody>
        </table>
                

<?php
    require_once("rodape.php");
?>