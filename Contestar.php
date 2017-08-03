<?php
include("Conexion.php");

	$Emisor=$_POST['Emisor'];
	$Receptor=$_POST['Receptor'];
	$Numero=$_POST['Numero'];

	

	$consulta=$cn->prepare('UPDATE LLamada SET Estado="Hablando" WHERE CodigoCuentaEmisor=:Emisor AND CodigoCuentaReceptor=:Receptor
	AND Numero=:Numero');
	$consulta->execute(array(':Emisor'=>$Emisor,':Receptor'=>$Receptor,':Numero'=>$Numero));
	$resultado=$consulta->fetch();

?>
