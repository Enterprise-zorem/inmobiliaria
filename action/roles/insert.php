<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['rol_insert_name']))
{
  if(empty($_POST['rol_insert_name']))
  {
      exit("El nombre no puede ser Vacio");
  }
}
else
{
    exit("No POST");
}

$rol=new rol(new Connexion);
$rol->setname($_POST['rol_insert_name']);
$date=new DateTime();
$datetime=$date->format('Y-m-d H:i:s');
$rol->setcreated_at($datetime);
$rol->setupdated_at($datetime);
echo $rol->insert();
