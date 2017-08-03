<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contactos</title>
</head>

<body>


<table width="206" height="40" border="0" cellspacing="0" cellpadding="0" style="margin-top:-3px; ">
<?php 
include("Conexion.php");
$cod=$_POST['id'];  
$consulta=$cn->prepare("SELECT cuenta.CorreoElectronico,cuenta.Foto,persona.Nombre,persona.Paterno,persona.Materno 
FROM cuenta,persona 
WHERE cuenta.CodigoCuenta IN (SELECT CodigoCuenta FROM estado WHERE Nombre='Activo') AND cuenta.NumeroDocumento=persona.NumeroDocumento");
$consulta->execute();
while($res=$consulta->fetch())
{	
?>
  <tr>
	 <td width="43" height="40" ><img src=<?php echo $res['Foto'];?> width="36" height="33" style="border:1px #9E9E9E solid;"/></td>
     <td width="163" >
	 <p style="color:#0D0D0D; font-family:Arial, Helvetica, sans-serif;   font-size:12px;margin:0px; padding:px; width:120px; border:none;">
	 <?php echo $res['Nombre']." ".$res['Paterno']." ".$res['Materno'];?></p>	 
	 </td>
  </tr>
<?php
}
?>
</table>



</body>
</html>
