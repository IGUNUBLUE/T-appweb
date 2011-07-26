<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>T!Appweb | clientes</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<link href="../sexyalertbox.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="../funciones.js" language="javascript"></script><script type="text/javascript" src="../mootools.js" language="javascript"></script><script type="text/javascript" src="../sexyalertbox.v1.1.js" language="javascript"></script><script type="text/javascript" src="../sexyalertbox.packed.js" language="javascript"></script>
</head>

<body class="bgn_page">
<?php
if(isset($_SESSION['login']))
	{
	require("../conexion_db.php"); /*llamando al archivo conexio_db que contiene la conexion con la base de datos*/
	$num = $_POST["num_cli"];
	$cons = mysql_query("SELECT * FROM bd_tisoft.clientes where num_doc = '$num'");
	$resp1 = mysql_fetch_row($cons)
	?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td height="50" align="center" class="tituloprincipal">PROCESAR CLIENTES</td>
		  </tr>
		  <tr>
			<td height="107">
			    <table width="100%" border="1" cellpadding="" cellspacing="0" class="fontstyle" align="center">
				<tr>
				  <td colspan="12" bgcolor="#66CCFF" class="stiframesopcli" >&nbsp;Informacion registrada del cliente.</td>
				</tr>
				<tr align="center">
				  <td>ID</td>
				  <td>TIPO DE DUMENTO</td>
				  <td>NUMERO DE IDENTIFICACIÓN</td>
				  <td>NOMBRE</td>
				  <td>APELLIDO</td>
				  <td>CORREO</td>
				  <td>ESTRATO</td>
				  <td>GENERO</td>
				  <td>DIRECCIÓN</td>
				  <td>BARRIO</td>
				  <td>MUNICIPIO</td>
				  <td>TELÉFONO</td>
				</tr>
				<tr bgcolor="#999999" align="center">
				  <td><?php echo $resp1[0];?></td>
				  <td><?php echo $resp1[1];?></td>
				  <td><?php echo $resp1[2]; ?></td>
				  <td><?php echo $resp1[3]; ?></td>
				  <td><?php echo $resp1[4]; ?></td>
				  <td><?php echo $resp1[5]; ?></td>
				  <td><?php echo $resp1[6]; ?></td>
				  <td><?php echo $resp1[7]; ?></td>
				  <td><?php echo $resp1[8]; ?></td>
				  <td><?php echo $resp1[9]; ?></td>
				  <td><?php echo $resp1[10]; ?></td>
				  <td><?php echo $resp1[11]; ?></td>
				</tr>
				<tr>
			      	  <td height="33" colspan="12" align="center">
					<table >
						<tr align="center">
							<td>
								<form name="act_cli_pro" method="post" action="actualizar_clientes.php">
									<input type="submit" name="actp" value="Actualizar" />
									<input type="hidden" name="actualizar_cliente_hidden" value="<?php echo $num; ?>"/>
								</form>
							</td>
							<td>
								<form name="reg_serv" method="post" action="../servicios/procesos_servicios.php">
									<input type="submit" value="Registrar servicio" />
									<input type="hidden" name="registrar_servicio_hidden" value="<?php echo $num; ?>" />
								</form>
							</td>
							<td><input type="button" value="Ultimo servicio realizado" /></td>
							<td>
								<form name="mostrar_cliente_form" method="post" action="mostart_cli.php" >
									<input type="submit" value="Procesar otro cliente" />
								</form>
							</td>
						</tr>
					</table>
				  </td>
				</tr>
				<tr>
			      	  <td height="33" colspan="12" align="center">
					<input name="cerrar" type="button" value="Cerrar Sesion" onclick="conf_session()" />&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="regresar_centro_op" type="button" value="Regresar al centro de operaciones" onclick="cent_op()"/>&nbsp;&nbsp;
				  </td>
				</tr>
			  </table>
			</td>
		  </tr>
		  <tr>
			<td height="27" align="center" class="piepage">Desarrollado por: Lenin Garizabalo
		  </tr>
		</table>
<?php
	}
	else
	{
		?><script language='javascript' type='text/javascript'>
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
