<?php
$data = $_POST['categoria'];
$array = json_decode($data['fk_tipo'], true);
?>
<form id="form-edit-categoria" action="#">
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Nombre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="<?= $data['name'] ?>" name="categoria_edit_name" id="categoria_edit_name">
            <input type="hidden" class="form-control" name="categoria_edit_id" id="categoria_edit_id" value="<?= $data['pk_categoria'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-2 text-sm-right">Tipo</label>
        <div class="col-sm-10">
            <select class="form-control" name="categoria_edit_fk_tipo[]" id="select_edit" multiple>
                <?php
                $tipo = new tipo(new Connexion);
                $tipo = $tipo->getAll();
                while ($row = mysqli_fetch_array($tipo, MYSQLI_ASSOC)) {
                ?>
                    <option <?php if (in_array($row['pk_tipo'], $array)) {
                                echo "selected";
                            } ?> value="<?= $row['pk_tipo'] ?>"><?= $row['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>

</form>
<div class="form-group row">
    <div class="col-sm-10 ml-sm-auto">
        <button onclick="action_edit_categoria()" class="btn btn-primary">Guardar</button>
    </div>
</div>