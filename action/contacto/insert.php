<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['contacto_insert_name']))
{
  if(empty($_POST['contacto_insert_name']))
  {
      exit("El nombre no puede ser Vacio");
  }
}
else
{
    exit("No hay POST");
}

$contacto=new contacto(new Connexion);
$contacto->setnombres($_POST['contacto_insert_name']);
$contacto->setfk_tipo_contacto(json_encode($_POST['contacto_insert_fk_tipo']));
$date=new DateTime();
$datetime=$date->format('Y-m-d H:i:s');
$contacto->setcreated_at($datetime);
$contacto->setupdated_at($datetime);
echo $contacto->insert();
