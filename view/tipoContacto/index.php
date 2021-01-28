
<?php include "view/body_header.php"; ?>

<div class="layout-content">

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex">
            <div class=" flex-grow-1">
                <h4 class="font-weight-bold py-3 mb-0">Tipo Contacto</h4>
            </div>
            <div ><button onclick="view_insert_tipo_contacto()" class="btn btn-primary btn-glow-primary"><span class="ion ion-md-add"></span>&nbsp; Nuevo tipo contacto</button></div>
        </div>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Contacto</li>
            </ol>
        </div>
        <div class="table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="table_tipo_contacto">
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
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>
</div>
<!--<button id="growl-notice" class="btn btn-info">Notice</button>-->

<div class="layout-overlay layout-sidenav-toggle"></div>
</div>