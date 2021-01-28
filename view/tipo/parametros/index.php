
<?php 
    include "view/body_header.php"; 
$id=View::GET();
if(is_numeric($id))
{
    $tipo=new tipo(new Connexion);
    $tipo->setpk($id);
    $tipo=$tipo->getAllById();
    if(mysqli_num_rows($tipo))
    {
        $tipo=$tipo->fetch_array(MYSQLI_ASSOC);
    }
    else
    {
        echo "<script>window.href.replace('".RUTA."home')</script>";
    }
}
else
{
    echo "<script>window.href.replace('".RUTA."home')</script>";
}
?>

<div class="layout-content">

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex">
            <div class=" flex-grow-1">
                <h4 class="font-weight-bold py-3 mb-0">parametros -> <?=$tipo['name']?></h4>
                <input type="hidden" id="pk_tipo" value="<?=$tipo['pk_tipo']?>">
            </div>
            <div ><button onclick="view_insert_parametros(<?=$tipo['pk_tipo']?>)" class="btn btn-primary btn-glow-primary"><span class="ion ion-md-add"></span>&nbsp; Nuevo parametros</button></div>
        </div>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Tipo</li>
                <li class="breadcrumb-item active">parametros</li>
            </ol>
        </div>
        <div class="table-responsive" id="app">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="table_parametros">
                   <?php 
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
                                <a class="btn btn-xs btn-warning" href="#" onclick="action_delete_parametros('<?=$row?>','<?=$tipo['pk_tipo']?>')">Eliminar</a>
                                </td>
                             </tr>
                           <?php
                        }
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