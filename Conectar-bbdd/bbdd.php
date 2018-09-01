<?php

function conectarBD(){ 
	$server = "localhost";
	$usuario = "root";
	$pass = "";
	$BD = "Bolivar";
	$conexion = mysqli_connect($server, $usuario, $pass, $BD); 
	if(!$conexion){ 
	   echo 'Ha sucedido un error inesperado en la conexion de la base de datos<br>'; 
	} 
	return $conexion; 
}  


/*Desconectar la conexion a la base de datos*/
function desconectarBD($conexion){
	//Cierra la conexión y guarda el estado de la operación en una variable
	$close = mysqli_close($conexion); 
	if(!$close){  
	   echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>'; 
	}    
	return $close;         
}


//Devuelve un array multidimensional con el resultado de la consulta
function getArraySQL($sql){
	$conexion = conectarBD();
	//generamos la consulta
	if(!$result = mysqli_query($conexion, $sql)) die();

	$rawdata = array();
	//guardamos en un array multidimensional todos los datos de la consulta
	$i=0;
	while($row = mysqli_fetch_array($result))
	{   
		//guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
		$rawdata[$i] = $row;
		$i++;
	}
	desconectarBD($conexion);
	return $rawdata;
}



//Devuelve un array sencillo
function getArraySimple($sql){
	$conexion = conectarBD();
	//generamos la consulta
	if(!$result = mysqli_query($conexion, $sql)) die();
	desconectarBD($conexion);
	return $result;
}

function insertar($conexion,$sql){
	mysqli_query($conexion,$sql);
}


?> 