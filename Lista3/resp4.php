<?php
    declare(strict_types = 1); //obriga a tipagem da qualquer método ou atributo
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Resposta</h1>

    <?php

    function verificar(int $dia, int $mes, int $ano): void {
        $valor = checkdate($mes, $dia, $ano);

        if ($valor != null){
            echo "Data válida: $dia/$mes/$ano";
        }
        else 
            echo "Data inválida";
    }


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $dia = intval($_POST["dia"]);//pega qualquer texte e tranformar em um numero
            $mes = intval($_POST["mes"]);
            $ano = intval($_POST["ano"]);

            verificar($dia, $mes, $ano);

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