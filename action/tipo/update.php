<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['tipo_edit_name']) && isset($_POST['tipo_edit_id'])) {
    if (empty($_POST['tipo_edit_name']) && empty($_POST['tipo_edit_id'])) {
      exit("El nombre no puede ser Vacio");
    }
  } else {
    exit("No POST");
  }

  $tipo = new tipo(new Connexion);
  $tipo->setpk($_POST['tipo_edit_id']);
  $tipo->setname($_POST['tipo_edit_name']);
  $date = new DateTime();
  $datetime = $date->format('Y-m-d H:i:s');
  $tipo->setupdated_at($datetime);
  echo $tipo->update();
