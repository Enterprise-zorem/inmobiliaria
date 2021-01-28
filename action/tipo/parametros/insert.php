<?php

  header('Access-Control-Allow-Origin:*');
  if (isset($_POST['parametros_insert_name']) && isset($_POST['parametros_insert_id'])) {
    if (empty($_POST['parametros_insert_name']) && empty($_POST['parametros_insert_id'])) {
      exit("El nombre no puede ser Vacio");
    }
  } else {
    exit("No POST");
  }

  $tipo=new tipo(new Connexion);
  $tipo->setpk($_POST['parametros_insert_id']);
  $tipo=$tipo->getAllById();
  if(mysqli_num_rows($tipo))
  {
    $tipo=$tipo->fetch_array(MYSQLI_ASSOC);
    $array=json_decode($tipo['parametros'],true);
  }
  else
  {
    $array=array();
  }

  array_push($array,$_POST['parametros_insert_name']);

  $tipo=new tipo(new Connexion);
  $tipo->setpk($_POST['parametros_insert_id']);
  $tipo->setparametros(json_encode($array));
  echo $tipo->insert_parametros();
