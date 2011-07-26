<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link href="sexyalertbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="funciones.js" language="javascript"></script>
<script type="text/javascript" src="mootools.js" language="javascript"></script>
<script type="text/javascript" src="sexyalertbox.v1.1.js" language="javascript"></script>
<script type="text/javascript" src="sexyalertbox.packed.js" language="javascript"></script>
</head>
	
<body>
<?php
if(isset($_SESSION['login'])) 
    {
?>
<table width="100%" border="0" cellpadding="3" cellspacing="0" align="center">
  <tr>
    <td height="34" colspan="3" align="center" class="stiframesopserv">SERVICIOS TECNICOS</td>
  </tr>
  <tr>
  	<td colspan="3" height="8"></td>
  </tr>
  <tr>
    <td align="center">
        <!--<form name="registrar_servicio_form" method="post" action="clientes/buscar_clientes.php">-->
            <input name="registar_servicio" type="submit" class='btn btnadd' value="Registrar servicios" onclick="top.location='clientes/buscar_clientes.php';" />
            <!--</form>-->
    </td>
    <td width="4">&nbsp;</td>
    <td width="206" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
        <!--<form name="eliminar_servicio_form" method="post">-->
            <input name="eliminar_servicio" type="submit" class='btn btnapply' value="SIN USO" />
        <!--</form>-->
    </td>
    <td>&nbsp;</td>
    <td align="center"><input name="consultar" type="button" class='btn btnapply' value="SIN USO" /></td>
  </tr>
  <tr>
    <td align="center"><input name="consultar" type="button" class='btn btnapply' value="SIN USO" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31" align="center"><input name="consultar" type="button" class='btn btnapply' value="SIN USO" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
	}
	else
	{
		?>
        <script language='javascript' type='text/javascript'>
			'domready',Sexy = new SexyAlertBox();
			Sexy.error('<h1>Error</h1><p>ACCESO NO PERMITIDO</p>',
				{ 
					onComplete: 
					function(returnvalue) 
					{ 
						if(returnvalue)
						{
							document.location='index.php';
						}
					}
				});
        </script>
        <?php
	}
?>
</body>
</html>