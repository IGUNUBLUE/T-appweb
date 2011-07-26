// JavaScript Document

/* funcion para validar los campos de index.php, lugar donde se realiza el inicio de sesion*/
function loguear()
{	
	'domready',Sexy = new SexyAlertBox();
	campo1 = document.inicio_usuarios.login.value;
	campo2 = document.inicio_usuarios.password.value;
	if(campo1 == "")
	{
		Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Usuario) se encuentra vacio.</p>', 
		{ onComplete: 
            function(returnvalue) { 
              if(returnvalue)
              {
				document.getElementById("login_id").style.borderColor="red";
				document.getElementById("login_id").style.background="#FA5858";
                document.inicio_usuarios.login.focus();
              }
			}
		});
	}
	else
	{
		document.getElementById("login_id").style.borderColor="";
		document.getElementById("login_id").style.background="";
		if(campo2 == "")
		{
			Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Contraseña) se encuentra vacio.</p>', 
			{ onComplete: 
				function(returnvalue) { 
				  if(returnvalue)
				  {
					document.getElementById("password_id").style.borderColor="red";
					document.getElementById("password_id").style.background="#FA5858";
					document.inicio_usuarios.password.focus();
				  }
				}
			});
		}
		else
		{
			document.getElementById("password_id").style.borderColor="";
			document.getElementById("password_id").style.background="";
			var exp= new RegExp('^[A-Za-z0-9]{1,20}$');
			if(!exp.test(campo1))
			{
				Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Usuario) solo puede contener letra (mayúsculas, minúscula) y números.</p>', 
				{ onComplete: 
					function(returnvalue) { 
					  if(returnvalue)
					  {
						document.getElementById("login_id").style.borderColor="red";
						document.getElementById("login_id").style.background="#FA5858";
						document.inicio_usuarios.login.focus();
					  }
					}
				});
			}
			else
			{
				document.getElementById("login_id").style.borderColor="";
				document.getElementById("login_id").style.background="";
				if(!exp.test(campo2))
				{
					Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Contraseña) solo puede contener letra (mayúsculas, minúscula) y números.</p>', 
					{ onComplete: 
						function(returnvalue) { 
						  if(returnvalue)
						  {
							document.getElementById("password_id").style.borderColor="red";
							document.getElementById("password_id").style.background="#FA5858";
							document.inicio_usuarios.password.focus();
						  }
						}
					});
				}
				else
				{
					document.getElementById("password_id").style.borderColor="";
					document.getElementById("password_id").style.background="";
					document.inicio_usuarios.submit();
				}
			}
		}
	}
}
/*-------------------------------------------------------------------fin-------------------------------------------------*/

/*----------------------------funcion para funciones que solo puede hacer el administrador---------------*/
function solo_admin()
{
	'domready', Sexy = new SexyAlertBox();
	Sexy.error('<h1>Error</h1><p>Esta operacion solo puede ser realizada por el administrador de la aplicación.</p>')
}
/*-----------------------------------------------------fin-------------------------------------------------*/

/*funcion para enviar los clientes que se muetran desde el boton mostrar todos los clientes*/
function pro_cli(x)
{
	document.fwork_cli.num_cli.value = x;
	document.fwork_cli.submit();
}
/*--------------------------fin------------------------------------*/

/* funcion para verificar si el usuario esta seguro de cerrar la sesion */
function conf_session()
{
  'domready', Sexy = new SexyAlertBox();
  Sexy.confirm('<h1>Confimar</h1><p>¿Deseas cerrar la sesion actual?</p><p>Pulsa "Ok" para continuar, o pulsa "Cancelar" para salir.</p>', 
	{ onComplete: 
		function(returnvalue) { 
		  if(returnvalue)
		  {
			document.location="../destroy.php";
		  }
		}
	})   
}
// repito la funcion por que la referencia del archivo destroy.php no es la misma para los archivos que estan fuera de carpetas
function conf_session2()
{
  'domready', Sexy = new SexyAlertBox();
  Sexy.confirm('<h1>Confimar</h1><p>¿Deseas cerrar la sesion actual?</p><p>Pulsa "Ok" para continuar, o pulsa "Cancelar" para salir.</p>', 
	{ onComplete: 
		function(returnvalue) { 
		  if(returnvalue)
		  {
			document.location="destroy.php";
		  }
		}
	})   
}
/*--------------------------------fin-----------------------------------*/

function cent_op()
{
	'domready', Sexy = new SexyAlertBox();
  	Sexy.confirm('<h1>Confimar</h1><p>¿Esta seguro que desea regresar al centro de operaciones?</p><p>Pulsa "Ok" para continuar, o pulsa "Cancelar" para salir.</p>', 
	{ onComplete: 
		function(returnvalue) { 
		  if(returnvalue)
		  {
			document.location="../centro_op.php";
		  }
		}
	})
}
// repito la funcion por que la referencia del archivo destroy.php no es la misma para los archivos que estan fuera de carpetas
function cent_op2()
{
	'domready', Sexy = new SexyAlertBox();
  	Sexy.confirm('<h1>Confimar</h1><p>¿Esta seguro que desea regresar al centro de operaciones?</p><p>Pulsa "Ok" para continuar, o pulsa "Cancelar" para salir.</p>', 
	{ onComplete: 
		function(returnvalue) { 
		  if(returnvalue)
		  {
			document.location="centro_op.php";
		  }
		}
	})
}
/*--------------------------------fin-----------------------------*/

/* validar campo para buscar un cliente*/
function enc_cliente()
{
	'domready', Sexy = new SexyAlertBox();
	if(document.encontrar_cliente_form.numero_cliente.value == "") 
    { 
     	Sexy.error('<h1>Error</h1><p>Señor usuario por favor escriba el numero de ID del cliente para realizar la busqueda.</p>',
		{ onComplete: 
			function(returnvalue) 
			{ 
				if(returnvalue)
				{
					document.getElementById('numero_cliente_id').style.backgroundColor="#FA5858";
					document.getElementById('numero_cliente_id').style.borderColor="red";
					document.getElementById('numero_cliente_id').focus();
				}
			}
		});
    }
	else
	{
		if(document.encontrar_cliente_form.numero_cliente.value.match(/\D/))
		{
			Sexy.error('<h1>Error</h1><p>Señor usuario solo se permiten números de ID para realizar la busqueda.</p>',
			{ onComplete: 
				function(returnvalue) 
				{ 
					if(returnvalue)
					{
						document.getElementById('numero_cliente_id').style.backgroundColor="#FA5858";
						document.getElementById('numero_cliente_id').style.borderColor="red";
						document.getElementById('numero_cliente_id').focus();
					}
				}
			});
		}
		else
		{
			document.encontrar_cliente_form.submit();
		}
	}
}

/* funciones para actualizar el genero y el estraro en el formulario actualizar cliente */
function act_estrato()
{
	document.getElementById("id_estra").value = document.getElementById("sect_estrato").value;
}
function actu_genero()
{
	document.getElementById("id_gen").value = document.getElementById("sect_genero").value;
}
/*----------------------------------------fin------------------------------------------*/

/*validar campos del registro de nuevos clientes*/
function freg_cliente()
{
	'domready',Sexy = new SexyAlertBox();
	if((document.registrar_cliente_form.numero_cliente.value.match(/\D/))||(document.registrar_cliente_form.numero_cliente.value == ""))
	{
		Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Número del documento) solo admite números. Por favor borre los caracteres especiales, los espacios y verifique que no este vacio.</p>', 
		{ onComplete: 
			function(returnvalue) { 
			  if(returnvalue)
			  {
				  document.getElementById("numero_cliente_id").style.borderColor="red";
				  document.getElementById("numero_cliente_id").style.background="#FA5858";
				  document.registrar_cliente_form.numero_cliente.focus();
			  }
			}
		});
	}
	else
	{
		document.getElementById("numero_cliente_id").style.borderColor="";
		document.getElementById("numero_cliente_id").style.background="";
		cadena = document.registrar_cliente_form.numero_cliente.value;
		min_num = cadena.length;
		if((min_num < 6)||(document.registrar_cliente_form.numero_cliente.value == ""))
		{
			Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Número del documento) debe tener minímo 6 digitos y no debe estar vacio.</p>', 
			{ onComplete: 
				function(returnvalue) { 
				  if(returnvalue)
				  {
					  document.getElementById("numero_cliente_id").style.borderColor="red";
					  document.getElementById("numero_cliente_id").style.background="#FA5858";
					  document.registrar_cliente_form.numero_cliente.focus();
				  }
				}
			});
		}
		else
		{
			document.getElementById("numero_cliente_id").style.borderColor="";
			document.getElementById("numero_cliente_id").style.background="";
			if((document.registrar_cliente_form.confirmar_numero_cliente.value.match(/\D/))||(document.registrar_cliente_form.confirmar_numero_cliente.value == ""))
			{
				Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Confirmar número del documento) solo admite números. Por favor borre los caracteres especiales, los espacios y verifique que no este vacio.</p>', 
				{ onComplete: 
					function(returnvalue) { 
					  if(returnvalue)
					  {
						  document.getElementById("confirmar_numero_cliente_id").style.borderColor="red";
						  document.getElementById("confirmar_numero_cliente_id").style.background="#FA5858";
						  document.registrar_cliente_form.confirmar_numero_cliente.focus();
					  }
					}
				});
			}
			else
			{
				document.getElementById("confirmar_numero_cliente_id").style.borderColor="";
				document.getElementById("confirmar_numero_cliente_id").style.background="";
				cadena = document.registrar_cliente_form.confirmar_numero_cliente.value.length;
				if((cadena < 6)||(document.registrar_cliente_form.confirmar_numero_cliente.value == ""))
				{
					Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Confirmar número del documento) debe tener minímo 6 digitos y no debe estar vacio.</p>', 
					{ onComplete: 
						function(returnvalue) { 
						  if(returnvalue)
						  {
							  document.getElementById("confirmar_numero_cliente_id").style.borderColor="red";
							  document.getElementById("confirmar_numero_cliente_id").style.background="#FA5858";
							  document.registrar_cliente_form.confirmar_numero_cliente.focus();
						  }
						}
					});
				}
				else
				{
					document.getElementById("confirmar_numero_cliente_id").style.borderColor="red";
					document.getElementById("confirmar_numero_cliente_id").style.background="#FA5858";
					con1 = document.registrar_cliente_form.numero_cliente.value;
					con2 = document.registrar_cliente_form.confirmar_numero_cliente.value;
					if(con1 != con2)
					{
						Sexy.error('<h1>Error</h1><p>Señor usuario los campos (Número del documento) y (Confirmar número del documento) no coinciden.</p>', 
						{ onComplete: 
							function(returnvalue) { 
							  if(returnvalue)
							  {
								  document.getElementById("numero_cliente_id").style.borderColor="red";
								  document.getElementById("numero_cliente_id").style.background="#FA5858";
								  document.getElementById("confirmar_numero_cliente_id").style.borderColor="red";
								  document.getElementById("confirmar_numero_cliente_id").style.background="#FA5858";
								  document.registrar_cliente_form.numero_cliente.focus();
							  }
							}
						});
					}
					else
					{
						document.getElementById("numero_cliente_id").style.borderColor="";
						document.getElementById("numero_cliente_id").style.background="";
						document.getElementById("confirmar_numero_cliente_id").style.borderColor="";
						document.getElementById("confirmar_numero_cliente_id").style.background="";
						name = document.registrar_cliente_form.nombre.value;
						var exp = new RegExp('^[A-Za-z]{1,30}$');
						if(!exp.test(name))
						{
							Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Nombres) sólo admite letras (mayúsculas, minúsculas), y no debe estar vacio.</p>', 
							{ onComplete: 
								function(returnvalue) { 
								  if(returnvalue)
								  {
									  document.getElementById("nombre_id").style.borderColor="red";
									  document.getElementById("nombre_id").style.background="#FA5858";
									  document.registrar_cliente_form.nombre.focus();
								  }
								}
							});
						}
						else
						{
							document.getElementById("nombre_id").style.borderColor="";
							document.getElementById("nombre_id").style.background="";
							ape = document.registrar_cliente_form.apellido.value;
							var exp = new RegExp('^[A-Za-z]{1,30}$');
							if((!exp.test(ape))||(document.registrar_cliente_form.apellido.value==""))
							{
								Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Apellidos) sólo admite letras (mayúsculas, minúsculas), y no debe estar vacio.</p>', 
								{ onComplete: 
									function(returnvalue) { 
									  if(returnvalue)
									  {
										  document.getElementById("apellido_id").style.borderColor="red";
										  document.getElementById("apellido_id").style.background="#FA5858";
										  document.registrar_cliente_form.apellido.focus();
									  }
									}
								});
							}
							else
							{
								document.getElementById("apellido_id").style.borderColor="";
								document.getElementById("apellido_id").style.background="";
								correo = document.registrar_cliente_form.correo.value;
								if((!correo.match("@"))||(document.registrar_cliente_form.correo.value==""))
								{
									Sexy.error('<h1>Error</h1><p>Señor usuario falta el arroba (@) en el campo (correo electrónico).</p>', 
									{ onComplete: 
										function(returnvalue) { 
										  if(returnvalue)
										  {
											  document.getElementById("correo_id").style.borderColor="red";
											  document.getElementById("correo_id").style.background="#FA5858";
											  document.registrar_cliente_form.correo.focus();
										  }
										}
									});
								}
								else
								{
									document.getElementById("correo_id").style.borderColor="";
									document.getElementById("correo_id").style.background="";
									if(!correo.match(/\./))
									{
										Sexy.error('<h1>Error</h1><p>Señor usuario falta el punto (.) en el campo (Correo electrónico).</p>', 
										{ onComplete: 
											function(returnvalue) { 
											  if(returnvalue)
											  {
												  document.getElementById("correo_id").style.borderColor="red";
												  document.getElementById("correo_id").style.background="#FA5858";
												  document.registrar_cliente_form.correo.focus();
											  }
											}
										});
									}
									else
									{
										document.getElementById("correo_id").style.borderColor="";
										document.getElementById("correo_id").style.background="";
										ccorreo = document.registrar_cliente_form.confirmar_correo.value;
										if(!ccorreo.match("@"))
										{
											Sexy.error('<h1>Error</h1><p>Señor usuario falta el arroba (@) en el campo (Confirmar correo electrónico).</p>', 
											{ onComplete: 
												function(returnvalue) { 
												  if(returnvalue)
												  {
													  document.getElementById("confirmar_correo_id").style.borderColor="red";
													  document.getElementById("confirmar_correo_id").style.background="#FA5858";
													  document.registrar_cliente_form.confirmar_correo.focus();
												  }
												}
											});
										}
										else
										{
											document.getElementById("confirmar_correo_id").style.borderColor="";
											document.getElementById("confirmar_correo_id").style.background="";
											if(!ccorreo.match(/\./))
											{
												Sexy.error('<h1>Error</h1><p>Señor usuario falta el arroba (@) en el campo (Confirmar correo electrónico).</p>', 
												{ onComplete: 
													function(returnvalue) { 
													  if(returnvalue)
													  {
														  document.getElementById("confirmar_correo_id").style.borderColor="red";
														  document.getElementById("confirmar_correo_id").style.background="#FA5858";
														  document.registrar_cliente_form.confirmar_correo.focus();
													  }
													}
												});
											}
											else
											{
												document.getElementById("confirmar_correo_id").style.borderColor="";
												document.getElementById("confirmar_correo_id").style.background="";
												dir = document.registrar_cliente_form.direccion.value;
												var exp = new RegExp('^[A-Za-z -_.]{1,50}$');
												if((!exp.test(dir))||(document.registrar_cliente_form.direccion.value==""))
												{
													Sexy.error('<h1>Error</h1><p>Señor usuario los caracteres por fuera de este (A-Z a-z - _ .) rango no son permitidos en el campo direccion, si esta utilizando el simbolo(#) remplácelo por (N).</p>', 
													{ onComplete: 
														function(returnvalue) { 
														  if(returnvalue)
														  {
															  document.getElementById("direccion_id").style.borderColor="red";
															  document.getElementById("direccion_id").style.background="#FA5858";
															  document.registrar_cliente_form.direccion.focus();
														  }
														}
													});
												}
												else
												{
													document.getElementById("direccion_id").style.borderColor="";
													document.getElementById("direccion_id").style.background="";
													bar = document.registrar_cliente_form.barrio.value;
													var exp = new RegExp('^[A-Za-z]{1,25}$');
													if((!exp.test(bar))||(document.registrar_cliente_form.barrio.value==""))
													{
														Sexy.error('<h1>Error</h1><p>Señor usuario el campo (barrio) solo admite letras (mayúsculas, minúscula), y no debe estar vacio.</p>', 
														{ onComplete: 
															function(returnvalue) { 
															  if(returnvalue)
															  {
																  document.getElementById("barrio_id").style.borderColor="red";
																  document.getElementById("barrio_id").style.background="#FA5858";
																  document.registrar_cliente_form.barrio.focus();
															  }
															}
														});
													}
													else
													{
														document.getElementById("barrio_id").style.borderColor="";
														document.getElementById("barrio_id").style.background="";
														muni = document.registrar_cliente_form.municipio.value;
														var exp = new RegExp('^[A-Za-z]{1,25}$');
														if((!exp.test(muni))||(document.registrar_cliente_form.municipio.value==""))
														{
															Sexy.error('<h1>Error</h1><p>Señor usuario el campo (municipio) solo admite letras (mayúsculas, minúscula), y no debe estar vacio.</p>', 
															{ onComplete: 
																function(returnvalue) { 
																  if(returnvalue)
																  {
																	  document.getElementById("municipio_id").style.borderColor="red";
																	  document.getElementById("municipio_id").style.background="#FA5858";
																	  document.registrar_cliente_form.municipio.focus();
																  }
																}
															});
														}
														else
														{
															document.getElementById("municipio_id").style.borderColor="";
															document.getElementById("municipio_id").style.background="";
															if(document.registrar_cliente_form.telefono.value.match(/\D/)) 
																{
																	Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Teléfono) sólo admite números.</p>', 
																	{ onComplete: 
																		function(returnvalue) { 
																		  if(returnvalue)
																		  {
																			  document.getElementById("telefono_id").style.borderColor="red";
																			  document.getElementById("telefono_id").style.background="#FA5858";
																			  document.registrar_cliente_form.telefono.focus();
																		  }
																		}
																	});
																}
															else
															{
																document.getElementById("telefono_id").style.borderColor="";
																document.getElementById("telefono_id").style.background="";
																if((document.registrar_cliente_form.telefono.value.length < 7)||(document.registrar_cliente_form.telefono.value=="")||(document.registrar_cliente_form.telefono.value.length==8)||(document.registrar_cliente_form.telefono.value.length >10)||(document.registrar_cliente_form.telefono.value.length==9))
																{
																	Sexy.error('<h1>Error</h1><p>Señor usuario el número que ha digitado en el campo (Telefono) no parece ser un telefono fijo o celular.</p>', 
																	{ onComplete: 
																		function(returnvalue) { 
																		  if(returnvalue)
																		  {
																			  document.getElementById("telefono_id").style.borderColor="red";
																			  document.getElementById("telefono_id").style.background="#FA5858";
																			  document.registrar_cliente_form.telefono.focus();
																		  }
																		}
																	});
																}
																else
																{
																	Sexy.confirm('<h1>Confirmar</h1><p>¿Esta seguro que la información antes suministrada es correcta?</p><p>Pulsa "Ok" para continuar, o pulsa "Cancelar" para salir.</p>', 
																	{ onComplete: 
																		function(returnvalue) { 
																		  if(returnvalue)
																		  {
																			document.registrar_cliente_form.submit();
																		  }
																		}
																	});
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

/*----------------------------------------------------------------------------fin--------------------------------------------------*/

/*funcion para validar campos del formulario de actualizar de clientes . proceso que se realiza en el centro de operaciones*/
function act_cliente()
{
	'domready',Sexy = new SexyAlertBox();
	name = document.actualizar_cliente_form.nombre.value;
	var exp = new RegExp('^[A-Za-z]{1,60}$');
	if(!exp.test(name))
	{
		Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Nombres) sólo admite letras (mayúsculas, minúsculas).</p>', 
		{ onComplete: 
			function(returnvalue) { 
			  if(returnvalue)
			  {
				  document.getElementById("nombre_id").style.borderColor="red";
				  document.getElementById("nombre_id").style.background="#FA5858";
				  document.registrar_cliente_form.nombre.focus();
			  }
			}
		});
	}
	else
	{
		apll = document.actualizar_cliente_form.apellido.value;
		var exp = new RegExp('^[A-Za-z]{1,60}$');
		if(!exp.test(apll))
		{
			Sexy.error('<h1>Error</h1><p>Señor usuario el campo (Apellidos) sólo admite letras (mayúsculas, minúsculas).</p>', 
			{ onComplete: 
				function(returnvalue) { 
				if(returnvalue)
				{
					document.getElementById("apll").style.borderColor="red";
					document.getElementById("apll").style.background="#FA5858";
					document.registrar_cliente_form.apellido.focus();
				}
				}
			});
		}
		else
		{
			document.actualizar_cliente_form.submit();
		}
	}
}
/*----------------------------------------------------------------------------fin--------------------------------------------------*/

/*-------------------------------------------------validar campos de registro de servicios---------------------------------------------*/
function val_campo_ser()
{
	'domready',Sexy = new SexyAlertBox();
}
/*------------------------------------------------------------------fin--------------------------------------------------------------*/

/*---------------------------------------------CREAR LOS EQUIPOS EN EL TRESGITRO DES SERVICIOS--------------------------*/
function creq()
{
	var tabla = document.getElementById('tabla_eq');
	var oRow = tabla.insertRow(-1);
	var oCell = oRow.insertCell(-1);
	var oCell.innerHTML = 'funciona';
}
/*-----------------------------------------------------------------FIN--------------------------------------------------*/
