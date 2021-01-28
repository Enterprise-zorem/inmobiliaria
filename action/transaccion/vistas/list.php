<?php 
                   $transaccion=new transaccion(new Connexion);
                   $transaccion=$transaccion->getAll();
                   while ($row=mysqli_fetch_array($transaccion,MYSQLI_ASSOC)) {
                       ?>
                        <tr class="odd gradeX">
                        <td><?=$row['name']?></td>
                        <td><?=$row['created_at']?></td>
                        <td><?=$row['updated_at']?></td>
                        <td class="center">
                        <a href="#" class="btn btn-xs btn-primary" onclick="view_edit_transaccion(<?= $row['pk_transaccion']?>, '<?=$row['name']?>')">Editar</a>
                        <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_transaccion(<?=$row['pk_transaccion']?>)">Eliminar</a>
                        </td>
                        </tr>
                       <?php
                   }
                   ?>