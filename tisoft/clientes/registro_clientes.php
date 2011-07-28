<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>T-appweb | clientes</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<link href="../sexyalertbox.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="../funciones.js" language="javascript"></script><script type="text/javascript" src="../mootools.js" language="javascript"></script><script type="text/javascript" src="../sexyalertbox.v1.1.js" language="javascript"></script><script type="text/javascript" src="../sexyalertbox.packed.js" language="javascript"></script>
</head>

<body class="bgn_page">
<?php
if(isset($_SESSION['login'])) 
{
	require("../conexion_db.php"); /*llamando al archivo conexio_db que contiene la conexion con la base de datos*/
	
	if(isset($_POST['reg_cliente_hidden']))
		{
			$tipo_documento = $_POST['tipo_documento'];
			$num_cliente = $_POST['numero_cliente'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$correo = $_POST['correo'];
			$estrato = $_POST['estrato'];
			$genero = $_POST['genero'];
			$direccion = $_POST['direccion'];
			$barrio = $_POST['barrio'];
			$municipio = $_POST['municipio'];
			$telefono = $_POST['telefono'];
/*consulta mysql--------------------------*/			
			$cons1 = mysql_query("SELECT * FROM tappweb_99k_db.clientes where nombre = '$nombre' and apellido = '$apellido' and num_doc = '$num_cliente'");
			$resp1 = mysql_fetch_row($cons1);
/* fin de la consulta---------------------*/
			if($resp1 != "")
			{
				?><script language='javascript' type='text/javascript'>
                    'domready',Sexy = new SexyAlertBox();
                    Sexy.error('<h1>Error</h1><p>Algunos de los datos que intenta registrar ya se encuentran en la base datos.</p>');
            	</script>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td height="50" align="center" class="tituloprincipal">CLIENTE REGISTRADO</td>
				  </tr>
				  <tr>
					<td height="107">
					 <form method="post"  name="encontrar_cliente_form" action="actualizar_clientes.php">
					  <table width="100%" border="1" cellpadding="" cellspacing="0" class="fontstyle" align="center">
						<tr>
						  <td colspan="12" bgcolor="#66CCFF" class="stiframesopcli" >&nbsp;Datos del clientes registrados en la base de datos.</td>
						</tr>
						<tr align="center">
						  <td>&nbsp;ID&nbsp;</td>
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
						  <td><?php echo $resp1[0]; ?></td>
						  <td><?php echo $resp1[1]; ?></td>
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
						  <td height="28"  colspan="12" align="center">
                          	<input name="actualizar_datos_button" type="submit" value="Actualizar datos" />&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="registrar_servicio_button" type="button" value="Registrar servicio" />
                            <input name="actualizar_cliente_hidden" type="hidden" value="<?php echo $num_cliente; ?>"/>
                            </td>
						</tr>
                        <tr>
                   	  <td colspan="12" align="center" bgcolor="#999999">
                            	<input name="cerrar" type="button" value="Cerrar Sesion" onclick="conf_session()" />&nbsp;&nbsp;&nbsp;&nbsp;
                            	<input name="regresar_centro_op" type="button" value="Regresar al centro de operaciones" onclick="cent_op()"/>&nbsp;&nbsp;
                            </td>
                        </tr>
					  </table>
					 </form>
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
				$insert1 = mysql_query("INSERT INTO tappweb_99k_db.clientes (tipo_doc, num_doc, nombre, apellido, correo, estrato, genero, direccion, barrio, municipio, telefono)
				VALUES('$tipo_documento', '$num_cliente', '$nombre', '$apellido', '$correo', '$estrato', '$genero', '$direccion', '$barrio', '$municipio', '$telefono')");
				?><script language='javascript' type='text/javascript'>
				'domready',Sexy = new SexyAlertBox();
				Sexy.confirm('<h1>Confirmar</h1><p>El registro se realizo correctamente.</p><p>¿Que desea hacer ahora?</p><p>Seguir registrando, presiones "Cancelar".</p><p>He terminado, presione "OK"</p>',
					{ 
						onComplete: 
						function(returnvalue) 
						{ 
							if(returnvalue)
							{
								document.location='../centro_op.php';
							}
							else
							{
								document.location='registro_clientes.php';
							}
						}
					});
            	</script>
            <?php
			}
		}
		else
		{
		?>
	<form  name="registrar_cliente_form" id=name method="POST" action="registro_clientes.php">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="50" align="center" class="tituloprincipal">REGISTRAR UN NUEVO CLIENTE</td>
          </tr>
          <tr>
            <td height="503">
                <table width="754" border="0" cellpadding="2" cellspacing="0" class="fontstyle" align="center">
                  <tr>
                    <td height="30" colspan="3" bgcolor="#66CCFF" class="stiframesopcli" >&nbsp;DATOS BASICOS</td>
                  </tr>
                  <tr>
                    <td height="29" colspan="3">&nbsp;Los campos marcados con asterisco(<a class="asterisco">*</a>) son obligatorios</td>
                  </tr>
                  <tr>
                    <td width="363" height="26" bgcolor="#999999">&nbsp;Tipo de identificaci&oacute;n&nbsp;<a class="asterisco">*</a></td>
                    <td width="2" bgcolor="#999999">&nbsp;</td>
                    <td width="369" bgcolor="#999999">
                        <select name="tipo_documento" id="tipo_documento_id">
                            <option value="C.C" selected>Cedula de Ciudadania</option>
                            <option value="T.I">Tarjeta de Identidad</option>
                            <option value="NIT">NIT</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;N&uacute;mero del documento <a class="asterisco">*</a></td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="numero_cliente" id="numero_cliente_id" maxlength="25"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;Confirmar n&uacute;mero del documento&nbsp;<a class="asterisco">*</a></td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999"><input type="text" name="confirmar_numero_cliente" id="confirmar_numero_cliente_id" maxlength="25"/></td>
                  </tr>
                  <tr>
                    <td>
                     &nbsp;Primer nombre <a class="asterisco">*</a></td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="nombre" id="nombre_id" maxlength="50"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">
                     &nbsp;Primer apellido<a class="asterisco">*</a></td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999"><input type="text" name="apellido" id="apellido_id" maxlength="50"/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;Correo electr&oacute;nico&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="correo" id="correo_id" maxlength="100" value="No@no.com"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;Confirmar  correo electr&oacute;nico&nbsp;</td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999"><input type="text" name="confirmar_correo" id="confirmar_correo_id" maxlength="100" value="No@no.com"/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;Estrato&nbsp;</a></td>
                    <td>&nbsp;</td>
                    <td>
                        <select name="estrato" id="estrato_id">
                            <option value="0" selected="true">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;G&eacute;nero&nbsp;</td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999">
                        <select name="genero" id="genero_id">
                            <option value="X" selected>X</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td height="30" colspan="3" bgcolor="#66CCFF" class="stiframesopcli">&nbsp;LUGAR DE RESIDENCIA</td>
                  </tr>
                  <tr>
                    <td>&nbsp;Direcci&oacute;n&nbsp;<a class="asterisco">*</a></td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="direccion" id="direccion_id" maxlength="50"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;Barrio&nbsp;<a class="asterisco">*</a></td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999"><input type="text" name="barrio" id="barrio_id" maxlength="40"/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;Municipio&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="municipio" id="municipio_id" maxlength="50" value="No"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;Tel&eacute;fono&nbsp;<a class="asterisco">*</a></td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999"><input type="text" name="telefono" id="telefono_id" maxlength="20"/></td>
                  </tr>
                  <tr>
                    <td height="28" colspan="3" align="center">
                    	<input id="reg_cliente"  type="button" onclick="freg_cliente()" value="Registrar"/>
                        <input name="reg_cliente_hidden" id="reg_cliente_hidden_id" type="hidden" value="nada" />&nbsp;&nbsp;&nbsp;
                        <input id="limpiar" type="reset" value="Limpiar" />
                    </td>
                  </tr>
                  <tr>
               	  <td colspan="3" align="center" bgcolor="#999999"s>
                    	<input id="cerrar" type="button" value="Cerrar Sesion" onclick="conf_session()" />&nbsp;&nbsp;&nbsp;
                        <input id="regresar_centro_op" type="button" value="Regresar al centro de operaciones" onclick="cent_op()"/>
                    </td>
                  </tr>
                </table>
            </td>
          </tr>
          <tr>
            <td height="27" align="center" class="piepage">Desarrollado por: Lenin Garizabalo
          </tr>
        </table>
	</form>
		<?php
		}
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
						document.location='../index.php';
					}
				}
			});
	</script>
	<?php
}
?>
</body>
</html>
