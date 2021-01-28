<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['estatus_edit_name']) && isset($_POST['estatus_edit_id'])) {
    if (empty($_POST['estatus_edit_name']) && empty($_POST['estatus_edit_id'])) {
      exit("El nombre no puede ser Vacio");
    }
  } else {
    exit("No POST");
  }

  $estatus = new estatus(new Connexion);
  $estatus->setpk($_POST['estatus_edit_id']);
  $estatus->setname($_POST['estatus_edit_name']);
  $date = new DateTime();
  $datetime = $date->format('Y-m-d H:i:s');
  $estatus->setupdated_at($datetime);
  echo $estatus->update();
