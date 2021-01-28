<?php 
                   $estatus=new estatus(new Connexion);
                   $estatus=$estatus->getAll();
                   while ($row=mysqli_fetch_array($estatus,MYSQLI_ASSOC)) {
                       ?>
                        <tr class="odd gradeX">
                        <td><?=$row['name']?></td>
                        <td><?=$row['created_at']?></td>
                        <td><?=$row['updated_at']?></td>
                        <td class="center">
                        <a href="#" class="btn btn-xs btn-primary" onclick="view_edit_estatus(<?= $row['pk_estatus']?>, '<?=$row['name']?>')">Editar</a>
                        <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_estatus(<?=$row['pk_estatus']?>)">Eliminar</a>
                        </td>
                        </tr>
                       <?php
                   }
                   ?>