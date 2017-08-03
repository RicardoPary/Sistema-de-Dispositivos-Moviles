<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.Estilo3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo15 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; font-weight: bold; }
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.Estilo12 {font-family: Vrinda}
.Estilo22 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.Estilo24 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 14px; }

</style>

<title>Documento sin t&iacute;tulo</title>

<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<script type="text/javascript" language="javascript" src="DataTables/jquery.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>

<script type="text/javascript">
$(document).ready(function()
{
   $("a").each(function(){
      var href = $(this).attr("href");		   
	  $(this).attr({ href: "#"});	  
      $(this).click(function(){	
         $("#Medio").load(href);		 
      });
   });
});		
</script>

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




</head>

<body>

<?php
include('Conexion.php');
$Codigo=$_POST['id'];

$sql=$cn->prepare("SELECT * FROM cuenta"); 
$sql->execute();




?>



<div style="width:800px; margin:0 auto;">
  <table width="806" height="142" border="0" id="example" class="display compact">
    <thead>
      <tr>
        <th height="57" colspan="6" scope="row"><div align="center"><span class="Estilo24">LLamadas</span></div></th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="row">&nbsp;</th>
        <td colspan="4"></td>
		<td></td>
      </tr>
    </tfoot>
    <?php
	while($DatosCuenta=$sql->fetch())
	{
	?>
    <tr>
      <th width="167" height="35" scope="row"><dl class="Estilo4">
          <img src=<?php echo $DatosCuenta['Foto'];?>  width="54" height="51" style="  border:1px #999999 solid; padding:2px; "/>
                                </dl>
          <span class="Estilo12"></span></th>
      <td width="111"><span class="Estilo22"><?php echo $DatosCuenta['CodigoCuenta'];?></span></td>
      <td width="109"><span class="Estilo5"><?php echo $DatosCuenta['Nick'];?></span></td>
      <td width="194"><span class="Estilo11"><?php echo $DatosCuenta['Tipo'];?></span></td>
      <td width="86"><span class="Estilo11"><span class="Estilo5"><span class="Estilo4"><a href="Perfil.php?id1=<?php echo $Codigo;?>&id2=<?php echo $DatosCuenta['CodigoCuenta'];?>" ><img src="Imagenes/3.png" width="44" height="39" /></a></span></span></span></td>
	  <td width="113"></td>
    </tr>
    <?php
	}
	?>
  </table>
</div>
</body>
</html>