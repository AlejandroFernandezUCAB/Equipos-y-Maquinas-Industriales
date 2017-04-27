<?php
	include 'conexion.php';
//Funciones
    function busquedaProductosPorTipoYClasificacion($tipo ,$clasificacion ,$mysqli ){
        include 'conexion.php';
        $query = "SELECT M_Id,M_Nombre,M_Descripcion,FM_NombreArchivo FROM foto_maquinaria,maquinaria WHERE M_Id=FM_Maquinaria AND M_Tipo LIKE '".$tipo."' AND M_Clasificacion LIKE '".$clasificacion."' ";
        $result = $mysqli->query($query);
        $nombre="";
        if ($result = $mysqli->query($query)) {
    
            /* determinar el número de filas del resultado */
            $row_cnt = $result->num_rows;
        }       
        
        if($row_cnt >= 1){
            while($f = $result->fetch_array(MYSQLI_ASSOC)){
                $descripcion = utf8_encode($f['M_Descripcion']);
                if($nombre != utf8_encode($f['M_Nombre'])){
                    $nombre = utf8_encode($f['M_Nombre']);
                    $contador = 0;
                }else{
                    $contador = 1;
                }
                if(strlen($descripcion)>=134 AND $contador==0){
        ?>
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="../imagenes/<?php echo utf8_encode($f['FM_NombreArchivo'])?>" alt="" style="height: 150px; width: 320px;">
                        <div class="caption">
                            <h4><a href="productos/detalleProducto.php?id=<?php echo $f['M_Id']?>"><?php echo utf8_encode($f['M_Nombre'])?></a></h4>
                            <p><?php echo substr($descripcion,0,134)?></p>
                        </div>
                </div>
            </div>
        <?php   
                }elseif ($contador==0){
        ?> 
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="../imagenes/<?php echo utf8_encode($f['FM_NombreArchivo'])?>" alt="" style="height: 150px; width: 320px;">
                            <div class="caption">
                                <h4><a href="productos/detalleProducto.php?id=<?php echo $f['M_Id']?>"><?php echo utf8_encode($f['M_Nombre'])?></a></h4>
                                <p><?php echo $descripcion?></p>
                            </div>
                    </div>
                </div>
        <?php
                }
            }
        }else{
            sinNada();
        }
        $mysqli->close(); 
    }

    //Fin funcion busquedaProductoPorTipoYClasificacion
	function producto ($producto,$mysqli){
		include 'conexion.php';
		$producto=strtolower($producto);
        $query="SELECT M_Id, M_Nombre,M_Descripcion,FM_NombreArchivo FROM foto_maquinaria,maquinaria  where M_Id=FM_Maquinaria and LOWER(M_Nombre) LIKE '%".$producto."%'";
        $nombre="";
        $contador=1;
        $result = $mysqli->query($query);  
        if ($result = $mysqli->query($query)) {
                /* determinar el número de filas del resultado */
            $row_cnt = $result->num_rows;
        }       
        if($row_cnt >=1){
            while($f = $result->fetch_array(MYSQLI_ASSOC)){
                $descripcion=utf8_encode($f['M_Descripcion']);
                if($nombre!=utf8_encode($f['M_Nombre'])){
                    $nombre=utf8_encode($f['M_Nombre']);
                    $contador=0;
                }else{
                    $contador=1;
                }
                if(strlen($descripcion)>=134 AND $contador==0){
        ?>
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="../imagenes/<?php echo utf8_encode($f['FM_NombreArchivo'])?>" alt="" style="height: 150px; width: 320px;">
                        <div class="caption">
                            <h4><a href="productos/detalleProducto.php?id=<?php echo $f['M_Id']?>"><?php echo utf8_encode($f['M_Nombre'])?></a></h4>
                            <p><?php echo substr($descripcion,0,134)?></p>
                        </div>
                </div>
            </div>
        <?php   
                }elseif ($contador==0){
        ?> 
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="../imagenes/<?php echo utf8_encode($f['FM_NombreArchivo'])?>" alt="" style="height: 150px; width: 320px;">
                            <div class="caption">
                                <h4><a href="productos/detalleProducto.php?id=<?php echo $f['M_Id']?>"><?php echo utf8_encode($f['M_Nombre'])?></a></h4>
                                <p><?php echo $descripcion?></p>
                            </div>
                    </div>
                </div>
        <?php
                }
            }
        }else{
            sinNada();  
        }
        $mysqli->close(); 
	}

	function sinNada(){
	?>
		<div class="jumbotron">
            <p>No existe es tipo de producto en nuestro inventario</p> 
		    <form role="search"  action="procedimientosPhp/buscador.php" method="POST">
                <div class="form-group">
                   <input type="text" placeholder="Búsqueda de productos" name="buscador" class="form-control">
                </div>
            </form>
        </div>
	<?php

	}

//Fin de funciones
	if(isset($tipo) && isset($clasificacion)){
        busquedaProductosPorTipoYClasificacion($tipo,$clasificacion,$mysqli);
	}elseif (isset($producto)) {
		producto($producto,$mysqli);
	}else{
		sinNada();
	}
?>