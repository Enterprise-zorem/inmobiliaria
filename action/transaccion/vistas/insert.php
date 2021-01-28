<form id="form-insert-transaccion" action="#">
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Nombre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="transaccion_insert_name" placeholder="Nombre del Nuevo transaccion">
            <div class="clearfix"></div>
        </div>
    </div>
    
</form>
<div class="form-group row">
        <div class="col-sm-10 ml-sm-auto">
            <button onclick="action_insert_transaccion()" class="btn btn-primary">Guardar</button>
        </div>
</div>