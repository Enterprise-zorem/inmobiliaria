<?php
header('Access-Control-Allow-Origin:*');
$nombre = isset($_POST['registro__nombres']) ? $_POST['registro__nombres'] : '';
$email = isset($_POST['registro__email']) ? $_POST['registro__email'] : '';
$password = isset($_POST['registro__password']) ? $_POST['registro__password'] : '';


if (empty($email) || empty($password)|| empty($nombre)) {
    exit("Usuario o Contraseña o Nombre no Digitados");
}


function insert()
{  
    $cliente=new usuario(new Connexion);
    $cliente->setemail($_POST['registro__email']);
    $cliente=$cliente->getAllByEmail();
    $cliente=$cliente->fetch_array(MYSQLI_ASSOC);
    if($cliente)
    {
        //hay datos 
        return "El correo ya se encuentra registrado";
    }
    else
    {   //registrar cliente
       
        $cliente=new usuario(new Connexion);
        $cliente->setimage(RUTA.'res/perfiles/default.gif');
        $cliente->setnombres($_POST['registro__nombres']);
        $cliente->setemail($_POST['registro__email']);
        $cliente->setpassword($_POST['registro__password']);
        $date=new DateTime();
        $datetime=$date->format('Y-m-d H:i:s');
        $cliente->setcreated_at($datetime);
        $cliente->setupdated_at($datetime);
        $result=$cliente->insert();

        if(is_numeric($result))
        {
            return "defaultValue";
        }
        else
        {
            return $result;
        }
    }

}

echo insert();
