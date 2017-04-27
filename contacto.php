<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        $usuario=$_SESSION['usuario'];
    }
    if(isset($_GET['error'])){
        echo "<script type='text/javascript'>alert('El usuario y la contraseña no coinciden');</script>";
    }

    if(isset($_GET['confirmado'])){
        echo "<script type='text/javascript'>alert('Este atento a su telefono y su correo electronico proporcionado, en cualquier momento le responderemos');</script>";
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

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Contactos
                </h1>
            </div>

                <div class="col-md-6">
                    <br>
                        <h2>Contacto</h2>
                    <p>
                    Jose Gregorio Hinojosa Jaimes<br>
                    RIF:
                    V-05687388-7<br>
                    Caracas, Venezuela. <br>
                    Correos Electronicos: <br>
                    contacto@equiposymaquinasindustriales.com.ve<br>
                    equiposymaquinasindustriales@gmail.com<br>
                    +584147312644/+584121719983<br>
                    07 am - 05 pm</p>
                </div>
                <div class="col-md-6">
          <form class="form-horizontal" action ="procedimientosPhp/enviarCorreo.php" method="POST">      
                <!--Bloque de registro persona natural-->
                <div class="jumbotron">
                    <center><h2>Envíenos un mensaje</h2></center>
                    <br>
                    
                        <center>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="cedula" value="" required=”required”/>
                            <br>
                        </center>
                        <center>

                        <center>
                            <input type="email" class="form-control" placeholder="Correo" name="correo" id="cedula" value="" required=”required”/>
                            <br>
                        </center>

                        <center>
                            <input type="text" class="form-control" placeholder="Asunto" name="asunto" id="cedula" value="" required=”required”/>
                            <br>
                        </center>

                        <center>
                            <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="" value="" required=”required”/>
                            <br>
                        </center>

                        <p>Mensaje:</p>
                        <center>
                                <textarea name="mensaje" rows="5" cols="60"></textarea><br>
                            <br>
                        </center>
                        <center>

                        <center>
                            <input type="submit" class="btn btn-default" value="Enviar">
                        </center>           
            </form>
                </div>
            </div>
        </div>
        <!-- /.row -->

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
