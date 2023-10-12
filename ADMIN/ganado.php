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
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}

$message='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $raza = $_POST["raza"];
    $sexo = $_POST["sexo"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $estado_salud = $_POST["estado_salud"];
    $historial_medico = $_POST["historial_medico"];
    $otros_detalles = $_POST["otros_detalles"];

    $sql = "INSERT INTO ganado(id, tipo, raza, sexo, fecha_nacimiento, estado_salud, historial_medico, otros_detalles) VALUES (NULL, :tipo, :raza, :sexo, :fecha_nacimiento, :estado_salud, :historial_medico, :otros_detalles)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':raza', $raza);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $stmt->bindParam(':estado_salud', $estado_salud);
    $stmt->bindParam(':historial_medico', $historial_medico);
    $stmt->bindParam(':otros_detalles', $otros_detalles);

    if ($stmt->execute()) {
        $message = 'Animal registrado exitosamente';
    } else {
        $message = 'Lo sentimos, no pudimos crear el animal';
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><i class="menu-icon fa fa-home"></i>Inicio </a></li>
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
                        <a href="compras.php"><i class="menu-icon fa fa-tags"></i>Compras </a></li>
                        <li><a href="gastos.php"><i class="menu-icon fa fa-th-large"></i>Mantenimiento </a></li>
                        <li><a href="usuarios.php"><i class="menu-icon fa fa-users"></i>Usuarios </a></li>
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
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Ganado</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#"><?php if(!empty($message)): ?><p><?= $message ?></p><?php endif; ?></a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Estadísticas de Ganado</h4>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <div class="flot-container">
                                    <canvas id="ganadoChart"></canvas>
                                </div>
                            </div>
                        </div><!-- /# card -->
                    </div>
                    <script>
                        <?php
                            $bd = "finca - mi paraiso";
                            $enlace = mysqli_connect("localhost", "root", "", $bd);
                            if (!$enlace) {
                                echo "Error, no conecta a la base de datos";
                            }

                            $query = "SELECT tipo, COUNT(*) AS cantidad FROM ganado GROUP BY tipo";
                            $resultado = mysqli_query($enlace, $query);

                            $dataLabels = [];
                            $dataCounts = [];

                            while ($row = mysqli_fetch_assoc($resultado)) {
                                $dataLabels[] = $row["tipo"];
                                $dataCounts[] = $row["cantidad"];
                            }
                        ?>

                        // Datos para la gráfica de columnas
                        var datosCompras = {
                            labels: <?php echo json_encode($dataLabels); ?>,
                            datasets: [{
                                label: 'Cantidad de Ganado',
                                data: <?php echo json_encode($dataCounts); ?>,
                                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        };

                        // Configura la gráfica de columnas
                        var ctx = document.getElementById('ganadoChart').getContext('2d');
                        var ganadoChart = new Chart(ctx, {
                            type: 'bar',
                            data: datosCompras,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><small>Registrar Nuevo</small><strong> Ganado</strong></div>
                                <div class="card-body card-block">
                                        <form action="ganado.php" method="POST">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Tipo de Ganado:</div>
                                                    <select name="tipo" class='form-control' id="tipo">
                                                            <option value="vaca">Vaca</option>
                                                            <option value="toro">Toro</option>
                                                            <option value="novillo">Novillo</option>
                                                            <option value="vaquillona">Vaquillona</option>
                                                            <option value="novillito">Novillito</option>
                                                            <option value="ternero">Ternero</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Raza del Animal:</div>
                                                    <select name="raza" class='form-control' id="raza">
                                                            <option value="Angus">Angus</option>
                                                            <option value="Charolais">Charolais</option>
                                                            <option value="Hereford">Hereford</option>
                                                            <option value="Holstein">Holstein</option>
                                                            <option value="Limousin">Limousin</option>
                                                            <option value="Simmental">Simmental</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Sexo:</div>
                                                    <select name="sexo" class='form-control' id="sexo">
                                                            <option value="vaca">Macho</option>
                                                            <option value="toro">Hembra</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-calendar-o"></i></div>
                                                    <input name="fecha_nacimiento" class="form-control" type="date" id="fecha_nacimiento" value="fecha_nacimiento" placeholder="Ingrese la fecha de nacimiento del animal" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                    <input name="estado_salud" type="text" id="estado_salud" placeholder="Ingresa el estado de salud del animal" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-stethoscope"></i></div>
                                                    <input name="historial_medico" type="text" id="historial_medico" placeholder="Ingresa el historial medico del animal" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-chevron-right"></i></div>
                                                    <input name="otros_detalles" type="text" id="otros_detalles" placeholder="Ingresa otros detalles" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-actions form-group"><button type="submit" value="Registrar Compra" class="btn btn-success btn-sm">Registrar el Ganado</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Vista de Ganado</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tipo de Ganado</th>
                                            <th>Raza</th>
                                            <th>Sexo</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Estado de Salud</th>
                                            <th>Historial Medico</th>
                                            <th>Otros Detalles</th>
                                        </tr>
                                    </thead>
                                    <?php
                                            $bd="finca - mi paraiso";
                                            $enlace=mysqli_connect("localhost","root","",$bd);
                                            if(!$enlace){
                                                echo "Error, no conecta a la base de datos";
                                            }// estas líneas de arriba sirven para conectarse a la base de datos
                                            $resultados=$enlace->query("SELECT * FROM ganado");//selecciona todos los productos de la tabla detalle venta
                                            $consulta="SELECT * FROM ganado"; //selecciona todos los productos de la tabla detalle venta

                                            $resultados=$enlace->query($consulta);
                                            while($fila=$resultados->fetch_assoc()){ //$fila será un valor de una fila de lo que salga de la consulta que habiamos guardado anteriormente ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $fila['id'];?></td>
                                            <td><?php echo $fila['tipo'];?></td>
                                            <td><?php echo $fila['raza'];?></td>
                                            <td><?php echo $fila['sexo'];?></td>
                                            <td><?php echo $fila['fecha_nacimiento'];?></td>
                                            <td><?php echo $fila['estado_salud'];?></td>
                                            <td><?php echo $fila['historial_medico'];?></td>
                                            <td><?php echo $fila['otros_detalles'];?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div><!-- .animated -->
        

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
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
