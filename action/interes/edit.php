<?php
//Activamos todas las notificaciones de error posibles
error_reporting(E_ALL);

//Definimos el tratamiento de errores no controlados
set_error_handler(function () {
  throw new Exception('Error');
});
try {
  //code...

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['interes_edit_name']) && isset($_POST['interes_edit_id'])) {
    if (empty($_POST['interes_edit_name']) && empty($_POST['interes_edit_id'])) {
      exit("El nombre no puede ser Vacio");
    }
  } else {
    exit("No POST");
  }

  $interes = new interes(new Connexion);
  $interes->setpk($_POST['interes_edit_id']);
  $interes->setname($_POST['interes_edit_name']);
  $date = new DateTime();
  $datetime = $date->format('Y-m-d H:i:s');
  $interes->setupdated_at($datetime);
  echo $interes->update();
} catch (Exception $th) {
  // $incidencia=new incidencias(new Connexion);
  // $incidencia->setname($th);
  // $date=new DateTime();
  // $datetime=$date->format('Y-m-d H:i:s');
  // $incidencia->setcreated_at($datetime);
  // $incidencia->insert();
}

restore_error_handler();
