<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Exercício 7</h1>
    <form method="post" action="resp7.php">

              
        <div class="mb-3">
            <label for="data1" class="form-label">Informe a primeira data: </label>
            <input type="date" id="data1" name="data1" class="form-control"  required="">
        </div>  

        <div class="mb-3">
            <label for="data2" class="form-label">Informe a segunda data: </label>
            <input type="date" id="data2" name="data2" class="form-control"  required="">
        </div>  
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>    