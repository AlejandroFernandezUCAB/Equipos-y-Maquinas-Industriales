<?php
	include 'conexion.php';
//Funciones
	function tipo($tipo,$mysqli){
      	include 'conexion.php';
        $query="SELECT M_Id, M_Nombre,M_Descripcion,FM_NombreArchivo FROM foto_maquinaria,maquinaria  where M_Id=FM_Maquinaria and M_tipo LIKE '".$tipo."'";
        $nombre="";
        $contador=0;
        $result = $mysqli->query($query);                                    
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
        $mysqli->close();                          
	}

	function clasificacion($clasificacion,$mysqli){
		include 'conexion.php';
        $query="SELECT M_Id, M_Nombre,M_Descripcion,FM_NombreArchivo FROM foto_maquinaria,maquinaria  where M_Id=FM_Maquinaria and M_Clasificacion LIKE '".$clasificacion."'";
        $nombre="";
        $contador=0;
        $result = $mysqli->query($query);                                    
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
        $mysqli->close();  
	}

	function producto ($producto,$mysqli){
		include 'conexion.php';
		$producto=strtolower($producto);
        $query="SELECT M_Id, M_Nombre,M_Descripcion,FM_NombreArchivo FROM foto_maquinaria,maquinaria  where M_Id=FM_Maquinaria and LOWER(M_Nombre) LIKE '%".$producto."%'";
        $nombre="";
        $contador=1;
        $result = $mysqli->query($query);                                    
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
        $mysqli->close(); 
	}

	function sinNada(){
	?>
		<div class="jumbotron">
		<form role="search"  action="procedimientosPhp/buscador.php" method="POST">
            <div class="form-group">
                <input type="text" placeholder="Búsqueda de productos" name="buscador" class="form-control">
            </div>
        </form>
        </div>
	<?php

	}

//Fin de funciones
	if(isset($tipo)){
		tipo($tipo,$mysqli);
	}elseif (isset($clasificacion)) {
		clasificacion($clasificacion,$mysqli);
	}elseif (isset($producto)) {
		producto($producto,$mysqli);
	}else{
		sinNada();
	}
?>