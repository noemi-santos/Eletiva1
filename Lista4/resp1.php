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
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            try{
                $a = array();
                $nome = $_POST["nome"];
                $tel = $_POST["telef"];

                for ($i=0; $i < 5; $i++){
                    $posicao = $nome[$i];

                    
                    // Verificando se o nome ou telefone já existem
                    if (isset($a[$posicao]) || in_array($tel[$i], $a)) {
                        throw new Exception("Erro: Nome ou telefone já cadastrado.");
                    }

                    // Adiciona ao array
                    $a[$posicao] = $tel[$i];
                        
                }

                ksort($a);
                
                echo "<p>Lista de Contatos</p>";
                foreach ($a as $chave => $v) {
                    echo "<p>Nome: $chave - Telefone: $v</p>";
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