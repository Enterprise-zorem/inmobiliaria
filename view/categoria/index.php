 
<?php include "view/body_header.php"; ?>

<div class="layout-content">

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex">
            <div class=" flex-grow-1">
                <h4 class="font-weight-bold py-3 mb-0">categoria</h4>
            </div>
            <div>
                <!--<button onclick="view_insert_categoria()" class="btn btn-primary btn-glow-primary">
                    <span class="ion ion-md-add"></span>&nbsp; Nuevo categoria
                </button>-->

                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn btn-primary btn-glow-primary" data-toggle="modal" data-target="#add_asset"><i class="fa fa-plus"></i> Nueva Categoria</a>
                </div>

            </div>
        </div>

        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">categoria</li>
            </ol>
        </div>

        <div class="table-responsive" id="app">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="table_categoria">
                    <?php
                    $categoria = new categoria(new Connexion);
                    $categoria = $categoria->getAll();
                    while ($row = mysqli_fetch_array($categoria, MYSQLI_ASSOC)) {
                    ?>
                        <tr class="odd gradeX">
                            <td><?= $row['name'] ?></td>
                            <td><?php
                                $array = json_decode($row['fk_tipo'], true);
                                foreach ($array as $data) {
                                    $tipo = new tipo(new Connexion);
                                    $tipo->setpk($data);
                                    $tipo = $tipo->getAllById();
                                    while ($name = mysqli_fetch_array($tipo, MYSQLI_ASSOC)) {
                                        echo $name['name'].', ';
                                    }
                                }
                                ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['updated_at'] ?></td>
                            <td class="center">
                                <a href="#" class="btn btn-xs btn-primary" onclick='view_edit_categoria(<?= json_encode($row)?>)'>Editar</a>
                                <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_categoria(<?= $row['pk_categoria'] ?>);">Eliminar</a>
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
<!--<button id="growl-notice" class="btn btn-info">Notice</button>-->

<div class="layout-overlay layout-sidenav-toggle"></div>


<!-- Add Asset Modal -->
<div id="add_asset" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Data -->
                <form id="form-insert-categoria" action="#">
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="categoria_insert_name" placeholder="Nombre del Nuevo categoria">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">Tipo</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="categoria_insert_fk_tipo[]" id="select_insert" multiple>

                            <?php
                            $tipo = new tipo(new Connexion);
                            $tipo = $tipo->getAll();
                            while ($row = mysqli_fetch_array($tipo, MYSQLI_ASSOC)) {
                            ?>
                                <option value="<?= $row['pk_tipo'] ?>"><?= $row['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                </form>
                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <button onclick="action_insert_categoria()" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                <!--End Data -->
            </div>
        </div>
    </div>
</div>
<!-- /Add Asset Modal -->

<!-- Edit Asset Modal -->
<div id="edit_asset" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                
            </div>
        </div>
    </div>
</div>
<!-- /Add Asset Modal -->
