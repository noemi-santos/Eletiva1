<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exemplo arrays</title>
    
</head>

<body>
        <form action="exemplo_array.php" method="post"> 
            <?php for($i = 0; $i <10; $i++): ?> 
                <input type="number" name="valor[]" placeholder="Informe o valor <?= $i ?>"/>
            <?php endfor; ?>
            <button type="submit"> Enviar </button>
            <br/>




            <?php /*for($i = 0; $i <10; $i++){
                echo '<input type="number">';
            } esse é a mesma coisa acima*/   
            ?>

            <?php 
                if ($_SERVER['REQUEST_METHOD'] == "POST"){
                    try{
                        $valores = $_POST['valor']; //post é um array que tem uma chave chamada valor
                        echo "O primeiro valor é: ".$valores[0];
                        echo "<br/>";
                        print_r($valores); //exibe os valores normalmente
                        //var_dump($valores); //mostra o tipo do valor
                        $valores['texto'] = 'dados';
                        unset($valores['texto']); //exclui a posição
                        echo "<br/>";
                        foreach ($valores as $c => $v){ //($valores as $c => $v) pega a posição
                            echo "<p>Posição: $c - Valor: $v</p>";
                        }
                        $array = [10, 11, 12, 13];
                        $array2 = array("uva", "maça", "pêra");
                        $array3 = [
                            "uva" => 3,
                            "maça" => 4,
                            "pêra" => 5
                        ]; //mais utilizado


                    } catch (EXception $e){
                        echo $e->getMessage();
                        }
                    }
            ?>

                
        </form>

</body>
</html>