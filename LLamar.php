<?php
include("Conexion.php");

	$Emisor=$_POST['Emisor'];
	$Receptor=$_POST['Receptor'];
	

	$consulta=$cn->prepare('INSERT INTO LLamada (CodigoCuentaEmisor,CodigoCuentaReceptor,Tipo,Estado)
	VALUES(:Emisor,:Receptor,"privado","LLamando")');
	$consulta->execute(array(':Emisor'=>$Emisor,':Receptor'=>$Receptor));
	$resultado=$consulta->fetch();

?>