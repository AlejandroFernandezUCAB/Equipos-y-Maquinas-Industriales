<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        $usuario=$_SESSION['usuario'];
    }

    if (isset($_GET['error'])) {
        $error=$_GET['error'];
    }else{
        $error=null;
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

    <title>Equipos y Maquinas Industriales</title>

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
                        <a href="index.php">Inicio</a>
                    </li>
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
                                <a href="perfil.php">Mi Perfil</a>
                            </li>
                            <li>
                                <a href="carrito.php">Mi Carrito</a>
                            </li>
                            <li>
                                <a href="procedimientosPhp/cerrarSesion.php">Cerrar Sesión</a>
                            </li>
                        </ul>
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
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Registro
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <?php
                if($error==2){
            ?>
            <div class="alert alert-danger">
                <strong>Este usuario ya existe</strong>, por favor ingrese otro.
            </div>
            <?php
                }elseif ($error==1) {
            ?>  
            <div class="alert alert-danger">
                <strong>Las contraseñas no coinciden</strong>, verifique nuevamente
            </div>
            <?php
                }
            ?>
            <form class="form-horizontal" action="procedimientosPhp/operacionRegistro.php" method="post">
                <div class="jumbotron">
                <div class="form-group">
                  <div class="col-sm-3"></div>
                  <label class="control-label col-sm-2" for="text">Usuario:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" placeholder="Introduce el usuario" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3"></div>
                  <label class="control-label col-sm-2" for="pwd">Contraseña:</label>
                  <div class="col-sm-3"> 
                    <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Introduce la contraseña" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3"></div>
                  <label class="control-label col-sm-2" for="pwd">Confirma contraseña:</label>
                  <div class="col-sm-3"> 
                    <input type="password" class="form-control" name ="confirmarContrasena" id="confirmarContrasena" placeholder="Confirma contraseña" required="required">
                  </div>
                </div>
                <div class="form-group"> 
                       <div class="col-sm-offset-6">
                            <button type="submit" class="btn btn-default">Regístrate</button>
                       </div>
                     </div> 
                </div>
            </form>
        </div>
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
