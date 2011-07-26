<?php
	$conexion = mysql_connect('localhost:3306' , 'root',1234);
	if(!$conexion)
 	{
		?>
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>T!soft</title>
		<link href="../estilo.css" rel="stylesheet" type="text/css" />
		<link href="../sexyalertbox.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../funciones.js" language="javascript"></script>
		<script type="text/javascript" src="../mootools.js" language="javascript"></script>
		<script type="text/javascript" src="../sexyalertbox.v1.1.js" language="javascript"></script>
		<script type="text/javascript" src="../sexyalertbox.packed.js" language="javascript"></script>
		</head>

		<body class="bgn_page">
		<script language='javascript' type='text/javascript'>
			'domready',Sexy = new SexyAlertBox();
			Sexy.error('<h1>Error</h1><p>Falló la conexion con la base de datos</p>',
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
		</body>
		</html>
		<?php
		exit();
 	}
?>
