<?php
session_start();

if (!isset($_SESSION['user_id']) || ($_SESSION['user_id'] != 1 && $_SESSION['user_id'] != 2)) {
    session_destroy();
    header('Location: ../login.php');
    exit();
}

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'finca - mi paraiso';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    $sql = "INSERT INTO Recordatorios (Titulo, Descripcion, FechaRecordatorio, HoraRecordatorio) VALUES (:titulo, :descripcion, :fecha, :hora)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':hora', $hora);

    if ($stmt->execute()) {
        $message = 'Recordatorio creado exitosamente';
    } else {
        $message = 'Lo sentimos, no pudimos crear el recordatorio';
    }
}

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN - Finca Mi Paraíso</title>
    <meta name="description" content="ADMIN - Finca Mi Paraíso">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="images/favicon.png">
    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"><i class="menu-icon fa fa-home"></i>Inicio </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list-ul"></i>Gestión del Ganado </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-certificate"></i><a href="ganado.php">Ganado </a></li>
                            <li><i class="fa fa-heart"></i><a href="crianza.php">Crianza y Reproducción </a></li>
                            <li><i class="fa fa-medkit"></i><a href="salud.php">Historial Salud </a></li>
                        </ul>
                    </li>   
                    <li class="menu-item-has-children dropdown">
                        <a href="ventas.php"><i class="menu-icon fa fa-tag"></i>Ventas </a>
                        <a href="compras.php"><i class="menu-icon fa fa-tags"></i>Compras </a>
                        <a href="gastos.php"><i class="menu-icon fa fa-th-large"></i>Mantenimiento </a>
                        <a href="usuarios.php"><i class="menu-icon fa fa-users"></i>Usuarios </a>
                    </li>          
                 </ul>     
            </div>
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.jpeg" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">   
                    	<a href="#"><?php if(!empty($message)): ?><p><?= $message ?></p><?php endif; ?></a>                 

                        <div class="dropdown for-message">
                            <?php echo $_SESSION['user_name']//mostrará el nombre del usuario administrador loggeado?>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/<?php echo $_SESSION['user_foto'];?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">$<span class="count"><?php 
							                $records = $conn->prepare('SELECT SUM(precio_total) as IngresosTotalCompras FROM `compras`');
							                $records->execute();
							                $results = $records->fetch(PDO::FETCH_ASSOC);

							                $IngresosTotalVentas=$results['IngresosTotalCompras']; 

							                echo ($IngresosTotalVentas); //muestra la suma de todas las ventas, los ingresos totales

							                ?></span></div>
                                            <div class="stat-heading">Compras</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">$<span class="count"><?php 
							                $records = $conn->prepare('SELECT SUM(precio_total) as IngresosTotalVentas FROM `ventas`'); //hace una suma de todos los totales de las ventas en la tabla ventas
							                $records->execute();
							                $results = $records->fetch(PDO::FETCH_ASSOC);

							                $IngresosTotalVentas=$results['IngresosTotalVentas']; //toma la columna IngresosTotalVentas y se le asigna de valor a $IngresosTotalVentas

							                echo ($IngresosTotalVentas); //muestra la suma de todas las ventas, los ingresos totales

							                ?></span></div>
                                            <div class="stat-heading">Ventas</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="ti-money"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">$<span class="count"><?php 
							                $records = $conn->prepare('SELECT SUM(monto) as gastos FROM `gastos_mantenimiento`'); 
							                $records->execute();
							                $results = $records->fetch(PDO::FETCH_ASSOC);

							                $gastos=$results['gastos'];

							                echo ($gastos); //muestra la suma de todas las ventas, los ingresos totales

							                ?></span></div>
                                            <div class="stat-heading">Gastos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="ti-view-grid"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php 
							                $records = $conn->prepare('SELECT count(*)ProductosComprados FROM `ganado`'); //selecciona todos los productos como una cuenta en la tabla detalleventa, para indicar que han sido comprados
							                $records->execute();
							                $results = $records->fetch(PDO::FETCH_ASSOC);

							                $ProductosComprados=$results['ProductosComprados']; //toma la columna ProductosComprados y se le asigna de valor a $ProductosComprados

							                echo $ProductosComprados; //muestra la cuenta de todos los productos que han sido ordenados

							                ?></span></div>
                                            <div class="stat-heading">Cantidad Ganado</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-4">
                        	<div class="card">
                        		<div class="card-body">
		                            <img class="card-img-top" src="https://images.pexels.com/photos/422218/pexels-photo-422218.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Card image cap">
		                            <div class="card-body">
		                                <h4 align="center" class="card-title mb-3">Comprar sin Complicaciones</h4>
		                                <p class="card-text">En nuestro sistema de ventas, hemos diseñado un proceso simple y transparente para que puedas adquirir los animales que necesitas con total confianza.</p>
		                                <a href="compras.php" type="button" class="btn btn-success">Más Información</a>
		                            </div>
		                        </div>
	                   		</div>
	                   	</div>
	                   	<div class="col-md-4">
                        	<div class="card">
                        		<div class="card-body">
		                            <img class="card-img-top" src="https://images.pexels.com/photos/877234/pexels-photo-877234.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Card image cap">
		                            <div class="card-body">
		                                <h4 align="center" class="card-title mb-3">Sistema de Control</h4>
		                                <p class="card-text">Explora nuestra selección premium de ganado en el sistema de ventas de Finca Mi Paraíso. Desde ganado de cría hasta animales destinados a la producción de carne o leche, tenemos lo que necesitas para tus objetivos ganaderos.</p>
		                            </div>
		                        </div>
	                   		</div>
	                   	</div>
	                   	<div class="col-md-4">
                        	<div class="card">
                        		<div class="card-body">
		                            <img class="card-img-top" src="https://images.pexels.com/photos/207044/pexels-photo-207044.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Card image cap">
		                            <div class="card-body">
		                                <h4 align="center" class="card-title mb-3">Información Detallada</h4>
		                                <p class="card-text">Nuestra plataforma en línea te permite acceder acceder a información detallada acerca de cada ejemplar, incluyendo su historial médico y detalles referentes a su crianza y proceso de reproducción.</p>
		                                <a href="ganado.php" type="button" class="btn btn-success">Más Información</a>
		                            </div>
		                        </div>
	                   		</div>
	                   	</div>
	                </div>
	                <div class="col-lg-5">
					    <div class="card">
					        <div class="card-header"><small>Registrar Nuevo</small><strong> Recordatorio</strong></div>
					        <div class="card-body card-block">
					            <form action="index.php" method="POST">
					                <div class="form-group">
					                    <div class="input-group">
					                        <div class="input-group-addon">Título:</div>
					                        <input name="titulo" type="text" id="titulo" placeholder="Ingrese el título del recordatorio" class="form-control" required>
					                    </div>
					                </div>
					                <div class="form-group">
					                    <div class="input-group">
					                        <div class="input-group-addon">Descripción:</div>
					                        <textarea name="descripcion" id="descripcion" placeholder="Ingrese la descripción del recordatorio" class="form-control" required></textarea>
					                    </div>
					                </div>
					                <div class="form-group">
					                    <div class="input-group">
					                        <div class="input-group-addon">Fecha:</div>
					                        <input name="fecha" type="date" id="fecha" class="form-control" required>
					                    </div>
					                </div>
					                <div class="form-group">
					                    <div class="input-group">
					                        <div class="input-group-addon">Hora:</div>
					                        <input name="hora" type="time" id="hora" class="form-control">
					                    </div>
					                </div>
					                <div class="form-actions form-group">
					                    <button type="submit" value="Crear Recordatorio" class="btn btn-info btn-sm">Crear Recordatorio</button>
					                </div>
					            </form>
					        </div>
					    </div>
					</div>
					<div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Recordatorios</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Titulo</th>
                                            <th>Descripcion</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <?php
                                            $bd="finca - mi paraiso";
                                            $enlace=mysqli_connect("localhost","root","",$bd);
                                            if(!$enlace){
                                                echo "Error, no conecta a la base de datos";
                                            }// estas líneas de arriba sirven para conectarse a la base de datos
                                            $resultados=$enlace->query("SELECT * FROM recordatorios");//selecciona todos los productos de la tabla detalle venta
                                            $consulta="SELECT * FROM recordatorios"; //selecciona todos los productos de la tabla detalle venta

                                            $resultados=$enlace->query($consulta);
                                            while($fila=$resultados->fetch_assoc()){ //$fila será un valor de una fila de lo que salga de la consulta que habiamos guardado anteriormente ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $fila['ID'];?></td>
                                            <td><?php echo $fila['Titulo'];?></td>
                                            <td><?php echo $fila['Descripcion'];?></td>
                                            <td><?php echo $fila['FechaRecordatorio'];?></td>
                                            <td><?php echo $fila['HoraRecordatorio'];?></td>
                                            <td>
											    <?php if ($fila['Estado'] == 'Pendiente') { ?>
											        <form action="marcar_realizado.php" method="POST">
											            <input type="hidden" name="recordatorio_id" value="<?php echo $fila['ID']; ?>">
											            <button type="submit" class="badge badge-pending">Pendiente</button>
											        </form>
											    <?php } else { ?>
											        <span class="badge badge-complete"><?php echo $fila['Estado']; ?></span>
											    <?php } ?>
											</td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>

                </div>
                <!-- /Widgets -->
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; Finca Mi Paraíso</a> - 2023 Todos los derechos reservados.
                    </div>
                    <div class="col-sm-6 text-right">
                        Diseñado por: <a href="#">Eva Maria Garcia Largo - Wendy Dayana Arcila Garcia - Laura Isabella Patiño Muñoz</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
</body>
</html>
