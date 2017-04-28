<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        $usuario=$_SESSION['usuario'];
    }

    if(isset($_GET['tipo'])){
        $tipo=$_GET['tipo'];        
    }

    if(isset($_GET['clasificacion'])){
        $clasificacion=$_GET['clasificacion'];
    }

    if(isset($_GET['producto'])){
        $producto=$_GET['producto'];    
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tienda - Equipos y Maquinas Industriales</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

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
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Equipos y Maquinas Industriales</a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                     <form role="search" class="navbar-form navbar-right" action="procedimientosPhp/buscador.php" method="POST">
                         <div class="form-group">
                              <input type="text" placeholder="Búsqueda de productos" name="buscador" class="form-control">
                         </div>
                     </form>
                    </li>
                    <?php
                        if(isset($usuario)){
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Perfil<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="carrito.php">Mi Carrito</a>
                            </li>
                            <li>
                                <a href="../procedimientosPhp/cerrarSesion.php">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                        }else{
                    ?>
                    <li>
                        <a href="../registro.php">Regístrate</a>
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
                                    <form role="form" action ="../procedimientosPhp/iniciarSesion.php" method="POST">
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

        <div class="row">
            <div class="col-lg-12">
                 <h1 class="page-header">Búsqueda de productos                   
                </h1>
            </div>

            <div class="col-md-3">
                <div class="list-group">
                  <p class="lead">Máquinas de construcción</p>
                    <a href="busquedaProductos.php?clasificacion=Construccion&tipo=Equipo" class="list-group-item">Equipos</a>
                    <a href="busquedaProductos.php?clasificacion=Construccion&tipo=Accesorio" class="list-group-item">Accesorios</a>
                    <a href="busquedaProductos.php?clasificacion=Construccion&tipo=Repuesto" class="list-group-item">Repuestos</a>
                </div>

                <hr>

                <div class="list-group">
                    <p class="lead">Máquinas de perforación</p>
                    <a href="busquedaProductos.php?clasificacion=Perforacion&tipo=Equipo" class="list-group-item">Equipos</a>
                    <a href="busquedaProductos.php?clasificacion=Perforacion&tipo=Accesorio" class="list-group-item">Accesorios</a>
                    <a href="busquedaProductos.php?clasificacion=Perforacion&tipo=Repuesto" class="list-group-item">Repuestos</a>    
                </div>

                <hr>

                <div class="list-group">
                    <p class="lead">Máquinas herramientas</p>
                    <a href="busquedaProductos.php?clasificacion=Herramientas&tipo=Equipo" class="list-group-item">Equipos</a>
                    <a href="busquedaProductos.php?clasificacion=Herramientas&tipo=Accesorio" class="list-group-item">Accesorios</a>
                    <a href="busquedaProductos.php?clasificacion=Herramientas&tipo=Repuesto" class="list-group-item">Repuestos</a>    
                </div>

                <hr>

                <div class="list-group">
                    <p class="lead">Herramientas varias</p>
                    <a href="busquedaProductos.php?clasificacion=Varias&tipo=Equipo" class="list-group-item">Equipos</a>
                    <a href="busquedaProductos.php?clasificacion=Varias&tipo=Accesorio" class="list-group-item">Accesorios</a>
                    <a href="busquedaProductos.php?clasificacion=Varias&tipo=Repuesto" class="list-group-item">Repuestos</a>    
                </div>
            </div>

            <div class="col-md-9">
            <?php
                include 'procedimientosPhp/busquedaProductos.php';
            ?>                             
            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

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
