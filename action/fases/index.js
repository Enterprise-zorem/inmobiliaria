
const dhxWindow = new dhx.Window({width: 550, height: 250, title: "Nuevo Fase", movable: true, closable: true,resizable: true});
const editar = new dhx.Window({width: 550, height: 250, title: "Editar Fase", movable: true, closable: true,resizable: true});

function view_insert_fases()
{   
    $.ajax({
        url:RUTA+"process.php/fases/vistas/insert/",
        type:'GET',
        success: function(data){
            dhxWindow.show();
            dhxWindow.attachHTML(data);
        }
     });
}

function view_edit_fase(pk_rol, name)
{
 //var  dhxWindow = new dhx.Window({width: 550, height: 250, title: "Editar Fase", movable: true, closable: true,resizable: true});
    $.ajax({
        url:RUTA+"process.php/fases/vistas/update/",
        type:'POST',
        data: {pk_rol: pk_rol, name: name},
        success: function(data){
            editar.show();
            editar.attachHTML(data);
        }
     });
}

function view_listar_fases()
{   
    $.ajax({
        url:RUTA+"process.php/fases/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_fases').innerHTML = data;
        }
     });
}
function action_insert_fase()
{    let formData = new FormData(document.getElementById("form-insert-fase"));
    
    $.ajax({
        url: RUTA+"process.php/fases/insert/",
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            Swal.fire({
                title: 'Procesando'
            });
            Swal.showLoading();
        },
    }).done(function (result) {
        Swal.close();
        if( result === "defaultValue")
        {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              Toast.fire({
                type: 'success',
                title: '¡Registrado!',
                text: 'Correctamente',
              });
<<<<<<< HEAD
              editar.hide();
=======
              dhxWindow.hide();
>>>>>>> 82a396c (27/01/2021)
              view_listar_fases();
        }
        else
        {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              Toast.fire({
                type: 'warning',
                title: "Error!",
                text: result,
              })
        }
    });
}
function action_edit_fase()
{   let formData = new FormData(document.getElementById("form-edit-fase"));
    
    $.ajax({
        url: RUTA+"process.php/fases/edit/",
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            Swal.fire({
                title: 'Procesando'
            });
            Swal.showLoading();
        },
    }).done(function (result) {
        Swal.close();
        if( result === "defaultValue")
        {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              Toast.fire({
                type: 'success',
                title: '¡Actualizado!',
                text: 'Correctamente',
              });
              editar.hide();
              view_listar_fases();
        }
        else
        {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              Toast.fire({
                type: 'warning',
                title: "Error!",
                text: result,
              });
        }
    });
}

function action_delete_fase(fase_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/fases/delete/",
        type: "POST",
        data: {fase_delete_id: fase_delete_id},
       
        beforeSend: function () {
            Swal.fire({
                title: 'Procesando'
            });
            Swal.showLoading();
        },
    }).done(function (result) {
        Swal.close();
        if( result === "defaultValue")
        {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              Toast.fire({
                type: 'success',
                title: '¡Eliminado!',
                text: 'Correctamente',
              });
              dhxWindow.hide();
              view_listar_fases();
        }
        else
        {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              Toast.fire({
                type: 'warning',
                title: "Error!",
                text: result,
              })
        }
    });
}
