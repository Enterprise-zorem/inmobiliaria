<?php 
                   $tipo=new tipo(new Connexion);
                   $tipo=$tipo->getAll();
                   while ($row=mysqli_fetch_array($tipo,MYSQLI_ASSOC)) {
                       ?>
                        <tr class="odd gradeX">
                        <td><?=$row['name']?></td>
<<<<<<< HEAD
=======
                        <td><a href="<?=RUTA?>tipo/parametros/<?=$row['pk_tipo']?>" class="btn btn-xs btn-primary">Parametros</a></td>
>>>>>>> 82a396c (27/01/2021)
                        <td><?=$row['created_at']?></td>
                        <td><?=$row['updated_at']?></td>
                        <td class="center">
                        <a href="#" class="btn btn-xs btn-primary" onclick="view_edit_tipo(<?= $row['pk_tipo']?>, '<?=$row['name']?>')">Editar</a>
                        <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_tipo(<?=$row['pk_tipo']?>)">Eliminar</a>
                        </td>
                        </tr>
                       <?php
                   }
                   ?>