<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tisoft | Centro de Op.</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link href="sexyalertbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="funciones.js" language="javascript"></script>
<script type="text/javascript" src="mootools.js" language="javascript"></script>
<script type="text/javascript" src="sexyalertbox.v1.1.js" language="javascript"></script>
<script type="text/javascript" src="sexyalertbox.packed.js" language="javascript"></script>
</head>
	
<body class="body">
<?php
if(isset($_SESSION['login'])) 
    {
?>
<div class="fdivsup">&nbsp;</div>
    <table width="726" height="100%" border="0" cellpadding="0" cellspacing="0" align="center">
      <tr>
        <td width="90" height="46"><a href="op_clientes.php" target="ifr_opn"><img src="images/cliente.png" alt="CLIENTES" width="90" height="85" longdesc="clientes" /></a></td>
        <td width="557" align="center" class="tituloprincipal">CENTRO DE OPERACIONES</td>
        <td width="149"><a href="op_servicios.php" target="ifr_opn"><img src="images/partes.png" alt="PARTES" width="90" height="85" longdesc="PARTES" /></a></td>
      </tr>
      <tr>
            <td height="269">&nbsp;</td>
            <td>
                <table width="537" height="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                      <td width="46" height="37" class="divesquinasiz">&nbsp;</td>
                      <td width="445" class="divsusucenter">&nbsp;</td>
                      <td width="46" class="divesquinasde">&nbsp;</td>
                  </tr>
                    <tr>
                      <td height="194" class="divladoizq">&nbsp;</td>
                      <td align="center" class="divcont"><iframe frameborder="0" width="445" height="190" scrolling="auto" id="ifr_op" name="ifr_opn" src="op_clientes.php"></iframe></td>
                      <td class="divladoder">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="37" class="divesquinaiizq">&nbsp;</td>
                      <td class="divcenterinf">&nbsp;</td>
                      <td class="divesquinaider">&nbsp;</td>
                    </tr>
                    <tr>                    </tr>
              </table>        </td>
            <td>&nbsp;</td>
      </tr>	
      <tr>
        <td height="88"><a href="msn_construccion.html" target="ifr_opn"><img src="images/inventario.png" alt="INVENTARIO" width="90" height="88" longdesc="INVENTARIO" /></a></td>
        <td align="center"><input name="cerrar" class='btn btncancel' type="button" value="Cerrar Sesion" onclick="conf_session2()"/></td>
        <td><a href="msn_construccion.html" target="ifr_opn"><img src="images/estadisticas.png" alt="ESTADISTICAS" width="90" height="82" longdesc="ESTADISTICAS" /></a></td>
      </tr>
      <tr>
        <td colspan="3" align="center" class="piepage">Desarrollado por: Lenin Garizabalo</td>
      </tr>
    </table>
<div class="fdivinf">&nbsp;</div>
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