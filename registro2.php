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
    <script src="js/jquery.js"></script>
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="js/personal.js"></script>

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
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="radio" id="personaNatural" style="display:block;">
                      <div class="col-sm-6"></div>
                      <h3>Tipo de persona</h3>
                      <div class="col-sm-6"></div>
                      <label><input type="radio" id="priority-low" name="priority" value="personaNatural" checked  >Natural</label>
                    </div>
                    <div class="radio" id="personaJuridica" style="display:block;">
                      <div class="col-sm-6"></div>
                      <label><input type="radio" id="priority-normal" name="priority" value="personaJuridica">Juridica</label>
                    </div>
                    </div>
                </div>
                <!--PRUEBA-->

                <form class="form-horizontal" action ="procedimientosPhp/operacionRegistro2.php?id=0" method="POST">      
                <!--Bloque de registro persona natural-->
                <div class="personaNatural box" style="display:none;">
                <div class="jumbotron">
                    <div class="col-sm-3"></div>
                    <center><h2>Persona natural</h2></center>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Cédula</label>

                            <div class="col-sm-3"> 
                                <input type="number" class="form-control" name="cedula" id="cedula" value="" required=”required”/>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">RIF</label>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control" name="rifNatural" id="rifNatural" value=""/>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Primer Nombre</label>
                            <div class="col-sm-3">                     
                                <input type="text" class="form-control" name="primerNombre" id="primerNombre" value="" required=”required”/>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Segundo Nombre</label>
                            <div class="col-sm-3"> 
                                 <input type="text" class="form-control" name="segundoNombre" id="segundoNombre" value=""/>
                            </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Primer apellido</label>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control" name="primerApellido" id="primerApellido" value="" required=”required”/>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Segundo apellido</label>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control" class="form-control" name="segundoApellido" id="segundoApellido" value=""/>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Correo electrónico</label>
                            <div class="col-sm-3"> 
                                <input type="email" class="form-control" name="correoNatural" id="correoNatural" value="" required=”required”>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Código de país</label>
                            <div class="col-sm-3"> 
                                <input type="number" class="form-control" name="codigoNatural" id="codigoNatural" required=”required”>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Código de área</label>
                            <div class="col-sm-3"> 
                                <input type="number" class="form-control" name="areaNatural" id="areaNatural" required=”required”>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Número de teléfono</label>
                            <div class="col-sm-3"> 
                                <input type="number" class="form-control"" name="telefonoNatural" id="telefonoNatural" required=”required”>
                            </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-3"></div>
                    <label class="control-label col-sm-2" for="pwd">País de residencia</label>
                        <div class="col-sm-3"> 
                        <select class="form-control" id="paisNatural" name="paisNatural">
                            <option value="" >Seleccione el país</option>
                                <?php 
                                    include 'conexion.php';
                                    $query = "SELECT L_Id,L_Nombre FROM lugar where L_Tipo LIKE "."'Pais' order by L_Nombre ASC";
                                    $result = $mysqli ->query ($query);
                                    $id=0;
                                    $nombre="null";
                                    while ($f = $result->fetch_array(MYSQLI_ASSOC)){
                                        $id=$f['L_Id'];
                                        $nombre=$f['L_Nombre'];
                                ?>  
                                    <option value="<?php echo $id;?>">
                                    <?php echo $nombre;?></option> 
                                <?php
                                    }
                                ?>
                            </select>
                            
                        </div>
                    </div>
                     <div class="form-group"> 
                       <div class="col-sm-offset-6">
                            <button type="submit" class="btn btn-default">Regístrate</button>
                       </div>
                     </div>                    
                </div>
                </div>
            </form>
                <!--Bloque de registro persona juridica-->
            <form  form class="form-horizontal" action ="procedimientosPhp/operacionRegistro2.php?id=1" method="POST">
                <div class="personaJuridica box" style="display:none;">
                <div class="jumbotron">
                    <div class="col-sm-3"></div>
                    <center><h2>Persona jurídica</h2></center>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">RIF</label>
                            <div class="col-sm-3">                     
                                <input type="text"  class="form-control" name="rifJuridico" id="rifJuridico" value="" required=”required”/>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Nombre comercial</label>
                            <div class="col-sm-3"> 
                            <input type="text"  class="form-control" name="comercial" id="comercial" value="" required=”required”/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Razón comercial</label>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control"  name="razon" id="razon" value="" required=”required”/>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Página web</label>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control"  name="paginaweb" id="paginaweb" value=""/>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Correo electrónico</label>
                            <div class="col-sm-3"> 
                                <input type="email"  class="form-control" name="correoJ" id="correoJ" value="" required=”required”>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Código de país</label>
                            <div class="col-sm-3"> 
                                <input type="number"  class="form-control"  name="codigoJuridico" id="codigoJuridico" required=”required”>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Código de área</label>
                            <div class="col-sm-3"> 
                                <input type="number"  class="form-control" name="areaJuridico" id="areaJuridico" required=”required”>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <label class="control-label col-sm-2" for="pwd">Número de teléfono</label>
                            <div class="col-sm-3"> 
                                <input type="number"  class="form-control" name="telefonoJuridico" id="telefonoJuridico" required=”required”>
                            </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-3"></div>
                      <label class="control-label col-sm-2" for="pwd">País de ubicación</label>
                        <div class="col-sm-3"> 
                            <select  class="form-control" name="paisJuridico" id="paisJuridico">
                                <option value="">Seleccione el país</option>
                                <?php 
                                    include 'conexion.php';
                                    $query = "SELECT L_Id,L_Nombre FROM lugar where L_Tipo LIKE "."'Pais' order by L_Nombre ASC";
                                    $result = $mysqli ->query ($query);
                                    $id=0;
                                    $nombre="null";
                                    while ($f = $result->fetch_array(MYSQLI_ASSOC)){
                                        $id=$f['L_Id'];
                                        $nombre=$f['L_Nombre'];
                                ?>  
                                    <option value="<?php echo $id;?>">
                                    <?php echo $nombre;?></option> 
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                       <div class="col-sm-offset-6">
                            <button type="submit" class="btn btn-default">Regístrate</button>
                       </div>
                     </div> 
                </div>
                </div>
            </form>
            </div>
                <!--FIN PRUEBA-->

            </div>


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
