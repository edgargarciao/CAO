<!DOCTYPE html>
<html>
<head>

    <!-- Contenido -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <!-- -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    
	<link href="../../../assets/css/datepicker/datepicker3.css" rel="stylesheet"> 
	<link href="../../../assets/css/dist/cao-elements.css" rel="stylesheet"> 

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

                <li> 
					<!-- Ruta -->
					<a href="ver.php">
					<!-- Nombre del item de la ruta -->
					Tipo de matrícula 
				</a></li>		

                <li class="active"> 
					<!-- Ruta -->
					<a href="">
					<!-- Nombre del item de la ruta -->
					Registrar tipo de matrícula 
				</a></li>						
			</ol>
		</div><!--/.row-->
		
		<!-- 
            Inicio del panel en donde se encuentra el formulario
        --> 
		<div class="row">
			<div class="col-md-12" >
				<div class="panel panel-default">

	                <!-- Título de la ventana -->
					<div class="panel-heading">
						Registrar tipo de matrícula                    
                    </div>					

					<!-- En esta sección esta la linea que separa el titulo del formulario -->
					<div class="panel-body">
						<!-- Formulario el cual es controlado por javascript -->
						<form role="form" id = "formRTM">
								
							<!-- Campo en donde debe escoger el tipo de matrícula -->
							<div class="form-group">

								<!-- Nombre del campo -->
								<label>Tipo de Matricula</label>

								<!-- Valores de los campos -->
								<select id="TipoMatricula" name = "TipoMatricula" class="form-control">		
									<?php
										
						                include '../../../controllers/TipoRegistroController.php';
                                        $tiposDeRegistro = new TipoRegistroController();
						                foreach ($tiposDeRegistro->buscarTiposDeRegistro() as $tipoDeRegistro){
												echo '<option value = '. $tipoDeRegistro->getIdTipoRegistro().'>'.$tipoDeRegistro->getNombreTipoRegistro().'</option>';   
						            	}
						            ?>							
								</select>									
							</div>
								
							<!-- Campo para digitar el nombre tipo de matrícula -->
							<div class="form-group">
								<!-- Nombre del Label -->		
								<label>Nombre del tipo de matrícula</label>

								<!-- Caja de texto para digitar el nombre -->
								<input id ="NombreTipoMatricula" name = "NombreTipoMatricula" class="form-control" placeholder="Oferta II-2017, Solicitud lider, ECO 2">
							</div>

							<!-- Campo para digitar la descripción del tipo de matrícula -->
							<div class="form-group">

								<!-- Nombre del Label -->
								<label>Descripción</label>

								<!-- Caja de texto para digitar el nombre -->
								<textarea id="DescripcionTipoMatricula" name = "descripcionTipoMatricula" class="form-control" rows="3"></textarea>
							</div>

							<!-- 
								En esta area se contruye el campo 
								en donde se podran escoger los cursos 
							-->
							<div class="form-group">
								<div class="row">
									
									<!-- Nombre del Label -->
									<div class="col-md-6" >
										<label>Cursos</label>
									</div>

									<!-- Aquí se depliega la lista de caetgorias -->
									<div class="col-md-3">
										<!-- 
											Aqui se hace crea la lista de despliegue. Esta lista tiene un
											evento que hace llamado a Javascript. Si dan click en una
											opción de categoria el inmediatamente traera los cursos
											de esa categoria.
										 -->
										<select id="CAT" class="form-control" onchange="getState(this.value);">							
											<?php
												echo ("aaa");
												/*require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'CursoController.php');
												$cursos = new CursoController();
												foreach ($cursos->buscarCategorias() as $categoria){
													echo '<option value = '.$categoria->getIdCategoria().'>'.$categoria->getNombreCategoria().'</option>';
												}*/													
											?>
										</select>
									</div>

									<div class="col-md-3" >
										<div class="form-group text-right">																	
											<input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre">
							   			</div>
									</div>
								</div>	

							   		<div class="table-responsive">
								      	<table id="Cursos" class="table table-bordred table-striped">
								         <thead>
								            <th>Identificación del curso</th>
											<th>Categoria del curso</th>
								            <th>Nombre completo del curso</th>
								            <th>Nombre corto del curso</th>
								            <th>Acción</th>
								         <tbody id = "tboCourses">



								         </tbody>
								      </table>
							      	<div class="clearfix"></div>
									
										<ul class="pagination pull-right" id = "pags">

							      		</ul>							   		

							   	</div>
							</div>
							<!-- Fin de la tabla --> 

								<div class="row">
									<div class="col-md-6" >
									    <div class="form-group"> <!-- Date input -->
							        		<label class="control-label" for="date">Fecha inicial</label>
							        		<input class="form-control" id="initDate" name="date" placeholder="MM/DD/YYY" type="text"/>
							      		</div>
									</div>
									<div class="col-md-6" >
							      		<div class="form-group"> <!-- Date input -->
							        		<label class="control-label" for="date">Fecha final</label>
							        		<input class="form-control" id="finalDate" name="date" placeholder="MM/DD/YYY" type="text"/>
							      		</div>
									</div>
								</div>	



								<button type="submit" id= "submit" class="btn btn-primary">Registrar tipo de matricula</button>
								<button type="reset" class="btn btn-default">Limpiar campos</button>
						</form>
					</div>
				</div><!-- /.panel-->
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->

	<!-- Scripts -->
	<script src="../../../assets/js/jquery/jquery-2.1.3.min.js"></script>
	<script src="../../../assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="../../../assets/js/chart/chart.min.js"></script>
	<script src="../../../assets/js/chart/chart-data.js"></script>
	<script src="../../../assets/js/easy-pie-chart/easypiechart.js"></script>
	<script src="../../../assets/js/easy-pie-chart/easypiechart-data.js"></script>
	<script src="../../../assets/js/bootstrap/bootstrap-datepicker.js"></script>	
	<script src="../../../assets/js/dist/buscar.js"></script>
	<script src="../../../assets/js/dist/fecha.js"></script>


</body>
</html>