<?php
$ubdistrito=new ubdistrito(new Connexion);
$ubdistrito->setfk_provincia($_POST['proyecto_insert_fk_provincia']);
$ubdistrito=$ubdistrito->getAllByFk_Provincia();
while ($row=mysqli_fetch_array($ubdistrito,MYSQLI_ASSOC)) {
    ?>
    <option value="<?=$row['idDist']?>"><?=$row['distrito']?></option>
    <?php
}