<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>T-appweb | clientes</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<link href="../sexyalertbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../funciones.js" language="javascript"></script>
<script type="text/javascript" src="../mootools.js" language="javascript"></script>
<script type="text/javascript" src="../sexyalertbox.v1.1.js" language="javascript"></script>
<script type="text/javascript" src="../sexyalertbox.packed.js" language="javascript"></script>
</head>

<body class="bgn_page">
	<?php
	if(isset($_SESSION['login'])) 
    {
		require("../conexion_db.php"); /*llamando al archivo conexio_db que contiene la conexion con la base de datos*/
/*consulta mysql---------------- */		
		$num_cliente = $_POST['actualizar_cliente_hidden'];
		$cons = mysql_query("SELECT * FROM tappweb_99k_db.clientes where num_doc = '$num_cliente'");
		$resp3 = mysql_fetch_row($cons);
/*fin de la consulta-----------------*/		
		if(isset($_POST["yes_actualizar"]))
		{
			$tipo_documento = $_POST['tipo_documento'];
			$numero_cliente = $_POST['numero_cliente'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$correo = $_POST['correo'];
			$estrato = $_POST['estrato'];
			$genero = $_POST['genero'];
			$direccion = $_POST['direccion'];
			$barrio = $_POST['barrio'];
			$municipio = $_POST['municipio'];
			$telefono = $_POST['telefono'];
/* consulta mysql-------------------*/			
			$cons1 = mysql_query("UPDATE tappweb_99k_db.clientes SET tipo_doc='$tipo_documento', num_doc='$numero_cliente', nombre='$nombre', apellido='$apellido', correo='$correo', estrato='$estrato', genero='$genero', direccion='$direccion', barrio='$barrio', municipio='$municipio', telefono='$telefono' where num_doc = '$numero_cliente' ");
/*fin de la consulta-----------------*/
				?>
				<script language='javascript' type='text/javascript'>
					'domready',Sexy = new SexyAlertBox();
					Sexy.confirm('<h1>Confirmar</h1><p>Los datos del cliente se actualizaron exitosamente.</p>Que operación desea realizar?<p>-->&nbsp;Regresar al centro de operaciones: Presione "OK".</p>-->Actalizar otro cliente: Presione "Cancelar".',
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
									document.location='buscar_clientes.php'
								}
							}
						});
				</script>
				<?php
		}
	?>
	<form  name="actualizar_cliente_form" method="POST" action="actualizar_clientes.php">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="50" align="center" class="tituloprincipal">ACTUALIZACIÓN DE DATOS</td>
          </tr>
          <tr>
            <td height="453">
            <table width="852" border="0" cellpadding="2" cellspacing="0" class="fontstyle" align="center">
                  <tr>
                    <td height="30" colspan="3" bgcolor="#66CCFF" class="stiframesopcli" >&nbsp;DATOS BASICOS</td>
                  </tr>
                  <tr>
                    <td height="29" colspan="3" bgcolor="#999999">&nbsp;Los campos marcados con asterisco(<a class="asterisco">*</a>) son obligatorios</td>
                  </tr>
                  <tr>
                    <td width="363" height="26" >&nbsp;Tipo de identificaci&oacute;n&nbsp;<a class="asterisco">*</a></td>
                    <td width="2">&nbsp;</td>
                    <td width="467">
                        <select name="tipo_documento">
                            <?php
                                if($resp3[1]=="C.C")
                                {
                                    echo "<option value=".$resp3[1]." selected='true'>".$resp3[1]."&nbsp;</option>
                                          <option value='T.I'>T.I&nbsp;</option>
                                          <option value='NIT'>NIT&nbsp;</option>";
                                }
                                else
                                {
                                    if($resp3[1]=="T.I")
                                    {
                                        echo "<option value=".$resp3[1]." selected='true'>".$resp3[1]."&nbsp;</option>
                                              <option value='C.C'>C.C&nbsp;</option>
                                              <option value='NIT'>NIT&nbsp;</option>";
                                    }
                                    else
                                    {
                                        echo "<option value=".$resp3[1]." selected='true'>".$resp3[1]."&nbsp;</option>
                                              <option value='C.C'>C.C&nbsp;</option>
                                              <option value='T.I'>T.I&nbsp;</option>";
                                    }
                                }
                            ?>
                        </select>
                        &nbsp;Ejemplo: (C.C) para Cedula de ciudadania </td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;N&uacute;mero del documento&nbsp;<a class="asterisco">*</a></td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999"><input type="text" name="numero_cliente" maxlength="25" value="<?php echo $resp3[2]; ?>" readonly="readonly"/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;Nombres&nbsp;<a class="asterisco">*</a></td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="nombre" id="nombre_id" maxlength="30" value="<?php echo $resp3[3]; ?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;Apellidos&nbsp;<a class="asterisco">*</a></td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999"><input type="text" name="apellido" id="apll" maxlength="30" value="<?php echo $resp3[4]; ?>"/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;Correo electr&oacute;nico&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="correo" maxlength="80" value="<?php echo $resp3[5]; ?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;Confirmar correo electr&oacute;nico&nbsp;</td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999"><input type="text" name="confirmar_correo" maxlength="80" value="<?php echo $resp3[5]; ?>"/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;Estrato&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        Actual:&nbsp;<input name="estrato" id="id_estra" type="text" value="<?php echo $resp3[6]; ?>"readonly maxlength="1" size="2"/>&nbsp;
                        <select id="sect_estrato">
                            <option value="1" onclick="act_estrato()">1&nbsp;</option>
                            <option value="2" onclick="act_estrato()">2&nbsp;</option>
                            <option value="3" onclick="act_estrato()">3&nbsp;</option>
                            <option value="4" onclick="act_estrato()">4&nbsp;</option>
                            <option value="5" onclick="act_estrato()">5&nbsp;</option>
                            <option value="6" onclick="act_estrato()">6&nbsp;</option>
                        </select>
                        &nbsp;Nuevo</td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;G&eacute;nero&nbsp;</td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999">
                        Actual:&nbsp;<input  name="genero" id="id_gen" type="text" value="<?php echo $resp3[7]; ?>" readonly="readonly" size="2"/>&nbsp;
                        <select id="sect_genero" >
                            <option value="M" onclick="actu_genero()">Masculino&nbsp;</option>
                            <option value="F" onclick="actu_genero()">Femenino&nbsp;</option>
                        </select>
                        &nbsp;Nuevo</td>
                  </tr>
                  <tr>
                    <td height="30" colspan="3" bgcolor="#66CCFF" class="stiframesopcli">&nbsp;LUGAR DE RESIDENCIA</td>
                  </tr>
                  <tr>
                    <td>&nbsp;Direcci&oacute;n&nbsp;<a class="asterisco">*</a></td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="direccion" maxlength="25" value="<?php echo $resp3[8]; ?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;Barrio&nbsp;<a class="asterisco">*</a></td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999"><input type="text" name="barrio" maxlength="15" value="<?php echo $resp3[9]; ?>"/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;Municipio&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="municipio" maxlength="15" value="<?php echo $resp3[10]; ?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#999999">&nbsp;Tel&eacute;fono&nbsp;<a class="asterisco">*</a></td>
                    <td bgcolor="#999999">&nbsp;</td>
                    <td bgcolor="#999999"><input type="text" name="telefono" maxlength="12" value="<?php echo $resp3[11]; ?>"/></td>
                  </tr>
                  <tr>
                    <td height="32" colspan="3" align="center">
                    	<input name="Actualizar_cliente_button"  type="button" onclick="act_cliente()" value="Actualizar"/>
                    	<input name="yes_actualizar" type="hidden"/>&nbsp;&nbsp;
                        <input name="Buscar_cli" type="button" value="Actualizar otro cliente" onclick="javascript:document.location='buscar_clientes.php';" />&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                  </tr>
                  <tr>
               	  <td colspan="3" align="center" bgcolor="#999999">
                    	<input name="cerrar" type="button" value="Cerrar Sesion" onclick="conf_session()" />&nbsp;&nbsp;&nbsp;&nbsp;
                    	<input name="regresar_centro_op" type="button" value="Regresar al centro de operaciones" onclick="cent_op()"/>
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