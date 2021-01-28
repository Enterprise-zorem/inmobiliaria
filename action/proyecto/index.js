
const slidePage = document.querySelector(".slidepage");
const firtNextBtn = document.querySelector(".nextBtn");

const prevBtnSec = document.querySelector('.prev-1');
const nextBtnSec = document.querySelector('.next-1');

const prevBtnThird = document.querySelector('.prev-2');
const nextBtnThird = document.querySelector('.next-2');

const prevBtnFourth = document.querySelector('.prev-3');
const submitBtn = document.querySelector('.submit');
const progressText = document.querySelectorAll('.step p');
const progressCheck = document.querySelectorAll('.step .check');
const bullet = document.querySelectorAll('.step .bullet');
let max = 4;
let current = 1;
firtNextBtn.addEventListener("click", function(e){
    e.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1 ].classList.add('active'); 
    progressText[current - 1 ].classList.add('active'); 
    progressCheck[current - 1 ].classList.add('active'); 
    current += 1;
});
nextBtnSec.addEventListener("click", function(e){
    e.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1 ].classList.add('active'); 
    progressText[current - 1 ].classList.add('active'); 
    progressCheck[current - 1 ].classList.add('active'); 
    current += 1;
});
nextBtnThird.addEventListener("click", function(e){
    e.preventDefault();
    slidePage.style.marginLeft = "-75%";
    bullet[current - 1 ].classList.add('active'); 
    progressText[current - 1 ].classList.add('active'); 
    progressCheck[current - 1 ].classList.add('active'); 
    current += 1;
});
submitBtn.addEventListener("click", function(e){
    e.preventDefault();
    bullet[current - 1 ].classList.add('active'); 
    progressText[current - 1 ].classList.add('active'); 
    progressCheck[current - 1 ].classList.add('active'); 
    current += 1;
    /*setTimeout(function(){
        alert("formulario enviado");
        //location.reload();

    }, 800);*/
    action_insert_proyecto();
});


prevBtnSec.addEventListener("click", function(e){
    e.preventDefault();
    slidePage.style.marginLeft = "0%";
    bullet[current - 2 ].classList.remove('active'); 
    progressText[current - 2 ].classList.remove('active'); 
    progressCheck[current - 2 ].classList.remove('active'); 
    current -= 1;
});
prevBtnThird.addEventListener("click", function(e){
    e.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 2 ].classList.remove('active'); 
    progressText[current - 2 ].classList.remove('active'); 
    progressCheck[current - 2 ].classList.remove('active'); 
    current -= 1;
   
});
prevBtnFourth.addEventListener("click", function(e){
    e.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 2 ].classList.remove('active'); 
    progressText[current - 2 ].classList.remove('active'); 
    progressCheck[current - 2 ].classList.remove('active'); 
    current -= 1;
});

function view_insert_proyecto()
{   
    $.ajax({
        url:RUTA+"process.php/proyecto/vistas/insert/",
        type:'GET',
        success: function(data){
            insert.show();
            insert.attachHTML(data);
        }
     });
}

function view_edit_proyecto(pk_proyecto, name)
{
 //var  dhxWindow = new dhx.Window({width: 550, height: 250, title: "Editar proyecto", movable: true, closable: true,resizable: true});
    $.ajax({
        url:RUTA+"process.php/proyecto/vistas/update/",
        type:'POST',
        data: {pk_proyecto: pk_proyecto, name: name},
        success: function(data){
            editar.show();
            editar.attachHTML(data);
        }
     });
}

function view_listar_proyecto()
{   
    $.ajax({
        url:RUTA+"process.php/proyecto/vistas/list/",
        type:'GET',
        success: function(data){
         document.getElementById('table_proyecto').innerHTML = data;
        }
     });
}
function action_insert_proyecto()
{    let formData = new FormData(document.getElementById("form-insert-proyecto"));
    
    $.ajax({
        url: RUTA+"process.php/proyecto/insert/",
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
              //view_listar_proyecto();
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
function action_edit_proyecto()
{   let formData = new FormData(document.getElementById("form-edit-proyecto"));
    
    $.ajax({
        url: RUTA+"process.php/proyecto/update/",
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
              view_listar_proyecto();
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

function action_delete_proyecto(proyecto_delete_id)
{    
    $.ajax({
        url: RUTA+"process.php/proyecto/delete/",
        type: "POST",
        data: {proyecto_delete_id: proyecto_delete_id},
       
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
              view_listar_proyecto();
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

$(document).ready(function(){
    provincia();
    
    $("#proyecto_insert_fk_departamento").change(function(){
        $.post(RUTA+"process.php/proyecto/provincia/","proyecto_insert_fk_departamento="+$("#proyecto_insert_fk_departamento").val(), function(data){
            $("#proyecto_insert_fk_provincia").html(data);
            console.log(data);
            distrito();
        });
    });

    $("#proyecto_insert_fk_provincia").change(function(){
        $.post(RUTA+"process.php/proyecto/distrito/","proyecto_insert_fk_provincia="+$("#proyecto_insert_fk_provincia").val(), function(data){
            $("#proyecto_insert_fk_distrito").html(data);
            console.log(data);
        });
    });
});

function provincia()
{
    $.post(RUTA+"process.php/proyecto/provincia/","proyecto_insert_fk_departamento="+$("#proyecto_insert_fk_departamento").val(), function(data){
        $("#proyecto_insert_fk_provincia").html(data);
        console.log(data);
        distrito();
    });
    
}
function distrito()
{
    $.post(RUTA+"process.php/proyecto/distrito/","proyecto_insert_fk_provincia="+$("#proyecto_insert_fk_provincia").val(), function(data){
        $("#proyecto_insert_fk_distrito").html(data);
        console.log(data);
    });
}
