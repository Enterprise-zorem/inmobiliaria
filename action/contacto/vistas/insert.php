<form id="form-insert-categoria" action="#">
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Nombre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="categoria_insert_name" placeholder="Nombre del Nuevo categoria">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Tipo</label>
        <div class="col-sm-10">

        <select class="form-control" name="categoria_insert_fk_tipo[]" id="select_insert" multiple>
        
        <?php
            $tipo=new tipo(new Connexion);
             $tipo=$tipo->getAll();
             while ($row=mysqli_fetch_array($tipo,MYSQLI_ASSOC)) {
            ?>
           <option value="<?=$row['pk_tipo']?>"><?=$row['name']?></option>
            <?php
        }
        ?>
        </select>
        </div>
    </div>
    
</form>
<div class="form-group row">
        <div class="col-sm-10 ml-sm-auto">
            <button onclick="action_insert_categoria()" class="btn btn-primary">Guardar</button>
        </div>
</div>


