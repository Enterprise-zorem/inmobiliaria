
const insert = new dhx.Window({width: 550, height: 250, title: "Nuevo tipo", movable: true, closable: true,resizable: true});
const editar = new dhx.Window({width: 550, height: 250, title: "Editar tipo", movable: true, closable: true,resizable: true});

function view_insert_tipo()
{   
    $.ajax({
        url:RUTA+"process.php/tipo/vistas/insert/",
        type:'GET',
        success: function(data){
            insert.show();
            insert.attachHTML(data);
        }
     });
}

function view_edit_tipo(pk_tipo, name)
{
 //var  dhxWindow = new dhx.Window({width: 550, height: 250, title: "Editar tipo", movable: true, closable: true,resizable: true});
    $.ajax({
        url:RUTA+"process.php/tipo/vistas/update/",
        type:'POST',
        data: {pk_tipo: pk_tipo, name: name},
        success: function(data){
            editar.show();
            editar.attachHTML(data);
        }
     });
}

function view_listar_tipo()
{   
    $.ajax({
        url:RUTA+"process.php/tipo/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_tipo').innerHTML = data;
        }
     });
}
function action_insert_tipo()
{    let formData = new FormData(document.getElementById("form-insert-tipo"));
    
    $.ajax({
        url: RUTA+"process.php/tipo/insert/",
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
              view_listar_tipo();
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
function action_edit_tipo()
{   let formData = new FormData(document.getElementById("form-edit-tipo"));
    
    $.ajax({
        url: RUTA+"process.php/tipo/update/",
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
              view_listar_tipo();
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

function action_delete_tipo(tipo_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/tipo/delete/",
        type: "POST",
        data: {tipo_delete_id: tipo_delete_id},
       
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
              view_listar_tipo();
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
