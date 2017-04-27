<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pagos por confirmar - Equipos y Maquinas Industriales</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Equipos y Maquinas Industriales</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../procedimientosPHP/cerrarSesion.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i>Pagos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="porConfirmar.php">Por confirmar</a>
                                </li>
                                <li>
                                    <a href="sinPagar.php">Compras sin pagar</a>
                                </li>
                                <li>
                                    <a href="enEspera.php">Recibidos</a>
                                </li>
                                <li>
                                    <a href="recibidos.php">Entregados</a>
                                </li>
                            </ul>
                        </li>
                        <!-- /.nav-second-level -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pagos por confirmar</h1>
                    </div>
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pagos Por Transferencia
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id venta</th>
                                        <th>Id medio de pago</th>
                                        <th>Banco</th>
                                        <th>Numero De Transferencia</th>
                                        <th>Cantidad(Bsf)</th>
                                        <th>Fecha de transferencia</th>
                                        <th>Confirmar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include 'conexion.php';
                                        $query="SELECT V_Id, MDP_Id,MDP_Banco,MDP_Cantidad,MDPT_numerodetransferencia,MDPT_fechadetransferencia from venta,medio_de_pago where V_Id=MDP_Venta AND V_Estatus LIKE 'Por confirmar pago' AND MDP_Confirmar=0 AND MDP_Tipo LIKE 'Transferencia'";
                                        $result = $mysqli -> query($query);
                                        $j=0;
                                        while($f = $result->fetch_array(MYSQLI_ASSOC)){
                                            $matriz[$j][0]=$f['V_Id'];
                                            $matriz[$j][1]=$f['MDP_Id'];
                                            $matriz[$j][2]=$f['MDP_Banco'];
                                            $matriz[$j][3]=$f['MDP_Cantidad'];
                                            $matriz[$j][4]=$f['MDPT_numerodetransferencia'];
                                            $matriz[$j][5]=$f['MDPT_fechadetransferencia'];
                                            $j++;
                                        }
                                        for ($i = 0; $i < $j; $i++) {
                                                echo "<tr class=\"odd gradeX\">";
                                                echo "<td>".$matriz[$i][0]."</td>";
                                                echo "<td>".$matriz[$i][1]."</td>";
                                                echo "<td>".$matriz[$i][2]."</td>";
                                                echo "<td>".$matriz[$i][3]."</td>";
                                                echo "<td>".$matriz[$i][4]."</td>";
                                                echo "<td>".$matriz[$i][5]."</td>";
                                                echo "<td><center><a href=\"procedimientosPHP/confirmarPago.php?id=".$matriz[$i][1]."\"><button type=\"button\" class=\"btn btn-success\">Confirmar</button></a></center></td>";
                                                echo "</tr>";
                                            }
                                        $mysqli->close();
                                    ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                    <!-- /.col-lg-12 -->
                                        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pagos por deposito
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id venta</th>
                                        <th>Id medio de pago</th>
                                        <th>Banco</th>
                                        <th>Numero De Transferencia</th>
                                        <th>Cantidad(Bsf)</th>
                                        <th>Fecha de transferencia</th>
                                        <th>Confirmar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include 'conexion.php';
                                        $query="SELECT V_Id, MDP_Id,MDP_Banco,MDP_Cantidad,MDPD_NumeroDeposito,MDPD_FechaDeposito from venta,medio_de_pago where V_Id=MDP_Venta AND V_Estatus LIKE 'Por confirmar pago' AND MDP_Confirmar=0 AND MDP_Tipo LIKE 'Deposito'";
                                        $result = $mysqli -> query($query);
                                        $j=0;
                                        while($f = $result->fetch_array(MYSQLI_ASSOC)){
                                            $matriz[$j][0]=$f['V_Id'];
                                            $matriz[$j][1]=$f['MDP_Id'];
                                            $matriz[$j][2]=$f['MDP_Banco'];
                                            $matriz[$j][3]=$f['MDP_Cantidad'];
                                            $matriz[$j][4]=$f['MDPD_NumeroDeposito'];
                                            $matriz[$j][5]=$f['MDPD_FechaDeposito'];
                                            $j++;
                                        }
                                        for ($i = 0; $i < $j; $i++) {
                                                echo "<tr class=\"odd gradeX\">";
                                                echo "<td>".$matriz[$i][0]."</td>";
                                                echo "<td>".$matriz[$i][1]."</td>";
                                                echo "<td>".$matriz[$i][2]."</td>";
                                                echo "<td>".$matriz[$i][3]."</td>";
                                                echo "<td>".$matriz[$i][4]."</td>";
                                                echo "<td>".$matriz[$i][5]."</td>";
                                                echo "<td><center><a href=\"procedimientosPHP/confirmarPago.php?id=".$matriz[$i][1]."\"><button type=\"button\" class=\"btn btn-success\">Confirmar</button></a></center></td>";
                                                echo "</tr>";
                                            }
                                        $mysqli->close();
                                    ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
