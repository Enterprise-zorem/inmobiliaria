<?php

header('Access-Control-Allow-Origin:*');
if (isset($_POST['parametros_delete_id']) && isset($_POST['pk_tipo'])) {
  if (empty($_POST['parametros_delete_id']) && empty($_POST['pk_tipo'])) {
    exit("El nombre no puede ser Vacio");
  }
} else {
  exit("No POST");
}

$tipo=new tipo(new Connexion);
$tipo->setpk($_POST['pk_tipo']);
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

if(in_array($_POST['parametros_delete_id'],$array))
{
    $array = array_diff($array, array($_POST['parametros_delete_id']));

    $tipo=new tipo(new Connexion);
    $tipo->setpk($_POST['pk_tipo']);
    $tipo->setparametros(json_encode($array));
    echo $tipo->insert_parametros();

}
else
{
    //no exite el elemento
    echo "No existe el Elemento";
}
