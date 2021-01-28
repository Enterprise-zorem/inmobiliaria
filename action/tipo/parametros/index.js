
const insert = new dhx.Window({width: 550, height: 250, title: "Nuevo parametros", movable: true, closable: true,resizable: true});
const editar = new dhx.Window({width: 550, height: 250, title: "Editar parametros", movable: true, closable: true,resizable: true});

function view_insert_parametros(parametros_insert_id)
{   
    $.ajax({
        url:RUTA+"process.php/tipo/parametros/vistas/insert/",
        type:'POST',
        data: {parametros_insert_id: parametros_insert_id},
        success: function(data){
            insert.show();
            insert.attachHTML(data);
        }
     });
}


function view_listar_parametros()
{   let pk_tipo=document.getElementById('pk_tipo').value;
    $.ajax({
        url:RUTA+"process.php/tipo/parametros/vistas/list/",
        type:'POST',
        data: {pk_tipo: pk_tipo},
        success: function(data){
         document.getElementById('table_parametros').innerHTML = data;
        }
     });
}
function action_insert_parametros()
{    let formData = new FormData(document.getElementById("form-insert-parametros"));
    
    $.ajax({
        url: RUTA+"process.php/tipo/parametros/insert/",
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
              view_listar_parametros();
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

function action_delete_parametros(parametros_delete_id,pk_tipo)
{    
    $.ajax({
        url: RUTA+"process.php/tipo/parametros/delete/",
        type: "POST",
        data: {parametros_delete_id: parametros_delete_id,pk_tipo:pk_tipo},
       
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
              view_listar_parametros();
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
