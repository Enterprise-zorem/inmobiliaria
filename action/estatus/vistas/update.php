<form id="form-edit-estatus" action="#">
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Nombre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="estatus_edit_name" value="<?=$_POST['name']?>">
            <input type="hidden" name="estatus_edit_id" value="<?=$_POST['pk_estatus']?>">
            <div class="clearfix"></div>
        </div>
    </div>
    
</form>
<div class="form-group row">
        <div class="col-sm-10 ml-sm-auto">
            <button onclick="action_edit_estatus()" class="btn btn-primary">Guardar</button>
        </div>
</div>