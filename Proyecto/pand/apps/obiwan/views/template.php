<?php namespace views; ?>

<?php function head(){ ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>

        <link href="/templates/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/plugins/fontawesome/css/all.css" rel="stylesheet">

        <script src="/plugins/jquery/jquery-3.5.1.min.js"></script>

        <script src="/templates/bootstrap/js/bootstrap.min.js"></script>

        <?php /* ?>
        <link  href="/templates/architectui/main.css" rel="stylesheet">
        <script src="/templates/architectui/assets/scripts/main.js"></script>
        <?php */ ?>

        <script src="/plugins/pand/js/pand.js"></script>
        <script src="/plugins/pand/js/waiting.pand.js"></script>
        <script src="/plugins/pand/js/alert.pand.js"></script>
        <script src="/plugins/pand/js/ajax.pand.js"></script>

        <link href="/cadda/css/main.css" rel="stylesheet">
        <script src="/cadda/js/main.js"></script>

    </head>
    <body class="bg-light">
<?php } ?>

<?php function foot(){ ?>
        <link href="/plugins/mdbootstrap/mdb.min.css" rel="stylesheet">
        <script src="/plugins/mdbootstrap/mdb.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
        <script src="/plugins/sweetalert/sweetalert.min.js"></script>

        <link href="/plugins/select2/css/select2.min.css" rel="stylesheet">
        <script src="/plugins/select2/js/select2.full.min.js"></script>
        <script src="/plugins/select2/js/i18n/es.js"></script>
        <script src="/plugins/popper/popper.min.js"></script>

        <link href="/plugins/pand/css/info-box.css" rel="stylesheet">
    </body>
</html>
<?php } ?>

<?php function scritsAdmin(){ ?>
<?php } ?>

<?php function stylesAdmin(){ ?>
<?php } ?>

<?php function breadcrumb(){ ?>
    <?php global $App;
    $paths = explode('/', $App->request->path);
    ?>
    <style media="screen">
    .light-font .breadcrumb-item + .breadcrumb-item::before { color: #fff; }
    .light-font .breadcrumb-item.active a { color: #cfd8dc; }
    </style>
    <div class="container light-font">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb blue darken-2">
                <?php if (empty($paths)) { ?>
                    <li class="breadcrumb-item active">Inicio</li>
                <?php }else{ ?>
                    <li class="breadcrumb-item ">
                        <a href="/" class="text-white">Inicio</a>
                    </li>
                    <?php
                    $link = '';
                    $cantidad = count($paths) - 1;
                    foreach ($paths as $key => $value) {
                        $link .= '/'.$value;
                        ?>
                        <li class="breadcrumb-item <?php echo ($cantidad == $key)?'active':''; ?>">
                            <a href="<?php echo $link; ?>" class="text-white"><?php echo ucfirst($value); ?></a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ol>
        </nav>
    </div>
<?php } ?>

<?php function notFound(){ ?>
    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <span class="display-1 d-block">404</span>
                    <div class="mb-4 lead">
                        Lo sentimos, el contenido solicitado no existe
                    </div>
                    <a href="/" class="btn btn-link">Ir al inicio</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php function header($items = null){ ?>
    <nav class="mb-4 navbar navbar-dark navbar-expand-md blue darken-4" id="nav_ppal">
        <div class="container">
            <a class="navbar-brand" href="/" style="letter-spacing: 3px;"><img class="rounded-circle mr-2" src="/obiwan/images/obiwan-logo.png" alt=""> Obiwan</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menu_ppal" aria-controls="menu_ppal" aria-expanded="false" aria-label="Expandir">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="menu_ppal" style="">
                <ul class="navbar-nav ml-auto">
                    <?php if (!empty($items)) {
                            foreach ($items as $menu) {
                    ?>
                    <li class="nav-item <?php echo @$menu->class ?>">
                        <a class="nav-link" href="<?php echo $menu->link ?>"><?php echo $menu->name ?></a>
                    </li>
                    <?php
                            }
                        }
                    ?>
                    <?php  ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/ajustes" id="menu_ajustes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ajustes</a>
                        <div class="dropdown-menu" aria-labelledby="menu_ajustes">
                            <a class="dropdown-item" href="/regional/">Regional</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/admin/perfil" id="menu_perfil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                        <div class="dropdown-menu" aria-labelledby="menu_perfil">
                            <a class="dropdown-item" href="/admin/perfil">Ver perfil</a>
                            <a class="dropdown-item" href="/login/logout">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php // breadcrumb(); ?>

    <main role="main" class="container">
<?php } ?>

<?php function footer(){ ?>
    </main>
    <footer class="footer text-white mt-4 blue darken-4" id="footer_ppal">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 small">Obiwan - Visor de imágenes médicas</div>
                <div class="d-none d-sm-block col-sm-3 text-right small align-self-end">©2020</div>
            </div>
        </div>
    </footer>
<?php } ?>

<?php function login(){ ?>
<?php } ?>

<?php function unauthorized(){ ?>
    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <span class="display-1 d-block">505</span>
                    <div class="mb-4 lead">
                        Sin acceso!<br>
                        Usted no puede realizar esta acción
                    </div>
                    <a href="/" class="btn btn-link">Ir al inicio</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
