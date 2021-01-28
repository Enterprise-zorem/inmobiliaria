<?php
$ubprovincia=new ubprovincia(new Connexion);
$ubprovincia->setfk_departamento($_POST['proyecto_insert_fk_departamento']);
$ubprovincia=$ubprovincia->getAllByDepartamento();
while ($row=mysqli_fetch_array($ubprovincia,MYSQLI_ASSOC)) {
    ?>
    <option value="<?=$row['idProv']?>"><?=$row['provincia']?></option>
    <?php
}