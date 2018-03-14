<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">	
	<!-- Titulo Ventana -->
	<title>Educación virtual</title>

	<!-- Imagen al lado del titulo -->
	<link rel="Shortcut Icon" href="../../assets/img/title.jpg" type="image/x-icon" />

	<!-- Referencia al estilo de bootstrap -->
	<link href="../../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">

	<!-- Referencia al estilo de las fuentes -->
	<link href="../../assets/css/fonts/font-awesome/font-awesome.min.css" rel="stylesheet">

	<!-- Referencia al estilo adaptado para este proyecto -->
	<link href="../../assets/css/dist/styles.css" rel="stylesheet">

	<!-- Referencia al estilo adaptado para este proyecto -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>

	<!-- Barra de color negro en la parte superior  -->
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<!-- Esta es la etiqueta de la palabra CAO -->	
				<a class="navbar-brand" href="index.php"><span>CA</span>O</a>

			</div>
		</div>	
	</nav>
	<!-- Fin de la barra superior -->		

	<!-- Panel de la izquierda -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-3 sidebar">
		<!-- Datos del usuario que esta conectado -->
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<!-- Imagen del usuario conectado -->
				<img src="http://wfarm2.dataknet.com/static/resources/icons/set108/b5cdab07.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<!-- Rol del usuario conectado -->
				<div class="profile-usertitle-name">Administrador</div>
				<!-- Estado del usuario   -->
				<div class="profile-usertitle-status">
					<!-- Punto verde que indica que esta conectado -->	
					<span class="indicator label-success"></span>
					<!-- Estado  -->
					Online
				</div>
				<!-- Fin del estado del usuario -->
			</div>
			<!-- Linea que separa la informacíon del usuario con las opciones--> 
			<div class="clear"></div>
		</div>
		<!-- Fin de los datos del usuario que se encuentra conectado -->

		<!-- Búsqueda de opciones  -->
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<!-- Fin de búsqueda de opciones -->

		<!-- Opciones de la izquierda. Si desea cambiar algún ícono ver https://fontawesome.com/v4.7.0/icons/ --> 
		<ul class="nav menu">
			<!-- Ruta a donde debe ir -->
			<li><a href="TipoMatricula/Ver.php">
			<!-- Icono de la opción --> 
			<em class="fa fa-archive">&nbsp;</em>
			<!-- Nombre de la opción -->
			Gestionar tipos de matrícula
			</a></li>
			
			<!-- Ruta a donde debe ir -->
			<li><a href="Matricula/Ver.php">
			<!-- Icono de la opción --> 
			<em class="fa fa-book">&nbsp;</em>
			<!-- Nombre de la opción -->
			Consultar matrículas
			</a></li>

			<!-- Ruta a donde debe ir -->
			<li><a href="RegistrarM.php">
			<!-- Icono de la opción --> 
			<em class="fa fa-pencil">&nbsp;</em>
			<!-- Nombre de la opción -->
			Registrar matrículas
			</a></li>	
			
			<!-- Ruta a donde debe ir -->
			<li><a href="EliminarM.php">
			<!-- Icono de la opción --> 
			<em class="fa fa-trash-o">&nbsp;</em>
			<!-- Nombre de la opción -->
			Eliminar matrículas
			</a></li>

		</ul>
		<!-- Fin de opciones de la izquierda -->
	
	</div>
	<!-- Fin del panel de la izquierda -->

	<!-- Parte principal -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3">	
		<!-- Ruta de donde se encuentra navegando --> 
		<div class="row">
			<ol class="breadcrumb">
				<!-- Ruta -->
				<li><a href="#">
					<!-- Icono de la casa -->
					<em class="fa fa-home"></em>
				</a></li>
				
				<li class="active"> 
					<!-- Ruta -->
					<a href="#">
					<!-- Nombre del item de la ruta -->
					Panel de control 
				</a></li>
			</ol>
		</div>
		<!-- FIN de la ruta de donde se encuentra navegando --> 
		
		<!-- Titulo -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Panel de control</h1>
			</div>
		</div><!--/.row-->
		
		<!-- Contenedores -->
		<div class="row">
			<!-- Primer contenedor -->
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<!-- Nombre del contenedor -->
						<h4>Gestionar tipos de matrícula</h4>
						<div class="easypiechart" >
							<!-- Ruta del contenedor -->
							<a href="TipoMatricula/Ver.php">
							<!-- Imagen del contenedor -->
							<span class="fa fa-archive fa-5x">&nbsp;</span>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin del primer contenedor -->

			<!-- Segundo contenedor -->
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<!-- Nombre del contenedor -->
						<h4>Consultar matrículas</h4>
						<div class="easypiechart" >
							<!-- Ruta del contenedor -->
							<a href="Matricula/Ver.php">
							<!-- Imagen del contenedor -->
							<span class="fa fa-book fa-5x">&nbsp;</span>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin del segundo contenedor -->

			<!-- Tercer contenedor -->
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<!-- Nombre del contenedor -->
						<h4>Registrar matrículas</h4>						
						<div class="easypiechart" >
							<!-- Ruta del contenedor -->
							<a href="RegistrarM.php">
							<!-- Imagen del contenedor -->
							<span class="fa fa-pencil fa-5x">&nbsp;</span>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin del tercer contenedor -->

			<!-- Cuarto contenedor -->
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Eliminar matrículas</h4>
						<div class="easypiechart" ><a href="EliminarM.php"><span class="fa fa-trash-o fa-5x">&nbsp;</span></div>
					</div>
				</div>
			</div>
			<!-- Fin del cuarto contenedor -->
		</div>
		<!-- Fin de los contenedores -->

	</div>
	<!-- Fin de la parte principal-->
	
	<!-- Scripts -->
	<script src="../../assets/js/jquery/jquery-2.1.3.min.js"></script>
	<script src="../../assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="../../assets/js/chart/chart.min.js"></script>
	<script src="../../assets/js/chart/chart-data.js"></script>
	<script src="../../assets/js/easy-pie-chart/easypiechart.js"></script>
	<script src="../../assets/js/easy-pie-chart/easypiechart-data.js"></script>
	<script src="../../assets/js/bootstrap/bootstrap-datepicker.js"></script>	
	<script src="../../assets/js/dist/buscar.js"></script>	
		
</body>
</html>