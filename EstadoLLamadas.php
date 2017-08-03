<?php
include('Conexion.php');
$cod=$_POST['id'];

$sql33=$cn->prepare("SELECT COUNT(*) numero FROM llamada WHERE CodigoCuentaReceptor=:Codigo AND Estado='LLamando' GROUP BY CodigoCuentaReceptor");
$sql33->execute(array(':Codigo'=>$cod));
$op33=$sql33->fetch(); 

if( $op33['numero']>0)
{
echo '<img src="Imagenes/llamar2.png" width="35" height="35" onclick="LLamadaEntrante();return false;" style="cursor:pointer;"/>';
echo '<span style="color:#FFFFFF;font-size:12px;font-family:Verdana, Arial, Helvetica, sans-serif;">'.$op33['numero'].'</span>';
}
else
{
echo '<img src="Imagenes/colgar2.png" width="35" height="35" onclick="LLamadaEntrante();return false;" style="cursor:pointer;"/>';
echo '<span style="color:#FFFFFF;font-size:12px;font-family:Verdana, Arial, Helvetica, sans-serif;">'.$op33['numero'].'</span>';
}

?>

