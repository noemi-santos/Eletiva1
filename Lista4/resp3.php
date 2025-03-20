<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Resposta</h1>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            try{
                $a = array();
                $nome = $_POST["nome"];
                $cod = $_POST["cod"];
                $preco = $_POST["preco"];

                for ($i = 0; $i < 5; $i++) {
                    $codigos = $cod[$i];
                    $precos = $preco[$i];
                    $nomes = $nome[$i];
                    if ($precos > 100) {
                        $precos = $precos * 0.9;
                    }

                    $a[$codigos] = array("nome" => $nomes, "preco" => $precos);
                }

                uasort($a, function($a, $b) {
                    return strcmp($a['nome'], $b['nome']); //strcmp verifica qual nome vem primeiro em ordem alfabética
                });

                echo "Lista de Produtos";
                echo "<br/>";
                foreach ($a as $codigo => $produto) {
                    echo "Código: $codigo - Nome: {$produto['nome']} - Preço: R$ {$produto['preco']}";
                    echo "<br/>";
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