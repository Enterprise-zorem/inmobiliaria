<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['interes_insert_name']))
{
  if(empty($_POST['interes_insert_name']))
  {
      exit("El nombre no puede ser Vacio");
  }
}
else
{
    exit("No POST");
}



$interes=new interes(new Connexion);
$interes->setname($_POST['interes_insert_name']);
$date=new DateTime();
$datetime=$date->format('Y-m-d H:i:s');
$interes->setcreated_at($datetime);
$interes->setupdated_at($datetime);
echo $interes->insert();

