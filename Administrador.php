<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Cuenta Administrador</title>
<link rel="stylesheet" href="css/Administrador.css" type="text/css" />	
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>

<script type="text/javascript">
	function LLamadaEntrante()
   {
		$('#popup').fadeIn('slow');
		$('.popup-overlay').fadeIn('slow');
		$('.popup-overlay').height($(window).height());
		
	}
	
	$(document).ready(function() 
	{
	$('.close').click(function(){
		$('#popup').fadeOut('slow');
		$('.popup-overlay').fadeOut('slow');
		return false;
	});
	});
	
	
	$(document).ready(function() 
	{
	$('#colgar').click(function(){
		$('#popup').fadeOut('slow');
		$('.popup-overlay').fadeOut('slow');
		return false;
	});
	});
	
	$(document).ready(function() 
	{
	$('#contestar').click(function(){
		$('#popup').fadeOut('slow');
		$('.popup-overlay').fadeOut('slow');
		return false;
	});
	});

</script>


<script>
function Contestar(){
        var parametros = {
                "Emisor" : $('#Emisor').val(),
				"Receptor" : $('#Receptor').val(),
				"Numero" : $('#Numero').val()						
				};
        $.ajax({
                data:  parametros,
                url:   'Contestar.php',
                type:  'post',
                success:  function() {   alert('Contestado');  }
        });
}

function Colgar(){
        var parametros = {
                "Emisor" : $('#Emisor').val(),
				"Receptor" : $('#Receptor').val(),
				"Numero" : $('#Numero').val()						
				};
        $.ajax({
                data:  parametros,
                url:   'Colgar.php',
                type:  'post',
                success:  function() {   alert('Colgado');  }
        });
}
</script>


<script type="text/javascript">
	$(document).ready(function() 
	{							
	
		setInterval(CargarContactos,2000);
		setInterval(CargarLLamadas,2000);
					
		CargarCuerpo();	
						
		function CargarCuerpo()
		{  var codigo=<?php echo $_GET['id']; ?>;		
		$("#Cuerpo").load('MuroAdministrador.php',{id:codigo});		
		}
		
		function CargarContactos()
		{
		var codigo=<?php echo $_GET['id']; ?>;		
		$("#Contactos").load('Contactos.php',{id:codigo});					
		}		
				
		function CargarLLamadas()
		{
		var codigo=<?php echo $_GET['id']; ?>;		
		$("#LLamadas").load('EstadoLLamadas.php',{id:codigo});					
		}							
	});
	     	
	</script>	

<script type="text/javascript">
$(document).ready(function()
{
   $(".nav").each(function(){
      var href = $(this).attr("href");		   
	  $(this).attr({ href: "#"});
	  
      $(this).click(function(){
	     var codigo=<?php echo $_GET['id'];?>;
         $("#Cuerpo").load(href,{id:codigo});		 
      });
   });
});		
</script>


	
		
</head>

<body>	
<?php	   
  include('Conexion.php');
  $cod=$_GET['id'];
  
  $sql=$cn->prepare("SELECT * FROM cuenta WHERE CodigoCuenta=:Codigo");
  $sql->execute(array(':Codigo' => $cod ));
  $op= $sql->fetch();

  $codigo_persona=$op['NumeroDocumento']; 
  
  $sql3=$cn->prepare("SELECT * FROM persona WHERE CodigoPersona=:NumeroDocumento");
  $sql3->execute(array(':NumeroDocumento'=>$codigo_persona));
  $op3=$sql3->fetch();   
  
  $sql33=$cn->prepare("SELECT C.Foto,CONCAT(P.Nombre,' ',P.Paterno,' ',P.Materno) Datos, L.CodigoCuentaEmisor,L.CodigoCuentaReceptor,L.Numero 
FROM llamada L,cuenta C,persona P
WHERE 
L.CodigoCuentaEmisor=C.CodigoCuenta AND
C.NumeroDocumento=P.NumeroDocumento AND
L.CodigoCuentaReceptor=:Codigo AND L.Estado='LLamando' ");
  $sql33->execute(array(':Codigo'=>$cod));
  $op33=$sql33->fetch(); 
    
  
?>
  
<div class="cabeza"> 
<ul id="menu">
 
   <table width="100%" border="0" cellspacing="0" cellpadding="0">   
     <tr>	 
       <td width="176" >&nbsp;</td>	   
       <td width="25"></td>
	   <td width="272">&nbsp;</td>	   
  <td width="139"></td>  
  <td width="29">&nbsp;</td>  	   
  <td width="29">&nbsp;</td>  	   
  <td width="29">&nbsp;</td>	   	   
  <td width="29"><div id="LLamadas"></div></td>	   
  <td width="71"><img src=<?php echo $op['Foto'];?> width="30" height="26" class="foto2"/></td>      
  <td width="65">	    
  <li><strong><?php echo $op['Nick'];?></strong></li>  </td>
       <td width="65">
   <li><strong>Inicio</strong>	     
         <ul>
           <li > <a href="Configuracion.php" class="nav">Configuracion</a></li>
		   <li > <a href="" class="nav">Tareas</a></li>
           <li> <a href="Close.php?id=<?php echo $cod;?>" >Cerrar Sesion</a></li>
         </ul>
	 </li>  </td>	 
  </tr>
  </table>
</ul>  
 
</div>
  
  

<div id="Cuerpo" class="Cuerpo">
</div>
 
<div id="Contactos" class="Contactos" >
</div>	
	
<div id="popup" style="display: none;">
    <div class="content-popup">
        
        <div>
        	<h2>LLamada Entrante</h2>
            <p></p>
            <div style="float:left; width:100%;">
   <img src=<?php  echo $op33['Foto'];?>  width="155" height="162" style="float:left;border-radius:5px;border-color:#333333;margin-left:35px;padding:2px;"/>   
		<p style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:14px;"><?php echo $op33['Datos'];?></p> 
		<input type="text" value=<?php  echo $op33['CodigoCuentaEmisor'];?> id="Emisor"/>
		<input type="text" value=<?php  echo $op33['CodigoCuentaReceptor'];?> id="Receptor"/>
		<input type="text" value=<?php  echo $op33['Numero'];?> id="Numero"/>
		</div>
        </div>
		<div class="close">
	<a href="" id="contetar"><img src="Imagenes/llamar.png" width="63" height="77" style="margin-right:50px;margin-top:70px;" 
	onclick="Contestar();return false;"/></a>	
	<a href="" id="colgar"><img src="Imagenes/colgar.png" width="63" height="77" style="margin-right:120px;margin-top:70px;"
	onclick="Colgar();return false;"/></a></div>
    </div>
</div>
<div class="popup-overlay"></div>
		
</body>
</html>