<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style>
#content {
    width: 900px;
    margin: 0px auto;
    padding: 2em 1em;
}

#header {
	background-color: #EBE9EA;
    border: 1px solid #D2D2D2;
    border-radius: 8px 8px 8px 8px;
    margin-bottom: 10px;
    text-align: center;
    width: 900px;
    min-height: 150px;
}

#column-right {
	background-color: #EBE9EA;
    border: 1px solid #D2D2D2;
    border-radius: 8px 8px 8px 8px;
    float: right;
    min-height: 225px;
    margin-bottom: 10px;
    overflow: hidden;
    text-align: center;
    width: 180px;
	padding-top:10px;
}

#central {
	background-color: #EBE9EA;
    border: 1px solid #D2D2D2;
    border-radius: 8px 8px 8px 8px;
    float: left;
    min-height: 225px;
    margin-bottom: 10px;
    margin-right: 10px;
    width: 685px;
	padding:10px;
}

#footer {
	background-color: #EBE9EA;
    border: 1px solid #D2D2D2;
    border-radius: 8px 8px 8px 8px;
    margin-top: 10px;
    text-align: center;
    clear: left;
    width: 900px;
    min-height: 100px;
}

#popup {
	left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 1001;
}

.content-popup {
	margin:0px auto;
	margin-top:120px;
	position:relative;
	padding:10px;
	width:500px;
	min-height:250px;
	border-radius:4px;
	background-color:#FFFFFF;
	box-shadow: 0 2px 5px #666666;
}

.content-popup h2 {
	color:#48484B;
	border-bottom: 1px solid #48484B;
    margin-top: 0;
    padding-bottom: 4px;
}

.popup-overlay {
	left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 999;
	display:none;
	background-color: #777777;
    cursor: pointer;
    opacity: 0.7;
}

.close {
	position: absolute;
    right: 15px;
}
</style>


<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>


<script type="text/javascript">
$(document).ready(function(){
  $('.open').click(function(){
		$('#popup').fadeIn('slow');
		$('.popup-overlay').fadeIn('slow');
		$('.popup-overlay').height($(window).height());
		return false;
	});
	
	$('#close').click(function(){
		$('#popup').fadeOut('slow');
		$('.popup-overlay').fadeOut('slow');
		return false;
	});
});
</script>


<script>
function LLamar(){
        var parametros = {
                "Emisor" : $('#Emisor2').val(),
				"Receptor" : $('#Receptor2').val()
									
				};
        $.ajax({
                data:  parametros,
                url:   'LLamar.php',
                type:  'post',
                success:  function() {   alert('LLamando');  }
        });
}
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
	"search": true,
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
$Codigo2=$_GET['id1'];
$Codigo=$_GET['id2'];


$sql=$cn->prepare("SELECT * FROM cuenta WHERE CodigoCuenta=:CodigoCuenta"); 
$sql->execute(array(':CodigoCuenta'=>$Codigo));

$DatosCuenta=$sql->fetch();

?>



<div style="width:800px; margin:0 auto;">
<input type="text" value=<?php echo $Codigo;?>  id="Receptor2" style="visibility:hidden;"/>
<input type="text" value=<?php echo $Codigo2;?> id="Emisor2" style="visibility:hidden;"/>

  <table width="740" height="343" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px;" id="example" class="display compact">
    <thead>
      <tr>
        <th height="57" colspan="7" scope="row"><div align="center"><span class="Estilo24">Perfil</span></div></th>
        <td>&nbsp;</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th height="59" scope="row">&nbsp;</th>
        <td colspan="6">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th height="53" scope="row">&nbsp;</th>
        <td colspan="6">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th height="70" scope="row">&nbsp;</th>
        <td colspan="6">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
        <td colspan="6"></td>
        <td>&nbsp;</td>
      </tr>
    </tfoot>
    
	
	<tr>
      <th width="183" height="35" scope="row"><dl class="Estilo4">
        <img src=<?php echo $DatosCuenta['Foto'];?>  width="143" height="139" style="  border:1px #999999 solid; padding:2px; "/>
      </dl>        <span class="Estilo12"></span></th>
      <td width="70">&nbsp;</td>
      <td width="70"><span class="Estilo22"><?php echo $DatosCuenta['CodigoCuenta'];?></span></td>
      <td width="192"><span class="Estilo5"><?php echo $DatosCuenta['Nick'];?></span></td>
      <td width="153"><span class="Estilo11"><?php echo $DatosCuenta['Tipo'];?></span></td>
      <td width="12"><span class="Estilo5"></span></td>
      <td width="172"><span class="Estilo4"><a href="" class="open" ><img src="Imagenes/llamar.png" width="133" height="134" 
	  onclick="LLamar();return false;"/></a><a href=""></a></span></td>
      <td width="20">&nbsp;</td>
    </tr>
  </table>
</div>

<div id="popup" style="display: none;">
    <div class="content-popup">
        
        <div>
        	<h2>LLamada Saliente</h2>
            <p></p>
            <div style="float:left; width:100%;">
    	
    </div>
        </div>
		<div class="close"><a href="#" id="close"><img src="Imagenes/colgar.png" width="63" height="77"/></a></div>
    </div>
	
</div>
<div class="popup-overlay"></div>

</body>
</html>