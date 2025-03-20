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
    <h1>Exercício 3</h1>
    <form method="post" action="resp3.php">

    <?php for($i=0; $i<5; $i++): ?> 
        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome do produto: </label>
            <input type="text" id="nome"  name="nome[]" class="form-control"  placeholder="Nome">
        </div> 
                
        <div class="mb-3">
            <label for="cod" class="form-label">Informe o código: </label>
            <input type="number" id="cod" name="cod[]" class="form-control"  placeholder="Código">

        </div> 

        <div class="mb-3">
            <label for="preco" class="form-label">Informe o preço: </label>
            <input type="number" id="preco" step="0.01" name="preco[]" class="form-control"  placeholder="Preço">

        </div>  
        <?php endfor; ?>
        
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


</body>

</html>