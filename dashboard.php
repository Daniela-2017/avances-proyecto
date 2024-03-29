<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard</title>
	<link rel="shortcut icon" type="image/png" href="img/cliente.png">
	<link rel="stylesheet" href="BootstrapCSS/bootstrap.min.css">
	<link href="BootstrapCSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="master.css">


</head>

<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="background-color:#255eb3 !important;">

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
		 aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<form class="form-inline my-2 my-lg-0 ml-auto">
				<?php
				$key=$_GET['id'];
				 echo "
				<a class='btn btn-primary' href='empresa.php?id=$key' style='margin-right: 3px;' type='button' >Ver Perfil</a>
			"?>
			</form>
		</div>
	</nav>
	<button type="button" class="perfil" style="width: 20%;margin-top: 1rem;"></button>
	<div class="row divDashboard" style="background-color: black; opacity: .9;margin-top:1rem">
		<h5 class="categoria col-xl-12 col-md-12 col-sm-12">Gráficos de Ventas por dias</h5>
		<canvas id="myChart1"></canvas>
	</div>

	<div class="row divDashboard" style="background-color: black; opacity: .9; ">
		<h5 class="categoria col-xl-12 col-md-12 col-sm-12">Gráficos de Seguidores por mes</h5>
		<canvas id="myChart2"></canvas>
	</div>

	<div class="row divDashboard" style="background-color: black; opacity: .9; ">
		<h5 class="categoria col-xl-12 col-md-12 col-sm-12">Últimos Comentarios</h5>
		<div>Sección de comentarios</div>
	</div>
</body>
<script src="chart.js"></script>
<script>
	//Graficos de seguidores por mes
	
	var ctx1 = document.getElementById('myChart2').getContext('2d');
	var chart = new Chart(ctx1, {
		type: 'line',
		data: {
			labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			datasets: [{
				label: 'Ganancias',
				backgroundColor: '#121266',
				borderColor: 'red',
				data: [7, 8, 5, 2, 8, 10, 7, -7, 4, 9, -8, 5]
			}
			]
		},
		options: {}
	});

	//Graficos de ventas por dia
	var dias = [];
	for (let i = 0; i < 31; i++) {
		dias[i] = i + 1
	};
	var ctx1 = document.getElementById('myChart1').getContext('2d');
	var chart = new Chart(ctx1, {
		type: 'line',

		data: {

			labels: dias,
			datasets: [{
				label: 'Seguidores',
				backgroundColor: '#121266',
				borderColor: 'red',
				data: [0, 5, 20, 30, 40, 50, 60, 70, 80, 8, 90, 7, 4, 45, 34, 12, 23]
			}
			]
		},
		options: {}
	});

</script>
<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="BootstrapJS/bootstrap.min.js"></script>
<script src="BootstrapJS/all.js"></script>
<script src="controlador.js"></script>

</html>