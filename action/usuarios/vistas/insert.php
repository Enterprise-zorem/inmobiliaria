<form id="form-insert-usuario" action="<?= RUTA ?>process.php/usuarios/insert/" method="POST">
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="usuario_insert_email" placeholder="Email">
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="usuario_insert_password" placeholder="Password">
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Nombres</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="usuario_insert_nombres" placeholder="Nombres">
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-10 ml-sm-auto">
            <button class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>