<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['fase_insert_name']))
{
  if(empty($_POST['fase_insert_name']))
  {
      exit("El nombre no puede ser Vacio");
  }
}
else
{
    exit("No POST");
}

$fase=new fase(new Connexion);
$fase->setname($_POST['fase_insert_name']);
$date=new DateTime();
$datetime=$date->format('Y-m-d H:i:s');
$fase->setcreated_at($datetime);
$fase->setupdated_at($datetime);
echo $fase->insert();
