<?php namespace views; ?>

<?php function resumen(){ ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="card my-3">
                <div class="">
                    <i class="fas fa-flag fa-lg blue darken-4 z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
                    <div class="float-right text-right p-3">
                        <p class="text-uppercase text-muted mb-1"><small>Federaciones</small></p>
                        <h4 class="font-weight-bold mb-0">15</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="card my-3">
                <div class="">
                    <i class="fas fa-users fa-lg indigo z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
                    <div class="float-right text-right p-3">
                        <p class="text-uppercase text-muted mb-1"><small>Equipos</small></p>
                        <h4 class="font-weight-bold mb-0">48</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="card my-3">
                <div class="">
                    <i class="fas fa-user fa-lg blue z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
                    <div class="float-right text-right p-3">
                        <p class="text-uppercase text-muted mb-1"><small>Jugadores</small></p>
                        <h4 class="font-weight-bold mb-0">1208</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="card my-3">
                <div class="">
                    <i class="fas fa-user fa-lg orange darken-1 accent-2 z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
                    <div class="float-right text-right p-3">
                        <p class="text-uppercase text-muted mb-1"><small>Inscripciones</small></p>
                        <h4 class="font-weight-bold mb-0">305</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col">
            <blockquote class="blockquote bq-primary bg-white">
                <p class="bq-title">Inscripciones pendientes</p>
                <p>
                    Actualmente se registran 45 solicitudes pendientes de aprobación y 12 de análisis.
                </p>
            </blockquote>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <a href="/admin/inscripciones" class="btn btn-block btn-rounded btn-primary">Ver inscripciones pendientes</a>
        </div>
        <div class="col-xs-12 col-sm-6">
            <a href="/admin/reportes" class="btn btn-block btn-rounded btn-info">Reporte actual</a>
        </div>
    </div>
</div>
<?php } ?>

<?php function listado($lugar){ ?>
    <div class="container">
        <p>Hola, venís en <?php echo $lugar; ?></p>
    </div>
<?php } ?>
