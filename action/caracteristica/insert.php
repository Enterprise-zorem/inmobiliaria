<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['caracteristica_insert_name']))
{
  if(empty($_POST['caracteristica_insert_name']))
  {
      exit("El nombre no puede ser Vacio");
  }
}
else
{
    exit("No POST");
}

$caracteristica=new caracteristica(new Connexion);
$caracteristica->setname($_POST['caracteristica_insert_name']);
$caracteristica->settipo($_POST['caracteristica_insert_tipo']);
$caracteristica->setfk_tipo($_POST['caracteristica_insert_fk_tipo']);
$caracteristica->setfk_interes($_POST['caracteristica_insert_fk_interes']);
$date=new DateTime();
$datetime=$date->format('Y-m-d H:i:s');
$caracteristica->setcreated_at($datetime);
$caracteristica->setupdated_at($datetime);
echo $caracteristica->insert();
