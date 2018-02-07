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
	<link href="css/chips.css" rel="stylesheet"> 
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/app.css">


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
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3" id = "panelPrin">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="glyphicon glyphicon-pencil"></em>
				</a></li>
				<li class="active">Matrícula</li>
			</ol>
		</div><!--/.row-->
		

			<div class="col-md-12" >
				<div class="panel panel-default">
					<div class="panel-heading">Registrar matrícula</div>
						<div class="panel-body">
							<form role="form" id="formRTM">

								<div class="form-group">
									<label>Tipo de Matricula</label>
									<select id="TM" class="form-control" onchange="buscarTiposDeMatriculas(this.value);">
										<?php
							                include 'databaseCao.php';
							                $pdo = DatabaseCao::connect();
							                $sql = 'SELECT * FROM ca_tipo_registro';
							                foreach ($pdo->query($sql) as $row) 
							                {
							                   	$id = $row['id'];
        										$name = utf8_encode($row['nombre']);
												echo '<option value = '.$id.'>'.$name.'</option>';   
							            	}
							            	DatabaseCao::disconnect();
							            ?>
							        </select>    
								</div>
								<div class="form-group">
									<label>Nombre del tipo de matricula</label>

									<select id="tiposDeMatricula" class="form-control" onclick="cargarCursos(this.value)">
										
									</select>
								</div>
								<div class="form-group">
									<label>Rol</label>

									<select class="form-control" id="rol">
										<?php
									        include 'DatabaseMoodle.php';
									        $pdo = DatabaseMoodle::connect();
									        $sql = 'SELECT 	id id,
															name nombre
													FROM 	mdl_role';
									        foreach ($pdo->query($sql) as $row) 
									        {
												$id = $row['id'];
        										$name = utf8_encode($row['nombre']);
												echo '<option value = '.$id.'>'.$name.'</option>';   
									       	}
									      	DatabaseMoodle::disconnect();
									    ?>
									</select>
								</div>
								
								<div class="form-group">
									<label>Usuarios</label>
									<div class="col-sm-12">
								           <input type="text" class="autocomplete form-control" id="sampleAutocomplete" data-toggle="dropdown" />
								           <ul class="dropdown-menu" role="menu">
												<?php									                
									                $pdo = DatabaseMoodle::connect();
									                $sql = 'SELECT id,firstname,lastname FROM mdl_user ORDER BY id';
									                foreach ($pdo->query($sql) as $row) 
									                {
												        $id = $row['id'];
												        $firstname = utf8_encode($row['firstname']);
													    $lastname = utf8_encode($row['lastname']);
														echo '<li id = "usua-'.$id.'">';		
														echo '<a>'.$firstname.' '.$lastname.'</a>';
														echo '</li>';
									            	}
									            	DatabaseMoodle::disconnect();
									            ?>
								           </ul>
									</div>
								</div>

								
								<div class="form-group">
								<label>Seleccionados</label>
										<div class="col-sm-12 " >
											<div class="panel panel-default panel-body">											
												<div class="form-group" id="chipsUsers">
													
												</div>
											</div>
										</div>
								</div>	

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
											               
											                $pdo = DatabaseMoodle::connect();
											                $sql = 'SELECT * FROM mdl_course_categories WHERE parent = 0 ORDER BY id';
											                foreach ($pdo->query($sql) as $row) 
											                {
														        $id = $row['id'];
														        $name = utf8_encode($row['name']);
																echo '<option value = '.$id.'>'.$name.'</option>';
											            	}
											            	DatabaseMoodle::disconnect();
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


								<button id="submit" type="submit" class="btn btn-primary">Registrar tipo de matricula</button>
								<button type="reset" class="btn btn-default">Limpiar campos</button>
						</form>
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
	<script src="js/table.js"></script>
	<script src="js/registrarM.js"></script>	

		
</body>
</html>