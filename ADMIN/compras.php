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
    $tipo_ganado = $_POST["tipo_ganado"];
    $peso_ganado = floatval($_POST["peso_ganado"]);
    $nombre_vendedor = $_POST["nombre_vendedor"];
    $telefono_vendedor = $_POST["telefono_vendedor"];
    $direccion_vendedor = $_POST["direccion_vendedor"];
    $ganado_traido = $_POST["ganado_traido"];

    // Calcular el precio según la fórmula
    switch ($tipo_ganado) {
        case "vaca":
            $precio_base = 0;
            break;
        case "toro":
            $precio_base = 0;
            break;
        case "novillo":
            $precio_base = 90000;
            break;
        case "vaquillona":
            $precio_base = 80000;
            break;
        case "novillito":
            $precio_base = 70000;
            break;
        case "ternero":
            $precio_base = 100000;
            break;
        default:
            $precio_base = 0;
    }

    $precio_total = ((($peso_ganado * 1500) + $precio_base) * $ganado_traido);

    //Asignar Imagen
    switch ($tipo_ganado) {
        case "vaca":
            $Imagen = 'service-1.jpg';
            break;
        case "toro":
            $Imagen = 'toro.jpg';
            break;
        case "novillo":
            $Imagen = 'banner-2.jpg';
            break;
        case "vaquillona":
            $Imagen = 'gallery-2.jpg';
            break;
        case "novillito":
            $Imagen = 'novillo.jpg';
            break;
        case "ternero":
            $Imagen = 'ternero.jpg';
            break;
        default:
            $Imagen = 'service-1.jpg';
    }

    $sql = "INSERT INTO `compras`(`id`, `Imagen`, `tipo_ganado`, `peso_ganado`, `nombre_vendedor`, `telefono_vendedor`, `direccion_vendedor`, `precio_total`, `ganado_traido`, `fecha_venta`) 
            VALUES (NULL, '$Imagen', '$tipo_ganado', $peso_ganado, '$nombre_vendedor', '$telefono_vendedor', '$direccion_vendedor', $precio_total, $ganado_traido, NOW())";

    if ($conn->query($sql) === TRUE) {
        $message = 'Compra registrada exitosamente';

    } else {
        $message = 'Lo sentimos, no pudimos crear la compra';
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
                        <li class="active"><a href="compras.php"><i class="menu-icon fa fa-tags"></i>Compras </a></li>
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
                                <h1>Compras</h1>
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
                                <h4 class="mb-3">Estadísticas de Compras</h4>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <div class="flot-container">
                                    <canvas id="comprasChart"></canvas>
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

                            $query = "SELECT tipo_ganado, COUNT(*) AS cantidad FROM compras GROUP BY tipo_ganado";
                            $resultado = mysqli_query($enlace, $query);

                            $dataLabels = [];
                            $dataCounts = [];

                            while ($row = mysqli_fetch_assoc($resultado)) {
                                $dataLabels[] = $row["tipo_ganado"];
                                $dataCounts[] = $row["cantidad"];
                            }
                        ?>

                        // Datos para la gráfica de columnas
                        var datosCompras = {
                            labels: <?php echo json_encode($dataLabels); ?>,
                            datasets: [{
                                label: 'Cantidad de Compras',
                                data: <?php echo json_encode($dataCounts); ?>,
                                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        };

                        // Configura la gráfica de columnas
                        var ctx = document.getElementById('comprasChart').getContext('2d');
                        var comprasChart = new Chart(ctx, {
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
                            <div class="card-header"><small>Registrar Nueva</small><strong> Compra</strong></div>
                                <div class="card-body card-block">
                                        <form action="compras.php" method="POST">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Tipo de Ganado:</div>
                                                    <select name="tipo_ganado" class='form-control' id="tipo_ganado">
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
                                                    <div class="input-group-addon"><i class="fa fa-tachometer"></i></div>
                                                    <input name="peso_ganado" class="form-control" type="number" id="peso_ganado" value="peso_ganado" min="0" max="10000"  placeholder="Ingrese el peso promedio de los animales en kg" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-minus"></i></div>
                                                    <input name="ganado_traido" class="form-control" type="number" id="ganado_traido" value="ganado_traido" min="1" max="100"  placeholder="Ingrese la cantidad de ganado que va a comprar" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-font"></i></div>
                                                    <input name="nombre_vendedor" type="text" id="nombre_vendedor" placeholder="Ingresa el nombre del vendedor" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                    <input name="telefono_vendedor" type="text" id="telefono_vendedor" placeholder="Ingresa el telefono del vendedor" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                                    <input name="direccion_vendedor" type="text" id="direccion_vendedor" placeholder="Ingresa la dirección del vendedor" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-actions form-group"><button type="submit" value="Registrar Compra" class="btn btn-success btn-sm">Registrar Compra</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Vista de Compras</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Imagen de Ganado</th>
                                            <th>Tipo de Ganado</th>
                                            <th>Peso por Animal</th>
                                            <th>Nombre del Vendedor</th>
                                            <th>Telefono del Vendedor</th>
                                            <th>Dirección del Vendedor</th>
                                            <th>Precio Total</th>
                                            <th>Ganado traido</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <?php
                                            $bd="finca - mi paraiso";
                                            $enlace=mysqli_connect("localhost","root","",$bd);
                                            if(!$enlace){
                                                echo "Error, no conecta a la base de datos";
                                            }// estas líneas de arriba sirven para conectarse a la base de datos
                                            $resultados=$enlace->query("SELECT * FROM compras");//selecciona todos los productos de la tabla detalle venta
                                            $consulta="SELECT * FROM compras"; //selecciona todos los productos de la tabla detalle venta

                                            $resultados=$enlace->query($consulta);
                                            while($fila=$resultados->fetch_assoc()){ //$fila será un valor de una fila de lo que salga de la consulta que habiamos guardado anteriormente ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $fila['id'];?></td>
                                            <td><img src="images/<?php echo $fila['Imagen']; //Se mostrará la imagen del producto, gracias a la variable $fila, que contiene el nombre de la imagen y luego lo busca en la carpeta images ?>" width= 90 height= 90></td>
                                            <td><?php echo $fila['tipo_ganado'];?></td>
                                            <td><?php echo $fila['peso_ganado'];?></td>
                                            <td><?php echo $fila['nombre_vendedor'];?></td>
                                            <td><?php echo $fila['telefono_vendedor'];?></td>
                                            <td><?php echo $fila['direccion_vendedor'];?></td>
                                            <td>$ <?php echo number_format ($fila['precio_total']);?></td>
                                            <td><?php echo $fila['ganado_traido'];?></td>
                                            <td><?php echo $fila['fecha_venta'];?></td>
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
