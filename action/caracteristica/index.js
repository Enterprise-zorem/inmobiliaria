
const view_insert = new dhx.Window({width: 550, height: 380, title: "Nueva Caracteristica", movable: true, closable: true,resizable: true});
const view_edit = new dhx.Window({width: 550, height: 380, title: "Editar Caracteristica", movable: true, closable: true,resizable: true});


function view_listar_caracteristica()
{   
    $.ajax({
        url:RUTA+"process.php/caracteristica/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_caracteristica').innerHTML = data;
        }
     });
}
function view_insert_caracteristica()
{   
    //let dhxWindow = new dhx.Window({width: 550, height: 250, title: "Nuevo Rol", movable: true, closable: true,resizable: true});

    $.ajax({
        url:RUTA+"process.php/caracteristica/vistas/insert/",
        type:'GET',
        success: function(data){
            view_insert.show();
            view_insert.attachHTML(data);
        }
     });
}


function view_edit_caracteristica(row)
{
    //let dhxWindow = new dhx.Window({width: 550, height: 250, title: "Editar Rol", movable: true, closable: true,resizable: true});

    $.ajax({
        url:RUTA+"process.php/caracteristica/vistas/update/",
        type:'POST',
        data: {row: row},
        success: function(data){
            view_edit.show();
            view_edit.attachHTML(data);

        }
     });
}
function action_insert_caracteristica()
{   
    
    let formData = new FormData(document.getElementById("form-insert-caracteristica"));
    
    $.ajax({
        url: RUTA+"process.php/caracteristica/insert/",
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
              view_listar_caracteristica();
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
              });
              console.log(result);
        }
    });
}
function action_edit_caracteristica()
{    let formData = new FormData(document.getElementById("form-edit-caracteristica"));
    
    $.ajax({
        url: RUTA+"process.php/caracteristica/edit/",
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
              view_listar_caracteristica();
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

function action_delete_caracteristica(caracteristica_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/caracteristica/delete/",
        type: "POST",
        data: {caracteristica_delete_id: caracteristica_delete_id},
       
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
              view_listar_caracteristica();
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


