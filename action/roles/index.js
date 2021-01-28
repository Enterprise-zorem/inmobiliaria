
const view_insert = new dhx.Window({width: 550, height: 250, title: "Nuevo Rol", movable: true, closable: true,resizable: true});
const view_edit = new dhx.Window({width: 550, height: 250, title: "Editar Rol", movable: true, closable: true,resizable: true});

function view_insert_rol()
{   
    //let dhxWindow = new dhx.Window({width: 550, height: 250, title: "Nuevo Rol", movable: true, closable: true,resizable: true});


    $.ajax({
        url:RUTA+"process.php/roles/vistas/insert/",
        type:'GET',
        success: function(data){
            view_insert.show();
            view_insert.attachHTML(data);
        }
     });
}

function view_listar_rol()
{   
    $.ajax({
        url:RUTA+"process.php/roles/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_roles').innerHTML = data;
        }
     });
}
function view_edit_rol(pk_rol, name)
{
    //let dhxWindow = new dhx.Window({width: 550, height: 250, title: "Editar Rol", movable: true, closable: true,resizable: true});

    $.ajax({
        url:RUTA+"process.php/roles/vistas/update/",
        type:'POST',
        data: {pk_rol: pk_rol, name: name},
        success: function(data){
            view_edit.show();
            view_edit.attachHTML(data);

        }
     });
}
function action_insert_rol()
{   
    
    let formData = new FormData(document.getElementById("form-insert-rol"));
    
    $.ajax({
        url: RUTA+"process.php/roles/insert/",
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
              view_listar_rol();
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
function action_edit_rol()
{    let formData = new FormData(document.getElementById("form-edit-rol"));
    
    $.ajax({
        url: RUTA+"process.php/roles/edit/",
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
              view_listar_rol();
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

function action_delete_rol(rol_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/roles/delete/",
        type: "POST",
        data: {rol_delete_id: rol_delete_id},
       
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
              view_listar_rol();
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


