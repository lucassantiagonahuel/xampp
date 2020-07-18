;
/**
	Función para realizar peticiones ajax, englobando sweetalert, SalirAjax y control de errores

	url: 'es obvio... XD',
	method: 'POST',
	data: data para el POST,
	requestConfirm: objeto para mostrar la ventana de confirmar, ver sweetalert,
	ifNoConfirmFunction: funcion si no confirma lo del objeto anterior,
	showSuccess: objeto de sweetalert para cuando success = ok,
	processErrors: si se las arregla solo con los errores de la respuesta ajax,
	success(respuesta.data, @confirmacion): funcion para la respuesta de ajax success = true,
	error: funcion para la respuesta de ajax error = true,
	ajaxUserConf: config adicional para la peticion ajax (ej: processData o contentType),
	beforeAjax: funcion a ejecutar antes de hacer la petición ajax,
	alwaysFunction: function a realizar siempre, una vez terminado el ajax y el success o error.
	submitButton: objeto del boton a deshabilitar mientras se realiza la peticion ajax.
*/

pand.ajax = function(user_config){
	var defaults = {
		url: '',
		method: 'POST',
		data: null,
		requestConfirm: null,
		ifNoConfirmFunction: null,
		showSuccess: null,
		processErrors: true,
		success: null,
		error: null,
		ajaxUserConf: null,
		hideWaitingDialog: false,
		submitButton:false,
	};

	var inst = this;

	var config = $.extend({}, defaults, user_config);

	var ajaxRequest = function(){
		if(config.submitButton){
			if($(config.submitButton).length)
				$(config.submitButton).attr('disabled','disabled');
		}

		if (typeof config.beforeAjax == 'function') {
			config.beforeAjax();
		}


		if (!config.hideWaitingDialog) {
			pand.waiting.show();
		}


		var ajaxDefConf = {
			url: config.url,
			method: config.method,
			data: config.data,
			dataType:'json',
			success: function(respuesta, textStatus, jqXHR){
				// timeout para que se cierre swal
				setTimeout(function(){
					if(config.submitButton){
						if($(config.submitButton).length)
							$(config.submitButton).removeAttr('disabled');
					}

					pand.waiting.hide();

					if (typeof respuesta != 'object' && ajaxConf.dataType != 'text') {
						pand.ajax.procesarErrorAjax('Respuesta no válida del servidor');
						return;
					}

					if (respuesta.error) {
						if (config.processErrors) {
							pand.ajax.procesarErrorAjax(respuesta.error);
						}
						if (typeof config.error == 'function') {
							config.error(respuesta);
						}
						return;
					}

					if (respuesta.success || ajaxConf.dataType == 'text') {
						var res = (ajaxConf.dataType == 'text')?respuesta:respuesta.data;
						if (config.showSuccess != null) {
								swal(config.showSuccess, function(conf){
									if (typeof config.success == 'function') {
										config.success(res, conf);
									}
								});
						}else{
							if (typeof config.success == 'function') {
								config.success(res);
							}
						}
					}
				}, 500);
			},
			error: function(jqXHR, textStatus, errorThrown){
				setTimeout(function(){
					if(config.submitButton){
						if($(config.submitButton).length)
							$(config.submitButton).removeAttr('disabled');
					}

					pand.waiting.hide();

					if (typeof config.error == 'function') {
						config.error(errorThrown);
					}else{
						pand.ajax.procesarErrorAjax('Ocurrió un error al realizar la petición al servidor');
					}
				}, 500);
			},
			statusCode: {
				404: function() {
					setTimeout(function(){
						pand.waiting.hide();
						pand.alert.error('La página solicitada no ha sido encontrada');
					}, 500);
				},
				401: function() {
					setTimeout(function(){
						pand.waiting.hide();
						pand.alert.error('Su sesión ha expirado', null, function(){
							location.reload();
						});
					}, 500);
				},
				500: function() {
					setTimeout(function(){
						pand.waiting.hide();
						pand.alert.error('Servicio no disponible');
					}, 500);
				}
			}
		};

		var ajaxConf = $.extend({}, ajaxDefConf, config.ajaxUserConf);

		if (typeof config.alwaysFunction == 'function') {
			$.ajax(ajaxConf).always(config.alwaysFunction);
		}else{
			$.ajax(ajaxConf);
		}


	};

	if (config.requestConfirm != null) {
		swal(config.requestConfirm).then((confirmo) => {
			if (typeof config.ifNoConfirmFunction == 'function') {
				config.ifNoConfirmFunction();
			}
			if (!confirmo) { return; }

			ajaxRequest();
		});
	}else{
		ajaxRequest();
	}
};


pand.ajax.procesarErrorAjax = function(error){
	if (!Array.isArray(error)) {
		error = [error];
	}

	for(x in error){
		var titulo = 'Ocurrió un error';
		var texto = null;
		var tipo = 'error';

		if (typeof error[x] == 'string') {
			texto = error[x];
		}else{
			if (error[x].titulo) {
				titulo = error[x].titulo;
			}
			if (error[x].texto) {
				texto = error[x].texto;
			}
			if (error[x].tipo) {
				tipo = error[x].tipo;
			}
		}

		pand.alert({
			title: titulo,
			text: texto,
			icon: tipo,
			button: 'Aceptar'
		});
	}
}
