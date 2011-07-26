<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>T!Appweb | Servicios</title>
<link href="../view.css" rel="stylesheet" type="text/css" />
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<link href="../sexyalertbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../funciones.js" language="javascript"></script>
<script type="text/javascript" src="../mootools.js" language="javascript"></script>
<script type="text/javascript" src="../sexyalertbox.v1.1.js" language="javascript"></script>
<script type="text/javascript" src="../sexyalertbox.packed.js" language="javascript"></script>
<script type="text/javascript" src="../calendar.js" language="javascript"></script>
</head>


<body class="bgn_page">
<!-- AQUI HAY UNA CONSULTA SQL  -->
	<?php
	if(isset($_SESSION['login'])) 
    {
		require("../conexion_db.php"); /*llamando al archivo conexio_db que contiene la conexion con la base de datos*/
		$num_cli = $_POST["registrar_servicio_hidden"];
		$cons2 = mysql_query("SELECT * FROM bd_tisoft.clientes where num_doc = '$num_cli'");
		$resp2 = mysql_fetch_row($cons2);
	?>
<!-- TERMINA LA CONSULTA-->
	<form name="registrar_servicio_form" method="post" action="">
		<table width="100%" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td height="50" align="center" class="tituloprincipal" colspan="2">REGISTRAR UN NUEVO SERVICIO</td>
			</tr>
			<tr>
				<td width="71%">
					<table width="775" border="0" cellpadding="2" cellspacing="0" class="fontstyle" align="center">
						<tr>
							<td height="30" colspan="3" bgcolor="#66CCFF" class="stiframesopserv" >&nbsp;Informacion del servicio</td>
						</tr>
						<tr>
							<td height="29" colspan="3">&nbsp;Los campos marcados con asterisco(<a class="asterisco">*</a>) son obligatorios</td>
						</tr>
						<tr>
							<td width="260" height="26" bgcolor="#999999">&nbsp;Fecha&nbsp;
								<input id="element_10_1" name="dia" class="element text" size="2" maxlength="2" type="text" readonly="readonly" />
								/
								<input id="element_10_2" name="mes" class="element text" size="2" maxlength="2" type="text" readonly="readonly" />
								/
								<input id="element_10_3" name="ano" class="element text" size="4" maxlength="4" type="text" readonly="readonly" />
								<span id="calendar_10"><img src="../images/calendar.gif" alt="Pick a date." name="cal_img_10" width="16" height="16" class="datepicker" id="cal_img_10" /></span><script type="text/javascript">
									Calendar.setup({
									inputField	 : "element_10_3",
									baseField    : "element_10",
									displayArea  : "calendar_10",
									button		 : "cal_img_10",
									ifFormat	 : "%B %e, %Y",
									onSelect	 : selectEuropeDate
									});
								</script>
								<a class="asterisco">*</a></td>
							  <td width="1" bgcolor="#999999">&nbsp;</td>
							  <td width="506" bgcolor="#999999">Nombre del usuario&nbsp;
								<input type="text" name="nombre_cliente" value="<?php echo $resp2[3]." ".$resp2[4]; ?>" readonly="true" />
								<input type="hidden" name="num_cli" value="<?php echo $resp2[2]; ?>" readonly="true" />	
						</tr>
						<tr>
							<td>
								<!--<input type="text" name="empresa" value="" />-->
								&nbsp;Id de registro&nbsp;<input type="text" name="id_cli" value="<?php echo $resp2[0] ?>" readonly="true" size="3" /> 
								<!--<a class="asterisco">*</a>--></td>
							<td>&nbsp;</td>
							<td>Barrio<input type="text" name="barrio" value="<?php echo $resp2[9]; ?>" readonly="true" /></td>
						</tr>
						<tr>
							<td height="26" bgcolor="#999999">&nbsp;Dirreci&oacute;n&nbsp;
								<input type="text" name="direccion" readonly="true" value="<?php echo $resp2[8]; ?>"/></td>
							<td bgcolor="#999999">&nbsp;</td>
							<td bgcolor="#999999">Tel&eacute;fono&nbsp;
								<input type="text" name="telefono" readonly="true" value="<?php echo $resp2[11]; ?>" /></td>
						</tr>
						<tr>
							<td height="27" colspan="3" align="center">Equipos<br/>
								<div>
									<select name="equipo_1">
										<option value="no" selected="true">Escoger&nbsp;</option>
										<option value="Impresora">Impresoras&nbsp;</option>
										<option value="Pc">Pc&nbsp;</option>
										<option value="Portatiles">Portatiles&nbsp;</option>
										<option value="Monitores">Monitores&nbsp;</option>
										<option value="Cargadores">Cargadores&nbsp;</option>
										<option value="Boards">Boards&nbsp;</option>
										<option value="Disco Duros">Discos Duros&nbsp;</option>
										<option value="fuentes">Fuentes&nbsp;</option>
										<option value="OTROS">OTROS&nbsp;</option>
									</select>
									<select id="cant_id">
										<option>1</option>
										<option>2</option>
									</select>
									<input type="button" name="crear_eq" id="crear_eq_id" value="crear equipo" onclick="creq()" />
								</div>
								\------------------------------------------------------------------------------/
								<table width="70%" border="1" id="nuevo_art" id="tabla_eq">
									<tr align="center">
										<td width="8">No</td>
										<td width="234">TIPO</td>
										<td width="144">MARCA</td>
										<td width="133">SERIAL</td>
										<td width="133">PROBLEMA</td>
										<td width="133">ESPECIFICACIONES</td>
									</tr>
								</table>
									<!--<tr align="center">
										<td width="8">N&deg;1</td>
										<td width="234">
											<select name="equipo_1">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Impresora">Impresoras&nbsp;</option>
												<option value="Pc">Pc&nbsp;</option>
												<option value="Portatiles">Portatiles&nbsp;</option>
												<option value="Monitores">Monitores&nbsp;</option>
												<option value="Cargadores">Cargadores&nbsp;</option>
												<option value="Boards">Boards&nbsp;</option>
												<option value="Disco Duros">Discos Duros&nbsp;</option>
												<option value="fuentes">Fuentes&nbsp;</option>
												<option value="OTROS">OTROS&nbsp;</option>
											</select>
										</td>
										<td width="144">
											<select name="marca_1">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Acer">Acer&nbsp;</option>
												<option value="Alienware">Alienware&nbsp;</option>
												<option value="AOC">AOC&nbsp;</option>
												<option value="Apple/Mac">Apple/Mac&nbsp;</option>
												<option value="Asus">Asus&nbsp;</option>
												<option value="AsRock">AsRock&nbsp;</option>
												<option value="Albatron">Albatron&nbsp;</option>
												<option value="Biostar">Biostar&nbsp;</option>
												<option value="BenQ">BenQ&nbsp;</option>
												<option value="Brother">Brother&nbsp;</option>
												<option value="Canon">Canon&nbsp;</option>
												<option value="Compu max">Compu max&nbsp;</option>
												<option value="Clon">Clon&nbsp;</option>
												<option value="Dell">Dell&nbsp;</option>
												<option value="Epson">Epson&nbsp;</option>
												<option value="Fujitsu">Fujitsu&nbsp;</option>
												<option value="Gateway">Gateway&nbsp;</option>
												<option value="HP/Compaq">HP/Compaq&nbsp;</option>
												<option value="Hitachi">Hitachi&nbsp;</option>
												<option value="IBM/Lenovo">IBM/Lenovo&nbsp;</option>
												<option value="Lexmark">Lexmark&nbsp;</option>
												<option value="LG">LG&nbsp;</option>
												<option value="Mitao">Mitao&nbsp;</option>
												<option value="MSI">MSI&nbsp;</option>
												<option value="Nvidia">Nvidia&nbsp;</option>
												<option value="Nec">Nec&nbsp;</option>
												<option value="Nokia">Nokia&nbsp;</option>
												<option value="OCZ">OCZ&nbsp;</option>
												<option value="Olivetti">Olivetti&nbsp;</option>
												<option value="Rain computers">Rain computers&nbsp;</option>
												<option value="Ricoh">Ricoh&nbsp;</option>
												<option value="Sony">Sony&nbsp;</option>
												<option value="Segate">Segate&nbsp;</option>
												<option value="Samsung">Samsung&nbsp;</option>
												<option value="Siemens">Siemens&nbsp;</option>
												<option value="Toshiba">Toshiba&nbsp;</option>
												<option value="ViewSonic">ViewSonic&nbsp;</option>
												<option value="Vilin">Vilin&nbsp;</option>
												<option value="Velocity">Velocity&nbsp;</option>
												<option value="Wyse">Wyse&nbsp;</option>
												<option value="Wester Digital">Wester Digital&nbsp;</option>
												<option value="Zepto">Zepto&nbsp;</option>
												<option value="OTRA">OTRA&nbsp;</option>
											</select>
										</td>
										<td width="90"><input name="serial_1" type="text" value=""/></td>
										<td width="120"><input name="problem_1" type="text" value="" /></td>
										<td width="120"><input name="espef_1" type="text" value="" /></td>
									</tr>
									<tr align="center">
										<td width="8">N&deg;2</td>
										<td width="234">
											<select name="equipo_2">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Impresora">Impresoras&nbsp;</option>
												<option value="Pc">Pc&nbsp;</option>
												<option value="Portatil">Portatiles&nbsp;</option>
												<option value="Monitor">Monitores&nbsp;</option>
												<option value="Cargador">Cargadores&nbsp;</option>
												<option value="Board">Boards&nbsp;</option>
												<option value="Disco Duro">Discos Duros&nbsp;</option>
												<option value="fuente">Fuentes&nbsp;</option>
												<option value="OTRO">OTROS&nbsp;</option>
											</select>
										</td>
										<td width="144">
											<select name="marca_2">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Acer">Acer&nbsp;</option>
												<option value="Alienware">Alienware&nbsp;</option>
												<option value="AOC">AOC&nbsp;</option>
												<option value="Apple/Mac">Apple/Mac&nbsp;</option>
												<option value="Asus">Asus&nbsp;</option>
												<option value="AsRock">AsRock&nbsp;</option>
												<option value="Albatron">Albatron&nbsp;</option>
												<option value="Biostar">Biostar&nbsp;</option>
												<option value="BenQ">BenQ&nbsp;</option>
												<option value="Brother">Brother&nbsp;</option>
												<option value="Canon">Canon&nbsp;</option>
												<option value="Compu max">Compu max&nbsp;</option>
												<option value="Clon">Clon&nbsp;</option>
												<option value="Dell">Dell&nbsp;</option>
												<option value="Epson">Epson&nbsp;</option>
												<option value="Fujitsu">Fujitsu&nbsp;</option>
												<option value="Gateway">Gateway&nbsp;</option>
												<option value="HP/Compaq">HP/Compaq&nbsp;</option>
												<option value="Hitachi">Hitachi&nbsp;</option>
												<option value="IBM/Lenovo">IBM/Lenovo&nbsp;</option>
												<option value="Lexmark">Lexmark&nbsp;</option>
												<option value="LG">LG&nbsp;</option>
												<option value="Mitao">Mitao&nbsp;</option>
												<option value="MSI">MSI&nbsp;</option>
												<option value="Nvidia">Nvidia&nbsp;</option>
												<option value="Nec">Nec&nbsp;</option>
												<option value="Nokia">Nokia&nbsp;</option>
												<option value="OCZ">OCZ&nbsp;</option>
												<option value="Olivetti">Olivetti&nbsp;</option>
												<option value="Rain computers">Rain computers&nbsp;</option>
												<option value="Ricoh">Ricoh&nbsp;</option>
												<option value="Sony">Sony&nbsp;</option>
												<option value="Segate">Segate&nbsp;</option>
												<option value="Samsung">Samsung&nbsp;</option>
												<option value="Siemens">Siemens&nbsp;</option>
												<option value="Toshiba">Toshiba&nbsp;</option>
												<option value="ViewSonic">ViewSonic&nbsp;</option>
												<option value="Vilin">Vilin&nbsp;</option>
												<option value="Velocity">Velocity&nbsp;</option>
												<option value="Wyse">Wyse&nbsp;</option>
												<option value="Wester Digital">Wester Digital&nbsp;</option>
												<option value="Zepto">Zepto&nbsp;</option>
												<option value="OTRA">OTRA&nbsp;</option>
											</select>
										</td>
										<td width="90"><input name="serial_2" type="text" value="" /></td>
										<td width="120"><input name="problem_2" type="text" value="" /></td>
										<td width="120"><input name="espef_2" type="text" value="" /></td>
									</tr>
									<tr align="center">
										<td width="8">N&deg;3</td>
										<td width="234">
											<select name="equipo_3">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Impresora">Impresoras&nbsp;</option>
												<option value="Pc">Pc&nbsp;</option>
												<option value="Portatiles">Portatiles&nbsp;</option>
												<option value="Monitores">Monitores&nbsp;</option>
												<option value="Cargadores">Cargadores&nbsp;</option>
												<option value="Boards">Boards&nbsp;</option>
												<option value="Disco Duros">Discos Duros&nbsp;</option>
												<option value="fuentes">Fuentes&nbsp;</option>
												<option value="OTROS">OTROS&nbsp;</option>
											</select>
										</td>
										<td width="144">
											<select name="marca_3">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Acer">Acer&nbsp;</option>
												<option value="Alienware">Alienware&nbsp;</option>
												<option value="AOC">AOC&nbsp;</option>
												<option value="Apple/Mac">Apple/Mac&nbsp;</option>
												<option value="Asus">Asus&nbsp;</option>
												<option value="AsRock">AsRock&nbsp;</option>
												<option value="Albatron">Albatron&nbsp;</option>
												<option value="Biostar">Biostar&nbsp;</option>
												<option value="BenQ">BenQ&nbsp;</option>
												<option value="Brother">Brother&nbsp;</option>
												<option value="Canon">Canon&nbsp;</option>
												<option value="Compu max">Compu max&nbsp;</option>
												<option value="Clon">Clon&nbsp;</option>
												<option value="Dell">Dell&nbsp;</option>
												<option value="Epson">Epson&nbsp;</option>
												<option value="Fujitsu">Fujitsu&nbsp;</option>
												<option value="Gateway">Gateway&nbsp;</option>
												<option value="HP/Compaq">HP/Compaq&nbsp;</option>
												<option value="Hitachi">Hitachi&nbsp;</option>
												<option value="IBM/Lenovo">IBM/Lenovo&nbsp;</option>
												<option value="Lexmark">Lexmark&nbsp;</option>
												<option value="LG">LG&nbsp;</option>
												<option value="Mitao">Mitao&nbsp;</option>
												<option value="MSI">MSI&nbsp;</option>
												<option value="Nvidia">Nvidia&nbsp;</option>
												<option value="Nec">Nec&nbsp;</option>
												<option value="Nokia">Nokia&nbsp;</option>
												<option value="OCZ">OCZ&nbsp;</option>
												<option value="Olivetti">Olivetti&nbsp;</option>
												<option value="Rain computers">Rain computers&nbsp;</option>
												<option value="Ricoh">Ricoh&nbsp;</option>
												<option value="Sony">Sony&nbsp;</option>
												<option value="Segate">Segate&nbsp;</option>
												<option value="Samsung">Samsung&nbsp;</option>
												<option value="Siemens">Siemens&nbsp;</option>
												<option value="Toshiba">Toshiba&nbsp;</option>
												<option value="ViewSonic">ViewSonic&nbsp;</option>
												<option value="Vilin">Vilin&nbsp;</option>
												<option value="Velocity">Velocity&nbsp;</option>
												<option value="Wyse">Wyse&nbsp;</option>
												<option value="Wester Digital">Wester Digital&nbsp;</option>
												<option value="Zepto">Zepto&nbsp;</option>
												<option value="OTRA">OTRA&nbsp;</option>
											</select>
										</td>
										<td width="90"><input name="serial_3" type="text" value="" /></td>
										<td width="120"><input name="problem_3" type="text" value="" /></td>
										<td width="120"><input name="espef_3" type="text" value="" /></td>
									</tr>
									<tr align="center">
										<td width="8">N&deg;4</td>
										<td width="234">
											<select name="equipo_4">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Impresora">Impresoras&nbsp;</option>
												<option value="Pc">Pc&nbsp;</option>
												<option value="Portatiles">Portatiles&nbsp;</option>
												<option value="Monitores">Monitores&nbsp;</option>
												<option value="Cargadores">Cargadores&nbsp;</option>
												<option value="Boards">Boards&nbsp;</option>
												<option value="Disco Duros">Discos Duros&nbsp;</option>
												<option value="fuentes">Fuentes&nbsp;</option>
												<option value="OTROS">OTROS&nbsp;</option>
											</select>
										</td>
										<td width="144">
											<select name="marca_4">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Acer">Acer&nbsp;</option>
												<option value="Alienware">Alienware&nbsp;</option>
												<option value="AOC">AOC&nbsp;</option>
												<option value="Apple/Mac">Apple/Mac&nbsp;</option>
												<option value="Asus">Asus&nbsp;</option>
												<option value="AsRock">AsRock&nbsp;</option>
												<option value="Albatron">Albatron&nbsp;</option>
												<option value="Biostar">Biostar&nbsp;</option>
												<option value="BenQ">BenQ&nbsp;</option>
												<option value="Brother">Brother&nbsp;</option>
												<option value="Canon">Canon&nbsp;</option>
												<option value="Compu max">Compu max&nbsp;</option>
												<option value="Clon">Clon&nbsp;</option>
												<option value="Dell">Dell&nbsp;</option>
												<option value="Epson">Epson&nbsp;</option>
												<option value="Fujitsu">Fujitsu&nbsp;</option>
												<option value="Gateway">Gateway&nbsp;</option>
												<option value="HP/Compaq">HP/Compaq&nbsp;</option>
												<option value="Hitachi">Hitachi&nbsp;</option>
												<option value="IBM/Lenovo">IBM/Lenovo&nbsp;</option>
												<option value="Lexmark">Lexmark&nbsp;</option>
												<option value="LG">LG&nbsp;</option>
												<option value="Mitao">Mitao&nbsp;</option>
												<option value="MSI">MSI&nbsp;</option>
												<option value="Nvidia">Nvidia&nbsp;</option>
												<option value="Nec">Nec&nbsp;</option>
												<option value="Nokia">Nokia&nbsp;</option>
												<option value="OCZ">OCZ&nbsp;</option>
												<option value="Olivetti">Olivetti&nbsp;</option>
												<option value="Rain computers">Rain computers&nbsp;</option>
												<option value="Ricoh">Ricoh&nbsp;</option>
												<option value="Sony">Sony&nbsp;</option>
												<option value="Segate">Segate&nbsp;</option>
												<option value="Samsung">Samsung&nbsp;</option>
												<option value="Siemens">Siemens&nbsp;</option>
												<option value="Toshiba">Toshiba&nbsp;</option>
												<option value="ViewSonic">ViewSonic&nbsp;</option>
												<option value="Vilin">Vilin&nbsp;</option>
												<option value="Velocity">Velocity&nbsp;</option>
												<option value="Wyse">Wyse&nbsp;</option>
												<option value="Wester Digital">Wester Digital&nbsp;</option>
												<option value="Zepto">Zepto&nbsp;</option>
												<option value="OTRA">OTRA&nbsp;</option>
											</select>
										</td>
										<td width="90"><input name="serial_4" type="text" value="" /></td>
										<td width="120"><input name="problem_4" type="text" value="" /></td>
										<td width="120"><input name="espef_4" type="text" value="" /></td>
									</tr>
									<tr align="center">
										<td width="8">N&deg;5</td>
										<td width="234">
											<select name="equipo_5">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Impresora">Impresoras&nbsp;</option>
												<option value="Pc">Pc&nbsp;</option>
												<option value="Portatiles">Portatiles&nbsp;</option>
												<option value="Monitores">Monitores&nbsp;</option>
												<option value="Cargadores">Cargadores&nbsp;</option>
												<option value="Boards">Boards&nbsp;</option>
												<option value="Disco Duros">Discos Duros&nbsp;</option>
												<option value="fuentes">Fuentes&nbsp;</option>
												<option value="OTROS">OTROS&nbsp;</option>
											</select>
										</td>
										<td width="144">
											<select name="marca_5">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Acer">Acer&nbsp;</option>
												<option value="Alienware">Alienware&nbsp;</option>
												<option value="AOC">AOC&nbsp;</option>
												<option value="Apple/Mac">Apple/Mac&nbsp;</option>
												<option value="Asus">Asus&nbsp;</option>
												<option value="AsRock">AsRock&nbsp;</option>
												<option value="Albatron">Albatron&nbsp;</option>
												<option value="Biostar">Biostar&nbsp;</option>
												<option value="BenQ">BenQ&nbsp;</option>
												<option value="Brother">Brother&nbsp;</option>
												<option value="Canon">Canon&nbsp;</option>
												<option value="Compu max">Compu max&nbsp;</option>
												<option value="Clon">Clon&nbsp;</option>
												<option value="Dell">Dell&nbsp;</option>
												<option value="Epson">Epson&nbsp;</option>
												<option value="Fujitsu">Fujitsu&nbsp;</option>
												<option value="Gateway">Gateway&nbsp;</option>
												<option value="HP/Compaq">HP/Compaq&nbsp;</option>
												<option value="Hitachi">Hitachi&nbsp;</option>
												<option value="IBM/Lenovo">IBM/Lenovo&nbsp;</option>
												<option value="Lexmark">Lexmark&nbsp;</option>
												<option value="LG">LG&nbsp;</option>
												<option value="Mitao">Mitao&nbsp;</option>
												<option value="MSI">MSI&nbsp;</option>
												<option value="Nvidia">Nvidia&nbsp;</option>
												<option value="Nec">Nec&nbsp;</option>
												<option value="Nokia">Nokia&nbsp;</option>
												<option value="OCZ">OCZ&nbsp;</option>
												<option value="Olivetti">Olivetti&nbsp;</option>
												<option value="Rain computers">Rain computers&nbsp;</option>
												<option value="Ricoh">Ricoh&nbsp;</option>
												<option value="Sony">Sony&nbsp;</option>
												<option value="Segate">Segate&nbsp;</option>
												<option value="Samsung">Samsung&nbsp;</option>
												<option value="Siemens">Siemens&nbsp;</option>
												<option value="Toshiba">Toshiba&nbsp;</option>
												<option value="ViewSonic">ViewSonic&nbsp;</option>
												<option value="Vilin">Vilin&nbsp;</option>
												<option value="Velocity">Velocity&nbsp;</option>
												<option value="Wyse">Wyse&nbsp;</option>
												<option value="Wester Digital">Wester Digital&nbsp;</option>
												<option value="Zepto">Zepto&nbsp;</option>
												<option value="OTRA">OTRA&nbsp;</option>
											</select>
										</td>
										<td width="90"><input name="serial_5" type="text" value="" /></td>
										<td width="120"><input name="problem_5" type="text" value="" /></td>
										<td width="120"><input name="espef_5" type="text" value="" /></td>
									</tr>
									<tr align="center">
										<td width="8">N&deg;6</td>
										<td width="234">
											<select name="equipo_6">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Impresora">Impresoras&nbsp;</option>
												<option value="Pc">Pc&nbsp;</option>
												<option value="Portatiles">Portatiles&nbsp;</option>
												<option value="Monitores">Monitores&nbsp;</option>
												<option value="Cargadores">Cargadores&nbsp;</option>
												<option value="Boards">Boards&nbsp;</option>
												<option value="Disco Duros">Discos Duros&nbsp;</option>
												<option value="fuentes">Fuentes&nbsp;</option>
												<option value="OTROS">OTROS&nbsp;</option>
											</select>
										</td>
										<td width="144">
											<select name="marca_6">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Acer">Acer&nbsp;</option>
												<option value="Alienware">Alienware&nbsp;</option>
												<option value="AOC">AOC&nbsp;</option>
												<option value="Apple/Mac">Apple/Mac&nbsp;</option>
												<option value="Asus">Asus&nbsp;</option>
												<option value="AsRock">AsRock&nbsp;</option>
												<option value="Albatron">Albatron&nbsp;</option>
												<option value="Biostar">Biostar&nbsp;</option>
												<option value="BenQ">BenQ&nbsp;</option>
												<option value="Brother">Brother&nbsp;</option>
												<option value="Canon">Canon&nbsp;</option>
												<option value="Compu max">Compu max&nbsp;</option>
												<option value="Clon">Clon&nbsp;</option>
												<option value="Dell">Dell&nbsp;</option>
												<option value="Epson">Epson&nbsp;</option>
												<option value="Fujitsu">Fujitsu&nbsp;</option>
												<option value="Gateway">Gateway&nbsp;</option>
												<option value="HP/Compaq">HP/Compaq&nbsp;</option>
												<option value="Hitachi">Hitachi&nbsp;</option>
												<option value="IBM/Lenovo">IBM/Lenovo&nbsp;</option>
												<option value="Lexmark">Lexmark&nbsp;</option>
												<option value="LG">LG&nbsp;</option>
												<option value="Mitao">Mitao&nbsp;</option>
												<option value="MSI">MSI&nbsp;</option>
												<option value="Nvidia">Nvidia&nbsp;</option>
												<option value="Nec">Nec&nbsp;</option>
												<option value="Nokia">Nokia&nbsp;</option>
												<option value="OCZ">OCZ&nbsp;</option>
												<option value="Olivetti">Olivetti&nbsp;</option>
												<option value="Rain computers">Rain computers&nbsp;</option>
												<option value="Ricoh">Ricoh&nbsp;</option>
												<option value="Sony">Sony&nbsp;</option>
												<option value="Segate">Segate&nbsp;</option>
												<option value="Samsung">Samsung&nbsp;</option>
												<option value="Siemens">Siemens&nbsp;</option>
												<option value="Toshiba">Toshiba&nbsp;</option>
												<option value="ViewSonic">ViewSonic&nbsp;</option>
												<option value="Vilin">Vilin&nbsp;</option>
												<option value="Velocity">Velocity&nbsp;</option>
												<option value="Wyse">Wyse&nbsp;</option>
												<option value="Wester Digital">Wester Digital&nbsp;</option>
												<option value="Zepto">Zepto&nbsp;</option>
												<option value="OTRA">OTRA&nbsp;</option>
											</select>
										</td>
										<td width="90"><input name="serial_6" type="text" value="" /></td>
										<td width="120"><input name="problem_6" type="text" value="" /></td>
										<td width="120"><input name="espef_6" type="text" value="" /></td>
									</tr>
									<tr align="center">
										<td width="8">N&deg;7</td>
										<td width="234">
											<select name="equipo_7">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Impresora">Impresoras&nbsp;</option>
												<option value="Pc">Pc&nbsp;</option>
												<option value="Portatiles">Portatiles&nbsp;</option>
												<option value="Monitores">Monitores&nbsp;</option>
												<option value="Cargadores">Cargadores&nbsp;</option>
												<option value="Boards">Boards&nbsp;</option>
												<option value="Disco Duros">Discos Duros&nbsp;</option>
												<option value="fuentes">Fuentes&nbsp;</option>
												<option value="OTROS">OTROS&nbsp;</option>
											</select>
										</td>
										<td width="144">
											<select name="marca_7">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Acer">Acer&nbsp;</option>
												<option value="Alienware">Alienware&nbsp;</option>
												<option value="AOC">AOC&nbsp;</option>
												<option value="Apple/Mac">Apple/Mac&nbsp;</option>
												<option value="Asus">Asus&nbsp;</option>
												<option value="AsRock">AsRock&nbsp;</option>
												<option value="Albatron">Albatron&nbsp;</option>
												<option value="Biostar">Biostar&nbsp;</option>
												<option value="BenQ">BenQ&nbsp;</option>
												<option value="Brother">Brother&nbsp;</option>
												<option value="Canon">Canon&nbsp;</option>
												<option value="Compu max">Compu max&nbsp;</option>
												<option value="Clon">Clon&nbsp;</option>
												<option value="Dell">Dell&nbsp;</option>
												<option value="Epson">Epson&nbsp;</option>
												<option value="Fujitsu">Fujitsu&nbsp;</option>
												<option value="Gateway">Gateway&nbsp;</option>
												<option value="HP/Compaq">HP/Compaq&nbsp;</option>
												<option value="Hitachi">Hitachi&nbsp;</option>
												<option value="IBM/Lenovo">IBM/Lenovo&nbsp;</option>
												<option value="Lexmark">Lexmark&nbsp;</option>
												<option value="LG">LG&nbsp;</option>
												<option value="Mitao">Mitao&nbsp;</option>
												<option value="MSI">MSI&nbsp;</option>
												<option value="Nvidia">Nvidia&nbsp;</option>
												<option value="Nec">Nec&nbsp;</option>
												<option value="Nokia">Nokia&nbsp;</option>
												<option value="OCZ">OCZ&nbsp;</option>
												<option value="Olivetti">Olivetti&nbsp;</option>
												<option value="Rain computers">Rain computers&nbsp;</option>
												<option value="Ricoh">Ricoh&nbsp;</option>
												<option value="Sony">Sony&nbsp;</option>
												<option value="Segate">Segate&nbsp;</option>
												<option value="Samsung">Samsung&nbsp;</option>
												<option value="Siemens">Siemens&nbsp;</option>
												<option value="Toshiba">Toshiba&nbsp;</option>
												<option value="ViewSonic">ViewSonic&nbsp;</option>
												<option value="Vilin">Vilin&nbsp;</option>
												<option value="Velocity">Velocity&nbsp;</option>
												<option value="Wyse">Wyse&nbsp;</option>
												<option value="Wester Digital">Wester Digital&nbsp;</option>
												<option value="Zepto">Zepto&nbsp;</option>
												<option value="OTRA">OTRA&nbsp;</option>
											</select>
										</td>
										<td width="90"><input name="serial_7" type="text" value="" /></td>
										<td width="120"><input name="problem_7" type="text" value="" /></td>
										<td width="120"><input name="espef_7" type="text" value="" /></td>
									</tr>
									<tr align="center">
										<td width="8">N&deg;8</td>
										<td width="234">
											<select name="equipo_8">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Impresora">Impresoras&nbsp;</option>
												<option value="Pc">Pc&nbsp;</option>
												<option value="Portatiles">Portatiles&nbsp;</option>
												<option value="Monitores">Monitores&nbsp;</option>
												<option value="Cargadores">Cargadores&nbsp;</option>
												<option value="Boards">Boards&nbsp;</option>
												<option value="Disco Duros">Discos Duros&nbsp;</option>
												<option value="fuentes">Fuentes&nbsp;</option>
												<option value="OTROS">OTROS&nbsp;</option>
											</select>
										</td>
										<td width="144">
											<select name="marca_8">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Acer">Acer&nbsp;</option>
												<option value="Alienware">Alienware&nbsp;</option>
												<option value="AOC">AOC&nbsp;</option>
												<option value="Apple/Mac">Apple/Mac&nbsp;</option>
												<option value="Asus">Asus&nbsp;</option>
												<option value="AsRock">AsRock&nbsp;</option>
												<option value="Albatron">Albatron&nbsp;</option>
												<option value="Biostar">Biostar&nbsp;</option>
												<option value="BenQ">BenQ&nbsp;</option>
												<option value="Brother">Brother&nbsp;</option>
												<option value="Canon">Canon&nbsp;</option>
												<option value="Compu max">Compu max&nbsp;</option>
												<option value="Clon">Clon&nbsp;</option>
												<option value="Dell">Dell&nbsp;</option>
												<option value="Epson">Epson&nbsp;</option>
												<option value="Fujitsu">Fujitsu&nbsp;</option>
												<option value="Gateway">Gateway&nbsp;</option>
												<option value="HP/Compaq">HP/Compaq&nbsp;</option>
												<option value="Hitachi">Hitachi&nbsp;</option>
												<option value="IBM/Lenovo">IBM/Lenovo&nbsp;</option>
												<option value="Lexmark">Lexmark&nbsp;</option>
												<option value="LG">LG&nbsp;</option>
												<option value="Mitao">Mitao&nbsp;</option>
												<option value="MSI">MSI&nbsp;</option>
												<option value="Nvidia">Nvidia&nbsp;</option>
												<option value="Nec">Nec&nbsp;</option>
												<option value="Nokia">Nokia&nbsp;</option>
												<option value="OCZ">OCZ&nbsp;</option>
												<option value="Olivetti">Olivetti&nbsp;</option>
												<option value="Rain computers">Rain computers&nbsp;</option>
												<option value="Ricoh">Ricoh&nbsp;</option>
												<option value="Sony">Sony&nbsp;</option>
												<option value="Segate">Segate&nbsp;</option>
												<option value="Samsung">Samsung&nbsp;</option>
												<option value="Siemens">Siemens&nbsp;</option>
												<option value="Toshiba">Toshiba&nbsp;</option>
												<option value="ViewSonic">ViewSonic&nbsp;</option>
												<option value="Vilin">Vilin&nbsp;</option>
												<option value="Velocity">Velocity&nbsp;</option>
												<option value="Wyse">Wyse&nbsp;</option>
												<option value="Wester Digital">Wester Digital&nbsp;</option>
												<option value="Zepto">Zepto&nbsp;</option>
												<option value="OTRA">OTRA&nbsp;</option>
											</select>
										</td>
										<td width="90"><input name="serial_8" type="text" value="" /></td>
										<td width="120"><input name="problem_8" type="text" value="" /></td>
										<td width="120"><input name="espef_8" type="text" value="" /></td>
									</tr>
									<tr align="center">
										<td width="8">N&deg;9</td>
										<td width="234">
											<select name="equipo_9">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Impresora">Impresoras&nbsp;</option>
												<option value="Pc">Pc&nbsp;</option>
												<option value="Portatiles">Portatiles&nbsp;</option>
												<option value="Monitores">Monitores&nbsp;</option>
												<option value="Cargadores">Cargadores&nbsp;</option>
												<option value="Boards">Boards&nbsp;</option>
												<option value="Disco Duros">Discos Duros&nbsp;</option>
												<option value="fuentes">Fuentes&nbsp;</option>
												<option value="OTROS">OTROS&nbsp;</option>
											</select>
										</td>
										<td width="144">
											<select name="marca_9">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Acer">Acer&nbsp;</option>
												<option value="Alienware">Alienware&nbsp;</option>
												<option value="AOC">AOC&nbsp;</option>
												<option value="Apple/Mac">Apple/Mac&nbsp;</option>
												<option value="Asus">Asus&nbsp;</option>
												<option value="AsRock">AsRock&nbsp;</option>
												<option value="Albatron">Albatron&nbsp;</option>
												<option value="Biostar">Biostar&nbsp;</option>
												<option value="BenQ">BenQ&nbsp;</option>
												<option value="Brother">Brother&nbsp;</option>
												<option value="Canon">Canon&nbsp;</option>
												<option value="Compu max">Compu max&nbsp;</option>
												<option value="Clon">Clon&nbsp;</option>
												<option value="Dell">Dell&nbsp;</option>
												<option value="Epson">Epson&nbsp;</option>
												<option value="Fujitsu">Fujitsu&nbsp;</option>
												<option value="Gateway">Gateway&nbsp;</option>
												<option value="HP/Compaq">HP/Compaq&nbsp;</option>
												<option value="Hitachi">Hitachi&nbsp;</option>
												<option value="IBM/Lenovo">IBM/Lenovo&nbsp;</option>
												<option value="Lexmark">Lexmark&nbsp;</option>
												<option value="LG">LG&nbsp;</option>
												<option value="Mitao">Mitao&nbsp;</option>
												<option value="MSI">MSI&nbsp;</option>
												<option value="Nvidia">Nvidia&nbsp;</option>
												<option value="Nec">Nec&nbsp;</option>
												<option value="Nokia">Nokia&nbsp;</option>
												<option value="OCZ">OCZ&nbsp;</option>
												<option value="Olivetti">Olivetti&nbsp;</option>
												<option value="Rain computers">Rain computers&nbsp;</option>
												<option value="Ricoh">Ricoh&nbsp;</option>
												<option value="Sony">Sony&nbsp;</option>
												<option value="Segate">Segate&nbsp;</option>
												<option value="Samsung">Samsung&nbsp;</option>
												<option value="Siemens">Siemens&nbsp;</option>
												<option value="Toshiba">Toshiba&nbsp;</option>
												<option value="ViewSonic">ViewSonic&nbsp;</option>
												<option value="Vilin">Vilin&nbsp;</option>
												<option value="Velocity">Velocity&nbsp;</option>
												<option value="Wyse">Wyse&nbsp;</option>
												<option value="Wester Digital">Wester Digital&nbsp;</option>
												<option value="Zepto">Zepto&nbsp;</option>
												<option value="OTRA">OTRA&nbsp;</option>
											</select>
										</td>
										<td width="90"><input name="serial_9" type="text" value="" /></td>
										<td width="120"><input name="problem_9" type="text" value="" /></td>
										<td width="120"><input name="espef_9" type="text" value="" /></td>
									</tr>
									<tr align="center">
										<td width="8">N&deg;10</td>
										<td width="234">
											<select name="equipo_10">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Impresora">Impresoras&nbsp;</option>
												<option value="Pc">Pc&nbsp;</option>
												<option value="Portatiles">Portatiles&nbsp;</option>
												<option value="Monitores">Monitores&nbsp;</option>
												<option value="Cargadores">Cargadores&nbsp;</option>
												<option value="Boards">Boards&nbsp;</option>
												<option value="Disco Duros">Discos Duros&nbsp;</option>
												<option value="fuentes">Fuentes&nbsp;</option>
												<option value="OTROS">OTROS&nbsp;</option>
											</select>
										</td>
										<td width="144">
											<select name="marca_10">
												<option value="no" selected="true">Escoger&nbsp;</option>
												<option value="Acer">Acer&nbsp;</option>
												<option value="Alienware">Alienware&nbsp;</option>
												<option value="AOC">AOC&nbsp;</option>
												<option value="Apple/Mac">Apple/Mac&nbsp;</option>
												<option value="Asus">Asus&nbsp;</option>
												<option value="AsRock">AsRock&nbsp;</option>
												<option value="Albatron">Albatron&nbsp;</option>
												<option value="Biostar">Biostar&nbsp;</option>
												<option value="BenQ">BenQ&nbsp;</option>
												<option value="Brother">Brother&nbsp;</option>
												<option value="Canon">Canon&nbsp;</option>
												<option value="Compu max">Compu max&nbsp;</option>
												<option value="Clon">Clon&nbsp;</option>
												<option value="Dell">Dell&nbsp;</option>
												<option value="Epson">Epson&nbsp;</option>
												<option value="Fujitsu">Fujitsu&nbsp;</option>
												<option value="Gateway">Gateway&nbsp;</option>
												<option value="HP/Compaq">HP/Compaq&nbsp;</option>
												<option value="Hitachi">Hitachi&nbsp;</option>
												<option value="IBM/Lenovo">IBM/Lenovo&nbsp;</option>
												<option value="Lexmark">Lexmark&nbsp;</option>
												<option value="LG">LG&nbsp;</option>
												<option value="Mitao">Mitao&nbsp;</option>
												<option value="MSI">MSI&nbsp;</option>
												<option value="Nvidia">Nvidia&nbsp;</option>
												<option value="Nec">Nec&nbsp;</option>
												<option value="Nokia">Nokia&nbsp;</option>
												<option value="OCZ">OCZ&nbsp;</option>
												<option value="Olivetti">Olivetti&nbsp;</option>
												<option value="Rain computers">Rain computers&nbsp;</option>
												<option value="Ricoh">Ricoh&nbsp;</option>
												<option value="Sony">Sony&nbsp;</option>
												<option value="Segate">Segate&nbsp;</option>
												<option value="Samsung">Samsung&nbsp;</option>
												<option value="Siemens">Siemens&nbsp;</option>
												<option value="Toshiba">Toshiba&nbsp;</option>
												<option value="ViewSonic">ViewSonic&nbsp;</option>
												<option value="Vilin">Vilin&nbsp;</option>
												<option value="Velocity">Velocity&nbsp;</option>
												<option value="Wyse">Wyse&nbsp;</option>
												<option value="Wester Digital">Wester Digital&nbsp;</option>
												<option value="Zepto">Zepto&nbsp;</option>
												<option value="OTRA">OTRA&nbsp;</option>
											</select>
										</td>
										<td width="90"><input name="serial_10" type="text" value="" /></td>
										<td width="120"><input name="problem_10" type="text" value="" /></td>
										<td width="120"><input name="espef_10" type="text" value="" /></td>
									</tr>
								</table>-->
						</tr>
						<tr align="center">
							<td colspan="3">
                  /------------------------------------------------------------------------------------------------------\
                </td>
						</tr>
						<tr>
							<td colspan="3" align="center">&nbsp;Observaciones&nbsp;
								<input name="observaciones" type="text" value="" size="80" maxlength="300" />
							</td>
						</tr>
						<tr>
							<td height="26" bgcolor="#999999" align="center">&nbsp;Garant&iacute;a
								<select name="opc_gar">
									<option value="no">&nbsp;NO</option>
									<option value="si">&nbsp;SI</option>
								</select>
							</td>
							<td bgcolor="#999999">&nbsp;</td>
							<td bgcolor="#999999">&nbsp;Nombre del tecnico&nbsp;
<!-- AQUI HAY UNA CONSULTA SQL  -->
								<?php
									$tec = $_SESSION['login'];
									$cons3 = mysql_query("SELECT * FROM bd_tisoft.usuarios where login = '$tec'");
									$resp3 = mysql_fetch_row($cons3);
								?>
<!-- TERMINA LA CONSULTA-->
								<input type="text" name="name_tec" value="<?php echo $resp3[1]." ".$resp3[2]; ?>"/>
							</td>
						</tr>
						<tr>
							<td height="30" colspan="3" align="center"><input name="registrar_servicio_button"  type="button" onclick="val_campo_ser()" value="Registrar servicio"/>
								<input name="registrar_servicio_hidden" type="hidden" value="nada" />
								&nbsp;&nbsp;
								<input name="limpiar" type="reset" value="Limpiar" />
							</td>
						</tr>
						<tr>
							<td colspan="3" align="center" bgcolor="#999999" height="30">
								<input name="detener" type="button" value="Cerrar Sesion" onclick="conf_session()" />
								&nbsp;&nbsp;
								<input name="regresar_centro_op" type="button" value="Regresar al centro de operaciones" onclick="cent_op()"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>	
		</table>
        </form>
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
