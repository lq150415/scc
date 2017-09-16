@extends ('layout')
@section('title')
	Graficos - Sistema cristiano de comunicaciones

@endsection
	@section ('cuerpo')

<div id="report" style=" padding-left:5%; padding-top:40px; width:80%;" class="table-responsive"></div>
 <div class = "modal-footer">
            <a href="graficos" class = "btn btn-success btn-lg" >
             <span class="glyphicon glyphicon-arrow-right "></span> DATOS VENTAS (Bs)
            </a>
             <a href="grafcol" class = "btn btn-info btn-lg" >
             <span class="glyphicon glyphicon-arrow-right "></span> DATOS CANTIDADES (%)
            </a></div>

@stop
@section('script')
	<script src="<?php echo asset('js/highcharts.js')?>"></script>
	<script src="<?php echo asset('js/exportinghigh.js')?>"></script>

	<script type="text/javascript">

	$('#report').highcharts(
	{
	        chart: {
	            plotBackgroundColor: null,
	            plotBorderWidth: null,
	            plotShadow: false,
	            type: 'pie'
	        },
	        title: {
	            text: 'Reporte de ventas, datos de cantidades(unidades)'
	        },
	        subtitle: {
	            text: 'Sistema Cristiano de comunicaciones'
	        },

	        tooltip: {
	            pointFormat: '{series.name}: <b>{point.y:.0f} unidades</b>'
	        },
	        plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                dataLabels: {
	                    enabled: true,
	                    format: '<b>{point.name}</b>: {point.y:.0f} ',
	                    style: {
	                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                    }
	                },
	                showInLegend: true
	            }
	        },

	        credits: {
	            enabled: false
	        },
	        series: [{
	            name: 'Categorias',
	            colorByPoint: true,
	            data: [{
	                name: 'Predicas',
	                y: 12
	            }, {
	                name: 'Desde lo alto',
	                y: 25,
	                sliced: true,
	                selected: true
	            }, {
	                name: 'Mujer unica',
	                y: 10
	            }, {
	                name: 'Hombria al maximo',
	                y: 4
	            }, {
	                name: 'Generacion de fuego',
	                y: 5
	            }, {
	                name: 'Haciendo discipulos',
	                y: 2
	            }, {
	                name: 'Conciertos',
	                y: 0
	            }]
	        }]
	    });



	</script>
@endsection
