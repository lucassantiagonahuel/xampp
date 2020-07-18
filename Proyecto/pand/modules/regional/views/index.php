<?php namespace views; ?>
<?php function mostrarOpcionesRegionales(){ ?>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">Paises</h5>
                    <p class="card-text">Administración de paises del sistema.</p>
                    <a href="/admin/regional/paises" class="btn btn-primary">Acceder</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">Provincias</h5>
                    <p class="card-text">Administración de provincias del sistema.</p>
                    <a href="/admin/regional/provincias" class="btn btn-primary">Acceder</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">Ciudades</h5>
                    <p class="card-text">Administración de ciudades del sistema.</p>
                    <a href="/admin/regional/ciudades" class="btn btn-primary">Acceder</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
