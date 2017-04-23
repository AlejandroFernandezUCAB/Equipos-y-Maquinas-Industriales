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

    <title>Mi Perfil - Equipos y Maquinas Industriales</title>

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
                <h1 class="page-header">Mi Perfil
                    <small><?php echo $usuario?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <p>Menú</p>
                <div class="list-group">
                    <a href="index.php" class="list-group-item">Inicio</a>
                    <a href="procedimientosPhp/cerrarSesion.php" class="list-group-item">Cerrar Sesión</a>
                </div>
                <hr>
                <p>Pedidos</p>
                <div class="list-group">
                    <a href="porpagar.php" class="list-group-item">Por pagar</a>
                    <a href="porconfirmarpago.php" class="list-group-item">Por confirmar pago</a>
                    <a href="cancelados.php" class="list-group-item">Cancelados</a>
                    <a href="entregados.php" class="list-group-item">Entregados</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2>Pedidos</h2>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th>Tipo de pedido</th>
                                <th>Cantidad</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'conexion.php';
                                $subquery="Select U_Id from usuario where U_nombre LIKE '".$usuario."'";
                                $query= "SELECT V_Estatus estatus, Count(*) cuenta from venta,cliente where  (".$subquery.")=C_usuario AND C_Id=V_Cliente group by V_Estatus";
                                $result=$mysqli->query($query);
                                while($f = $result->fetch_array(MYSQLI_ASSOC)){
                            ?>
                             <tr>
                               <td><?php echo $f['estatus']?></td>
                               <td><?php echo $f['cuenta']?></td>
                             </tr>
                             <?php
                                }
                             ?>
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="col-md-9">
                <h2>Novedades en productos</h2>
                <?php
                    include 'conexion.php';
                    $query="SELECT M_Nombre,M_Descripcion,FM_Maquinaria,FM_NombreArchivo FROM foto_maquinaria,maquinaria  where FM_Maquinaria=M_Id limit 0,6";
                    $result=$mysqli->query($query);
                    while($f = $result->fetch_array(MYSQLI_ASSOC)){
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-check"></i><?php echo $f['M_Nombre']?></h4>
                        </div>
                        <div class="panel-body">
                            <img class="img-responsive img-portfolio img-hover" src="imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style ="height: 150px;  width:400px;">
                            <p><?php echo $f['M_Descripcion']?></p>
                           <center><a href="tienda/productos/detalleProducto.php?id=<?php echo $f['FM_Maquinaria']?>" class="btn btn-default">Detalles</a></center>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    $mysqli->close();
                ?>
            </div>
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
