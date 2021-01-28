<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['tipo_contacto_insert_name']))
{
  if(empty($_POST['tipo_contacto_insert_name']))
  {
      exit("El nombre no puede ser Vacio");
  }
}
else
{
    exit("No POST");
}

$tipo_contacto=new tipoContacto(new Connexion);
$tipo_contacto->setname($_POST['tipo_contacto_insert_name']);
$date=new DateTime();
$datetime=$date->format('Y-m-d H:i:s');
$tipo_contacto->setcreated_at($datetime);
$tipo_contacto->setupdated_at($datetime);
echo $tipo_contacto->insert();