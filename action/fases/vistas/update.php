<form id="form-edit-fase" action="#">
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Nombre</label>
        <div class="col-sm-10">
            <input type="hidden" name="fase_edit_id" value="<?=$_POST['pk_rol']?>">
            <input type="text" class="form-control" name="fase_edit_name" value="<?=$_POST['name']?>" placeholder="Modificar Fase">
            <div class="clearfix"></div>
        </div>
    </div>
    
</form>
<div class="form-group row">
        <div class="col-sm-10 ml-sm-auto">
            <button onclick="action_edit_fase()" class="btn btn-primary">Guardar</button>
        </div>
</div>