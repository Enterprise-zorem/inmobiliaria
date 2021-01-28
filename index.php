<?php
include "config/View.php";
$session=new Session();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<?php
    $file = View::load('index');

        if (file_exists($file . "head.php") && $file <> "view/") {
            include $file . "head.php";
        }
    
    ?>
<link rel="stylesheet" href="<?=RUTA_RES?>assets/libs/toastr/toastr.css">
    <?php
    $file = View::load('index');

        if (file_exists($file . "header.php") && $file <> "view/") {
            include $file . "header.php";
        }
    
?>
</head>

<body >
    <?php
    //START LOGIN - REGISTRO
    $file = View::load('index');
    if ($file == "view/login/" || $file == "view/registro/"|| $file == "view/recover/") {
        //no hace nda
    } else if (!$session->issetValue('inmobiliaria_id_user')) {
        echo "<script>window.location.replace('".RUTA."login'); </script>";
    }
    //END LOGIN - REGISTRO
    
    $file = View::load('index');
    if (file_exists($file . "index.php") && $file <> "view/") {
        View::vistas($file);
        //View::permisos($session->getValue('projects_id_user'),$file);si sale true es por que tiene permiso

        include $file . "index.php";
    }
    else
    {
         //header("Location: 404");
         echo "<script>window.location.replace('".RUTA."404');</script>";
    }
    ?>
    <script>var RUTA = '<?= RUTA ?>'</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?=RUTA_RES?>assets/libs/toastr/toastr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>         
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
 
    <?php
    $file = View::load('index');
        if (file_exists($file . "footer.php") && $file <> "view/") {
            include $file . "footer.php";
        }
    ?>
    <?php
    //cargar archivo js de la vista
    $file = View::script('index');

        if (file_exists($file . "index.js") && $file <> "action/") {
            $file = RUTA . $file . "index.js";
            echo "<script type='text/javascript' src='" . $file . "'></script>";
        }
    
    ?>
   
</body>

</html>