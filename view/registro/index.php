<?php
$session = new Session();
$session = $session->getValue('projects_id_user');
if ($session) {
    header("Location: " . RUTA);
}
?>

<div class="page-loader">
    <div class="bg-primary"></div>
</div>


<div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" style="background-image: url('assets/img/bg/21.jpg');">
    <div class="ui-bg-overlay bg-dark opacity-25"></div>
    <div class="authentication-inner py-5">
        <div class="card">
            <div class="p-4 p-sm-5">

                <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
                    <div class="ui-w-60">
                        <div class="w-100 position-relative">
                            <img src="<?= RUTA_RES?>assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <h5 class="text-center text-muted font-weight-normal mb-4">Create an Account</h5>

                <form id="form-registro" action="<?= RUTA ?>process.php/registro/" method="POST">
                    <div class="form-group">
                        <label class="form-label">Your name</label>
                        <input type="text" name="registro__nombres" class="form-control">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Your email</label>
                        <input type="text" name="registro__email" class="form-control">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="registro__password" class="form-control">
                        <div class="clearfix"></div>
                    </div>
                    <button class="btn btn-primary btn-block mt-4">Sign Up</button>
                    <div class="text-light small mt-4">
                        By clicking "Sign Up", you agree to our
                        <a href="javascript:void(0)">terms of service and privacy policy</a>. We’ll occasionally send you account related emails.
                    </div>
                </form>

            </div>
            <div class="card-footer py-3 px-4 px-sm-5">
                <div class="text-center text-muted">
                    Already have an account?
                    <a href="<?= RUTA ?>login">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</div>