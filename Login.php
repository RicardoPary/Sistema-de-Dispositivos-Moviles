<?php
include("Conexion.php");

	$a1=$_POST['T1'];
	$a2=$_POST['T2'];
		
	$sql=$cn->prepare('SELECT * FROM cuenta WHERE CorreoElectronico=:Correo AND Contrasena=:Contrasena');	
	$sql->execute(array(':Correo' => $a1,':Contrasena' => $a2 ));		
	$resultado = $sql->fetch();
	
	$tam=count($resultado);	
	$cod=$resultado['CodigoCuenta'];    
	$Tipo=$resultado['Tipo'];	
	
					$es="Activo";	
					
					$sql3=$cn->prepare('UPDATE estado SET Nombre=:Nombre WHERE CodigoCuenta=:Codigo');	
					$sql3->execute(array(':Nombre' => $es,':Codigo' => $cod));		
					$resultado3 = $sql3->fetch();


	if($tam>1)		
	{
			if($Tipo == "Administrador")
			{	
	   		header('Location: Administrador.php?id='.$cod);			
			}	
			
	}
	else
	{
	header('Location: index.html');
	}	
?>
