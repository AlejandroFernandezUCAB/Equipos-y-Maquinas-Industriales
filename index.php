<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        $usuario=$_SESSION['usuario'];
    }
    if(isset($_GET['error'])){
        echo "<script type='text/javascript'>alert('El usuario y la contraseña no coinciden');</script>";
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

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('imagenes/stroidormashLogo1.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Stroidormash S.A</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('imagenes/TCCLogo1.jpg');"></div>
                <div class="carousel-caption">
                    <h2>TCC</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('imagenes/BKM-2012 (1).jpg');"></div>
                <div class="carousel-caption">
                    <h2>BKM 2012</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('imagenes/BKM-232 (3).jpg');"></div>
                <div class="carousel-caption">
                    <h2>BKM 2032</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Bienvenido a Equipos y Máquinas Industriales
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>Tienda</h4>
                    </div>
                    <div class="panel-body">
                        <p>En nuestra tienda podrá conseguir todo tipo de maquinas y equipos industriales, con nuestro buscador podrá encontrar lo esencial.</p>
                        <a href="tienda/inicioTienda.php" class="btn btn-default">Ingresar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i>Contáctenos</h4>
                    </div>
                    <div class="panel-body">
                        <p>¿Deseas más información? Ingrese a nuestra sección de información donde podrá conseguir todos los contactos</p>
                        <a href="contacto.php" class="btn btn-default">Contáctenos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Nuestros aliados</h4>
                    </div>
                    <div class="panel-body">
                        <p>Aquí podrá ver más informacion de nuestros aliados y socios</p>
                        <br>
                        <a href="aliados.php" class="btn btn-default">Más información</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Nuestros productos</h2>
            </div>
            <?php
                include 'conexion.php';
                $query="SELECT M_Nombre, M_Descripcion, FM_Maquinaria, FM_NombreArchivo FROM foto_maquinaria, maquinaria WHERE FM_Maquinaria =53 AND M_id =53 LIMIT 0 , 1";
                $result=$mysqli->query($query);
                while($f = $result->fetch_array(MYSQLI_ASSOC)){
                    $descripcion=utf8_encode($f['M_Descripcion']);
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i><?php echo utf8_encode($f['M_Nombre'])?></h4>
                    </div>
                    <div class="panel-body">
                        <img class="img-responsive img-portfolio img-hover" src="imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style ="height: 150px;  width:400px;">
                        <p><?php echo substr($descripcion,0,134)."..."?></p>
                       <center><a href="tienda/productos/detalleProducto.php?id=<?php echo $f['FM_Maquinaria']?>" class="btn btn-default">Detalles</a></center>
                    </div>
                </div>
            </div>
            <?php
                }
                $mysqli->close();
            ?>
            <?php
                include 'conexion.php';
                $query="SELECT M_Nombre,M_Descripcion,FM_Maquinaria,FM_NombreArchivo FROM foto_maquinaria,maquinaria  where FM_Maquinaria=M_Id and M_Nombre LIKE '%BKM 2012%'limit 0,1";
                $result=$mysqli->query($query);
                while($f = $result->fetch_array(MYSQLI_ASSOC)){
                    $descripcion=utf8_encode($f['M_Descripcion']);
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i><?php echo utf8_encode($f['M_Nombre'])?></h4>
                    </div>
                    <div class="panel-body">
                        <img class="img-responsive img-portfolio img-hover" src="imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style ="height: 150px;  width:400px;">
                        <p><?php echo substr($descripcion,0,134)."..."?></p>
                       <center><a href="tienda/productos/detalleProducto.php?id=<?php echo $f['FM_Maquinaria']?>" class="btn btn-default">Detalles</a></center>
                    </div>
                </div>
            </div>
            <?php
                }
                $mysqli->close();
            ?>
            <?php
                include 'conexion.php';
                $query="SELECT M_Nombre,M_Descripcion,FM_Maquinaria,FM_NombreArchivo FROM foto_maquinaria,maquinaria  where FM_Maquinaria=M_Id AND M_Id!=2 limit 0,4";
                $result=$mysqli->query($query);
                $nombre="";
                $contadorFotos=0;
                while($f = $result->fetch_array(MYSQLI_ASSOC)){
                    $descripcion=utf8_encode($f['M_Descripcion']);
                    if($nombre!=$f['M_Nombre']){
                        $nombre=utf8_encode($f['M_Nombre']);
                        $contador=0;
                    }else{
                        $contador=1;
                    }

                    if(strlen($descripcion)>=134 AND $contador==0){
            ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><i class="fa fa-fw fa-check"></i><?php echo utf8_encode($f['M_Nombre'])?></h4>
                                </div>
                                <div class="panel-body">
                                    <img class="img-responsive img-portfolio img-hover" src="imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style ="height: 150px;  width:400px;">
                                    <p><?php echo substr($descripcion,0,134)."..."?></p>
                                   <center><a href="tienda/productos/detalleProducto.php?id=<?php echo $f['FM_Maquinaria']?>" class="btn btn-default">Detalles</a></center>
                                </div>
                            </div>
                        </div>
            <?php
                    }else{
            ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><i class="fa fa-fw fa-check"></i><?php echo utf8_encode($f['M_Nombre'])?></h4>
                                </div>
                                <div class="panel-body">
                                    <img class="img-responsive img-portfolio img-hover" src="imagenes/<?php echo $f['FM_NombreArchivo']?>" alt="" style ="height: 150px;  width:400px;">
                                    <p><?php echo $descripcion?></p>
                                    <br>
                                   <center><a href="tienda/productos/detalleProducto.php?id=<?php echo $f['FM_Maquinaria']?>" class="btn btn-default">Detalles</a></center>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
                $mysqli->close();
            ?>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">¿Quiénes somos?</h2>
            </div>
            <div class="col-md-6">
                <p style="text-align: justify">Somos un grupo de profesionales en las diversas ramas de la industria brindando asesoría técnica y nos encargamos de vender, distribuir, comercializar, representar y buscar las diferentes marcas de máquinas, herramientas y equipos  en el campo industrial tales como metal mecánica, rectificación, maquinaria pesada para la construcción, herramientas, accesorios, vehículos y repuestos de todo lo relacionados con el ramo. Ténemos alianzas estratégicas con empresas y personas relacionadas y especialistas en el ramo, en el territorio nacional y países como Rusia, Ucrania, Bélgica, Italia y EEUU entre otros, con esto logramos alcanzar satisfacer las necesidades de nuestros clientes  en tiempo record.</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="imagenes/banner.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-lg btn-default btn-block" href="#">Volver arriba</a>
                </div>
            </div>
        </div>

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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
