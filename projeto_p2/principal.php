
<?php
  //include("cabecalho.php"); //mostra o erro na tela e continua processando a pagina normalmente depois
  //require("cabecalho.php"); //mostra o erro na tela e n continua o processamento, mais seguro
  require_once("cabecalho.php");//verifica se o conteúdo ja foi inserido(evita duplicação) MELHOR A SER USADO
            
  echo "<h2> Usuário: " .$_SESSION['usuario']."</h2>";
?>
    <p><a href="sair.php">Sair</a></p>
<?php
  require_once("rodape.php");
?>