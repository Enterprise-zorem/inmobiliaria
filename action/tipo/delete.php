<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['tipo_delete_id'])) {
    if (empty($_POST['tipo_delete_id'])) {
      exit("Nulo");
    }
  } else {
    exit("No hay POST");
  }

  $tipo = new tipo(new Connexion);
  $tipo->setpk($_POST['tipo_delete_id']);
  echo $tipo->delete();

