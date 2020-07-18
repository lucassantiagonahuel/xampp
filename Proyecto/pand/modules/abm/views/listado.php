<?php namespace views; ?>
<?php function listado($config){ ?>
    <style media="screen" type="text/css">
        #ambTbl{
            table-layout: auto;
        }
        #ambTbl thead{
            border-top: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
        }
        #ambTbl th:not(:last-child){
            border-right: 1px solid #dee2e6;
        }
    </style>
    <div class="row my-4">
        <div class="col">
            <div class="card card-cascade narrower">
                <div class="view view-cascade gradient-card-header blue darken-3 narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                    <div>&nbsp;</div>
                    <span class="white-text mx-3"><?php echo $config->titulo; ?></span>
                    <div>&nbsp;</div>
                </div>

                <div class="mb-4 px-4 text-right">
                    <button type="button" onclick="pand.abm.reload();" class="btn btn-outline-blue btn-sm px-2">
                        <i class="fas fa-sync mt-0"></i>
                        Actualizar listado
                    </button>
                    <?php if ($config->showNewButton) { ?>
                    <button type="button" onclick="pand.abm.showModalAlta();" class="btn btn-outline-blue btn-sm px-2">
                        <i class="fas fa-plus mt-0"></i>
                        Nuevo registro
                    </button>
                    <?php } ?>
                </div>

                <div class="px-4 mb-4">
                    <div class="table-wrapper">
                        <table class="table table-striped table-hover table-responsive-md btn-table mb-0" id="ambTbl">
                            <?php if (!empty($config->headers)) { ?>
                            <thead>
                                <tr>
                                <?php foreach ($config->headers as $key => $value) { ?>
                                    <th class="th-lg"><?php echo $value; ?></th>
                                <?php } ?>
                                </tr>
                            </thead>
                            <?php } ?>
                            <tbody id="abmTblBody">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="px-4">
                    <nav class="row" aria-label="Page navigation">
                        <div class="col-xs-12 col-sm-6 pt-1">
                            <p>Mostrando del <span id="abmDesde"></span> al <span id="abmHasta"></span>, de <span id="abmTotal"></span> registros</p>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <ul class="pagination pagination-circle pg-blue justify-content-end">
                                <li class="page-item disabled"><a class="page-link">Primero</a></li>
                                <li class="page-item disabled">
                                    <a class="page-link" aria-label="Anterior">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link">1</a></li>
                                <li class="page-item"><a class="page-link">2</a></li>
                                <li class="page-item"><a class="page-link">3</a></li>
                                <li class="page-item"><a class="page-link">4</a></li>
                                <li class="page-item"><a class="page-link">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" aria-label="Siguiente">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Siguiente</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link">Último</a></li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <?php // showvar($config); ?>
<?php } ?>
