<?php
  require_once("cabecalho.php");
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Clínica Veterinária - Painel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      width: 100%;
    }

    body {
      font-family: sans-serif;
      overflow-x: hidden;
    }

    /* Ajusta o fundo da página */
    .background-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('https://images.unsplash.com/photo-1558788353-f76d92427f16?auto=format&fit=crop&w=1950&q=80') no-repeat center center;
      background-size: cover;
      z-index: -1;
    }

    /* Camada de sobreposição do fundo */
    .overlay {
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6); /* Escurece o fundo */
      z-index: -1; /* Garante que o fundo e a sobreposição não afetem o menu */
    }

    /* Conteúdo principal da página */
    .content {
      position: relative;
      z-index: 2; /* Conteúdo fica acima da sobreposição */
      color: white;
      text-align: center;
      padding: 40px 20px;
    }

    /* Ícones dos pets */
    .pet-icons {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 30px;
    }

    .pet-icons img {
      width: 100px;
      max-width: 100%;
      transition: transform 0.3s ease;
    }

    .pet-icons img:hover {
      transform: scale(1.1);
    }
  </style>
</head>
<body>

  <!-- Fundo com a imagem -->
  <div class="background-container"></div> <!-- Fundo ajustado -->

  <!-- Camada de escurecimento -->
  <div class="overlay"></div>

  <!-- Conteúdo que aparece acima da camada de fundo e sobreposição -->
  <div class="content">
    <h1>Bem-vindo à Clínica Veterinária</h1>
  

    <main class="mt-5">
      <h2 class="mb-4">O que deseja fazer?</h2>
      <p>Escolha uma das opções no menu acima para gerenciar os pets, tutores, atendimentos ou realizar consultas.</p>
    </main>

    <section class="pet-icons">
      <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Cachorro">
      <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="Gato">
      <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Outro Cachorro">
    </section>
  </div>

  <?php require_once("rodape.php"); ?>

</body>
</html>


