<?php
$session = new Session();
$session = $session->getValue('inmobiliaria_id_user');
if ($session) {
    header("Location: " . RUTA);
}
?>

<div class="page-loader">
    <div class="bg-primary"></div>
</div>

<div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" style="background-image: url('<?= RUTA_RES ?>assets/img/bg/21.jpg');">
    <div class="ui-bg-overlay bg-dark opacity-25"></div>
    <div class="authentication-inner py-5">
        <div class="card">
            <div class="p-4 p-sm-5">

                <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
                    <div class="ui-w-60">
                        <div class="w-100 position-relative">
                            <img src="<?= RUTA_RES ?>assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <h5 class="text-center text-muted font-weight-normal mb-4">Login to Your Account</h5>

                <form id="form-login" action="<?= RUTA ?>process.php/login/" method="POST">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="text" name="login__email" class="form-control">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label d-flex justify-content-between align-items-end">
                            <span>Password</span>
                            <a href="pages_authentication_password-reset.html" class="d-block small">Forgot password?</a>
                        </label>
                        <input type="password" name="login__password" class="form-control">
                        <div class="clearfix"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center m-0">
                        <label class="custom-control custom-checkbox m-0">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-label">Remember me</span>
                        </label>
                        <button class="btn btn-primary">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="card-footer py-3 px-4 px-sm-5">
                <div class="text-center text-muted">
                    Don't have an account yet?
                    <a href="<?= RUTA ?>registro">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>