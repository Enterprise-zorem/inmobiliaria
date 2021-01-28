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
  if (isset($_POST['tipo_contacto_edit_name']) && isset($_POST['tipo_contacto_edit_id'])) {
    if (empty($_POST['tipo_contacto_edit_name']) && empty($_POST['tipo_contacto_edit_id'])) {
      exit("El nombre no puede ser Vacio");
    }
  } else {
    exit("No POST");
  }

  $tipo_contacto = new tipoContacto(new Connexion);
  $tipo_contacto->setpk($_POST['tipo_contacto_edit_id']);
  $tipo_contacto->setname($_POST['tipo_contacto_edit_name']);
  $date = new DateTime();
  $datetime = $date->format('Y-m-d H:i:s');
  $tipo_contacto->setupdated_at($datetime);
  echo $tipo_contacto->update();
} catch (Exception $th) {
  // $incidencia=new incidencias(new Connexion);
  // $incidencia->setname($th);
  // $date=new DateTime();
  // $datetime=$date->format('Y-m-d H:i:s');
  // $incidencia->setcreated_at($datetime);
  // $incidencia->insert();
}

restore_error_handler();
