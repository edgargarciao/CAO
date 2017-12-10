<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CAO</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html"><span>CA</span>O</a>

			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-3 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://wfarm2.dataknet.com/static/resources/icons/set108/b5cdab07.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Administrador</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="VerTM.php"><em class="fa fa-archive">&nbsp;</em>Gestionar tipos de matricula</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Matricula <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="RegistrarM.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Registrar matricula
					</a></li>
					<li><a class="" href="ActualizarM.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Actualizar matricula
					</a></li>
					<li><a class="" href="EliminarM.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Eliminar matricula
					</a></li>
				</ul>
			</li>
			<li><a href="tableroAnual.php"><em class="fa fa-dashboard">&nbsp;</em> Tablero de control general anual</a></li>
			<li><a href="controlHistorico.php"><em class="fa fa-bar-chart">&nbsp;</em> Tablero de control histórico</a></li>
			<li><a href="generarCertificado.php"><em class="fa fa-file-archive-o">&nbsp;</em> Generar certificado</a></li>
			<li><a href="reporteColaborador.php"><em class="fa fa-users">&nbsp;</em> Consultar reporte de colaboradores</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-navicon">&nbsp;</em> Reportes esporádicos <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="HorasModalidadVirtual.php">
						<span class="fa fa-dashboard">&nbsp;</span> Horas de formación por cursos virtuales
					</a></li>
					<li><a class="" href="matriculasCertifación.php">
						<span class="fa fa-dashboard">&nbsp;</span> Cantidad de matrículas con certificación
					</a></li>
					<li><a class="" href="participacion.php">
						<span class="fa fa-dashboard">&nbsp;</span> Registro de participación
					</a></li>
					<li><a class="" href="capacitacion.php">
						<span class="fa fa-dashboard">&nbsp;</span> Capacitación por area
					</a></li>

					<li><a class="" href="HorasModalidadCoaching.php">
						<span class="fa fa-dashboard">&nbsp;</span> Horas de formación por cursos de modalidad coaching
					</a></li>
					<li><a class="" href="actualidadFormacion.php">
						<span class="fa fa-dashboard">&nbsp;</span> Estado actual de formación
					</a></li>
				</ul>
			</li>

			</li>
			
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="glyphicon glyphicon-pencil"></em>
				</a></li>
				<li class="active">Capacitación modalidad virtual</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Capacitación modalidad virtual</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
			<div class="form-group col-xs-6 col-md-3 col-lg-3 ">
				<label for="sel1">Cursos openSky:</label>
				<select name="comboseleccion" class="form-control" id="sel1">
				<option value="defecto" selected="selected">Todos lo cursos</option>
				<?php
					include 'DatabaseMoodle.php';
					$pdo = DatabaseMoodle::connect();
					$query="SELECT * FROM mdl_course";
					foreach ($pdo->query($query) as $row)
					{
						$valor=$row['id'];
						$valor2=utf8_encode($row['fullname']);
						echo "<option value=".$valor.">".$valor2."</option>\n";
					}	
				?>
				</select>

			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 ">
			<button type="button" class="btn btn-primary" onclick="realizaProceso($('#sel1').val());">Consultar</button>
			</div>
			</div>
			<div class="row centered">
				
				<div class="col-xs-12 col-md-6 col-lg-6 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding">
							<div class="large">Recaudos</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<!--
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding">
							<div class="large">Recaudos</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>
				-->

				<div class="col-xs-6 col-md-3 col-lg-3 ">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding">
							<div class="large">Certificados</div>
						</div>
					</div>

					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding">
							<div class="large">No certificados</div>
						</div>
					</div>

					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding">
							<div class="large">Matriculados</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding">
							<div class="large"><span id="resultM">0</span> horas</div>
						</div>
					</div>

					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding">
							<div class="large"><span id="resultNM">0</span> horas</div>
						</div>
					</div>

					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding">
							<div class="large"> <span id="resultT">0</span>horas </div>
						</div>
					</div>
				</div>
				
				
				
			</div><!--/.row-->
		</div>
		
			<div class="col-sm-12">
				<!--<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>-->
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/capacitacion.js"></script>

		
</body>
</html>