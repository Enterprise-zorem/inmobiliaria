const view_insert = new dhx.Window({width: 550, height: 250, title: "Nuevo Tipo Contacto", movable: true, closable: true,resizable: true});
const view_edit = new dhx.Window({width: 550, height: 250, title: "Editar Tipo Contacto", movable: true, closable: true,resizable: true});

function view_listar_tipo_contacto()
{   
    $.ajax({
        url:RUTA+"process.php/tipoContacto/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_tipo_contacto').innerHTML = data;
        }
     });
}
function view_insert_tipo_contacto()
{   
    //let dhxWindow = new dhx.Window({width: 550, height: 250, title: "Nuevo Rol", movable: true, closable: true,resizable: true});


    $.ajax({
        url:RUTA+"process.php/tipoContacto/vistas/insert/",
        type:'GET',
        success: function(data){
            view_insert.show();
            view_insert.attachHTML(data);
        }
     });
}


function view_edit_tipo_contacto(tipo_contacto)
{
    //let dhxWindow = new dhx.Window({width: 550, height: 250, title: "Editar Rol", movable: true, closable: true,resizable: true});
    $.ajax({
        url:RUTA+"process.php/tipoContacto/vistas/update/",
        type:'POST',
        data: {pk_tipo_contacto: tipo_contacto.pk_tipo_contacto, name: tipo_contacto.name},
        success: function(data){
            view_edit.show();
            view_edit.attachHTML(data);

        }
     });
}
function action_insert_tipo_contacto()
{   
    
    let formData = new FormData(document.getElementById("form-insert-tipo-contacto"));
    
    $.ajax({
        url: RUTA+"process.php/tipoContacto/insert/",
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
              view_listar_tipo_contacto();
              view_insert.hide();
              
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
function action_edit_tipo_contacto()
{    let formData = new FormData(document.getElementById("form-edit-tipo-contacto"));
    
    $.ajax({
        url: RUTA+"process.php/tipoContacto/edit/",
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
              view_listar_tipo_contacto();
              view_edit.hide();
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

function action_delete_tipo_contacto(tipo_contacto_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/tipoContacto/delete/",
        type: "POST",
        data: {tipo_contacto_delete_id: tipo_contacto_delete_id},
       
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
              view_listar_tipo_contacto();
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


