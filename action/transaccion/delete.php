<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['transaccion_delete_id'])) {
    if (empty($_POST['transaccion_delete_id'])) {
      exit("Nulo");
    }
  } else {
    exit("No hay POST");
  }

  $transaccion = new transaccion(new Connexion);
  $transaccion->setpk($_POST['transaccion_delete_id']);
  echo $transaccion->delete();

