<form id="form-insert-caracteristica" action="#">
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Nombre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="caracteristica_insert_name" placeholder="Nombre de la Nueva caracteristica">
        </div>
    </div>
    <div class="form-group row">
    <label class="col-form-label col-sm-2 text-sm-right">Tipo</label>
    <div class="col-sm-10">
    <select class="form-control" name="caracteristica_insert_tipo">
    <option value="proyecto">Proyecto</option>
    <option value="propiedad">Propiedad</option>
    </select>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-form-label col-sm-2 text-sm-right">Interes</label>
    <div class="col-sm-10">
    <select class="form-control" name="caracteristica_insert_fk_interes">
    <?php
    $interes=new interes(new Connexion);
    $interes=$interes->getAll();
    while ($row = mysqli_fetch_array($interes,MYSQLI_ASSOC)) {
        ?>
        <option value="<?=$row['pk_interes']?>"><?=$row['name']?></option>
        <?php
    }
    ?>
    </select>
    </div>
    </div>
    
    <div class="form-group row">
    <label class="col-form-label col-sm-2 text-sm-right">Tipo</label>
    <div class="col-sm-10">
    <select class="form-control" name="caracteristica_insert_fk_tipo">
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
            <button onclick="action_insert_caracteristica()" class="btn btn-primary">Guardar</button>
        </div>
</div>