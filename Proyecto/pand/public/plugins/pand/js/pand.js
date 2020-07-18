pand = {};

// Mueve la pantalla a la posición de un elemento, se puede indicar un márgen
pand.scrollTo = function(ele, margen){
	if (!margen) { margen = 0; }
	if ($(ele).length > 0) {
		$("html, body").animate({ scrollTop: ($(ele).offset().top - margen) }, 500);
	}
}

// Obtiene los parámetros que llegan por GET
pand.getURLParameter = function(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}

// Previene el doble click en un botón de submit
pand.preventDblClick = function(){
	var sindblclick = $('button:not([ondblclick]), a:not([ondblclick]), input[type="button"]:not([ondblclick])');
	$(sindblclick).each(function(k,v){
		$(v).attr('ondblclick','return false;');
	});
}

// Hace que un elemento solo acepte números
pand.onlyNumbers = function(ele){
    $(ele).on('keypress', function(e){
        var key = window.Event ? e.which : e.keyCode
        return (key >= 48 && key <= 57);
    });
}

// Limpia un formulario y reinicia los select2
pand.clearForm = function(id){
	if (document.getElementById(id)) {
		$('#'+id).get(0).reset();
		$('#'+id+' select').prop('selectedIndex',0).trigger('change');
	}
}

// Abre una nueva pestaña pasando parámetros por POST (o no...)
pand.newTab = function(url, params){
	var form = document.createElement('form');
	form.id = 'formBorrarTmp';
	form.method = 'POST';
	form.target = '_BLANK';
	form.action = url;

	if (params) {
		// var formData = new FormData(form);
		for(x in params){
			if (typeof params[x] == 'array' || typeof params[x] == 'object') {
				for (z in params[x]) {
					var ele = document.createElement('input');
					ele.name = x+'[]';
					ele.value = params[x][z];
					ele.type = 'hidden';
					$(form).append(ele);
				}
			}else{
				var ele = document.createElement('input');
				ele.name = x;
				ele.value = params[x];
				ele.type = 'hidden';
				$(form).append(ele);
			}
		}
	}

	$('body').append(form);

	$('#formBorrarTmp').get(0).submit();

	setTimeout(function(){
		$('#formBorrarTmp').remove();
	}, 500);
}

// Mueve el scroll al top
pand.goTop = function(){
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}

// Carga una imágen en el navegador sin subirla, solo para muestra
pand.loadClientImage = function(e,id){
	//e:input file de la imagen
	//id: div donde mostrar la img
	//agregar en un change
	/*
		$('#imagen_muestra').change(function(e) {
			cargarImagenMuestra(e,'imgMuestra');
		});
	*/
	var file = e.target.files[0],
	imageType = /image.*/;
	var id_target = id;
	if (!file.type.match(imageType)) return;

	var reader = new FileReader();
	reader.onload = fileOnload;
	reader.readAsDataURL(file);

	function fileOnload(e) {
		var result=e.target.result;
		$('#'+id_target).attr("src",result);
	}
}

pand.copyToClipboard = function(text, successFunction){
	if (!navigator.clipboard) {
        return fallbackCopyTextToClipboard(text, successFunction);
	}

	navigator.clipboard.writeText(text).then(function() {
        if (typeof successFunction == 'function') {
			successFunction();
		}
	}, function(err) {
		alert('No se pudo copiar el texto');
	});

    function fallbackCopyTextToClipboard(text, successFunction) {
        var textArea = document.createElement("textarea");
        textArea.value = text;

        // Avoid scrolling to bottom
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.position = "fixed";

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        success = false;
        try {
            var successful = document.execCommand('copy');
            success = true;
        } catch (err) {
            alert('No se pudo copiar el texto');
        }

        if (success && typeof successFunction == 'function') {
    		successFunction();
        }

        document.body.removeChild(textArea);
    }
}


$.fn.serializeObject = function(){
	var o = {};
	var a = this.serializeArray();
	$.each(a, function() {
		if (o[this.name] !== undefined) {
			if (!o[this.name].push) {
				o[this.name] = [o[this.name]];
			}
			o[this.name].push(this.value || '');
		} else {
			o[this.name] = this.value || '';
		}
	});
	return o;
};
