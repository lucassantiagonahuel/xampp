<?php namespace views; ?>
<?php function formAlta($config){ ?>
    <?php // showvar($config); ?>
    <div class="modal fade" id="modalAbmAlta" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-lg modal-info" role="document">
            <form class="modal-content" id="formAbm">
                <div class="modal-header text-center light-blue darken-3 white-text">
                    <p class="heading">
                        <?php echo $config->titulo ?>
                    </p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="row">
                        <?php foreach ($config->campos as $key => $campo) { ?>
                            <div class="<?php echo (!empty($campo->width))?$campo->width:'col-12'; ?>">
                                <?php $id = 'formField-'.$campo->name; ?>
                                <?php $required = (!empty($campo->required))?'required':''; ?>
                                <?php if (!empty($campo->label)) {
                                    $label = '<label for="'.$id.'">'.$campo->label.'</label>';
                                }else{
                                    $label = '';
                                } ?>

                                <?php if ($campo->tipo != 'hidden') { ?>
                                    <div class="md-form mb-5">
                                    <?php } ?>
                                    <?php if (!empty($campo->icono)) { ?>
                                        <i class="fas <?php echo $campo->icono ?> prefix grey-text"></i>
                                    <?php } ?>


                                    <?php switch ($campo->tipo) {
                                        case 'text':
                                        echo $label;
                                        echo '<input type="text" id="'.$id.'" class="form-control" '.$required.' name="'.$campo->name.'">';
                                        break;

                                        case 'number':
                                        echo $label;
                                        echo '<input type="number" id="'.$id.'" class="form-control" '.$required.' name="'.$campo->name.'"';
                                        if (isset($campo->step)) {
                                            echo ' step="'.$campo->step.'"';
                                        }
                                        if (isset($campo->min)) {
                                            echo ' min="'.$campo->min.'"';
                                        }
                                        if (isset($campo->max)) {
                                            echo ' max="'.$campo->max.'"';
                                        }
                                        echo '>';
                                        break;

                                        case 'select':
                                        echo '<select id="'.$id.'" class="select2 md-form" searchable="Buscar..." '.$required.' name="'.$campo->name.'" style="width:100%;">';

                                        foreach ($campo->options as $k => $v) {
                                            echo '<option value="'.$k.'">'.$v.'</option>';
                                        }
                                        echo '</select>';
                                        echo '<label class="mdb-main-label active">'.$campo->label.'</label>';
                                        break;

                                        case 'hidden':
                                        echo '<input type="hidden" id="'.$id.'" class="form-control" '.$required.' name="'.$campo->name.'">';
                                        break;

                                        case 'textarea':
                                        echo '<textarea class="form-control rounded-0 px-2" id="'.$id.'" rows="3" placeholder="'.$campo->label.'" name="'.$campo->name.'"></textarea>';
                                        break;

                                        case 'checkbox':
                                        $checked = (!empty($campo->checked))?'checked':'';
                                        echo '<div class="form-check">';
                                        echo '<input type="checkbox" id="'.$id.'" class="form-check-input" name="'.$campo->name.'" '.$checked.'>';
                                        echo '<label class="form-check-label" for="'.$id.'">'.$campo->label.'</label>';
                                        echo '</div>';
                                        break;
                                    } ?>

                                    <?php if ($campo->tipo != 'hidden') { ?>
                                    </div>
                                <?php } ?>
                            </div>

                        <?php } // foreach campo ?>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-gray" onclick="pand.abm.hideModalAlta();">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="pand.abm.saveRecord();">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
