<?php

    require_once('cabecalho.php');
    function retornaConsultas(){
        require("conexao.php");
        try{
            $sql = "SELECT data_consulta, count(*) as total 
                FROM consulta 
                group by data_consulta";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch(Exception $e){
            die("Erro ao consultar consultas: " . $e->getMessage());
        }
    }

    $consultas = retornaConsultas();
?>

    <h1> Dashboard </h1> 

    <a href="relatorio.php" target="_blank"> Relatório de Consultas </a>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!--importação do grafico do google -->
    <div id="chart_div"></div>
    <script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {

        var data = google.visualization.arrayToDataTable([
            ['Data', 'Total'],
            <?php
                foreach($consultas as $c){
                    $data_consulta =  date("d/m/Y", strtotime($c['data_consulta']));
                    $total = $c['total'];
                    echo "['$data_consulta', $total],";
                }
            ?>
        ]);

        var options = {
            title: 'Total de consultas por data',
            chartArea: {width: '50%'},
            hAxis: {
                title: 'Total',
                minValue: 0
            },
            vAxis: {
                title: 'Data'
            }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

    chart.draw(data, options);
    }
</script>

<?php
    require_once('rodape.php');

