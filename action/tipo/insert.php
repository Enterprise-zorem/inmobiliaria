<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['tipo_insert_name']))
{
  if(empty($_POST['tipo_insert_name']))
  {
      exit("El nombre no puede ser Vacio");
  }
}
else
{
    exit("No POST");
}

$tipo=new tipo(new Connexion);
$tipo->setname($_POST['tipo_insert_name']);
$date=new DateTime();
$datetime=$date->format('Y-m-d H:i:s');
$tipo->setcreated_at($datetime);
$tipo->setupdated_at($datetime);
echo $tipo->insert();
