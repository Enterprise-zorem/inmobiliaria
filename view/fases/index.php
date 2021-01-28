
<?php include "view/body_header.php"; ?>

<div class="layout-content">

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex">
            <div class=" flex-grow-1">
                <h4 class="font-weight-bold py-3 mb-0">Fases</h4>
            </div>
            <div ><button onclick="view_insert_fases()" class="btn btn-primary btn-glow-primary"><span class="ion ion-md-add"></span>&nbsp; Nuevo fase</button></div>
        </div>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Fases</li>
            </ol>
        </div>
        <div class="table-responsive" id="app">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="table_fases">
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