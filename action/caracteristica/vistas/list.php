<?php 
                   $caracteristica=new caracteristica(new Connexion);
                   $caracteristica=$caracteristica->getAll();
                   while ($row=mysqli_fetch_array($caracteristica,MYSQLI_ASSOC)) {
                       ?>
                        <tr class="odd gradeX">
                        <td><?=$row['name']?></td>
                        <td><?=$row['created_at']?></td>
                        <td><?=$row['updated_at']?></td>
                        <td class="center">
                        <a href="#" class="btn btn-xs btn-primary" onclick='view_edit_caracteristica(<?=json_encode($row);?>)'>Editar</a>
                        <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_caracteristica(<?=$row['pk_caracteristica']?>)">Eliminar</a>
                        </td>
                        </tr>
                       <?php
                   }
                   ?>