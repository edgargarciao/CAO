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
    <script src="bower_components/chart.js/dist/Chart.js"></script>
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
                <li><a class="" href="EstadoFormaciVirtualUsuario.php">
                        <span class="fa fa-dashboard">&nbsp;</span> Estado de formación virtual por usuario
                    </a></li>
                <li><a class="" href="CantCertifNoCertifCurso.php">
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
            <li class="active">Matricula</li>
        </ol>
    </div><!--/.row-->

    <!-- FORM -->
    <div class="row">
        <div class="col-md-12" >
            <div class="panel panel-default">
                <div class="panel-heading">Estado de Formación Virtual por Usuario</div>
                <?php
                //Export de clases de conexión
                include 'databaseCao.php';
                include 'databaseMoodle.php';
                ?>
                <br>
                <div class="form-group col-xs-6 col-md-3 col-lg-3 ">
                <form action="/CAO_DES/EstadoFormaciVirtualUsuario.php">
                <label for="sel1" style="margin-left: 20px;">Filtros de búsqueda</label>
                <select style="height: 45px;" name="year" class="form-control" id="sel1">
                    <option value="all" selected="selected">Todos los años</option>

                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                </select>
                </div>
                <div class="form-group col-xs-6 col-md-3 col-lg-3 ">
                    <input style="margin-top: 25px;" class="form-control" type="text" name="find_name" id="search_name" placeholder="Nombre de usuario">

                </div>


                <div class="col-xs-6 col-md-3 col-lg-3 ">
                    <button type="submit" class="btn btn-primary" value ="Consultar">Consultar</button>
               </form>

                </div>
                <div class="clearfix"></div>
                <div class="panel-body">


                    <div class="table-responsive">
                        <table id="Cursos" class="table table-bordred table-striped">
                            <thead>
                            <!--<th><input type="checkbox" id="checkall" /></th> -->
                            <th>ID</th>
                            <th>Nick</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Matriculados</th>
                            <th>Certificados</th>
                            <th>No certificados</th>
                            <th>Cancelados</th>


                            </thead>
                            <tbody id = "TMS">
                            <?php
                            $url = '/CAO_DES/EstadoFormaciVirtualUsuario.php';

                           //echo $url;
                            $nameFind = '0';

                            $yearFind = 0;

                            //Creación de arrays
                            $users = array();
                            $report_users = array();

                            //Variables cantidad total para reporte grafico
                            $Matri = 0;
                            $Certi = 0;
                            $noCerti = 0;
                            $Cancel = 0;

                            $pdo = DatabaseMoodle::connect();

                            $sql = "SELECT * FROM mdl_user";

                            $num_total_registros = $pdo->query($sql)->rowcount();


                            if ($num_total_registros > 0) {
                                //Limito la busqueda
                                $TAMANO_PAGINA = 10;
                                $pagina = false;

                                //examino la pagina a mostrar y el inicio del registro a mostrar
                                if (isset($_GET["pagina"]))
                                    $pagina = $_GET["pagina"];

                                if (!$pagina) {
                                    $inicio = 0;
                                    $pagina = 1;
                                } else {
                                    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
                                }
                                //calculo el total de paginas
                                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                //Verifico si llego username por get
                                if (isset($_GET["find_name"]) && $_GET["find_name"] != ''){
                                    $nameFind = $_GET["find_name"];
                                }else{
                                    $nameFind = '0';
                                }


                                if($nameFind != '0') {
                                    $sql = "SELECT * FROM mdl_user WHERE username= '".$nameFind."' ORDER BY id ASC LIMIT " . $inicio . "," . $TAMANO_PAGINA;
                                }else{
                                    $sql = "SELECT * FROM mdl_user ORDER BY id ASC LIMIT ".$inicio.",".$TAMANO_PAGINA;
                                }
                                //Verifico si llego año por get
                                if (isset($_GET["year"]) && $_GET["year"] != ''){
                                    $yearFind = $_GET["year"];
                                }else{
                                    $yearFind = 0;
                                }


                                $cant = 1;
                                foreach ($pdo->query($sql) as $row) {
                                    $user   = new stdClass();
                                    $user->id           = $row['id'];
                                    $user->username     = $row['username'];
                                    $user->firstname    = $row['firstname'];
                                    $user->lastname     = $row['lastname'];
                                    $user->email        = $row['email'];


                                    $users[$cant]= $user;
                                    unset($user);
                                    $cant ++;
                                }
                                DatabaseMoodle::disconnect();

                                //Conecto base de datos CAO
                                $pdo = DatabaseCao::connect();
                                //Estados : Matriculado, Certificado, No Certificado, Cancelado

                                foreach ($users as $row) {
                                    $id_user = $row->id;
                                    $report = new stdClass();
                                    //echo $users[1]->username;

                                    if($yearFind != 0){
                                        $countMatri     = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Matriculado'    AND m.id_user = ".$id_user." AND EXTRACT(YEAR FROM m.fecha_matricula) = ".$yearFind);
                                        $countCerti     = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Certificado'    AND m.id_user = ".$id_user." AND EXTRACT(YEAR FROM m.fecha_matricula) = ".$yearFind);
                                        $countNoCerti   = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'No Certificado' AND m.id_user = ".$id_user." AND EXTRACT(YEAR FROM m.fecha_matricula) = ".$yearFind);
                                        $countCancel    = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Cancelado'      AND m.id_user = ".$id_user." AND EXTRACT(YEAR FROM m.fecha_matricula) = ".$yearFind);
                                    }else{
                                        $countMatri     = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Matriculado'    AND m.id_user = ".$id_user);
                                        $countCerti     = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Certificado'    AND m.id_user = ".$id_user);
                                        $countNoCerti   = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'No Certificado' AND m.id_user = ".$id_user);
                                        $countCancel    = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Cancelado'      AND m.id_user = ".$id_user);
                                    }



                                    //print_r($countMatri->fetch());
                                    $matriculado    = $countMatri->fetch();
                                    $certificado    = $countCerti->fetch();
                                    $noCertificado  = $countNoCerti->fetch();
                                    $cancelado      = $countCancel->fetch();


                                    //Info de usuario
                                    $report->id_usuario  = $id_user;
                                    $report->username    = $row->username;
                                    $report->firstname   = $row->firstname;
                                    $report->lastname    = $row->lastname;
                                    $report->email       = $row->email;



                                    //Info Cantidad de estados
                                    $report->cant_matriculado       = $matriculado['cant'];
                                    $report->cant_certificado       = $certificado['cant'];
                                    $report->cant_no_certificado    = $noCertificado['cant'];
                                    $report->cant_cancelado         = $cancelado['cant'];

                                    array_push($report_users, $report);
                                    unset($report);
                                }
                                DatabaseCao::disconnect();
                                foreach ($report_users as $row) {
                                                    echo '<tr>';
                                                    echo '<td>'. $row->id_usuario . '</td>';


                                                    echo '<td>'. utf8_encode($row->username) . '</td>';

                                                    echo '<td>'. utf8_encode($row->firstname) . '</td>';
                                                    echo '<td>'. utf8_encode($row->lastname) . '</td>';
                                                    echo '<td>'. utf8_encode($row->email) . '</td>';
                                                    echo '<td>'. $row->cant_matriculado .'</td>';
                                                    echo '<td>'. $row->cant_certificado . '</td>';
                                                    echo '<td>'. $row->cant_no_certificado . '</td>';
                                                    echo '<td>'. $row->cant_cancelado . '</td>';



                                }
                               echo '<div class="clearfix"></div>';

                        }
                            ?>
                            </tbody>
                        </table>


                        <ul class="pagination pull-right" id = "pags">
                            <?php

                                echo '<p>';
                               echo '<ul class="pagination">';
                               if ($total_paginas > 1) {

                                    if ($pagina != 1){
                                        //echo '<li><a href="'.$url.'?pagina='.($pagina-1).'">1</a></li>';
                                        //echo '<a href="'.$url.'?pagina='.($pagina-1).'"><img src="../img/izq.gif" border="0"></a>';
                                        echo '<li class="page-item">';
                                        echo '<a class="page-link" href="'.$url.'?pagina=1" aria-label="Next">';
                                        echo '<span aria-hidden="true">&#60;</span>';
                                        echo '<span class="sr-only">Inicio</span>';
                                        echo  '</a>';
                                        echo '</li>';

                                        echo '<li class="page-item">';
                                        echo '<a class="page-link" href="'.$url.'?pagina='.($pagina-1).'" aria-label="Next">';
                                        echo '<span aria-hidden="true">&laquo;</span>';
                                        echo '<span class="sr-only">Anterior</span>';
                                        echo  '</a>';
                                        echo '</li>';
                                    }
                                    for ($i=1;$i<=$total_paginas;$i++) {
                                            if ($pagina == $i){
                                                //Si pag es 1. No pinta nada a la izq.
                                                if($pagina == 1){


                                                    echo '<li class="page-item active"><a href="#">'.$pagina.'</a></li>';

                                                    echo '<li><a href="'.$url.'?pagina='.($pagina+1).'">'.($pagina+1).'</a></li>';

                                                }else if($pagina == $total_paginas){

                                                    echo '<li><a href="'.$url.'?pagina='.($pagina-1).'">'.($pagina-1).'</a></li>';

                                                    echo '<li class="page-item active"><a href="#">'.$pagina.'</a></li>';

                                                }else{


                                                    echo '<li><a href="'.$url.'?pagina='.($pagina-1).'">'.($pagina-1).'</a></li>';

                                                    echo '<li class="page-item active"><a href="#">'.$pagina.'</a></li>';

                                                    echo '<li><a href="'.$url.'?pagina='.($pagina+1).'">'.($pagina+1).'</a></li>';


                                                }


                                            }else{
                                                //si el �ndice no corresponde con la p�gina mostrada actualmente,
                                                //coloco el enlace para ir a esa p�gina
                                                //echo '<li><a href="'.$url.'?pagina='.$i.'">'.$i.'</a></li>';
                                            }
                                        }
                                    if ($pagina != $total_paginas){
                                       /* echo '<a href="'.$url.'?pagina='.($pagina+1).'"><img src="../img/der.gif" border="0"></a>';*/

                                        echo '<li class="page-item">';
                                        echo '<a class="page-link" href="'.$url.'?pagina='.($pagina+1).'" aria-label="Next">';
                                        echo '<span aria-hidden="true">&raquo;</span>';
                                        echo '<span class="sr-only">Siguiente</span>';
                                        echo  '</a>';
                                        echo '</li>';

                                        echo '<li class="page-item">';
                                        echo '<a class="page-link" href="'.$url.'?pagina='.$total_paginas.'" aria-label="Next">';
                                        echo '<span aria-hidden="true">&#62;</span>';
                                        echo '<span class="sr-only">Fin</span>';
                                        echo  '</a>';
                                        echo '</li>';
                                    }
                                }

                                echo '</ul>';
                                echo '</p>';
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <canvas id="myChart1" width="400" height="300"></canvas>
                    </div>

                    <div class="col-md-6">
                        <canvas id="myChart2" width="400" height="300"></canvas>
                    </div>
                </div>

                <?php
                //Consulta para obtener los datos reales para los graficos
                if($yearFind != 0){
                    $countMatri2     = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Matriculado'     AND EXTRACT(YEAR FROM m.fecha_matricula) = ".$yearFind);
                    $countCerti2     = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Certificado'     AND EXTRACT(YEAR FROM m.fecha_matricula) = ".$yearFind);
                    $countNoCerti2   = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'No Certificado'  AND EXTRACT(YEAR FROM m.fecha_matricula) = ".$yearFind);
                    $countCancel2    = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Cancelado'       AND EXTRACT(YEAR FROM m.fecha_matricula) = ".$yearFind);
                }else{
                    $countMatri2     = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Matriculado'    ");
                    $countCerti2     = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Certificado'    ");
                    $countNoCerti2   = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'No Certificado' ");
                    $countCancel2    = $pdo->query("SELECT count(1) as cant FROM ca_matricula m WHERE m.ESTADO = 'Cancelado'      ");
                }



                $matriculado2    = $countMatri2->fetch();
                $certificado2    = $countCerti2->fetch();
                $noCertificado2  = $countNoCerti2->fetch();
                $cancelado2      = $countCancel2->fetch();

                //Info Cantidad de estados
                $Matri = $matriculado2['cant'];
                $Certi = $certificado2['cant'];
                $noCerti = $noCertificado2['cant'];
                $Cancel = $cancelado2['cant'];
                ?>


                <script type="text/javascript">
                    //Diagrama de barras
                    var ctx = document.getElementById("myChart1").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Matriculados", "Certificados", "No Certificados", "Cancelados"],
                            datasets: [{
                                label: 'Cantidad por Estados de Formación',

                                data: [
                                    <?php
                                    echo $Matri;
                                    ?>,
                                     <?php
                                     echo $Certi;
                                    ?>,
                                     <?php
                                    echo $noCerti;
                                    ?>,
                                     <?php
                                echo $Cancel;
                                ?>,
                                    ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.8)',
                                    'rgba(54, 162, 235, 0.8)',
                                    'rgba(255, 206, 86, 0.8)',
                                    'rgba(75, 192, 192, 0.8)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)'

                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });

                    //Diagrama de PIE
                    var ctx = document.getElementById("myChart2").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ["Matriculados", "Certificados", "No Certificados", "Cancelados"],
                            datasets: [{
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.8)',
                                    'rgba(54, 162, 235, 0.8)',
                                    'rgba(255, 206, 86, 0.8)',
                                    'rgba(75, 192, 192, 0.8)'
                                ],
                                data: [
                                    <?php
                                    echo $Matri;
                                    ?>,
                                    <?php
                                    echo $Certi;
                                    ?>,
                                    <?php
                                    echo $noCerti;
                                    ?>,
                                    <?php
                                    echo $Cancel;
                                    ?>,
                                ]
                            }]
                        }
                    });
                </script>



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





</body>
</html>