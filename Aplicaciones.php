<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {font-family: Vrinda}
-->
</style>

<link rel="stylesheet" href="Aula.css">


<style type="text/css">
<!--
.Estilo3 {
	font-size: 18px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #999999;
}
-->
</style>



<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>



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
</head>

<body>
 <div>
  <div align="center" class="Estilo3">APLICACIONES</div>
</div>

 
 
<?php
include('Conexion.php');
$cod=$_POST['id'];

$sql=$cn->prepare('SELECT * FROM aplicacion' );
$sql->execute();

while( $op=$sql->fetch())
{	
?>

<div style="float:left; margin-left:60px; margin-bottom: 5px; border-radius:10px;border:2px #002448 solid; background-color:#FFFFFF; margin-top:25px;  width:200px; height:210px;" >

<table width="216" height="150" border="0" cellpadding="0" cellspacing="0" >
  <tr>
  
    <td height="101" colspan="2" scope="row"><a href=""><img src=<?php echo $op['Imagen'];?> width="155" height="162" border="0" style="padding:2px; margin-left:10px; border-radius:15px;"/></a></td>
    <td width="114" height="101" scope="row">&nbsp;</td>
    </tr>
  
  <tr>
    <th width="90" height="27" scope="row"><div align="right"><span class="Estilo1" style="text-align:left; margin-left:5px;">Nombre:</span></div></th>
    <td colspan="2"><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['Nombre'];?></span></td>
  </tr>
  <tr>
    <th scope="row"><div align="right"><span class="Estilo1" style="text-align:left; margin-left:5px;">Institucion:</span></div></th>
    <td colspan="2"><div align="left"><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['Tipo'];?></span></div></td>
  </tr>
</table>

</div>

<?php
}
?>


</body>
</html>