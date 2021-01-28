<form id="form-insert-parametros" action="#">
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Nombre</label>
        <div class="col-sm-10">
        <input type="hidden" name="parametros_insert_id" value="<?=$_POST['parametros_insert_id']?>">
            <input type="text" class="form-control" name="parametros_insert_name" placeholder="Nombre del Nuevo parametros">
            <div class="clearfix"></div>
        </div>
    </div>
    
</form>
<div class="form-group row">
        <div class="col-sm-10 ml-sm-auto">
            <button onclick="action_insert_parametros()" class="btn btn-primary">Guardar</button>
        </div>
</div>