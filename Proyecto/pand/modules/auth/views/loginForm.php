<?php global $App; ?>
<div class="container-fluid bg-white">
    <div class="row no-gutter">
        <div class="d-none d-lg-flex col-md-4 col-lg-6  bg-image" style="background-image:url('<?php echo $App->config->loginImage; ?>');"></div>
        <div class="col-md-12 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4"><img src="<?php echo $App->config->logo; ?>" id="logo_login" alt="Iniciar sesión"></h3>
                            <form id="loginForm">
                                <div class="form-label-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" required autofocus>
                                    <label for="email" id="label-email">Correo electrónico</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                                    <label for="password" id="label-password">Contraseña</label>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase rounded-pill font-weight-bold mb-2" type="submit">Iniciar sesión</button>
                                <div class="text-center">
                                    <a class="small" href="#">¿Olvidaste tu contraseña?</a></div>
                                </form>
                                <div class="text-center" style="margin: 10px 0;">
                                    o
                                </div>
                                <div class="text-center">
                                    <a class="btn btn-outline-info rounded-pill btn-padding" href="/registro">Registrarse como deportista</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
