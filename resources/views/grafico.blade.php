@extends ('layout')
	@section ('cuerpo')
<script src="<?php echo asset('js/highcharts.js')?>"></script> 
<script src="<?php echo asset('js/exportinghigh.js')?>"></script>
<div id="report" style=" padding-left:5%; padding-top:40px; width:80%;" class="table-responsive"></div>
  <div class = "modal-footer">
            <a href="grafcol" class = "btn btn-success btn-lg" >
             <span class="glyphicon glyphicon-arrow-right "></span> DATOS CANTIDADES (%)
            </a>
             <a href="grafcols" class = "btn btn-info btn-lg" >
             <span class="glyphicon glyphicon-arrow-right "></span> DATOS CANTIDADES (Unidades)
            </a></div>
<script type="text/javascript">
jQuery('#report').highcharts(
{ 
        chart: {
            type: 'column'
        },
        title: {
            text: 'Reporte de ventas, datos en bolivianos'
        },
        subtitle: {
            text: 'Sistema Cristiano de comunicaciones'
        },
        xAxis: {
            categories: ['Predicas', 'Desde lo alto', 'Mujer unica', 'Hombria al maximo', 'Generacion de fuego','Haciendo discipulos','Conciertos'],
            title: {
                text: 'Categorias'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Ventas (Bs.)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Bs.'
        },
       plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f} Bs.'
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 40,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Marzo',
            data: [17, 31, 5, 23, 2,12,22]
        }, {
            name: 'Abril',
            data: [13, 15, 9, 48, 6,12,58]
        }, {
            name: 'Mayo',
            data: [15, 54, 25, 40, 38,5,1]
        }]
    });



</script>
@stop