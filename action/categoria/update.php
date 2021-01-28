<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['categoria_edit_name']) && isset($_POST['categoria_edit_id'])) {
    if (empty($_POST['categoria_edit_name']) && empty($_POST['categoria_edit_id'])) {
      exit("El nombre no puede ser Vacio");
    }
  } else {
    exit("No POST");
  }

  $categoria = new categoria(new Connexion);
  $categoria->setpk($_POST['categoria_edit_id']);
  $categoria->setname($_POST['categoria_edit_name']);
  $categoria->setfk_tipo(json_encode($_POST['categoria_edit_fk_tipo']));
  $date = new DateTime();
  $datetime = $date->format('Y-m-d H:i:s');
  $categoria->setupdated_at($datetime);
  echo $categoria->update();
