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
		<!-- Fin de opciones de la izquierda -->
	
	</div>
	<!-- Fin del panel de la izquierda -->
		
    <!-- Principal -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3">
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
		</div><!--/.row-->
		
		<!-- 
            Inicio del formulario. No se inicia con una etiqueta form 
            porque el submit es controlado con el javascript
        --> 
		<div class="row">
			<div class="col-md-12" >
				<div class="panel panel-default">
                    <!-- Título de la ventana -->
					<div class="panel-heading">
                        Tipos de matrícula                    
                    </div>
					<div class="panel-body">		
						<div class="row">
							<div class="col-md-6" >
						        <p>
                                    <!-- Ruta para ir a la interfaz de registrar Tipo de Matricula -->
                                    <a href="registrar.php" class="btn btn-success">
                                    <!-- Nombre del boton -->
                                    Registrar tipo de matricula
                                    </a>
                                </p>	
									</div>
									<div class="col-md-6" >
										<input class="form-control" type="text" id="nombreTipoMatricula" onkeyup="buscar('nombreTipoMatricula','Cursos',2)" placeholder="Buscar por nombre">
									</div>
								</div>	

								<br>

							   		<div class="table-responsive">
								      	<table id="Cursos" class="table table-bordred table-striped">
								         <thead>
								            <!--<th><input type="checkbox" id="checkall" /></th> --> 
								            <th>ID</th>
											<th>Tipo de registro</th>
								            <th>nombre</th>
								            <th>Descripción</th>
								            <th>creado el</th>
								            <th class="text-center">Acción</th>
								           </thead>
								         <tbody id = "TMS">
								        <?php
							                   include '../../../controllers/TipoMatriculaController.php';
											   $tiposDeMatricula = new TipoMatriculaController();
												
							                    foreach ($tiposDeMatricula->buscarTiposDeMatriculas() as $tipoDeMatricula) {
													echo '<tr>';
													echo '<td>'. $tipoDeMatricula->getIdTipoMatricula() . '</td>';
													echo '<td>'. $tipoDeMatricula->getTipoRegistro() . '</td>';
													echo '<td>'. $tipoDeMatricula->getNombreTipoMatricula() . '</td>';
													echo '<td>'. $tipoDeMatricula->getDescripcion() . '</td>';
													echo '<td>'. $tipoDeMatricula->getFecha_creacion() . '</td>';
													echo '<td width=230>';
                                					echo '<a class="btn btn-primary" href="ActualizarTP.php?idTm='. $tipoDeMatricula->getIdTipoMatricula().'">Actualizar</a>';
                                					echo ' ';
					                                echo '<a class="btn btn-danger" href="EliminarTP.php?id='. $tipoDeMatricula->getIdTipoMatricula().'">Eliminar</a>';
					                                echo '</td>';
							            			echo '</tr>';
							            		}	
							            ?>
								         </tbody>
								      </table>
							      	<div class="clearfix"></div>
									
										<ul class="pagination pull-right" id = "pags">

							      		</ul>							   		
							   	</div>
							</div>
															<!-- Fin de la tabla --> 								
								<!-- <button type="submit" id= "submit" class="btn btn-primary">Registrar tipo de matricula</button> -->
					</div>
				</div><!-- /.panel-->
			</div>
		</div><!--/.row-->

	</div>
    <!-- Principal -->


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