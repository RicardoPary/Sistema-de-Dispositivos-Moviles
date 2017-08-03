<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Enviar Mensaje</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.Estilo3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo15 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; font-weight: bold; }
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}

</style>
<link rel="stylesheet" type="text/css" media="all" href="css/RegistrarCuenta.css" />
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables_themeroller.css"/>
<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>

		
			
<script>
function realizaProceso(){
        var parametros = {
                "CodigoCuentaEnvia" : $('#CodigoCuentaEnvia').val(),
				"CodigoCuentaRecibe" : $('#CodigoCuentaRecibe').val(),
                "Texto" : $('#Texto').val(),
				"Tipo" : $('#Tipo').val()
				};
        $.ajax({
                data:  parametros,
                url:   'CrearMensaje2.php',
                type:  'post',
                success:  function() {   alert('Mensaje Enviado con Exito');  }
        });
}
</script>
		
		
<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "language": {         	
	"processing": "cargando......",
	"lengthMenu": "Mostrar _MENU_ registros",
	"zeroRecords": "No existen registros",
		"info": "pagina _PAGE_ de _PAGES_",
	"infoEmpty": "Ningun registro disponible",
	"infoFiltered": "(filtrado de  _MAX_ total registros)",
	"infoPostFix": "",
	"search": "Buscar",
	"url": "",
	"paginate": {
		"first":    "Primero",
		"previous": "Anterior",
		"next":     "Siguiente",
		"last":     "Ultimo"
				}				
        }
    } );
} );
</script>

</head>

<body>
<?php 
include('Conexion.php');

$CodigoCuenta=$_POST['id'];
$consulta=$cn->prepare('SELECT * FROM cuenta');
$consulta->execute();
?>





<fieldset>

<table width="788" height="74" border="0" cellpadding="2" cellspacing="0">
          
 <tr>
   <td scope="row">&nbsp;</td>
   <td width="89" height="26" scope="row"><label for="label2">Destinatario:</label></td>
   <td width="420">
   
    <select size="1" name="Genero" id="CodigoCuentaRecibe">
	
	<?php 
		
	while($result=$consulta->fetch())
	{
	?>
        <option value="<?php echo $result['CodigoCuenta']?>">
		<?php echo $result['Nick'];?>
		</option>
    <?php 
	}
	?>		 
    </select>
	
    <input name="button" type="button" class="submit"  onclick="realizaProceso();return false;" value="Enviar" href="javascript:;"/>
    <input name="text" type="text" id="CodigoCuentaEnvia"  style="visibility:hidden;" value=<?php echo $CodigoCuenta;?> /></td>
   <td>&nbsp;</td>
 </tr>
 <tr>
     <td width="86" scope="row">&nbsp;</td>
    <td height="26" colspan="2" scope="row"><textarea rows="4" cols="85" id="Texto"></textarea></td>
     <td width="62">&nbsp;</td>
 </tr>
          
 <tr>
     <td height="22" scope="row">&nbsp;</td>
     <td scope="row"><label>Tipo de Mensaje :</label></td>
     <td> <select size="1" name="Tipo" id="Tipo">
	 
	 <option value="Mensaje Privado">Mensaje Privado</option>
	 <option value="Mensaje Libre">Mensaje Libre</option>
	
	 
	 </select>   </td>
     <td>&nbsp;</td>
 </tr>
</table>
</fieldset>
	




<div style="width:790px; margin:10px auto;">
  <table width="788"  border="0" id="example" class="display compact">
    <thead>
      <tr >
        <td width="106"><span class="Estilo15">Foto</span></td>
        <td width="116"><span class="Estilo15">Texto</span></td>
        <td width="125"><span class="Estilo15">Fecha</span></td>
        <td width="125"><span class="Estilo15">Hora</span></td>
        <td width="125"><span class="Estilo15">Tipo</span></td>
      </tr>
    </thead>
    <tfoot>
      
    </tfoot>
    <tbody>
      <?php 


	$sql=$cn->prepare('SELECT * 
FROM mensaje2 M,cuenta C  
WHERE M.CodigoCuentaEnvia=:CodigoCuenta AND
M.CodigoCuentaRecibe=C.CodigoCuenta');	
	$sql->execute(array(':CodigoCuenta'=>$CodigoCuenta));		
	
  while($op=$sql->fetch())	 	
   { ?>
      <tr>
        <td><span class="Estilo3"><img src=<?php echo $op['Foto'];?> width="63" height="56" style="  border:1px #999999 solid; padding:2px; " /></span></td>
        <td><span class="Estilo3"><?php echo $op['Texto'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['Fecha'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['Hora'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['Tipo'];?></span></td>
        
      </tr>
      <?php		
}	
?>
    </tbody>
  </table>
</div>



</body>
</html>
