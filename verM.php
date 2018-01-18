 	<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CAO</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<link href="css/font-awesome.min.css" rel="stylesheet"> 
	<link href="css/datepicker3.css" rel="stylesheet"> 
	<link href="css/styles.css" rel="stylesheet"> 
	<link href="css/cao-elements.css" rel="stylesheet"> 
		
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap Date-Picker Plugin -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php"><span>CA</span>O</a>

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
			<li><a href="VerTM.php"><em class="fa fa-archive">&nbsp;</em>Gestionar tipos de matrícula</a></li>
			<li><a href="VerM.php"><em class="fa fa-book">&nbsp;</em>Consultar matrículas</a></li>
			<li><a href="RegistrarM.php"><em class="fa fa-pencil">&nbsp;</em>Registrar matrículas</a></li>
			<!-- <li><a href="ActualizarM.php"><em class="fa fa-refresh">&nbsp;</em>Actualizar matrícula</a></li>-->
			<li><a href="EliminarM.php"><em class="fa fa-trash-o">&nbsp;</em>Eliminar matrículas</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="glyphicon glyphicon-pencil"></em>
				</a></li>
				<li class="active">Matricula</li>
			</ol>
		</div><!--/.row-->
		
		<!-- FORM --> 
		<div class="row">
			<div class="col-md-12" >
				<div class="panel panel-default">
					<div class="panel-heading">Consultar matrícula</div>
						<div class="panel-body">						
								     
								     
								<div class="row">
									<div class="col-md-6" >
								     <p>
             							<a href="RegistrarM.php" class="btn btn-success">Crear</a>
             						</p>	
									</div>
									<div class="col-md-6" >
										<input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre">
									</div>
								</div>	

								<br>

							   		<div class="table-responsive">
								      	<table id="Cursos" class="table table-bordred table-striped">
								         <thead>
								            <!--<th><input type="checkbox" id="checkall" /></th> --> 
								            <th>ID</th>
								            <th>Nombre del estudiante</th>
											<th>Nombre de curso</th>
								            <th>Tipo de registro</th>
								            <th>Fecha de matricula</th>
								            <th>Fecha de finalización</th>
								            <th class="text-center">Acción</th>
								           </thead>
								         <tbody id = "TMS">
								        <?php
							                   include 'databaseCao.php';
							                   $pdo = DatabaseCao::connect();
							                   $sql = "SELECT 	m.id id, CONCAT(firstname,' ',lastname)  nombreEst,c. fullname nombreCurso, tr.nombre tipoRegistro, m.fecha_matricula fecha_matricula,m.fecha_finalizacion final
													FROM 		ca_matricula m
													INNER JOIN	ca_tipo_matricula_curso tmc ON tmc.id = m.ID_TM_CURSO
													INNER JOIN	moodle.mdl_course c ON tmc.curso = c.id
													INNER JOIN	ca_tipo_matricula tm ON tmc.tipo_matricula = tm.id
													INNER JOIN	ca_tipo_registro tr ON tr.id = tm.tipo_registro
													INNER JOIN  moodle.mdl_user u ON m.id_user = u.id 
													ORDER BY m.id desc";
							                   foreach ($pdo->query($sql) as $row) {
													echo '<tr>';
													echo '<td>'. $row['id'] . '</td>';
													echo '<td>'. utf8_encode($row['nombreEst']) . '</td>';
													echo '<td>'. utf8_encode($row['nombreCurso']) . '</td>';
													echo '<td>'. utf8_encode($row['tipoRegistro']). '</td>';
													echo '<td>'. $row['fecha_matricula'] . '</td>';
													echo '<td>'. $row['final'] . '</td>';
													echo '<td width=120>';
                                					echo '<a class="btn btn-primary" href="ActualizarM.php?idM='.$row['id'].'">Actualizar</a>';
					                                echo '</td>';
							            			echo '</tr>';
							            		}
							            		DatabaseCao::disconnect();
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

	</div>	<!--/.main-->

  	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>	
	<script src="js/verM.js"></script>
</body>
</html>