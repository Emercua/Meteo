<?php


$nombrePropio="Anna";
$nombre1=1;
$nombre2=1.555;

// echo $nombrePropio;

$apellido="Perez";

$nombreCompleto=$nombrePropio."".$apellido;

$suma=$nombre1+$nombre2;

print_r($frutas); 
echo "<br/>";
print($suma);

echo "<br/>";

$frutas=["Kiwi","pera"];

$frutas[]="cereza";

// Mostrar el contenido del array


var_dump($frutas); 


$cliente=[ "nombre"=> "Mike", "apellido"=> "Johnson", "edad"=> 26];


// echo " Te llamas $nombrePropio";
// // echo "<br/>";

// // echo 'Te llamas $nombrePropio';

// // echo "<br/>";

// // echo " Te llamas \$nombrePropio";

// // echo "<br/>";

// // $tuNombre=$cliente["apellido"];

// // echo " Te llamas $tuNombre";echo "<br/>";

echo "El cleinte se llama: ".$cliente["apellido"];

echo "<br/>";
echo 'El cleinte se llama: '.$cliente["apellido"];

echo "<br/>";

echo " I'm the best";
echo "<br/>";

$tuNombre=$cliente["apellido"];

// 


// if ($cliente["apellido"]=="Smith"){
//     echo "El cliente es Smith";
// } elseif ($cliente ["apellido"]=="Johnson"){
//     echo "El cliente es Johnson";
// }else {"No se el apellido"};


for ($i=0; $i<=count($frutas); $i++) {

    echo strtoupper($frutas[$i])."<br>";
     }

echo "<br/>";


foreach ($cliente as $clave=> $valor) {
   echo "La clave es $clave y el valor es $valor <br>";
}



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primera pagina PHP</title>
    <style>

@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap');


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',Arial, Helvetica, sans-serif;
}





        p {
            font-size: 20px;
            color: red;
            text-align: center;
        }
        
    </style>
</head>
<body>

    <p>
    <?php  echo $nombrePropio;  ?>
    </p>
    
    <p>
    <?= $nombrePropio;  ?>
    </p>

    <p>
    <?php  echo $nombreCompleto;  ?>
    </p>

    <p>
    <?php  echo $suma;  ?>
    </p>



    <!--  if ($cliente[$apellido])== "Smith") { ?>  <p>
     $nombrePropio;
    </p> }
    
     ?> -->



</body> 

</html>



<?php

