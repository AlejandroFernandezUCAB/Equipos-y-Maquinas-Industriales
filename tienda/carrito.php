<?php
    session_start();
    if(isset($_SESSION['usuario'])){   
        $usuario=$_SESSION['usuario'];
    }else{
        echo "<script type=\"text/javascript\">alert(\"Ud debe iniciar sesión\");</script>";   
        header("Location : inicioTienda.php");
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
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carrito - Equipos y Maquinas Industriales </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

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
                              <input type="search" placeholder="Búsqueda de productos" name="buscador" class="form-control">
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
                                <a href="../perfil.php">Mi Perfil</a>
                            </li>
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
                <p class="lead">Tipos de maquinas y herramientas</p>
                <div class="list-group">
                                                <?php
                                include 'procedimientosPHP/conexion.php';
                                $queryTipo ="SELECT DISTINCT M_Tipo FROM Maquinaria";
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
                                $queryClasificacion ="SELECT DISTINCT M_Clasificacion FROM Maquinaria";
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
                            <?php
                if(isset($_SESSION['carrito'])){
            ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'procedimientosPhp/conexion.php';
                                $productos=$_SESSION['carrito'];
                                //Llenado de Productos
                                for($i=0;$i<count($productos);$i++){
                                    $query="SELECT M_Nombre,DM_Precio FROM maquinaria, detalle_maquinaria WHERE M_Id=".$productos[$i]['Id']." AND DM_Maquinaria=M_Id";
                                    $result = $mysqli -> query($query); 
                                    while($f = $result->fetch_array(MYSQLI_ASSOC)){
                                        $productos[$i]['Nombre']=$f['M_Nombre'];
                                        $productos[$i]['Precio']=$f['DM_Precio'];
                                    }
                                }
                                for($i=0;$i<count($productos);$i++){
                                echo "<tr>";
                                    echo "<td>".$productos[$i]['Id']."</td>";
                                    echo "<td>".$productos[$i]['Nombre']."</td>";
                                    echo "<td>".$productos[$i]['Estado']."</td>";
                                    echo "<td>".$productos[$i]['Cantidad']."</td>";
                                    echo "<td>".$productos[$i]['Precio']."</td>";
                                echo "</tr>";
                                }
                            ?>
                            <tfoot>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>Total:123123</td>
                                </tr>
                            </tfoot>
                        </tbody>
                    </table>
                    <center><a href="procedimientosPhp/venta.php" class="btn btn-default">Confirmar Compra</a></center>
                    <br>
                    <center><a href="procedimientosPhp/cancelar.php" class="btn btn-default">Cancelar Compra</a></center>
                </div>
            <?php
                }else{
            ?>
                <h2 style="text-align: center;">No se encuentran artículos en su carrito</h2>
                <br>
                <center><a href="inicioTienda.php" class="btn btn-default"> Ingrese a la tienda</a></center>
            <?php
                }
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
