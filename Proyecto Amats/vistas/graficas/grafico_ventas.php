<?php
require_once"../../conexion/conexion.php";
$conexion=conectar();

$sql="SELECT venta.fecha_venta, COUNT(venta.fecha_venta) AS ventas_hechas
        FROM venta
        GROUP BY venta.fecha_venta
";

$result=mysqli_query($conexion, $sql);

$valoresX = array(); //fechas
$valoresY = array();  //cantidad

while($venta=mysqli_fetch_row($result)){
    
        $valoresX[] = $venta[0];
        $valoresY[] = $venta[1];
}

$datosX = json_encode($valoresX);
$datosY = json_encode($valoresY);


?>


<div id="grafica_ventas" class="container-responsive grafica">

</div>

<script type="text/javascript">
    function crearGrafico(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>

<script type="text/javascript">

    datosX=crearGrafico('<?php echo $datosX ?>');
    datosY=crearGrafico('<?php echo $datosY ?>');

    var data = [
    {
    x: datosX,
    y: datosY,
    type: 'bar',
    marker: {
        color: '#3c8dbc',
        background:'red'
    }
    }
    ];

    var layout = {
            title: 'Ventas Diarias',
            font:{
                family: 'Raleway, sans-serif'
            },
            showlegend: false,
            xaxis: {
                tickangle: -15
            },
            yaxis: {
                zeroline: true,
                gridwidth: 2
            },
            bargap :0.05
};

    Plotly.newPlot('grafica_ventas', data, layout);
</script>

