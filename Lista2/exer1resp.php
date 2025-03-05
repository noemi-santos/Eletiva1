<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Resposta</h1>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            try {

                $valor1 = $_POST['valor1']; 
                $valor2 = $_POST['valor2']; 
                $valor3 = $_POST['valor3']; 
                $valor4 = $_POST['valor4']; 
                $valor5 = $_POST['valor5']; 
                $valor6 = $_POST['valor6']; 
                $valor7 = $_POST['valor7'];  
                
                $menor = $valor1;
                $posicao = "primeiro";

                if ($valor2 < $menor){
                    $menor = $valor2;
                    $posicao = "segundo";
                }
                if ($valor3 < $menor){
                    $menor = $valor3;
                    $posicao = "terceiro";
                }
                if ($valor4 < $menor){
                    $menor = $valor4;
                    $posicao = "quarto";
                }
                if ($valor5 < $menor){
                    $menor = $valor5;
                    $posicao = "quinto";
                }
                if ($valor6 < $menor) {
                    $menor = $valor6;
                    $posicao = "sexto";
                }
                if ($valor7 < $menor){
                    $menor = $valor7;
                    $posicao = "sétimo";
                }
             
        

                echo "O menor valor é o $posicao - número: $menor";

            } catch (Exception $e) { 
                echo $e->getMessage(); 
        }
    
        }

        //resto da dividão = %
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>