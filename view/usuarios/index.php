<?php include "view/body_header.php"; ?>

<div class="layout-content">

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex">
            <div class=" flex-grow-1">
                <h4 class="font-weight-bold py-3 mb-0">Usuarios</h4>
            </div>
            <div ><button onclick="insert_usuario()" class="btn btn-primary btn-glow-primary"><span class="ion ion-md-add"></span>&nbsp; Add product</button></div>
        </div>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>
        </div>
        <div class="table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                   $usuario=new usuario(new Connexion);
                   $usuario=$usuario->getAll();
                   while ($row=mysqli_fetch_array($usuario,MYSQLI_ASSOC)) {
                       ?>
                        <tr class="odd gradeX">
                        <td><?=$row['nombres']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['telefono']?></td>
                        <td class="center">
                        <a href="modificar" class="btn btn-xs btn-primary">Editar</a>
                        <a class="btn btn-xs btn-warning" href="eliminar">Eliminar</a>
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