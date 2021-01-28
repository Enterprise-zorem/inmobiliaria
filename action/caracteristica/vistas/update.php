<?php 
$data=$_POST['row'];
?>
<form id="form-edit-caracteristica" action="#">
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Nombre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="caracteristica_edit_name" value="<?=$data['name']?>">
            <input type="hidden" name="caracteristica_edit_id" value="<?=$data['pk_caracteristica']?>">
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="form-group row">
    <label class="col-form-label col-sm-2 text-sm-right">Tipo</label>
    <div class="col-sm-10">
    <select class="form-control" name="caracteristica_edit_tipo">
    <option <?php if($data['tipo']=="proyecto"){echo "selected";}?> value="proyecto">Proyecto</option>
    <option <?php if($data['tipo']=="propiedad"){echo "selected";}?> value="propiedad">Propiedad</option>
    </select>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-form-label col-sm-2 text-sm-right">interes</label>
    <div class="col-sm-10">
    <select class="form-control" name="caracteristica_edit_fk_interes">
    <?php
    $interes=new interes(new Connexion);
    $interes=$interes->getAll();
    while ($row = mysqli_fetch_array($interes,MYSQLI_ASSOC)) {
        ?>
        <option <?php if($data['fk_interes']==$row['pk_interes']){echo "selected";}?> value="<?=$row['pk_interes']?>"><?=$row['name']?></option>
        <?php
    }
    ?>
    </select>
    </div>
    </div>
    
    <div class="form-group row">
    <label class="col-form-label col-sm-2 text-sm-right">Tipo</label>
    <div class="col-sm-10">
    <select class="form-control" name="caracteristica_edit_fk_tipo">
    <?php
    $tipo=new tipo(new Connexion);
    $tipo=$tipo->getAll();
    while ($row=mysqli_fetch_array($tipo,MYSQLI_ASSOC)) {
        ?>
        <option <?php if($data['fk_tipo']==$row['pk_tipo']){echo "selected";}?> value="<?=$row['pk_tipo']?>"><?=$row['name']?></option>
        <?php
    } 
    ?>
    </select>
    </div>
    </div>
</form>
<div class="form-group row">
        <div class="col-sm-10 ml-sm-auto">
            <button onclick="action_edit_caracteristica()" class="btn btn-primary">Guardar</button>
        </div>
</div>