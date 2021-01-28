<?php 

$roles = new rol(new Connexion);
$roles = $roles->getAll();
if($roles){
    while($row = $roles->fetch_array(MYSQLI_ASSOC)){
        $rows[] = $row;
    }
}else{
    $rows[] = "";
}

print json_encode($rows, JSON_UNESCAPED_UNICODE);