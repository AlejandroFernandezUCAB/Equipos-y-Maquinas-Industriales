<?php
    session_start();
    if(isset($_SESSION['usuario'])){   
        $usuario=$_SESSION['usuario'];
    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }

    if(isset($_GET['agregado'])){
        echo "<script type=\"text/javascript\">alert(\"Ud agrego satisfactoriamente el producto\");</script>";
    }
    
    if(isset($_GET['error'])){
     echo "<script type=\"text/javascript\">alert(\"Ud debe iniciar sesión\");</script>";   
    }

    if(isset($_GET['correo'])){
     echo "<script type=\"text/javascript\">alert(\"Se le contactará en cualquier momento por su correo y su número de telefono proporcionado al sistema\");</script>";   
    }

    if(isset($_GET['login'])){
     echo "<script type=\"text/javascript\">alert(\"Por favor inicie sesión ó regístrese en el sistema para obtener mas información\");</script>";   
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

    <title>Tienda - Equipos y Maquinas Industriales </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

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
                     <form role="search" class="navbar-form navbar-right" action="../procedimientosPhp/buscador.php" method="POST">
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
                                <a href="../carrito.php">Mi Carrito</a>
                            </li>
                            <li>
                                <a href="../../procedimientosPhp/cerrarSesion.php">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                        }else{
                    ?>
                    <li>
                        <a href="../../registro.php">Regístrate</a>
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
                                    <form role="form" action ="../../procedimientosPhp/iniciarSesion.php" method="POST">
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
                 <h1 class="page-header">Tienda -  Detalles de la máquina                   
                </h1>
            </div>
            <div class="col-md-3">
                <div class="list-group">
                  <p class="lead">Máquinas de construcción</p>
                    <a href="../busquedaProductos.php?clasificacion=Construccion&tipo=Equipo" class="list-group-item">Equipos</a>
                    <a href="../busquedaProductos.php?clasificacion=Construccion&tipo=Accesorio" class="list-group-item">Accesorios</a>
                    <a href="../busquedaProductos.php?clasificacion=Construccion&tipo=Repuesto" class="list-group-item">Repuestos</a>
                </div>

                <hr>

                <div class="list-group">
                    <p class="lead">Máquinas de perforación</p>
                    <a href="../busquedaProductos.php?clasificacion=Perforacion&tipo=Equipo" class="list-group-item">Equipos</a>
                    <a href="../busquedaProductos.php?clasificacion=Perforacion&tipo=Accesorio" class="list-group-item">Accesorios</a>
                    <a href="../busquedaProductos.php?clasificacion=Perforacion&tipo=Repuesto" class="list-group-item">Repuestos</a>    
                </div>

                <hr>

                <div class="list-group">
                    <p class="lead">Máquinas herramientas</p>
                    <a href="../busquedaProductos.php?clasificacion=Herramientas&tipo=Equipo" class="list-group-item">Equipos</a>
                    <a href="../busquedaProductos.php?clasificacion=Herramientas&tipo=Accesorio" class="list-group-item">Accesorios</a>
                    <a href="../busquedaProductos.php?clasificacion=Herramientas&tipo=Repuesto" class="list-group-item">Repuestos</a>    
                </div>

                <hr>

                <div class="list-group">
                    <p class="lead">Herramientas varias</p>
                    <a href="../busquedaProductos.php?clasificacion=Varias&tipo=Equipo" class="list-group-item">Equipos</a>
                    <a href="../busquedaProductos.php?clasificacion=Varias&tipo=Accesorio" class="list-group-item">Accesorios</a>
                    <a href="../busquedaProductos.php?clasificacion=Varias&tipo=Repuesto" class="list-group-item">Repuestos</a>    
                </div>
            </div>

            <div class="col-md-9">
                <div class="thumbnail">
                    <!--Carrusel-->
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php //Llenar carrusel
                                    include '../procedimientosPhp/conexion.php';
                                    $query= "SELECT FM_NombreArchivo from foto_maquinaria  WHERE FM_Maquinaria=".$id;
                                    $contador=0;
                                    if($result = $mysqli->query($query)){
                                        $row_cnt = $result->num_rows;
                                        $result->close();
                                    }
                                    while($contador<$row_cnt){
                                        if($contador==0){
                                ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <?php
                                        }else{
                                ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $contador?>"></li>
                                <?php
                                        }
                                        $contador++;
                                    }
                                    echo "</ol>";
                                    echo "<div class=\"carousel-inner\">";
                                    $result = $mysqli->query($query);
                                    $contador=0;
                                    while($f = $result->fetch_array(MYSQLI_ASSOC)){
                                        if($contador==0){
                                ?>
                                <div class="item active">
                                  <center>  <img class="slide-image" src="imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style="height: 236px; width: 360px;"></center>
                                </div>
                                <?php
                                        }else{
                                ?>
                                <div class="item">
                                    <center><img class="slide-image" src="imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style="height: 236px; width: 360px;"></center>
                                </div>
                                <?php
                                        }
                                        $contador++;
                                    }
                                ?>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    <div class="caption-full">
                    <?php
                        $query="SELECT M_Id,M_Nombre,M_Descripcion,M_Tipo,M_Clasificacion from maquinaria where M_Id=".$id;
                        $resultado = $mysqli->query($query);
                        while($f = $resultado->fetch_array(MYSQLI_ASSOC)){
                            $identificador=$f['M_Id'];
                    ?>
                        <h4><a href="detalleProducto.php?id=<?php echo $f['M_Id']?>"><?php echo utf8_encode($f['M_Nombre'])?></a>
                        </h4>
                        <p><strong>Clasificación:</strong><?php echo $f['M_Clasificacion']?></p>
                        <p><strong>Tipo:</strong><?php echo $f['M_Tipo']?></p>
                        <p><strong>Descripción:</strong><br><?php echo utf8_encode($f['M_Descripcion'])?></p>
                    <?php
                        }
                    ?>
                    </div>
                </div>

                <div class="well">
                    
                    <?php
                        $query="SELECT DM_Estado estado,Dm_Precio precio, COUNT(*) cantidad FROM detalle_maquinaria WHERE Dm_Maquinaria=".$id." AND Dm_Id NOT IN (SELECT Dv_DetalleMaquinaria from detalle_venta) GROUP BY Dm_Estado Order By cantidad DESC";
                        $resultado=$mysqli->query($query);
                        while($f = $resultado->fetch_array(MYSQLI_ASSOC)){
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="pull-right"><strong>Precio:</strong>Consulte al proveedor</span>
                            <p><strong>Estado:</strong><?php echo utf8_encode($f['estado']) ?></p>
                            <p><strong>Cantidad disponible:</strong><?php echo $f['cantidad'] ?></p>
                            <form action="procedimientosPhp/correo.php?id=<?php echo $identificador?>&&estado=<?php echo utf8_encode($f['estado'])?>" method="POST">
                                <div class="text-right">
                                     <input type="submit" class="btn btn-success" class="pull-right" value="Consultar al proveedor">
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                    <?php
                        }
                        $mysqli->close();
                    ?>
                </div>
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
