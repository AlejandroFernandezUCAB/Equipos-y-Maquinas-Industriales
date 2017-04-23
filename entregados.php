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
                                <a href="carrito.php">Mi Carrito</a>
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
                    <a href="perfil.php" class="list-group-item">Mi Perfil</a>
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
                <h2>Pedidos <small>Entregados</small></h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id venta</th>
                                    <th>Fecho de venta</th>
                                    <th>Fecha de entrega</th>
                                    <th>Total(Bsf)</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'conexion.php';
                                $subQuery ="SELECT U_Id FROM Usuario where U_Nombre LIKE '".$usuario."' ";
                                $query = "SELECT V_Id, V_FechaVenta, V_Total,V_FechaEntrega FROM Cliente,Venta WHERE (".$subQuery.")=C_Usuario AND V_Cliente=C_Id AND V_Estatus LIKE 'Entregado' ";
                                $result = $mysqli -> query($query);
                                $i=0;
                                $j=0;                       
                                $matriz;
                                $result = $mysqli -> query($query);
                                while($f = $result->fetch_array(MYSQLI_ASSOC)){
                                         echo "<tr>";
                                         echo "<td>".$f['V_Id']."</td>";
                                         echo "<td>".$f['V_FechaVenta']."</td>";
                                         echo "<td>".$f['V_FechaEntrega']."</td>";
                                         echo "<td>".$f['V_Total']."</td>";
                                         echo "<td><a href=\"detalleCompra.php?id=".$f['V_Id']."\" class=\"button alt small\">Detalle</a></td>";
                                         echo "</tr>";

                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
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
