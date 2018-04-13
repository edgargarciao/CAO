<!DOCTYPE html>
<html>
<head>

    <!-- Contenido -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
    <!-- Titulo Ventana -->
    <title>Educación virtual</title>

    <!-- Imagen al lado del titulo -->
    <link rel="Shortcut Icon" href="../../../assets/img/title.jpg" type="image/x-icon" />

    <!-- Referencia al estilo de bootstrap -->
    <link href="../../../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Referencia al estilo de las fuentes -->
    <link href="../../../assets/css/fonts/font-awesome/font-awesome.min.css" rel="stylesheet">

    <!-- Referencia al estilo adaptado para este proyecto -->
    <link href="../../../assets/css/dist/styles.css" rel="stylesheet">

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
				<a class="navbar-brand" href="../index.php"><span>CA</span>O</a>

			</div>
		</div>	
	</nav>
	<!--/ Fin de la barra superior -->		

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
				<!--/ Fin del estado del usuario -->
			</div>
			<!-- Linea que separa la informacíon del usuario con las opciones--> 
			<div class="clear"></div>
		</div>
		<!--/ Fin de los datos del usuario que se encuentra conectado -->

		<!-- Búsqueda de opciones  -->
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<!--/ Fin de búsqueda de opciones -->

		<!-- Opciones de la izquierda. Si desea cambiar algún ícono ver https://fontawesome.com/v4.7.0/icons/ --> 
		<ul class="nav menu">
			<!-- Ruta a donde debe ir -->
			<li><a href="Ver.php">
			<!-- Icono de la opción --> 
			<em class="fa fa-archive">&nbsp;</em>
			<!-- Nombre de la opción -->
			Gestionar tipos de matrícula
			</a></li>
			
			<!-- Ruta a donde debe ir -->
			<li><a href="../Matricula/Ver.php">
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
		<!--/ Fin de opciones de la izquierda -->
	
	</div>
	<!--/ Fin del panel de la izquierda -->
		
    <!-- Principal -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3">
		<!-- Rutas -->
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="">
					<em class="glyphicon glyphicon-pencil"></em>
				</a></li>
        		<li> 
					<!-- Ruta -->
					<a href="../index.php">
					<!-- Nombre del item de la ruta -->
					Panel de control 
				</a></li>

                <li class="active"> 
					<!-- Ruta -->
					<a href="">
					<!-- Nombre del item de la ruta -->
					Tipo de matrícula 
				</a></li>						
			</ol>
		</div>
		<!--/ Rutas -->		
		
		<!-- 
            Inicio del contenido.
        --> 
		<div class="row">
			<!-- Columnas -->
			<div class="col-md-12" >
				<!-- Panel -->
				<div class="panel panel-default">
                    <!-- Cabecera del panel -->
					<div class="panel-heading">
						<!-- Titulo del  -->
                        Tipos de matrícula                    
                    </div>
					<!--/ Fin de la cabecera del panel -->
					
					<!-- Cuerpo del panel -->
					<div class="panel-body">		
						<div class="row">
							<div class="col-md-6" >
								<!-- Registrar tipos de matrícula -->
						        <p>
                                    <!-- Ruta para ir a la interfaz de registrar Tipo de Matrícula -->
                                    <a href="registrar.php" class="btn btn-success">
                                    <!-- Nombre del boton -->
                                    Registrar tipo de matricula
                                    </a>
                                </p>	
								<!--/ Registrar tipos de matricula -->
							</div>
							<!-- Campo para filtrar tipos de matrícula -->
							<div class="col-md-6" >
								<input class="form-control" type="text" id="nombreTipoMatricula" onkeyup="buscar('nombreTipoMatricula','TiposDeMatricula',2)" placeholder="Buscar por nombre">
							</div>
						</div>	
						<!-- Espacio para separar el título del contenido -->
						<br>
						
						<div class="table-responsive">
							<!-- Tabla que contendra todos los tipos de matrícula -->
							<table id="TiposDeMatricula" class="table table-bordred table-striped">
								<thead>								     
								    <th>ID</th>
									<th>Tipo de registro</th>
								    <th>nombre</th>
								    <th>Descripción</th>
								    <th>creado el</th>
								    <th class="text-center">Acción</th>
								</thead>
								<tbody id = "TMS">
									<!-- Aquí se cargan todas las matriculas -->
								    <?php
										
							        	include explode("CAO_DES", dirname( __DIR__ ))[0].'CAO_DES'.DIRECTORY_SEPARATOR.'CAO'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'back'.DIRECTORY_SEPARATOR.'EducacionVirtual'.DIRECTORY_SEPARATOR.'TipoMatricula'.DIRECTORY_SEPARATOR.'VerTiposDeMatricula.php';
							        ?>
								</tbody>
							</table>
							<!--/ Fin de la tabla -->
						</div>
					</div>
				</div>
			</div><!--/ Fin del cuerpo del panel -->
		</div>
		<!-- Fin del contenido -->
	</div>
	<!--/ Fin de Principal -->
    


	<!-- Scripts -->
	<script src="../../../assets/js/jquery/jquery-2.1.3.min.js"></script>
	<script src="../../../assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="../../../assets/js/chart/chart.min.js"></script>
	<script src="../../../assets/js/chart/chart-data.js"></script>
	<script src="../../../assets/js/easy-pie-chart/easypiechart.js"></script>
	<script src="../../../assets/js/easy-pie-chart/easypiechart-data.js"></script>
	<script src="../../../assets/js/bootstrap/bootstrap-datepicker.js"></script>	
	<script src="../../../assets/js/dist/buscar.js"></script>


	<!-- <script src="js/verM.js"></script>	-->
</body>
</html>