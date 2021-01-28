
const view_insert = new dhx.Window({width: 550, height: 250, title: "Nuevo Interes", movable: true, closable: true,resizable: true});
const view_edit = new dhx.Window({width: 550, height: 250, title: "Editar Interes", movable: true, closable: true,resizable: true});


function view_listar_interes()
{   
    $.ajax({
        url:RUTA+"process.php/interes/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_interes').innerHTML = data;
        }
     });
}
function view_insert_interes()
{   
    //let dhxWindow = new dhx.Window({width: 550, height: 250, title: "Nuevo Rol", movable: true, closable: true,resizable: true});


    $.ajax({
        url:RUTA+"process.php/interes/vistas/insert/",
        type:'GET',
        success: function(data){
            view_insert.show();
            view_insert.attachHTML(data);
        }
     });
}


function view_edit_interes(pk_interes, name)
{
    //let dhxWindow = new dhx.Window({width: 550, height: 250, title: "Editar Rol", movable: true, closable: true,resizable: true});

    $.ajax({
        url:RUTA+"process.php/interes/vistas/update/",
        type:'POST',
        data: {pk_interes: pk_interes, name: name},
        success: function(data){
            view_edit.show();
            view_edit.attachHTML(data);

        }
     });
}
function action_insert_interes()
{   
    
    let formData = new FormData(document.getElementById("form-insert-interes"));
    
    $.ajax({
        url: RUTA+"process.php/interes/insert/",
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
              view_listar_interes();
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
function action_edit_interes()
{    let formData = new FormData(document.getElementById("form-edit-interes"));
    
    $.ajax({
        url: RUTA+"process.php/interes/edit/",
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
              view_listar_interes();
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

function action_delete_interes(interes_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/interes/delete/",
        type: "POST",
        data: {interes_delete_id: interes_delete_id},
       
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
              view_listar_interes();
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


