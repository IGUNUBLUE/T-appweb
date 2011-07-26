<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tisoft&nbsp;|&nbsp;Inicio</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="sexyalertbox.css" type="text/css" media="all" />
<script type="text/javascript" src="funciones.js" language="javascript"></script>
<script src="mootools.js" type="text/javascript" language="javascript"></script>
<script src="sexyalertbox.packed.js" type="text/javascript" language="javascript"></script>
<script src="sexyalertbox.v1.1.js" type="text/javascript" language="javascript"></script>
</head>

<body>
<!-- tabla principal. -->
<body>
<!-- tabla principal. -->
<table width="100%" border="0" cellpadding="0" cellspacing="0"> 
	<tr>
    	<td height="188" align="center">
        	<div class="background"></div>
        </td>
  </tr>
  <tr>
    <td align="center" class="piepage">Desarrollado por: Lenin Garizabalo </td>
  </tr>
</table>
</body>
</html>
</body>

<?php
	$login = $_POST['login'];
	$password = $_POST['password'];
	
	require("conexion_db.php"); /*llamando al archivo conexio_db que contiene la conexion con la base de datos*/
	
	$cons1 = mysql_query("select * from bd_tisoft.usuarios where login = '$login'"); /*consultando en la base de datos si el login se encuentra.*/
	$resp1 = mysql_fetch_row($cons1);
	
	if($resp1 == "") /* condición  para advertir que el usuario no se encuentra*/
	{
		?>
		<script language='javascript' type='text/javascript'>
				'domready',Sexy = new SexyAlertBox();
				Sexy.error('<h1>Error</h1><br/>El usuario no existe.',
					{ 
						onComplete: 
						function(returnvalue) 
						{ 
							if(returnvalue)
							{
								document.location = 'index.php';
							}
						}
					});
        </script>
        <?php
	}
	else
	{
		if($resp1[4] == $password) /*comparando que la contraseña del usuario sea la correcta.*/
		{
			$_SESSION['login']= $login;
			?>
			<script language='javascript' type='text/javascript'>
					var usu = "<?php echo $_SESSION['login'];?>";
                    'domready',Sexy = new SexyAlertBox();
                    Sexy.info('<h1>Bienvenido</h1><p>'+usu+'</p>Presione OK para continuar.',
                        { 
                            onComplete: 
                            function(returnvalue) 
                            { 
                                if(returnvalue)
                                {
                                    document.location = 'centro_op.php';
                                }
                            }
                        });
            </script>
            <?php
		}
		else
		{
			?>
			<script language='javascript' type='text/javascript'>
                    'domready',Sexy = new SexyAlertBox();
                    Sexy.error('<h1>Error</h1><p>Contraseña errada. por favor escribala correctamente.</p>',
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
	}
?>
</html>