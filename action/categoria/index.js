
const insert = new dhx.Window({width: 550, height: 450, title: "Nuevo categoria", movable: true, closable: true,resizable: true});
const editar = new dhx.Window({width: 550, height: 450, title: "Editar categoria", movable: true, closable: true,resizable: true});

tail.select('#select_insert',{
    search: true,
});

function view_edit_categoria(categoria)
{
   $.ajax({
    url: RUTA+'process.php/categoria/vistas/update/',
    type: 'post',
    data: {categoria: categoria},
    success: function(response){ 
      $('#modal-body').html(response);
      tail.select('#select_edit');
      $('#edit_asset').modal('show'); 
    }
  });

}


function view_listar_categoria()
{   
    $.ajax({
        url:RUTA+"process.php/categoria/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_categoria').innerHTML = data;
        }
     });
}
function action_insert_categoria()
{    let formData = new FormData(document.getElementById("form-insert-categoria"));
    
    $.ajax({
        url: RUTA+"process.php/categoria/insert/",
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
              $('#add_asset').modal('hide');
              view_listar_categoria();
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
function action_edit_categoria()
{   let formData = new FormData(document.getElementById("form-edit-categoria"));
    
    $.ajax({
        url: RUTA+"process.php/categoria/update/",
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
              view_listar_categoria();
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

function action_delete_categoria(categoria_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/categoria/delete/",
        type: "POST",
        data: {categoria_delete_id: categoria_delete_id},
       
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
              view_listar_categoria();
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
