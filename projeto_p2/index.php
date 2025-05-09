<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro de Animais em Clínica Veterinária</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 100%; max-width: 450px;">
      <h1 class="text-center mb-4 text-primary">
        <i class="bi bi-heart-pulse-fill"></i> <br>
        Sistema de Cadastro de Animais
      </h1>

      <?php
          require_once("conexao.php");
          if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              try{
                  $email = $_POST['email'];
                  $senha = $_POST['senha'];
                  $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
                  $stmt->execute([$email]);
                  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                  if ($usuario && password_verify($senha, $usuario["senha"])){
                      session_start();
                      $_SESSION['usuario'] = $usuario["nome"];
                      $_SESSION['acesso'] = true;
                      $_SESSION['id'] = $usuario['id'];
                      header('location: principal.php');
                  } else {
                      $mensagem["erro"] = "Usuário e/ou senha incorretos!";
                  }

              } catch (Exception $e) {
                  echo "Erro: ".$e -> getMessage();
                  die();
              }   
          }
      ?>

      <?php if (isset($mensagem['erro'])): ?>
          <div class="alert alert-danger mt-3 mb-3">
              <?= $mensagem['erro'] ?>
          </div>
      <?php endif; ?>

      <?php 
          if ((isset($_GET['mensagem'])) && ($_GET['mensagem'] == "acesso_negado")): ?>
              <div class="alert alert-danger mt-3 mb-3">
                  Você precisa informar seus dados de acesso para acessar o sistema!
              </div>
      <?php endif; ?>

      <form action="" method="POST">
          <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="seuemail@exemplo.com" required>
          </div>

          <div class="mb-3">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua senha" required>
          </div>

          <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">
                  <i class="bi bi-box-arrow-in-right"></i> Acessar
              </button>
          </div>

          <div class="text-center mt-3">
              <small>Não possui acesso? <a href="novo_usuario.php">Clique aqui</a></small>
          </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
