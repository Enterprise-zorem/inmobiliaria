<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['categoria_delete_id'])) {
    if (empty($_POST['categoria_delete_id'])) {
      exit("Nulo");
    }
  } else {
    exit("No hay POST");
  }

  $categoria = new categoria(new Connexion);
  $categoria->setpk($_POST['categoria_delete_id']);
  echo $categoria->delete();

