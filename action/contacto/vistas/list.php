<?php
                    $contacto = new contacto(new Connexion);
                    $contacto = $contacto->getAll();
                    while ($row = mysqli_fetch_array($contacto, MYSQLI_ASSOC)) {
                    ?>
                        <tr class="odd gradeX">
                            <td><?= $row['nombres'] ?></td>
                            <td><?php
                                $array = json_decode($row['fk_tipo_contacto'], true);
                                foreach ($array as $data) {
                                    $tipo_contacto = new tipoContacto(new Connexion);
                                    $tipo_contacto->setpk($data);
                                    $tipo_contacto = $tipo_contacto->getAllById();
                                    while ($name = mysqli_fetch_array($tipo_contacto, MYSQLI_ASSOC)) {
                                        echo $name['name'].', ';
                                    }
                                }
                                ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['updated_at'] ?></td>
                            <td class="center">
                                <a href="#" class="btn btn-xs btn-primary" onclick='view_edit_contacto(<?= json_encode($row)?>)'>Editar</a>
                                <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_contacto(<?= $row['pk_contacto'] ?>);">Eliminar</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>