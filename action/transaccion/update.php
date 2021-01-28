<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['transaccion_edit_name']) && isset($_POST['transaccion_edit_id'])) {
    if (empty($_POST['transaccion_edit_name']) && empty($_POST['transaccion_edit_id'])) {
      exit("El nombre no puede ser Vacio");
    }
  } else {
    exit("No POST");
  }

  $transaccion = new transaccion(new Connexion);
  $transaccion->setpk($_POST['transaccion_edit_id']);
  $transaccion->setname($_POST['transaccion_edit_name']);
  $date = new DateTime();
  $datetime = $date->format('Y-m-d H:i:s');
  $transaccion->setupdated_at($datetime);
  echo $transaccion->update();
