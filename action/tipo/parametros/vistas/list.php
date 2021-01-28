<?php 
                    $tipo=new tipo(new Connexion);
                    $tipo->setpk($_POST['pk_tipo']);
                    $tipo=$tipo->getAllById();
                    $tipo=$tipo->fetch_array(MYSQLI_ASSOC);
                    $array=json_decode($tipo['parametros'],true);
                    if(empty($array))
                    {
                        //no hay data
                    }
                    else
                    {
                        foreach ($array as $row) {
                           ?>
                             <tr>
                                <td><?=$row?></td>
                                <td>
                                <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_parametros(<?=$row?>)">Eliminar</a>
                                </td>
                             </tr>
                           <?php
                        }
                    }
                   ?>