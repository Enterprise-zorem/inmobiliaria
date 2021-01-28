<?php 
                   $tipo_contacto=new tipoContacto(new Connexion);
                   $tipo_contacto=$tipo_contacto->getAll();
                   while ($row=mysqli_fetch_array($tipo_contacto,MYSQLI_ASSOC)) {
                       ?>
                        <tr class="odd gradeX">
                        <td><?=$row['name']?></td>
                        <td><?=$row['created_at']?></td>
                        <td><?=$row['updated_at']?></td>
                        <td class="center">
                        <a href="#" class="btn btn-xs btn-primary" onclick='view_edit_tipo_contacto(<?=json_encode($row);?>)'>Editar</a>
                        <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_tipo_contacto(<?=$row['pk_tipo_contacto']?>)">Eliminar</a>
                        </td>
                        </tr>
                       <?php
                   }
                   ?>