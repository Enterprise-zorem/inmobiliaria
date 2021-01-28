
const insert = new dhx.Window({width: 550, height: 250, title: "Nuevo estatus", movable: true, closable: true,resizable: true});
const editar = new dhx.Window({width: 550, height: 250, title: "Editar estatus", movable: true, closable: true,resizable: true});

function view_insert_estatus()
{   
    $.ajax({
        url:RUTA+"process.php/estatus/vistas/insert/",
        type:'GET',
        success: function(data){
            insert.show();
            insert.attachHTML(data);
        }
     });
}

function view_edit_estatus(pk_estatus, name)
{
 //var  dhxWindow = new dhx.Window({width: 550, height: 250, title: "Editar estatus", movable: true, closable: true,resizable: true});
    $.ajax({
        url:RUTA+"process.php/estatus/vistas/update/",
        type:'POST',
        data: {pk_estatus: pk_estatus, name: name},
        success: function(data){
            editar.show();
            editar.attachHTML(data);
        }
     });
}

function view_listar_estatus()
{   
    $.ajax({
        url:RUTA+"process.php/estatus/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_estatus').innerHTML = data;
        }
     });
}
function action_insert_estatus()
{    let formData = new FormData(document.getElementById("form-insert-estatus"));
    
    $.ajax({
        url: RUTA+"process.php/estatus/insert/",
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
              insert.hide();
              view_listar_estatus();
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
function action_edit_estatus()
{   let formData = new FormData(document.getElementById("form-edit-estatus"));
    
    $.ajax({
        url: RUTA+"process.php/estatus/update/",
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
              view_listar_estatus();
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

function action_delete_estatus(estatus_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/estatus/delete/",
        type: "POST",
        data: {estatus_delete_id: estatus_delete_id},
       
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
              view_listar_estatus();
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
