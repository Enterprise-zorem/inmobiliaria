
const insert = new dhx.Window({width: 550, height: 450, title: "Nuevo contacto", movable: true, closable: true,resizable: true});
const editar = new dhx.Window({width: 550, height: 450, title: "Editar contacto", movable: true, closable: true,resizable: true});

tail.select('#select_insert',{
    search: true,
});

function view_edit_contacto(contacto)
{
   $.ajax({
    url: RUTA+'process.php/contacto/vistas/update/',
    type: 'post',
    data: {contacto: contacto},
    success: function(response){ 
      $('#modal-body').html(response);
      tail.select('#select_edit');
      $('#edit_asset').modal('show'); 
    }
  });

}


function view_listar_contacto()
{   
    $.ajax({
        url:RUTA+"process.php/contacto/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_contacto').innerHTML = data;
        }
     });
}
function action_insert_contacto()
{    let formData = new FormData(document.getElementById("form-insert-contacto"));
    
    $.ajax({
        url: RUTA+"process.php/contacto/insert/",
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
              $('#add_contacto').modal('hide');
              view_listar_contacto();
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
function action_edit_contacto()
{   let formData = new FormData(document.getElementById("form-edit-contacto"));
    
    $.ajax({
        url: RUTA+"process.php/contacto/update/",
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
              $('#edit_asset').modal('hide');
              view_listar_contacto();
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

function action_delete_contacto(contacto_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/contacto/delete/",
        type: "POST",
        data: {contacto_delete_id: contacto_delete_id},
       
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
              view_listar_contacto();
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
