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
		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="50" align="center" class="tituloprincipal">BUSCAR CLIENTES</td>
          </tr>
          <tr>
            <td height="107">
             <form method="post"  name="encontrar_cliente_form" action="clientes_reg.php">
              <table width="940" border="0" cellpadding="2" cellspacing="0" class="fontstyle" align="center">
                <tr>
                  <td colspan="3" bgcolor="#66CCFF" class="stiframesopcli" >&nbsp;Buscar datos de un cliente ya registrado en la base de datos.</td>
                </tr>
                <tr>
                  <td width="408" height="37" align="right">Escriba el número de indentificaci&oacute;n del cliente</td>
                  <td width="1">&nbsp;</td>
                  <td width="511">
                  	<input type="text" name="numero_cliente" id="numero_cliente_id"/>&nbsp;&nbsp;
                    <input name="encontrar_cliente_button" type="button" value="Encontrar cliente" onclick="enc_cliente()"/>&nbsp;&nbsp;&nbsp;
                    <input name="limpiar2" type="reset" value="Limpiar" />
                  </td>
                </tr>
                <tr>
                  <td  colspan="3" align="center" bgcolor="#999999">
                  	<input name="cerrar" type="button" value="Cerrar Sesion" onclick="conf_session()" />&nbsp;&nbsp;
                  	<input name="centro_op" type="button" value="Regresar al centro de operaciones" onclick="cent_op()"/>
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