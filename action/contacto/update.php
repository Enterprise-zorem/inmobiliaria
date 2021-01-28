<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['contacto_edit_name']) && isset($_POST['contacto_edit_id'])) {
    if (empty($_POST['contacto_edit_name']) && empty($_POST['contacto_edit_id'])) {
      exit("El nombre no puede ser Vacio");
    }
  } else {
    exit("No POST");
  }

  $contacto = new contacto(new Connexion);
  $contacto->setpk($_POST['contacto_edit_id']);
  $contacto->setnombres($_POST['contacto_edit_name']);
  $contacto->setfk_tipo_contacto(json_encode($_POST['contacto_edit_fk_tipo']));
  $date = new DateTime();
  $datetime = $date->format('Y-m-d H:i:s');
  $contacto->setupdated_at($datetime);
  echo $contacto->update();
