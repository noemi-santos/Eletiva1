<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
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
                $not1 = $_POST["nota1"];
                $not2 = $_POST["nota2"];
                $not3 = $_POST["nota3"];

                for ($i=0; $i < 5; $i++){
                    $media = ($not1[$i] + $not2[$i] + $not3[$i]) / 3;
                    $alunos = $nome[$i];
                    $a[$alunos] = $media;
                        
                }

                arsort($a);
                
                echo "Lista de Alunos";
                echo "<br/>";
                foreach ($a as $chave => $m) {
                    echo "Nome: $chave - Média: $m";
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