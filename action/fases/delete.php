<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['fase_delete_id'])) {
    if (empty($_POST['fase_delete_id'])) {
      exit("Nulo");
    }
  } else {
    exit("No hay POST");
  }

  $fase = new fase(new Connexion);
  $fase->setpk($_POST['fase_delete_id']);
  echo $fase->delete();

