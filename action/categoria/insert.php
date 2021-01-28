<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['categoria_insert_name']))
{
  if(empty($_POST['categoria_insert_name']))
  {
      exit("El nombre no puede ser Vacio");
  }
}
else
{
    exit("No POST");
}

$categoria=new categoria(new Connexion);
$categoria->setname($_POST['categoria_insert_name']);
$categoria->setfk_tipo(json_encode($_POST['categoria_insert_fk_tipo']));
$date=new DateTime();
$datetime=$date->format('Y-m-d H:i:s');
$categoria->setcreated_at($datetime);
$categoria->setupdated_at($datetime);
echo $categoria->insert();
