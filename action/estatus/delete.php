<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['estatus_delete_id'])) {
    if (empty($_POST['estatus_delete_id'])) {
      exit("Nulo");
    }
  } else {
    exit("No hay POST");
  }

  $estatus = new estatus(new Connexion);
  $estatus->setpk($_POST['estatus_delete_id']);
  echo $estatus->delete();

