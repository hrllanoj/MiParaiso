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
   $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password); //creá un nuevo PDO (el PDO sirve para exponer características específicas de la base de datos, como las funciones habituales de la extensión) con la base de datos.
   } catch (PDOException $e) { //$e tomará PDOException como valor
   die('Connection Failed: ' . $e->getMessage()); //si la conexión falla mostrará la excepción PDO gracias a $e
   }

  $message = '';

  if (!empty($_POST['user']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (nombre, user, telefono, password, foto, rol_id) VALUES (:nombre, :user, :telefono, :password, :foto, 2)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':user', $_POST['user']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':foto', $_POST['foto']);

    if ($stmt->execute()) {
      $message = 'Nuevo Usuario Creado con Éxito';
    } else {
      $message = 'Lo sentimos, no pudimos crear el usuario';
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
                        <a href="compras.php"><i class="menu-icon fa fa-tags"></i>Compras </a>
                        <li><a href="gastos.php"><i class="menu-icon fa fa-th-large"></i>Mantenimiento </a></li>
                        <li class="active"><a href="usuarios.php"><i class="menu-icon fa fa-users"></i>Usuarios </a></li>
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
                                <h1>Usuarios</h1>
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
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header"><small>Crear Nuevo</small><strong> Usuario</strong><?php if(!empty($message)): ?><p><?= $message ?></p><?php endif; ?></div>
                                <div class="card-body card-block">
                                    <form action="usuarios.php" method="POST">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-font"></i></div>
                                                <input name="nombre" type="text" id="nombre" placeholder="Ingresa el nombre" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input name="user" type="text" id="user" placeholder="Ingresa el usuario" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                <input name="telefono" type="text" id="telefono" placeholder="Ingresa el telefono" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-camera"></i></div>
                                                <input name="foto" type="text" id="foto" placeholder="Ingresa el nombre de la foto (image.png)" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                <input name="password" type="password" id="password" placeholder="Ingrese la contraseña" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                <input name="confirm_password" type="password" id="confirm_password" placeholder="Confirmar contraseña" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Crear Usuario</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Vista de Usuarios</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th>Telefono</th>
                                            <th>Rol</th>
                                        </tr>
                                    </thead>
                                    <?php
                                            $bd="finca - mi paraiso";
                                            $enlace=mysqli_connect("localhost","root","",$bd);
                                            if(!$enlace){
                                                echo "Error, no conecta a la base de datos";
                                            }// estas líneas de arriba sirven para conectarse a la base de datos
                                            $resultados=$enlace->query("SELECT users.id, users.nombre, users.user, users.telefono, users.foto, roles.rol FROM users INNER JOIN roles ON users.rol_id = roles.Id_Rol");//selecciona todos los productos de la tabla detalle venta
                                            $consulta="SELECT users.id, users.nombre, users.user, users.telefono, users.foto, roles.rol FROM users INNER JOIN roles ON users.rol_id = roles.Id_Rol"; //selecciona todos los productos de la tabla detalle venta

                                            $resultados=$enlace->query($consulta);
                                            while($fila=$resultados->fetch_assoc()){ //$fila será un valor de una fila de lo que salga de la consulta que habiamos guardado anteriormente ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $fila['id'];?></td>
                                            <td><img src="images/<?php echo $fila['foto']; //Se mostrará la imagen del producto, gracias a la variable $fila, que contiene el nombre de la imagen y luego lo busca en la carpeta images ?>" width= 90 height= 90></td>
                                            <td><?php echo $fila['nombre'];?></td>
                                            <td><?php echo $fila['user'];?></td>
                                            <td><?php echo $fila['telefono'];?></td>
                                            <td><?php echo $fila['rol'];?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
</div>

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


</body>
</html>
