<?php include "view/body_header.php"; ?>

<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex">
            <div class=" flex-grow-1">
                <h4 class="font-weight-bold py-3 mb-0">proyecto</h4>
            </div>
            <div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn btn-primary btn-glow-primary" data-toggle="modal" data-target="#add_project"><i class="fa fa-plus"></i> Nuevo Proyecto</a>
                </div>
            </div>
        </div>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">proyecto</li>
            </ol>
        </div>
        <div class="table-responsive" id="app">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Parametros</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="table_proyecto">
                    <?php
                    $proyecto = new proyecto(new Connexion);
                    $proyecto = $proyecto->getAll();
                    while ($row = mysqli_fetch_array($proyecto, MYSQLI_ASSOC)) {
                    ?>
                        <tr class="odd gradeX">
                            <td><?= $row['name'] ?></td>
                            <td><a href="<?= RUTA ?>proyecto/parametros/<?= $row['pk_proyecto'] ?>" class="btn btn-xs btn-primary">Parametros</a></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['updated_at'] ?></td>
                            <td class="center">
                                <a href="#" class="btn btn-xs btn-primary" onclick="view_edit_proyecto(<?= $row['pk_proyecto'] ?>, '<?= $row['name'] ?>')">Editar</a>
                                <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_proyecto(<?= $row['pk_proyecto'] ?>)">Eliminar</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<div class="layout-overlay layout-sidenav-toggle"></div>
</div>

<div id="add_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Proyecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <!--Modal Wizard-->
                <div class="progress__bar">
                    <div class="step">
                        <p>Name</p>
                        <div class="bullet">
                            <span>1</span>
                            <div class="check"><i class="fas fa-check"></i></div>
                        </div>
                    </div>
                    <div class="step">
                        <p>Contacto</p>
                        <div class="bullet">
                            <span>2</span>
                            <div class="check"><i class="fas fa-check"></i></div>
                        </div>
                    </div>
                    <div class="step">
                        <p>Birth</p>
                        <div class="bullet">
                            <span>3</span>
                            <div class="check"><i class="fas fa-check"></i></div>
                        </div>
                    </div>
                    <div class="step">
                        <p>Submit</p>
                        <div class="bullet">
                            <span>4</span>
                            <div class="check"><i class="fas fa-check"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-outer">
                    <form id="form-insert-proyecto">
                        <!--Pagina 1-->
                        <div class="page slidepage">
                            <div class="title">Nombre del Proyecto:</div>
                            <div class="field">
                                <div class="col-sm-12">
                                <div class="label">Nombre del proyecto</div>
                                <input class="form-control" type="text" name="proyecto_insert_name">
                                </div>
                            </div>
                            <div class="field">
                                    <div class="col-sm-6">
                                    <div class="label">Tipo</div>
                                        <select class="form-control" name="proyecto_insert_fk_tipo">
                                        <?php 
                                        $tipo=new tipo(new Connexion);
                                        $tipo=$tipo->getAll();
                                        while ($row=mysqli_fetch_array($tipo,MYSQLI_ASSOC)) {
                                            ?>
                                            <option value="<?=$row['pk_tipo']?>"><?=$row['name']?></option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="label">Fase</div>
                                        <select class="form-control" name="proyecto_insert_fk_fase">
                                        <?php 
                                        $fase=new fase(new Connexion);
                                        $fase=$fase->getAll();
                                        while ($row=mysqli_fetch_array($fase,MYSQLI_ASSOC)) {
                                            ?>
                                            <option value="<?=$row['pk_fase']?>"><?=$row['name']?></option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="field">
                                <div class="col-sm-6">
                                <div class="label">Area Total</div>
                                <input class="form-control" type="text" name="proyecto_insert_area_total">
                                </div>
                                <div class="col-sm-6">
                                <div class="label">Area Construida</div>
                                <input class="form-control" type="text" name="proyecto_insert_area_construida">
                                </div>
                            </div>
                            <div class="field">
                               
                                <div class="label">Descripcion</div>
                                <textarea class="form-control" name="proyecto_insert_descripcion" cols="30" rows="10"></textarea>
                                
                            </div>
                            <div class="field nextBtn">
                                <button>Siguiente</button>
                            </div>
                        </div>
                        <!--fin 1-->
                        <!--Pag 2-->
                        <div class="page">
                            <div class="title">Caracteristicas:</div>
                            <?php
                            $interes=new interes(new Connexion);
                            $interes=$interes->getAll();
                            while ($row=mysqli_fetch_array($interes,MYSQLI_ASSOC)) {
                                $caracteristica=new caracteristica(new Connexion);
                                $caracteristica->setfk_interes($row['pk_interes']);
                                $caracteristica=$caracteristica->getAllByFk_Interes();
                                if(mysqli_num_rows($caracteristica))
                                {   ?>
                                     <div class="field">
                                     <div class="label"><?=$row['name']?></div>
                                    <?php
                                    while ($data=mysqli_fetch_array($caracteristica,MYSQLI_ASSOC)) {
                                        ?>
                                        <input class="form-control" type="checkbox" name="proyecto_insert_fk_caracteristica[]" value="<?=$data['pk_caracteristica']?>"><label><?=$data['name']?></label><br/>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="field btns">
                                <button class="prev-1 prev">Previous</button>
                                <button class="next-1 next">Next</button>
                            </div>
                        </div>
                        <!--fin 2-->

                        <!--Pag 3-->
                        <div class="page">
                            <div class="title">Ubicacion:</div>
                            <div class="field">
                                <div class="label">Direccion</div>
                                <input type="text" name="proyecto_insert_direccion">
                            </div>
                            <div class="field">
                                <div class="label">Departamento</div>
                                <select name="proyecto_insert_fk_departamento" id="proyecto_insert_fk_departamento">
                                   <?php 
                                   $ubdepartamento=new ubdepartamento(new Connexion);
                                   $ubdepartamento=$ubdepartamento->getAll();
                                   while ($row=mysqli_fetch_array($ubdepartamento,MYSQLI_ASSOC)) {
                                       ?>
                                        <option value="<?=$row['idDepa']?>"><?=$row['departamento']?></option>
                                       <?php
                                   }
                                   ?>
                                </select>
                            </div>
                            <div class="field">
                                <div class="label">Provincia</div>
                                <select name="proyecto_insert_fk_provincia" id="proyecto_insert_fk_provincia">
                                    <option value="0">Seleccione Departamento</option>
                                </select>
                            </div>
                            <div class="field">
                                <div class="label">Distrito</div>
                                <select name="proyecto_insert_fk_distrito" id="proyecto_insert_fk_distrito">
                                <option value="0">Seleccione Provincia</option>
                                </select>
                            </div>
                            <div class="field btns">
                                <button class="prev-2 prev">Previous</button>
                                <button class="next-2 next">Next</button>
                            </div>
                        </div>
                        <!--fin 3-->

                        <!--Pag 4-->
                        <div class="page">
                            <div class="title">Ubicacion en el Mapa:</div>
                            <div class="field" style="position: static;">
                                <!--MAPA-->
                                <div id="map"></div>
                                <!--MAPA-->
                            </div>
                            <div class="field btns">
                                <button class="prev-3 prev">Previous</button>
                                <button class="submit">Guardar</button>
                            </div>
                        </div>
                        <!--fin 3-->
                    </form>
                </div>

                <!--End Modal-->
            </div>
        </div>
    </div>
</div>