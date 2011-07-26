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
    <td height="34" colspan="3" align="center" class="stiframesopcli">CLIENTES</td>
  </tr>
  <tr>
  	<td colspan="3" height="8"></td>
  </tr>
  <tr>
    <td align="center">
        <!--<form name="registrar_cliente_form" method="post" > action="clientes/registro_clientes.php"-->
            <input name="registrar_cliente" class='btn btnadd' type="button" value="Registrar un nuevo cliente" onclick="top.location='clientes/registro_clientes.php';" />
        <!--</form>-->
    </td>
    <td>&nbsp;</td>
    <td align="center">
        <!--<form name="mostrar_cliente_form" method="post" > action="clientes/mostart_cli.php"--> 
            <input name="mostrar_cliente" class='btn btnuser' type="submit" value="Mostrar todos los clientes" onclick="top.location='clientes/mostart_cli.php';" />
           <!-- </form>-->
    </td>
  </tr>
  <tr>
    <td align="center">
        <!--<form name="buscar_cliente_form" method="post" action="clientes/buscar_clientes.php">-->
            <input name="buscar_cliente" class='btn btnfind' type="submit" value="Buscar datos de un cliente" onclick="top.location='clientes/buscar_clientes.php';"/>
        <!--</form>-->
    </td>
    <td>&nbsp;</td>
    <td align="center">
        <!--<form name="cliente_ausente_form" method="post">
            <input name="cliente_ausente" type="submit" value="SIN USO" />
        </form>-->
    </td>
  </tr>
  <tr>
    <td align="center">
       <input name="delete" type="button" class='btn btndelete' value="Eliminar datos de un cliente" onclick="solo_admin()"/>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
        <!--<form name="actualizar_cliente_form" method="post" action="clientes/buscar_clientes.php">-->
            <input name="actualizar_cliente" class='btn btnrefresh' type="submit" value="Actualizar datos de un cliente" onclick="top.location='clientes/buscar_clientes.php';" />
        <!--</form>-->
    </td>
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