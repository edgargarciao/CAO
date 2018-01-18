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
	<link href="css/cao-elements-selected.css" rel="stylesheet">  
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
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
				<li class="active">Matrícula</li>
			</ol>
		</div><!--/.row-->
		
		<!-- FORM --> 
		<div class="row">
			<div class="col-md-12" >
				<div class="panel panel-default">
					<div class="panel-heading">Eliminar matrícula</div>
						<div class="panel-body">
							<form role="form" action="javascript:alert('Eliminación exitosa');">
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

										<select id="tiposDeMatricula" class="form-control"> <!-- onclick="cargarCursos(this.value)"> -->
											
										</select>
									</div>
			
									<label>Cursos</label>
									
							   		<div class="table-responsive">
								    <table id="Cursos" class="table table-bordred table-striped">
								         <thead>
								            <th>Identificación del curso</th>
											<th>Categoria del curso</th>
								            <th>Nombre completo del curso</th>
								            <th>Nombre corto del curso</th>
								            <th>Acción</th>
								         <tbody>
								            <tr>
								               <td id = "idCourse">1</td>
								               <td>0</td>
								               <td>Ordenes de Trabajo Versión 6.2</td>
								               <td>OTV6.2</td>								              
								               <td>

								               	

								           		<label class="switch" >
  													<input id="ch-53" type="checkbox" onclick="onClickHandler(this.id)" checked="">
  													<span class="slider round"></span>
												</label> 
								               </td>
								            </tr>
								            <tr>
								               <td>2</td>
								               <td>17</td>
								               <td>Interfaz Contable V7.2</td>
								               <td>IC</td>									               							              
								               <td>
								               	<label class="switch" id = "tg-2">
  													<input type="checkbox" checked>
  													<span class="slider round"></span>
												</label>
								               </td>
								            </tr>
								            <tr>
								               <td>3</td>
								               <td>4</td>
								               <td>Framework de SmartFlex V 7.2</td>
								               <td>FW</td>	
								               <td>
								               	<label class="switch" id = "tg-3">
  													<input type="checkbox" checked>
  													<span class="slider round"></span>
												</label>
								               </td>							              
								            </tr>
								            <tr>
								               <td>4</td>
								               <td>2</td>
								               <td>Creación de Reportes Interactivos V7.2</td>
								               <td>GR</td>
								               <td>
								               	<label class="switch" id = "tg-4">
  													<input type="checkbox" checked>
  													<span class="slider round"></span>
												</label>
								               </td>								               
								            </tr>


								         </tbody>
				
								    </table>	

								    <label>Estudiantes</label>
									
							   		<div class="table-responsive">
								    <table id="Cursos" class="table table-bordred table-striped">
								         <thead>
								            <th>Nombre del estudiante</th>
											<th>Apellido del estudiante</th>
								            <th>Fecha de matricula</th>								            
								            <th>Acción</th>
								         <tbody>
								            <tr>
								               <td id = "idCourse">Juan Andres</td>
								               <td>Becerra Gonzales</td>
								               <td>01/10/2016</td>						              
								               <td>
								           		<label class="switch" >
  													<input id="ch-53" type="checkbox" onclick="onClickHandler(this.id)" checked="">
  													<span class="slider round"></span>
												</label> 
								               </td>
								            </tr>
								            <tr>
								               <td id = "idCourse">Miguel Angel</td>
								               <td>Parra Gallego</td>
								               <td>01/10/2016</td>						              
								               <td>
								           		<label class="switch" >
  													<input id="ch-53" type="checkbox" onclick="onClickHandler(this.id)" checked="">
  													<span class="slider round"></span>
												</label> 
								               </td>
								            </tr>
								            <tr>
								               <td id = "idCourse">Maria stella</td>
								               <td>Cepeda Marin</td>
								               <td>17/12/2016</td>						              
								               <td>
								           		<label class="switch" >
  													<input id="ch-53" type="checkbox" onclick="onClickHandler(this.id)" checked="">
  													<span class="slider round"></span>
												</label> 
								               </td>
								            </tr>
								            <tr>
								               <td id = "idCourse">Julieta Andrea</td>
								               <td>Castrillon Lopez</td>
								               <td>14/11/2016</td>						              
								               <td>
								           		<label class="switch" >
  													<input id="ch-53" type="checkbox" onclick="onClickHandler(this.id)" checked="">
  													<span class="slider round"></span>
												</label> 
								               </td>
								            </tr>
								            <tr>
								               <td id = "idCourse">Ana Sofia</td>
								               <td>Guerrero Martinez</td>
								               <td>07/07/2017</td>						              
								               <td>
								           		<label class="switch" >
  													<input id="ch-53" type="checkbox" onclick="onClickHandler(this.id)" checked="">
  													<span class="slider round"></span>
												</label> 
								               </td>
								            </tr>
								            <tr>
								               <td id = "idCourse">Jesus Enrique</td>
								               <td>Villamarin Tevez</td>
								               <td>12/05/2017</td>						              
								               <td>
								           		<label class="switch" >
  													<input id="ch-53" type="checkbox" onclick="onClickHandler(this.id)" checked="">
  													<span class="slider round"></span>
												</label> 
								               </td>
								            </tr>
								            <tr>
								               <td id = "idCourse">Diego Samir</td>
								               <td>Castillo Esteban</td>
								               <td>26/04/2017</td>						              
								               <td>
								           		<label class="switch" >
  													<input id="ch-53" type="checkbox" onclick="onClickHandler(this.id)" checked="">
  													<span class="slider round"></span>
												</label> 
								               </td>
								            </tr>
								            <tr>
								               <td id = "idCourse">Dario Jesus</td>
								               <td>Gomez Velez</td>
								               <td>01/10/2016</td>						              
								               <td>
								           		<label class="switch" >
  													<input id="ch-53" type="checkbox" onclick="onClickHandler(this.id)" checked="">
  													<span class="slider round"></span>
												</label> 
								               </td>
								            </tr>

								         </tbody>
				
								    </table>	

								    <div class="form-group">
										<label>Motivo</label>
										<select id="MOT" class="form-control">
											<?php
								                $sql = 'SELECT * FROM ca_motivo';
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
										<label>Descripción del motivo de la cancelación</label>
										<textarea id="DescripcionTipoMatricula" name = "descripcionTipoMatricula" class="form-control" rows="3"></textarea>
									</div>

								<button type="submit" class="btn btn-danger">Eliminar matrículas</button>
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
	<script src="js/eliminarM.js"></script>

		
</body>
</html>