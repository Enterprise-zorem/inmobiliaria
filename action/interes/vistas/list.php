<?php 
                   $interes=new interes(new Connexion);
                   $interes=$interes->getAll();
                   while ($row=mysqli_fetch_array($interes,MYSQLI_ASSOC)) {
                       ?>
                        <tr class="odd gradeX">
                        <td><?=$row['name']?></td>
                        <td><?=$row['created_at']?></td>
                        <td><?=$row['updated_at']?></td>
                        <td class="center">
                        <a href="#" class="btn btn-xs btn-primary" onclick="view_edit_interes(<?= $row['pk_interes']?>, '<?=$row['name']?>')">Editar</a>
                        <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_interes(<?=$row['pk_interes']?>)">Eliminar</a>
                        </td>
                        </tr>
                       <?php
                   }
                   ?>