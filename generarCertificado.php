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
			<li><a href="tableroAnual.php"><em class="fa fa-dashboard">&nbsp;</em> Tablero de indicadores generales</a></li>
			<li><a href="generarCertificado.php"><em class="fa fa-file-archive-o">&nbsp;</em> Generar certificado</a></li>
			<li>
				<a class="" href="EstadoFormaciVirtualUsuario.php"><span class="fa fa-dashboard">&nbsp;</span> Formación actual por usuario
				</a>
			</li>
			<li>
				<a class="" href="CantCertifNoCertifCurso.php"><span class="fa fa-area-chart">&nbsp;</span> Horas de formación por cursos virtuales
				</a>
			</li>		
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="glyphicon glyphicon-pencil"></em>
				</a></li>
				<li class="active">Certificaciones</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Generar certificados</h1>
			</div>
		</div><!--/.row-->

		<!-- FORM --> 
		<div class="row">
			<div class="col-md-12" >
				<div class="panel panel-default">
					<div class="panel-heading">Filtro</div>
						<div class="panel-body">


							<div class="row">
								<div class="col-md-3" >	
									<div class="form-group">
										<label>Nombre del usuario</label>
										<input id = "Usuario" class="form-control">
									</div>								
								</div>

								<div class="col-md-3" >	
									<div class="form-group">
										<label>curso</label>
										<input id = "Usuario" class="form-control">
									</div>								
								</div>

								<div class="col-md-3" >	
									<div class="form-group">
										<label>Fecha inicio</label>
										<input id = "Usuario" class="form-control">
									</div>								
								</div>

								<div class="col-md-3" >	
									<div class="form-group">
										<label>Fecha Fin</label>
										<input id = "Usuario" class="form-control">
									</div>								
								</div>
							</div>

							<div class="panel-heading">Certificado</div>
							<div class="table-responsive">
								      	<table id="Cursos" class="table table-bordred table-striped">
								         <thead>								            
								            <th>ID</th>
											<th>Estudiante</th>
								            <th>Curso</th>
								            <th>Fecha de certificación</th>
								            <th>Nota obtenida</th>
								            <th>Certificado</th>
								          </thead>
								         <tbody id = "TMS">
								        <?php
							                   include 'databaseCao.php';
							                   $pdo = DatabaseCao::connect();
							                   $sql = 'SELECT ca_certificado.id id,us.firstname + us.lastname nombre, ca_tipo_matricula_curso.curso curso, ca_certificado.fecha_certificacion fecha_cert, ca_matricula.NOTA_FINAL_OBTENIDA nota_final
  														FROM ca_certificado
												  INNER JOIN ca_matricula ON ca_certificado.matricula = ca_matricula.id
												  INNER JOIN ca_tipo_matricula_curso ON ca_matricula.ID_TM_CURSO = ca_tipo_matricula_curso.id
												  INNER JOIN moodle.mdl_user us ON us.id = ca_matricula.ID_USER 
												  ORDER BY id DESC';

							                   foreach ($pdo->query($sql) as $row) {
													echo '<tr>';
													echo '<td>'. $row['id'] . '</td>';
													echo '<td>'. $row['nombre'] . '</td>';
													echo '<td>'. $row['curso'] . '</td>';
													echo '<td>'. $row['fecha_cert'] . '</td>';
													echo '<td>'. $row['nota_final'] . '</td>';
													echo '<td width=250>';
                                					echo '<a class="btn btn-success" href="downloadCertificado.php?idCert='.$row['id'].'">Descargar certificado</a>';
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
					</div>
				</div>
			</div>
		</div>	

		
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

		
</body>
</html>