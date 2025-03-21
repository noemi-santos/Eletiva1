<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Resposta</h1>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            try{
                $a = array();
                $titulo = $_POST["titulo"];
                $estoque = $_POST["estoque"];

                for ($i = 0; $i < 5; $i++) {
                    $titulos = $titulo[$i];
                    $a[$titulos] = $estoque[$i];
                    
                    if ($estoque[$i] < 5){
                        echo "<p>Alerta: O livro '$titulos' está com estoque baixo - ($estoque[$i] unidades)</p>";
                    }
                }
                    
                ksort($a);

                echo "<p>Lista de livros</p>";
                foreach ($a as $titulo => $estoque) {
                    echo "<p>Item:: $titulo -  Estoque: $estoque unidades</p>";
                }
            }
                catch (Exception $e) {
                echo $e -> getMessage();
                }   
            }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>