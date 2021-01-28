
const insert = new dhx.Window({width: 550, height: 250, title: "Nuevo transaccion", movable: true, closable: true,resizable: true});
const editar = new dhx.Window({width: 550, height: 250, title: "Editar transaccion", movable: true, closable: true,resizable: true});

function view_insert_transaccion()
{   
    $.ajax({
        url:RUTA+"process.php/transaccion/vistas/insert/",
        type:'GET',
        success: function(data){
            insert.show();
            insert.attachHTML(data);
        }
     });
}

function view_edit_transaccion(pk_transaccion, name)
{
    $.ajax({
        url:RUTA+"process.php/transaccion/vistas/update/",
        type:'POST',
        data: {pk_transaccion: pk_transaccion, name: name},
        success: function(data){
            editar.show();
            editar.attachHTML(data);
        }
     });
}

function view_listar_transaccion()
{   
    $.ajax({
        url:RUTA+"process.php/transaccion/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_transaccion').innerHTML = data;
        }
     });
}
function action_insert_transaccion()
{    let formData = new FormData(document.getElementById("form-insert-transaccion"));
    
    $.ajax({
        url: RUTA+"process.php/transaccion/insert/",
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
              view_listar_transaccion();
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
function action_edit_transaccion()
{   let formData = new FormData(document.getElementById("form-edit-transaccion"));
    
    $.ajax({
        url: RUTA+"process.php/transaccion/update/",
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
              view_listar_transaccion();
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

function action_delete_transaccion(transaccion_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/transaccion/delete/",
        type: "POST",
        data: {transaccion_delete_id: transaccion_delete_id},
       
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
              view_listar_transaccion();
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
