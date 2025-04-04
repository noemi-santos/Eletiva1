<?php
    require_once("cabecalho.php");

    function retornaDadosUsuario(){ //O que está fazendo: Define o início de uma função chamada retornaDadosUsuario. Esta função provavelmente tem o objetivo de retornar os dados de um usuário com base no ID armazenado na sessão.
        require("conexao.php"); //O que está fazendo: Inclui o arquivo conexao.php, que deve conter o código de conexão com o banco de dados
        try{
            $sql = "SELECT * FROM usuarios WHERE id = ?"; //O que está fazendo: Cria uma variável $sql que contém a consulta SQL. A consulta é um SELECT que busca todos os dados da tabela usuarios onde o campo id é igual a um valor que será passado dinamicamente (representado pelo ?).
            $stmt = $pdo->prepare($sql); //O que está fazendo: A variável $pdo representa a conexão com o banco de dados. Aqui, o método prepare é usado para preparar a consulta SQL para execução. Isso ajuda a evitar injeção de SQL, tornando o código mais seguro. A consulta preparada é armazenada na variável $stmt
            $stmt->execute([$_SESSION['id']]); //O que está fazendo: A consulta preparada na linha anterior é executada com um parâmetro. O valor de $_SESSION['id'] (que provavelmente é o ID do usuário logado armazenado na sessão) é passado para a consulta, substituindo o ? na cláusula WHERE id = ? da consulta SQL.
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC); //O que está fazendo: O método fetch(PDO::FETCH_ASSOC) recupera o próximo registro (neste caso, o único, já que está filtrando por um ID único) retornado pela consulta executada. O parâmetro PDO::FETCH_ASSOC faz com que o resultado seja retornado como um array associativo, ou seja, as colunas da tabela serão as chaves do array e os valores serão os dados das colunas.
            if (!$usuario){
                die("Erro ao consultar o usuário");
            } else {
                return $usuario;
            }

        }catch (Exception $e){
            die("Erro ao consultar o usuário:" .$e->getMessage());
        }
    }

    function alterarDadosUsuario($nome, $email){
        require("conexao.php");
        try{
            $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$nome, $email, $_SESSION['id']]))
                echo "<p class ='text-success'> Dados alterados com sucesso!</p>";
            else
                echo "<p class ='text-danger'> Erro ao alterar! </p>";


        }catch (Exception $e){
            die("Erro ao alterar dados do usuário:" .$e->getMessage());
        }
    }

    function alterarSenha($senhaAntiga, $novaSenha, $novaSenhaConfirm){
        require("conexao.php");
        try{
            if ($novaSenha == $novaSenhaConfirm){
                $usuario = retornaDadosUsuario();
                if (password_verify($senhaAntiga, $usuario['senha'])){
                    $sql = "UPDATE usuarios SET senha = ? WHERE id = ?";
                    $stmt = $pdo->prepare($sql);
                    $novaSenha = password_hash($novaSenha, PASSWORD_BCRYPT);
                    if ($stmt->execute([$novaSenha, $_SESSION['id']])){
                        require("sair.php");
                    } else {
                        echo"<p class='text-danger'> Erro ao alterar senha </p>";                    }
                }

            } else{
                echo "<p class='text-danger'> Senhas não conferem! </p>";
            }

        }catch (Exception $e){
            die("Erro ao alterar senha:" .$e->getMessage());
        }
    }
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['nome']) && isset($_POST['email'])){
            alterarDadosUsuario($_POST['nome'], $_POST['email']);
        } else if (isset($_POST['nova_senha'])){
            alterarSenha($_POST['senha_antiga'], $_POST['nova_senha'], $_POST['nova_senha_confirm']);

        }
    }

    $usuario = retornaDadosUsuario();
?>

    <h3> Alteração de dados pessoais</h3>
    <form method="post">        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do usuário</label>
            <input value="<?= $usuario['nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
                    
        <div class="mb-3">
            <label for="email" class="form-label">Email do usuário</label>
            <input value="<?= $usuario['email']?>" type="email" id="email" name="email" class="form-control" required="">
        </div>      
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <h3 class ="mb-3"> Alteração da Senha </h3>
    <form method="post">
                        
        <div class="mb-3">
            <label for="senha_antiga" class="form-label">Informe a senha antiga</label>
            <input type="password" id="senha_antiga" name="senha_antiga" class="form-control" required="">
        </div>
                        
        <div class="mb-3">
            <label for="nova_senha" class="form-label">Informe a nova senha</label>
            <input type="password" id="nova_senha" name="nova_senha" class="form-control" required="">
        </div>
                        
        <div class="mb-3">
            <label for="nova_senha_confirm" class="form-label">Repita a nova senha</label>
            <input type="password" id="nova_senha_confirm" name="nova_senha_confirm" class="form-control" required="">
        </div>          
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
                
            

<?php
    require_once("rodape.php");



