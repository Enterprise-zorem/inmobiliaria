<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['fase_edit_name']) && isset($_POST['fase_edit_id'])) {
    if (empty($_POST['fase_edit_name']) && empty($_POST['fase_edit_id'])) {
      exit("El nombre no puede ser Vacio");
    }
  } else {
    exit("No POST");
  }

  $fase = new fase(new Connexion);
  $fase->setpk($_POST['fase_edit_id']);
  $fase->setname($_POST['fase_edit_name']);
  $date = new DateTime();
  $datetime = $date->format('Y-m-d H:i:s');
  $fase->setupdated_at($datetime);
  echo $fase->update();
