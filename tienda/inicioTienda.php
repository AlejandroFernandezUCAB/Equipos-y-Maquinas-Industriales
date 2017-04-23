<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if (isset($_SESSION['usuario'])) {
        $usuario=$_SESSION['usuario'];
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

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
                 <h1 class="page-header">Tienda                   
                </h1>
            </div>

            <div class="col-md-3">
                <div class="list-group">
                  <p class="lead">Tipos de maquinas y herramientas</p>
                            <?php
                                include '../conexion.php';
                                $queryTipo ="SELECT DISTINCT M_Tipo FROM maquinaria";
                                $resultado = $mysqli -> query($queryTipo);
                                while($f = $resultado->fetch_array(MYSQLI_ASSOC)){
                            ?>      
                                    <a href="busquedaProductos.php?tipo=<?php echo $f['M_Tipo'] ?>" class="list-group-item"><?php echo $f['M_Tipo']?></a>
                            <?php
                            }
                            echo "</div>"; //Fin del div del primer list group;
                            echo "<hr>";
                            echo "<div class=\"list-group\">";
                            echo "<p class=\"lead\">Clasificacion de maquinas y herramientas</p>";//Inicio del otro list group;
                            //Aqui meto la clasificacion
                                $queryClasificacion ="SELECT DISTINCT M_Clasificacion FROM maquinaria";
                                $resultados = $mysqli -> query($queryClasificacion);
                                while($f = $resultados->fetch_array(MYSQLI_ASSOC)){
                            ?>      
                                    <a href="busquedaProductos.php?clasificacion=<?php echo $f['M_Clasificacion'] ?>" class="list-group-item"><?php echo $f['M_Clasificacion']?></a>
                                <hr>
                            <?php
                            }   

                                $mysqli->close();
                            ?>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner"> 
                                <?php //Llenar carrusel
                                    include 'procedimientosPhp/conexion.php';
                                    $query= "SELECT FM_NombreArchivo from foto_maquinaria limit 0,3";
                                    $result = $mysqli->query($query);
                                    $contador=0;
                                    while($f = $result->fetch_array(MYSQLI_ASSOC)){
                                        if($contador==0){
                                ?>
                                <div class="item active">
                                  <center>  <img class="slide-image" src="../imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style="height: 236px; width: 360px;"></center>
                                </div>
                                <?php
                                        }else{
                                ?>
                                <div class="item">
                                    <center><img class="slide-image" src="../imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style="height: 236px; width: 360px;"></center>
                                </div>
                                <?php
                                        }
                                        $contador++;
                                    }
                                    $mysqli->close();
                                ?>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <!--Productos a mostrar-->
                                <?php
                                    include 'procedimientosPhp/conexion.php';
                                    $query="SELECT M_Id, M_Nombre,M_Descripcion,FM_NombreArchivo FROM foto_maquinaria,maquinaria  where M_Id=FM_Maquinaria and (M_Nombre LIKE '%BKM%')  limit 0,1";
                                    $result = $mysqli->query($query);                                    
                                    while($f = $result->fetch_array(MYSQLI_ASSOC)){
                                        
                                ?>
                                    <div class="col-sm-4 col-lg-4 col-md-4">
                                        <div class="thumbnail">
                                            <img src="../imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style="height: 150px; width: 320px;">
                                            <div class="caption">
                                                <h4><a href="productos/detalleProducto.php?id=<?php echo $f['M_Id']?>"><?php echo $f['M_Nombre']?></a>
                                                </h4>
                                                <p lang="es" style="text-align:justify"><?php echo utf8_encode($f['M_Descripcion']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                    $mysqli->close();
                                ?>

                                                                <?php
                                    include 'procedimientosPhp/conexion.php';
                                    $query="SELECT M_Id, M_Nombre,M_Descripcion,FM_NombreArchivo FROM foto_maquinaria,maquinaria  where M_Id=FM_Maquinaria and (M_Nombre LIKE '%BKM 2012%')  limit 0,1";
                                    $result = $mysqli->query($query);                                    
                                    while($f = $result->fetch_array(MYSQLI_ASSOC)){
                                        
                                ?>
                                    <div class="col-sm-4 col-lg-4 col-md-4">
                                        <div class="thumbnail">
                                            <img src="../imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style="height: 150px; width: 320px;">
                                            <div class="caption">
                                                <h4><a href="productos/detalleProducto.php?id=<?php echo $f['M_Id']?>"><?php echo $f['M_Nombre']?></a>
                                                </h4>
                                                <p lang="es" style="text-align:justify"><?php echo utf8_encode($f['M_Descripcion']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                    $mysqli->close();
                                ?>

                                                                <?php
                                    include 'procedimientosPhp/conexion.php';
                                    $query="SELECT M_Id, M_Nombre,M_Descripcion,FM_NombreArchivo FROM foto_maquinaria,maquinaria  where M_Id=FM_Maquinaria limit 0,4";
                                    $result = $mysqli->query($query);                                    
                                    while($f = $result->fetch_array(MYSQLI_ASSOC)){
                                        
                                ?>
                                    <div class="col-sm-4 col-lg-4 col-md-4">
                                        <div class="thumbnail">
                                            <img src="../imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style="height: 150px; width: 320px;">
                                            <div class="caption">
                                                <h4><a href="productos/detalleProducto.php?id=<?php echo $f['M_Id']?>"><?php echo $f['M_Nombre']?></a>
                                                </h4>
                                                <p lang="es" style="text-align:justify"><?php echo utf8_encode($f['M_Descripcion']) ?></p>
                                            </div>
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
