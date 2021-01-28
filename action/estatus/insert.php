<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['estatus_insert_name']))
{
  if(empty($_POST['estatus_insert_name']))
  {
      exit("El nombre no puede ser Vacio");
  }
}
else
{
    exit("No POST");
}

$estatus=new estatus(new Connexion);
$estatus->setname($_POST['estatus_insert_name']);
$date=new DateTime();
$datetime=$date->format('Y-m-d H:i:s');
$estatus->setcreated_at($datetime);
$estatus->setupdated_at($datetime);
echo $estatus->insert();
