<?php
    session_start();
//Buscando cantidad total por pagar
    include 'conexion.php';
    $query="SELECT(V_Total-) FROM venta";
//fin
    if(isset ($_SESSION['usuario'])){
        $usuario= $_SESSION['usuario'];
    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
//Buscando cantidad total por pagar
    include 'conexion.php';
    $subquery="Select sum(mdp_cantidad) from medio_de_pago where mdp_venta=".$id."";
    $query="SELECT (V_Total-(".$subquery.")) total FROM venta where v_id=".$id."";
    $result = $mysqli -> query($query);
    while($f = $result->fetch_array(MYSQLI_ASSOC)){
        $total=$f['total'];
    }
    if($total==null){
        $query="SELECT V_Total total FROM venta where v_id=".$id."";
        $result = $mysqli -> query($query);
        while($f = $result->fetch_array(MYSQLI_ASSOC)){
            $total=$f['total'];
        }
    }
    $result=$mysqli->close();
//fin
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
                    Medios de pago
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="radio" id="personaNatural" style="display:block;">
                      <div class="col-sm-6"></div>
                      <h3>Tipo pago</h3>
                      <div class="col-sm-6"></div>
                      <label><input type="radio" id="priority-low" name="priority" value="deposito" checked  >Depósito</label>
                    </div>
                    <div class="radio" id="personaJuridica" style="display:block;">
                      <div class="col-sm-6"></div>
                      <label><input type="radio" id="priority-normal" name="priority" value="transferencia">Transferencia</label>
                    </div>
                    <center><p><strong>Deuda</strong>:<?php echo $total;?></p></center>
                    </div>
                </div>
            <!--Bloque de Deposito-->
            <form class="form-horizontal" action ="procedimientosPhp/pago.php?tipo=deposito&id=<?php echo $id?>" method="POST">     
                <div class="deposito box" style="display:none;">
                    <div class="jumbotron">
                        <center><h3>Depósito</h3></center>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <label class="control-label col-sm-2" for="pwd">Banco</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="bancoDeposito" id="bancoDeposito" value="" required=”required”/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <label class="control-label col-sm-2" for="pwd">Cantidad del depósito(Bsf)</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="number" name="cantidadDeposito" id="cantidadDeposito" value="" required=”required”/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                                <label class="control-label col-sm-2" for="pwd">Número de voucher</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="number" name="voucheDeposito" id="voucheDeposito" value="" required=”required”/>
                                </div>   
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                                <label class="control-label col-sm-2" for="pwd">Fecha de depósito</label>                        
                            <div class="col-sm-3">
                                <input class="form-control" type="date" name="fechaDeposito" id="fechaDeposito" value="" required=”required”/>
                            </div>
                        </div>          
                        <div class="form-group"> 
                           <div class="col-sm-offset-6">
                                <button type="submit" class="btn btn-default">Pagar</button>
                           </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--Bloquer Transferencia-->
            <form class="form-horizontal" action ="procedimientosPhp/pago.php?tipo=transferencia&id=<?php echo $id?>" method="POST">    
                <div class="transferencia box" style="display:none;">
                    <div class="jumbotron">
                        <center><h3>Transferencia</h3></center>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                                <label class="control-label col-sm-2" for="pwd">Banco</label>                     
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="bancoTransferencia" id="bancoTransferencia" value="" required=”required”/>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <label class="control-label col-sm-2" for="pwd">Número de transferencia</label>                          
                            <div class="col-sm-3">
                                <input class="form-control" type="number" name="numeroTransferencia" id="numeroTransferencia" value="" required=”required”/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                                <label class="control-label col-sm-2" for="pwd">Cantidad(Bsf)</label>  
                            <div class="col-sm-3">
                                <input class="form-control" type="number" min="0" name="cantidadTransferencia" id="cantidadTransferencia" value="" required=”required”/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                                <label class="control-label col-sm-2" for="pwd">Fecha de Transferencia</label>  
                            <div class="col-sm-3">
                                <input class="form-control" type="date" name="fechaTransferencia" id="fechaTransferencia" value="" required=”required”/>
                            </div>
                        </div>
                        <div class="form-group"> 
                           <div class="col-sm-offset-6">
                                <button type="submit" class="btn btn-default">Pagar</button>
                           </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
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
