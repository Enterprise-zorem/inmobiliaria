<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['caracteristica_edit_name']) && isset($_POST['caracteristica_edit_id'])) {
    if (empty($_POST['caracteristica_edit_name']) && empty($_POST['caracteristica_edit_id'])) {
      exit("El nombre no puede ser Vacio");
    }
  } else {
    exit("No POST");
  }

  $caracteristica = new caracteristica(new Connexion);
  $caracteristica->setpk($_POST['caracteristica_edit_id']);
  $caracteristica->setname($_POST['caracteristica_edit_name']);
  $caracteristica->settipo($_POST['caracteristica_edit_tipo']);
  $caracteristica->setfk_interes($_POST['caracteristica_edit_fk_interes']);
  $caracteristica->setfk_tipo($_POST['caracteristica_edit_fk_tipo']);
  $date = new DateTime();
  $datetime = $date->format('Y-m-d H:i:s');
  $caracteristica->setupdated_at($datetime);
  echo $caracteristica->update();
