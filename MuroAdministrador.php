<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Muro</title>

<link rel="stylesheet" href="css/MuroAdministrador.css" type="text/css"/> 
<script src="js/jquery-1.11.0.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() 
	{							
		CargarMuro();	
		function CargarMuro()
		{  
		var codigo=<?php echo $_POST['id'];?>;
		$("#Medio").load('BandejaEntrada.php',{id:codigo});	
		}
	});
</script>


<script type="text/javascript">
$(document).ready(function()
{
   $(".menuactivo").each(function(){
      var href = $(this).attr("href");
	 
	  $(this).attr({ href: "#"});
      $(this).click(function(){	  
	  var codigo=<?php echo $_POST['id'];?>;
      $("#Medio").load(href,{id:codigo});		 
		 
      });
   });
});
</script>

</head>

<body>
<?php   
include('Conexion.php');
  $cod=$_POST['id'];  
 
  $sql=$cn->prepare('SELECT * FROM cuenta WHERE CodigoCuenta=:Codigo');
  $sql->execute(array(':Codigo'=>$cod));
  $op=$sql->fetch(); 
?>

<div class="Menudiv">
  <span><img src=<?php echo $op['Foto'];?> width="130" height="106" class="foto1" /></span>
  <p class="letra1"><strong>Administracion</strong></p>
		 
	
	<p>
	<img src="Imagenes/nike.jpg" class="img"/><a href="BandejaEntrada.php" class="letra2 menuactivo">Bandeja de Entrada</a>
	</p>
	
	<p>
	<img src="Imagenes/nike.jpg" class="img"/><a href="EnviarMensaje.php" class="letra2 menuactivo">Enviar Mensaje</a>
	</p>
	
	<p>
	<img src="Imagenes/nike.jpg" class="img"/><a href="LLamadas.php" class="letra2 menuactivo">Contactos</a>
	</p>
	
		<p>
	<img src="Imagenes/iconos-messenger1.jpg"  style="width:21px; height:19px;"  class="img"/>
	<a href="Chat.php"  class="letra2 menuactivo">Chat Grupal</a>
	</p>	
	
</div>	 
   
<div id="Medio" style="width:838px; margin:10px; padding:0px; float:left; margin-left:8px;border:1px #E5E5E5 solid;">					 
</div>

</body>
</html>
