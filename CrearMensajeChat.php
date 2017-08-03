<?php	
	include("Conexion.php");
	$cod=$_POST['user'];
	$message=$_POST['message'];
			
	$consulta=$cn->prepare("INSERT INTO chat(CodigoCuenta,Mensaje,Fecha,Hora)VALUES(:Codigo,:Mensaje,CURRENT_DATE,CURRENT_TIME)");
	$consulta->execute(array(':Codigo'=>$cod,':Mensaje'=>$message));
	$result=$consulta->fetch();
?>