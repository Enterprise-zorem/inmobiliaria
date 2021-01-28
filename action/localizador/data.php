<?php 
    $proyecto=new proyecto(new Connexion);
    $proyecto=$proyecto->getAll();
	$features = [];
	$i=0;
	while($row=mysqli_fetch_array($proyecto)){
		$lat=$row['lat'];
	    $long=$row['lon'];
		$propiedades1=array ('phoneFormatted'=> '942971175','address'=> $row['direccion'],'city'=> $row['fk_distrito'],'country'=> $row['fk_departamento']
		,'postalCode'=> "111000",'storeName'=>$row['name']);
		$arreglo_datos=array ('type' => 'Feature','properties' => $propiedades1,'geometry' =>  array ('type' => 'Point','coordinates' => array (0 => $long,1 => $lat)));
        $features += ["$i" =>$arreglo_datos ];
		$i++;
	}

$array_multi=$features;
$data=
array ('type' => 'FeatureCollection','features' => $features);

echo json_encode($data);