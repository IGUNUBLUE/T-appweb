<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>T-appweb | Clientes</title>
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
		
		$num_cliente = $_POST['numero_cliente'];
		$cons = mysql_query("SELECT * FROM bd_tisoft.clientes where num_doc = '$num_cliente' ");
		$resp4 = mysql_fetch_row($cons);
		if($resp4 != "")
		{
		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="50" align="center" class="tituloprincipal">CLIENTE REGISTRADO</td>
          </tr>
          <tr>
            <td height="107">
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
                  <td><?php echo $resp4[0]; ?></td>
                  <td><?php echo $resp4[1]; ?></td>
                  <td><?php echo $resp4[2]; ?></td>
                  <td><?php echo $resp4[3]; ?></td>
                  <td><?php echo $resp4[4]; ?></td>
                  <td><?php echo $resp4[5]; ?></td>
                  <td><?php echo $resp4[6]; ?></td>
                  <td><?php echo $resp4[7]; ?></td>
                  <td><?php echo $resp4[8]; ?></td>
                  <td><?php echo $resp4[9]; ?></td>
                  <td><?php echo $resp4[10]; ?></td>
                  <td><?php echo $resp4[11]; ?></td>
                </tr>
            	<tr>
              <td colspan="12" align="center">
			<table>
				<tr>
					<td>
						<form name="fact_cliente" id="fact_cliente_id" method="post" >
							<input name="act_cliente" id="act_cliente_id" type="submit" value="Actualizar" onclick="javascript: document.fact_cliente.action='actualizar_clientes.php';"/>
							<input name="actualizar_cliente_hidden" type="hidden" value="<?php echo $num_cliente; ?>" />
						</form>
					</td>
					<td>
						<form name="reg_servicio" method="post" action="../servicios/procesos_servicios.php">
							<input name="reg_ser" type="submit" value="Registrar servicio" />
							<input name="registrar_servicio_hidden" type="hidden" value="<?php echo $num_cliente; ?>" />
						</form>
					</td>
					<td>
						<input name="Buscar_cli" type="button" value="Buscar otro cliente" onclick="javascript:document.location='buscar_clientes.php';" />
					</td>
						
						
				</tr>
			</table>
              </td>
            </tr>
            <tr>
            	<td bgcolor="#999999" height="31" colspan="12" align="center">
                	<input name="detener2" type="button" value="Cerrar Sesion" onclick="conf_session()" />&nbsp;&nbsp;
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
<?php
		}
		else
		{
			?>
			<script language='javascript' type='text/javascript'>
                'domready',Sexy = new SexyAlertBox();
				num_temp = "<?php echo $num_cliente; ?>";
                Sexy.error('<h1>Error</h1><p>No se encontró ningún registro para el siguiente número de identificación:&nbsp;'+num_temp+'</p>Por favor verifique que el número de ID este bien escrito.',
                    { 
                        onComplete: 
                        function(returnvalue) 
                        { 
                            if(returnvalue)
                            {
                                document.location='buscar_clientes.php';
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