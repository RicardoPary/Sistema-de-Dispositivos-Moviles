<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<script type="text/javascript" language="javascript" src="DataTables/jquery.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>



<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "language": {         	
	"processing": "Bitte warten...",
	"lengthMenu": "",
	"zeroRecords": "Nothing found - sorry",
	"info": "Showing page _PAGE_ of _PAGES_",
	"infoEmpty": "No records available",
	"infoFiltered": "(filtered from _MAX_ total records)",
	"infoPostFix": "",
	"search": null,
	"url": "",
	"paginate": {
		"first":    "Erster",
		"previous": "Anterior",
		"next":     "Siguiente",
		"last":     "Letzter"
				}			
        }
    } );
} );
</script>

<style type="text/css">
<!--
.Estilo4 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo5 {font-size: 12px}
.Estilo11 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7C7C7C; }
-->
tr {
border-bottom:1px #000000 solid;

}
.Estilo12 {font-family: Vrinda}
.Estilo22 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.Estilo24 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 14px; }
</style>
</head>

<body>

<?php
include('Conexion.php');
$Codigo=$_POST['id'];

$sql=$cn->prepare("SELECT * FROM mensaje2 M,cuenta C WHERE M.CodigoCuentaEnvia=C.CodigoCuenta AND M.CodigoCuentaRecibe=:Codigo"); 
$sql->execute(array(':Codigo'=>$Codigo));
?>



<div style="width:800px; margin:0 auto;">
  <table width="1049" height="142" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px;" id="example" class="display compact">
    <thead>
      <tr>
        <th height="57" scope="row">&nbsp;</th>
        <td colspan="6"><div align="center"><span class="Estilo24">Bandeja de Entrada</span></div></td>
        <td>&nbsp;</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="row">&nbsp;</th>
        <td colspan="6"></td>
        <td>&nbsp;</td>
      </tr>
    </tfoot>
    
	<?php
	while($DatosCuenta=$sql->fetch())
	{
	?>
	<tr>
      <th width="113" height="35" scope="row"><dl class="Estilo4">
        <img src=<?php echo $DatosCuenta['Foto'];?>  width="63" height="56" style="  border:1px #999999 solid; padding:2px; "/>
      </dl>        <span class="Estilo12"></span></th>
      <td width="96">&nbsp;</td>
      <td width="241"><span class="Estilo5"><?php echo $DatosCuenta['Texto'];?></span></td>
      <td width="199"><span class="Estilo11"><?php echo $DatosCuenta['Fecha'];?></span></td>
      <td width="160"><span class="Estilo11"><?php echo $DatosCuenta['Hora']?></span></td>
      <td width="34"><span class="Estilo5"></span></td>
      <td width="184"><span class="Estilo4"><a href=""></a><a href=""><img src="Imagenes/basura-icono-3648-48.png" width="21" height="23" /></a></span></td>
      <td width="22">&nbsp;</td>
    </tr>
	
	<?php
	}
	?>
  </table>
</div>
</body>
</html>