<?php	   
  include('Conexion.php');
  $cod=$_GET['id'];

  
  $sql33=$cn->prepare("SELECT Foto(CodigoCuentaEmisor) Foto,DatosPersonales(CodigoCuentaEmisor) Datos,CodigoCuentaEmisor,CodigoCuentaReceptor,Numero FROM llamada WHERE CodigoCuentaReceptor=:Codigo AND Estado='LLamando' ");
  $sql33->execute(array(':Codigo'=>$cod));
  $op33=$sql33->fetch(); 
  
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
  
  
  
?>