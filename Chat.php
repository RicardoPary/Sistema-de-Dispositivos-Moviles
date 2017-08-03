<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<title>Chat Grupal</title>
		<link rel="stylesheet" href="css/ultimo.css" type="text/css"/>
		
		
		<script src="js/jquery.js"></script>
		<script src="js/jquery-1.11.0.min.js"></script>
		
		
		<script>
		
			$(document).on("ready", function(){				
				RegistrarMensajes();
				$.ajaxSetup({"cache":false});
				setInterval("loadOldMessages()",500);
				
			});
				var RegistrarMensajes=function()
				{
				$("#send").on("click",function(e)
				{
					e.preventDefault();
					var frm=$("#formChat").serialize();
					$.ajax(
					{
					type: "POST",
					url: "CrearMensajeChat.php",
					data:frm
					}).done(function(info){
					$("#message").val("");
					var altura=$("#conversation").prop("scrollHeight");
					$("#conversation").scrollTop(altura);
					
					console.log(info);})
				
				});				
				}	
				
				var loadOldMessages=function()
				{
					$.ajax(
					{
					type: "POST",
					url: "Mensajes.php"				
					}).done(function(info){
					$("#conversation").html(info);
					$("#conversation p:last-child").css({"background-color":"lightgreen","padding-botton":"20px"});
				
				    var altura=$("#conversation").prop("scrollHeight");
					$("#conversation").scrollTop(altura);
				
				    });				
				}		
			
		</script>
	</head>
	<body>
	
	<?php   

   $cod=$_POST['id'];  
 
  
  ?>
	
	
			
				<div style="margin-left:20px;">
					<form id="formChat" role="form" style="padding-left:35px;">
						<div class="form-group">
							
							<input type="text" class="form-control" id="user" name="user" placeholder="Enter User" value="<?php echo $cod;?>" style="visibility:hidden">
						</div>
						
									
			<div id="conversation" style=" width:700px; height:300px; border: 1px solid #003871; padding: 12px; overflow-x: hidden; margin:0px;">									
			</div>							
										
		
			<div style="width:724px; border:1px #003871 solid;padding:0px; margin-top:10px;">
			  <p>
			    <textarea id="message" name="message"   rows="1" cols="128" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; margin:5px;"></textarea>
			 <button id="send" class="submit" >Enviar</button> </p>
			</div>
						
									
					</form>
				</div>
			
	</body>
</html>