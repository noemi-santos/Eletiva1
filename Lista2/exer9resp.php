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
                $result = 1;
                for ($i = 1; $i <= $valor1; $i++){
                    $result = $result * $i;

                }
                echo " $result";
            }
            catch (Exception $e) { 
                echo $e->getMessage(); 
            }
        }