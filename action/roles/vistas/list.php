<?php 
                   $rol=new rol(new Connexion);
                   $rol=$rol->getAll();
                   while ($row=mysqli_fetch_array($rol,MYSQLI_ASSOC)) {
                       ?>
                        <tr class="odd gradeX">
                        <td><?=$row['name']?></td>
                        <td><?=$row['created_at']?></td>
                        <td><?=$row['updated_at']?></td>
                        <td class="center">
                        <a href="#" class="btn btn-xs btn-primary" onclick="view_edit_rol(<?= $row['pk_rol']?>, '<?=$row['name']?>')">Editar</a>
                        <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_rol(<?=$row['pk_rol']?>)">Eliminar</a>
                        </td>
                        </tr>
                       <?php
                   }
                   ?>