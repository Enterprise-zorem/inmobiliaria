<?php 
                   $categoria=new categoria(new Connexion);
                   $categoria=$categoria->getAll();
                   while ($row=mysqli_fetch_array($categoria,MYSQLI_ASSOC)) {
                       ?>
                        <tr class="odd gradeX">
                        <td><?=$row['name']?></td>
                        <td><?php 

                        $array = json_decode($row['fk_tipo'],true);
                        foreach($array as $data){
                           $tipo = new tipo(new Connexion);
                           $tipo->setpk($data);
                           $tipo = $tipo->getAllById();
                           while($name = mysqli_fetch_array($tipo, MYSQLI_ASSOC)){
                               echo $name['name'];
                           }
                        }

                        ?></td>
                        <td><?=$row['created_at']?></td>
                        <td><?=$row['updated_at']?></td>
                        <td class="center">
                        <a href="#" class="btn btn-xs btn-primary" onclick='view_edit_categoria(<?php echo json_encode($row);?>);'>Editar</a>
                        <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_categoria(<?=$row['pk_categoria']?>);">Eliminar</a>
                        </td>
                        </tr>
                       <?php
                   }
                   ?>