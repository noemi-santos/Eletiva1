<?php
    declare(strict_types = 1); //obriga a tipagem da qualquer método ou atributo
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Resposta</h1>

    <?php

    function contido(string  $palavra, string $palavra2): void {
        $valor = strpos($palavra, $palavra2);

        if ($valor !== false){
            echo "A palavra está contida dentro da outra";
        }
        else 
            echo "A palavra não foi encontrada";
    }

    // if(1 == true) é igual em valor ?
    // if(1 === true) é igual em valor e tipo ?


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $palavra = $_POST["texto"];//pega qualquer texte e tranformar em um numero
            $palavra2 = $_POST["texto2"];
            contido($palavra, $palavra2);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>