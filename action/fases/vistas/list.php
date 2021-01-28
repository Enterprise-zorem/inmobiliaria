<?php 
                   $fase=new fase(new Connexion);
                   $fase=$fase->getAll();
                   while ($row=mysqli_fetch_array($fase,MYSQLI_ASSOC)) {
                       ?>
                        <tr class="odd gradeX">
                        <td><?=$row['name']?></td>
                        <td><?=$row['created_at']?></td>
                        <td><?=$row['updated_at']?></td>
                        <td class="center">
                        <a href="#" class="btn btn-xs btn-primary" onclick="view_edit_fase(<?= $row['pk_fase']?>, '<?=$row['name']?>')">Editar</a>
                        <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_fase(<?=$row['pk_fase']?>)">Eliminar</a>
                        </td>
                        </tr>
                       <?php
                   }
?>