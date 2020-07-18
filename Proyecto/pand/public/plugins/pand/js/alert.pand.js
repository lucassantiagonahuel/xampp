pand.alert = function(data){
	swal(data);
};

pand.alert.mensaje = function(tipo, titulo, txt, callback){
	var obj = {
		icon: tipo,
		title: titulo
	};

	if (txt) {
		obj.text = txt;
	}

	swal(obj, callback);
}

pand.alert.error = function(titulo, txt, callback){
	pand.alert.mensaje('error', titulo, txt, callback);
}

pand.alert.warning = function(titulo, txt, callback){
	pand.alert.mensaje('warning', titulo, txt, callback);
}

pand.alert.info = function(titulo, txt, callback){
	pand.alert.mensaje('info', titulo, txt, callback);
}

pand.alert.success = function(titulo, txt, callback){
	pand.alert.mensaje('success', titulo, txt, callback);
}
