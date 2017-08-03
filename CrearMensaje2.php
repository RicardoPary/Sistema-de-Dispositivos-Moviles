<?php
include("Conexion.php");

	$CodigoCuentaEnvia=$_POST['CodigoCuentaEnvia'];
	$CodigoCuentaRecibe=$_POST['CodigoCuentaRecibe'];
	$Texto=$_POST['Texto'];
	$Tipo=$_POST['Tipo'];
	

	$consulta=$cn->prepare('INSERT INTO mensaje2(CodigoCuentaEnvia,CodigoCuentaRecibe,Texto,Fecha,Hora,Tipo)
	VALUES(:CodigoCuentaEnvia,:CodigoCuentaRecibe,:Texto,CURDATE(),CURTIME(),:Tipo)');
	$consulta->execute(array(':CodigoCuentaEnvia'=>$CodigoCuentaEnvia,':CodigoCuentaRecibe'=>$CodigoCuentaRecibe
	,':Texto'=>$Texto,':Tipo'=>$Tipo));
	$resultado=$consulta->fetch();

?>