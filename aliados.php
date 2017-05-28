<?php
    session_start();
    if (isset($_SESSION['usuario'])) {

        $usuario=$_SESSION['usuario'];
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aliados - Equipos y Maquinas Industriales</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Equipos y Maquinas Industriales</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="tienda/inicioTienda.php">Tienda</a>
                    </li>
                    <?php
                        if(isset($usuario)){
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Perfil<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="tienda/carrito.php">Mi Carrito</a>
                            </li>
                            <li>
                                <a href="procedimientosPhp/cerrarSesion.php">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                        }else{
                    ?>
                    <li>
                        <a href="registro.php">Regístrate</a>
                    </li>
                    <li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" width="150px">Iniciar Sesion<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <div class="login-panel panel panel-default" width="150px">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Iniciar Sesión</h3>
                                </div>
                                <div class="panel-body" width="150px">
                                    <form role="form" action ="procedimientosPhp/iniciarSesion.php" method="POST">
                                        <fieldset>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Usuario" name="usuario" type="text" autofocus required="required" width="500px">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Contraseña" name="contrasenas" type="password" value="" required="required" width="150px">
                                            </div>
                                            <!-- Change this to a button or input when using this as a form -->
                                           <center> <button type="submit" class="btn btn-default">Ingresar</button></center>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>                                                  
                        </ul>
                    </li>
                    </li>
                    
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nuestros aliados y socios</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
            <div class="col-md-12">
                <?php
                    include 'conexion.php';
                    $query="SELECT A_Nombre nombre, (SELECT L_Nombre from lugar where L_Id=A_Lugar) lugar,A_Foto foto,CONCAT('+',T_Codigo,'-',T_Area,'-',T_numero) telefono FROM aliado,telefono WHERE A_Id=T_Aliado";
                    $result=$mysqli->query($query);
                    while($f = $result->fetch_array(MYSQLI_ASSOC)){
                    ?>
                    <div class="col-md-12">
                        <h2 class="page-header"><?php echo $f['nombre'] ?></h2>
                    </div>
                    <div class="col-md-6">
                        <p>Ubicación: <?php echo $f['lugar']?></p>
                        <br>
                        <p>Teléfono: <?php echo $f['telefono']?></p>
                    </div>
                    <div class="col-md-6">
                        <img class="img-responsive" src="imagenes/<?php echo $f['foto']?>" alt="">
                    </div>
                    <hr>
                    <?php
                    }
                ?>
            </div>
            <!-- Content Column -->
            
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
         <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Equipos y Maquinas Industriales 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
