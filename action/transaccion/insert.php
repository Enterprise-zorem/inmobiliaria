<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['transaccion_insert_name']))
{
  if(empty($_POST['transaccion_insert_name']))
  {
      exit("El nombre no puede ser Vacio");
  }
}
else
{
    exit("No POST");
}

$transaccion=new transaccion(new Connexion);
$transaccion->setname($_POST['transaccion_insert_name']);
$date=new DateTime();
$datetime=$date->format('Y-m-d H:i:s');
$transaccion->setcreated_at($datetime);
$transaccion->setupdated_at($datetime);
echo $transaccion->insert();
