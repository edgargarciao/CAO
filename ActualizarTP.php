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
	<link href="css/cao-elements.css" rel="stylesheet"> 

		<!--  jQuery -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

		<!-- Bootstrap Date-Picker Plugin -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<script src="js/actualizarTP.js"></script>
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
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-3 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">eygarcia</div>
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
			<li class="parent"><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Tipo de matricula <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="RegistrarTM.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Registrar tipo de matricula
					</a></li>
					<li><a class="" href="ActualizarTP.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Actualizar tipo de matricula
					</a></li>
					<li><a class="" href="EliminarTP.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Eliminar tipo de matricula
					</a></li>
				</ul>
			</li>
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
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="glyphicon glyphicon-pencil"></em>
				</a></li>
				<li class="active">Tipo de matrícula</li>
			</ol>
		</div><!--/.row-->
		
		<?php include 'CargarActualizarTP.php'; ?>

		<!-- FORM --> 
		<div class="row">
			<div class="col-md-12" >
				<div class="panel panel-default">
					<div class="panel-heading">Actualizar tipo de matrícula</div>
						<div class="panel-body">
							<form role="form">
								<div class="form-group">
									<label>Id del tipo de Matricula</label>
									<input id="TipoMatricula" class="form-control" value="<?php echo !empty($id)?$id:'';?>"  disabled>	
								</div>
								<select id="TipoRegistro" name = "TipoRegistro" class="form-control">	
										<?php
							                   
							                   $pdo = DatabaseCao::connect();							                   
											   $sql = 'SELECT * FROM ca_tipo_registro';
							                   foreach ($pdo->query($sql) as $row) {
											        $id = $row['id'];
											        $name = utf8_encode($row['nombre']);
													echo '<option value = '.$id.'>'.$name.'</option>';     
							            		}
							            		DatabaseCao::disconnect();
							            ?>
							    </select>        
								<div class="form-group">
									<label>Nombre del tipo de matricula</label>
									<input id="NombreTipoMatricula" class="form-control" value="<?php echo !empty($nombre)?$nombre:'';?>">	
								</div>
								<div class="form-group">
									<label>Descripcion del tipo de matrícula</label>
									<textarea id="DescripcionTipoMatricula" class="form-control" rows="3" > <?php echo !empty($descripcion)?$descripcion:'';?> </textarea>	
								</div>

							
								<script type="text/javascript">

									<?php
										foreach ($results as $result) {										
											echo 'loadCourses('.JSON_encode($result['id']).');';										
										}
									?>
								     
								 </script>

								<!-- Tabla -->

								<div class="form-group">
											<div class="row">
												<div class="col-md-6" >
													<label>Cursos</label>
												</div>

													<!-- Filtro por categoria -->
													<div class="col-md-3">
														<select id="CAT" class="form-control" onchange="getState(this.value);">

	<?php
	//Connect To Database
	$hostname='localhost';
	$username='root';
	$password='';
	$dbname='moodle';
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);

	$usertable='mdl_course_categories';
	$query = 'SELECT * FROM ' . $usertable . ' WHERE parent = 0 ORDER BY id';
	$result = mysql_query($query);
	if($result) {
	    while($row = mysql_fetch_array($result)){
	        $id = $row['id'];
	        $name = utf8_encode($row['name']);
			echo '<option value = '.$id.'>'.$name.'</option>';
	        
	    }
	}
	else {
	print "Database NOT Found ";
	mysql_close($db_handle);
	}
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
								         </thead>
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
							        		<input class="form-control" id="initDate" name="date" placeholder="MM/DD/YYY" type="text" value="<?php echo !empty($fecha_inicial)?$fecha_inicial:'';?>" disabled>
							      		</div>
									</div>
									<div class="col-md-6" >
							      		<div class="form-group"> <!-- Date input -->
							        		<label class="control-label" for="date">Fecha final</label>
							        		<input class="form-control" id="finalDate" name="date" placeholder="MM/DD/YYY" type="text" value="<?php echo !empty($fecha_final)?$fecha_final:'';?>">
							      		</div>
									</div>
								</div>	

								<button id= "submit" type="submit" class="btn btn-primary">Actualizar tipo de matricula</button>
								<button type="reset" class="btn btn-default">Limpiar campos</button>
						</form>
					</div>
				</div><!-- /.panel-->
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->



  <!-- Modal -->
  <div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">



        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Configurar curso</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>

        <div class="modal-footer">



          	<button type="button" class="btn btn-primary" data-dismiss="modal">Configurar</button>
          	<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        </div>




      </div>
      
    </div>
  </div>

	

	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/table.js"></script>
	
		
</body>
</html>