<?php namespace views; ?>
<?php function showAbmScript($config){ ?>
<script type="text/javascript">
    pand.abm = {
		is_first_page: true,
		is_last_page: false,
		loading: false,
		no_results_text: 'No se encontraron resultados',
		request_url: '<?php echo $config->gral->url_list; ?>',
		request_params: {
			pagina: 1,
            rpp: <?php echo $config->gral->rpp; ?>
		},
		request_method: 'POST',

		reload: function(){
			this.loadData();
		},
		beforeShow: function(){},
		clearTable: function(){
			$('#abmTblBody').html('');
			this.updatePaginador(0,0,0,0);
		},
		processResults: function(data){
			var len = data.length;
			if (len > 0) {
				for (var i=0; i<len; i++) {
					var new_row = this.templateResults(data[i]);
					$('#abmTblBody').append(new_row);
				}
			}else{
				$('#abmTblBody').append('<div class="text-center my-4 text-danger">'+this.no_results_text+'</div>');
			}
		},
        templateResults: function(data){
            var campos = <?php echo json_encode($config->vista->campos); ?>;
            var acciones = <?php echo (!empty($config->vista->actions))?json_encode($config->vista->actions):'false'; ?>;
            var borrar = <?php echo (@$config->vista->removeButton)?'true':'false'; ?>;
            var editar = <?php echo (@$config->vista->editButton)?'true':'false'; ?>;
            var firstIsId = <?php echo (@$config->vista->firstIsId)?'true':'false'; ?>;

            var res = '<tr>';

            for (x in campos){
                res += '<td';
                if (x == 0 && firstIsId) {
                    res += ' style="width: 20px;"';
                }
                res += '>';
                res += data[campos[x]];
                res += '</td>';
            }

            if((acciones && acciones.length > 0) || borrar || editar){
                var cantidad = 0;
                if (editar) { cantidad++; }
                if (borrar) { cantidad++; }
                if (acciones.length > 0) { cantidad += acciones.length; }


                res += '<td class="text-center" style="width: '+(cantidad*20)+'px">';

                if (acciones.length > 0) {
                    for(x in acciones){
                        cantidad++;
                        var tobj = (!acciones[x].href)?'button':'a';
                        var taction = (!acciones[x].href)?'onclick':'href';

                        res += '<'+tobj+' class="px-3 btn btn-sm btn-rounded '+acciones[x].class+'"';
                        if (!acciones[x].href) {
                            res += 'onclick="'+acciones[x].action+'('+data.id+');">';
                        }else{
                            res += 'href="'+acciones[x].href+'/'+data.id+'">';
                        }
                        res += '<i class="fa fa-lg '+acciones[x].icon+'"></i>';
                        res += acciones[x].name;
                        res += '</'+tobj+'>';
                    }
                }

                if (editar) {
                    res += '<button style="position: relative;" class="btn btn-sm px-3 py-2 btn-rounded btn-success ml-2" onclick="pand.abm.edit('+data.id+');">'
                    +'<i class="fa fa-edit fa-lg" style="position:absolute; top:30%; left:35%;"></i>&nbsp;'
                    +'</button>';
                }

                if (borrar) {
                    res += '<button style="position: relative;" class="btn btn-sm px-3 py-2 btn-rounded btn-danger ml-2" onclick="pand.abm.remove('+data.id+');">'
                    +'<i class="fa fa-trash-alt fa-lg" style="position:absolute; top:30%; left:35%;"></i>&nbsp;'
                    +'</button>';
                }

                res += '</td>';
            }

            res += '</tr>';

            return res;
        },
		updatePaginador: function(desde, hasta, total, rpp){
			if (!rpp) { rpp = 50; }
			$('#abmDesde').html(desde);
			$('#abmHasta').html(hasta);
			$('#abmTotal').html(total);
		},
		prevPage: function(){
			if (this.is_first_page) { return; }
			this.request_params.pagina = parseInt(this.request_params.pagina) - 1;
			if (this.request_params.pagina < 1) { this.request_params.pagina = 1; }
			this.loadData();
		},
		nextPage: function(){
			if (this.is_last_page) { return; }
			this.request_params.pagina = parseInt(this.request_params.pagina) + 1;
			this.loadData();
		},
		goToPage: function(nro){
			if (nro) {
				this.request_params.pagina = nro;
				this.loadData();
			}
		},
		loadData: function(){
			pand.waiting.show();
			this.loading = true;
			this.clearTable();
			$.ajax({
				url: this.request_url,
				method: this.request_method,
				data: this.request_params,
				cache: false,
				dataType: 'json',
				statusCode: {
					401: function(){
						pand.alert.error('Su sesión ha expirado', null, function(){
							location.reload();
						});
					},
					404: function(){ pand.alert.error('La página solicitada no ha sido encontrada'); },
					500: function(){ pand.alert.error('Servicio no disponible'); }
				},
				success: function(data){
					pand.abm.loading = false;

					if (typeof data != 'object') {
						pand.alert.error('Ocurrió un error al procesar su solicitud');
						pand.waiting.hide();
						return;
					}

					if (data.error) {
						pand.alert.error(data.error);
						waitingDialog.hide();
						return;
					}

                    data = data.data;

					pand.abm.updatePaginador(data.recordsDesde, data.recordsHasta, data.recordsTotal, data.rpp);
					pand.abm.is_last_page = (data.recordsHasta == data.recordsTotal);
					pand.abm.is_first_page = (data.recordsDesde == 1);

                    //console.log(data);
					pand.abm.processResults(data.results);
					pand.waiting.hide();

					if (typeof pand.abm.beforeShow == 'function') {
						pand.abm.beforeShow();
					}
				},
				error: function(jqXHR, textStatus, errorThrown){
					// alert('Ocurrió un error al cargar el listado');
					pand.waiting.hide();
					pand.abm.loading = false;
				}
			})
		},
        showModalAlta: function(){
            $('#formAbm').get(0).reset();
            $('#idFormAbm').remove();
            $('#modalAbmAlta').modal('show');
        },
        hideModalAlta: function(){
            $('#modalAbmAlta').modal('hide');
        },
        saveRecord: function(){
            pand.ajax({
                url: '<?php echo @$config->gral->url_set; ?>',
                data: $('#formAbm').serialize(),
                success: function(){
                    $('#modalAbmAlta').modal('hide');
                    pand.abm.reload();
                }
            });
        },
        remove: function(id){
            pand.ajax({
                url: '<?php echo @$config->gral->url_set; ?>',
                data: {
                    id: id,
                    active: 0
                },
                success: function(){
                    pand.abm.reload();
                },
                requestConfirm: {
                    title: '¿Seguro desea eliminar este registro?',
                    text: 'Esta acción no es reversible',
                    buttons: ['Cancelar', 'Eliminar'],
                    icon: 'error'
                }
            });
        },
        edit: function(id){
            pand.ajax({
                url: '<?php echo @$config->gral->url_get; ?>',
                data: {
                    id: id,
                    active: 1
                },
                success: function(data){
                    if ($('#formAbm').length > 0) {
                        $('#formAbm').get(0).reset();

                        var input = '<input type="hidden" id="idFormAbm" name="id">';
                        $('#formAbm').append(input);

                        for(x in data){
                            if ($('#formAbm input[name='+x+']').length > 0) {
                                $('#formAbm input[name='+x+']').val(data[x]).trigger('change');
                                $('#formAbm .mdb-select-'+x).trigger('actualizar');
                            }
                        }
                    }

                    $('#modalAbmAlta').modal('show');
                }
            });
        }
	};

    $(document).ready(function(){
        pand.abm.loadData();
    });
</script>
<?php } ?>
