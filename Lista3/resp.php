<?php
    declare(strict_types=1); //obriga a tipagem da qualquer método ou atributo
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
    <h1>Exemplo de uso de funções</h1>

    <?php
    
    function verificarMes(int $mes)
    {
        switch ($mes) {
            case 1:
                echo "janeiro";
                break;
            case 2:
                echo "fevereiro";
                break;
            case 3:
                echo "março";
                break;
            default:
                echo "Informe um valor válido!";
                break;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $numero = intval($_POST["n1"]);//pega qualquer texte e tranformar em um numero
            verificarMes($numero);
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