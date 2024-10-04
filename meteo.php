<?php

if ($_POST){
    $Ciudad= $_POST["Ciudad"];
    $pais= $_POST["pais"];

$Ciudad=trim($Ciudad);
$Ciudad=urlencode($Ciudad);

} else { $Ciudad= "Paris";
    $pais= "France";} 



// echo $Ciudad;

// var_dump($_POST);

// echo "<br/>";

// $Ciudad="Roma";

$units="metric";
$lang="es";

$API_KEY="94d046e349ef5e56ffcada2b15bef7f2";

// https://api.openweathermap.org/data/2.5/weather?q=Anchorage&appid=94d046e349ef5e56ffcada2b15bef7f2&units=metric&lang=es


$URL="https://api.openweathermap.org/data/2.5/weather?";

$URL.="q=$Ciudad";
if ($pais!=""){


    $URL.=",$pais";
  
}


$URL.="&appid=$API_KEY&";
$URL.="units=$units&";
$URL.="lang=$lang";

// echo $URL;

// Obtenemos un string

$stringRespuesta=@file_get_contents($URL);

// echo $stringRespuesta;
// echo "<br/>";
// echo "<br/>";
// echo "<br/>";
// echo "<br/>";
// echo "<br/>";
// echo "<br/>";
$error = false; // Variable para gestionar el estado de error

if ($stringRespuesta === FALSE) {
    // echo "<script>alert('Error: No se pudo obtener la información del clima. Verifica que la ciudad este bien escrita.');</script>";
    // // exit; // Detiene la ejecución del script

    // $URL="https://api.openweathermap.org/data/2.5/weather?q=Barcelona&appid=94d046e349ef5e56ffcada2b15bef7f2&units=metric&lang=es";

    // $stringRespuesta=@file_get_contents($URL);

    // $datos=json_decode($stringRespuesta,true);

    $error = true; // Cambia el estado a error

} else {
    $datos=json_decode($stringRespuesta,true);

$descripcion=$datos["weather"]["0"]["description"];
$icono=$datos["weather"]["0"]["icon"];
$temperaturaActual=$datos["main"]["temp"];
$temperaturaMin=$datos["main"]["temp_min"];
$temperaturaMax=$datos["main"]["temp_max"];
$humedad=$datos["main"]["humidity"];
$ciudad_ob=$datos["name"];
$pais_ob=$datos["sys"]["country"];

// Obtener foto de ciudades====================


// API Key de Unsplash
$API_KEY_UNSPLASH = "VM9hvU2n9jy0U7hGyiYxfbVrQzjaakG_2g50d-zqhx4";

// Combina la ciudad con un término más específico para obtener fotos de la ciudad
$query = urlencode($ciudad_ob . " skyline");

// URL de la API de Unsplash con la ciudad y orientación panorámica
$URL_UNSPLASH = "https://api.unsplash.com/search/photos?query=$query&orientation=landscape&client_id=$API_KEY_UNSPLASH";

// Obtener la imagen de Unsplash
$stringImagen = @file_get_contents($URL_UNSPLASH);
$datosImagen = json_decode($stringImagen, true);

// Obtener la primera imagen de la respuesta
$imagenCiudad = $datosImagen['results'][0]['urls']['regular'];

 
}


// Verifica si hay datos disponibles
if (empty($datos)) {
    $error = true; // Cambia el estado a error si no hay datos
}

// $datos=json_decode($stringRespuesta,true);

// var_dump($datos);






// echo " la temperatura es ahora de: $temperaturaActual";

// echo "<br/>";

// echo " la humedad es ahora de: $humedad";

// echo "<br/>";

// echo " la ciudad es: $ciudad_ob";

// echo "<br/>";

// echo " El pais es: $pais_ob";


// Inicialización de las variables
$backgroundImage = "https://cdn.pixabay.com/photo/2018/06/09/21/37/summer-thunder-storm-3465247_960_720.jpg"; // Imagen por defecto
$icono = $icono ?? "01d"; // Asignar un valor por defecto a la variable $icono si no está definida

// Lógica para cambiar la imagen de fondo
// if (isset($descripcion) && strpos($descripcion, 'nubes') !== false) {
//     $backgroundImage = "https://cdn.pixabay.com/photo/2023/05/30/15/53/clouds-8029036_960_720.jpg"; // Segunda imagen
// }

// Cambiar la imagen de fondo según el valor del icono
switch ($icono) {
    case "01d":
        $backgroundImage = "https://cdn.pixabay.com/photo/2018/08/06/22/55/sun-3588618_960_720.jpg"; // Sol
        break;
    case "02d":
    case "02n":
    case "03d":
    case "03n":
    case "04d":
    case "04n":
        $backgroundImage = "https://cdn.pixabay.com/photo/2023/05/30/15/53/clouds-8029036_960_720.jpg"; // Nubes
        break;
    case "01n":
    case "09d":
    case "09n":
    case "11d":
    case "11n":
    case "10n":
        $backgroundImage = "https://cdn.pixabay.com/photo/2018/06/09/21/37/summer-thunder-storm-3465247_960_720.jpg"; // Tormenta
        break;
    case "10d":
   
        $backgroundImage = "https://cdn.pixabay.com/photo/2024/06/22/06/02/ai-generated-8845515_1280.png"; // Lluvia
        break;
    case "13d":
    case "13n":
        $backgroundImage = "https://cdn.pixabay.com/photo/2019/10/07/11/26/winter-landscape-4532412_1280.jpg"; // Nieve
        break;
    case "50d":
    case "50n":
        $backgroundImage = "https://cdn.pixabay.com/photo/2018/03/01/22/23/tree-3191872_960_720.jpg"; // Neblina
        break;
    default:
        // Si no hay coincidencias, se mantiene la imagen por defecto
        break;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meteo</title>
    <style>

@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',Arial, Helvetica, sans-serif;
   
}

:root {
    --primary-color: black;
    --secondary-color: #8d093e;
    --text-color: black;
    --hover-color: #ffa02e;
    --backgroung-color: #e9d9c4;
    --width-content: 1200px;
    --text-normal: "Mako", sans-serif;
    --text-title: "Belanosima", cursive;
    --text-enlace-color:blue;
}

body {
    margin: 0; /* Elimina el margen por defecto */
    padding: 0; /* Elimina el padding por defecto */
    box-sizing: border-box; /* Asegura que el tamaño del box se calcule correctamente */
    font-family: 'Poppins', Arial, Helvetica, sans-serif; /* Fuente principal */
    background-color: white; /* Color de fondo de respaldo */
        background-size: cover; /* Asegura que la imagen cubra todo el fondo */
    background-position: center; /* Centra la imagen en el contenedor */
    background-repeat: no-repeat; /* No repite la imagen */
    height: 100vh; /* Asegura que el body tenga el tamaño completo de la ventana */
        
     background-image: url('<?php echo $backgroundImage; ?>');
     color: white;
   
    
}



main {
    padding: 20px 0;
}

header {
   margin-top: 0.5vw;
    align-items: center;
    padding: 1vw;
    
}

h1 {
    font-size: 20px;
    color: white;
    text-align: center;
}

h2 {
    font-size: 20px;
    /* color: blue; */
    text-align: center;
}


        p {
            font-size: 15px;
            /* color: red; */
            text-align: center;
        }
        
/* img {
    width: 100%;
} */

form {
   text-align: center;
   display: flex;
    flex-direction: column; /* Organiza los elementos en columna */
    align-items: center;    /* Centra los elementos en el eje horizontal */
    width: 100%;            /* Asegura que el formulario tome el 100% del ancho disponible */
    max-width: 500px;       /* Establece un ancho máximo en pantallas grandes */
    margin: 0 auto;         /* Centra el formulario en la página */
    padding: 20px;
    box-sizing: border-box;
}


.grid_1 {

display: grid;
  grid-template-columns: 1fr 1fr; /* Dos columnas de igual tamaño */
  justify-content: center; /* Centra las columnas horizontalmente */
  align-items: center; /* Opcional: centra los elementos verticalmente */
  gap: 0; /* Elimina cualquier espacio entre los elementos */
  width: fit-content;   /* Ajusta el tamaño del grid al contenido */
  margin: 0 auto; /* Centra el grid en la página */
  padding: 0 15vw; /* Añade espacio a los lados del grid */

}

.imagen {
    text-align: center; /* Centra el contenido del contenedor */
}

.imagen img {
    display: block; /* Asegúrate de que la imagen sea un elemento de bloque */
    margin: 0 auto; /* Centra la imagen horizontalmente */
    width: 40%; /* Puedes ajustar este valor según el tamaño deseado */
}


@media (max-width: 768px) {
    .grid_1  {
        grid-template-columns: 1fr; /* Cambia a una columna */
        grid-template-rows: auto auto; /* Define dos filas para las dos filas */
        gap: 0px; /* Añade un espacio entre las filas */
        padding: 0; /* Añade espacio a los lados del grid */
    }

  
}


.temperatura {
    font-size: 40px; /* Tamaño grande para la temperatura */
    font-weight: bold; /* Negrita para mayor énfasis */
    
}


.clima {
    font-size: 48px; /* Tamaño grande para la humedad */
    margin-top: 10px; /* Espacio arriba del texto de humedad */
}




    </style>
</head>



<body>

<header>
    <h1> MeteoEmer </h1>

       
  
</header>


<div class="grid_1">



<div>
<form method="POST">


    <label for="Ciudad">Ciudad:</label>
    <input type="text" id="Ciudad" name="Ciudad">
   
  
    <label for="pais">Pais:</label>
    <input type="text" id="pais" name="pais">
    <br>
    <button type="submit">Consultar</button>

</form>
</div>

<div>

<div id="weatherInfo" style="display: none;">
    <h2> El tiempo en <?=$ciudad_ob?> hoy </h2>

<br>

    <p> Ciudad: <?=$ciudad_ob?></p>
<p> Pais: <?=$pais_ob?> </p>

</div>

<div class="imagen" id="Image_2" style="display: none;">
    <img src="<?=$imagenCiudad?>" alt="Imagen de la ciudad" width="40%">
</div>

<h2 id="errorMessage" style="display: none; color: red;">Error: No se pudo encontrar la ciudad. Verifica que esté bien escrita.</h2> <!-- Mensaje de error -->

</div>



</div>



<!-- $descripcion=$datos["weather"]["0"]["description"];
$icono=$datos["weather"]["0"]["icon"];
$temperaturaActual=$datos["main"]["temp"];
$temperaturaMin=$datos["main"]["temp_min"];
$temperaturaMax=$datos["main"]["temp_max"];
$humedad=$datos["main"]["humidity"];
$ciudad_ob=$datos["name"];
$pais_ob=$datos["sys"]["country"];; -->




<div class="grid_1">


<div id="DatosClima" style="display: none;">

<br>

<p class="clima">  <?=$descripcion?> </p>
<p class="temperatura">  <?=$temperaturaActual?> Cº -   <?=$humedad?> % </p>
<br>
<p> La temperatura Maxima seria: <?=$temperaturaMin?> Cº</p>
<p> La temperatura Minima seria: <?=$temperaturaMax?> Cº</p>
<!-- <br> -->

</div>




<div class="imagen" id="Image" style="display: none;">
     <img src="https://www.imelcf.gob.pa/wp-content/plugins/location-weather/assets/images/icons/weather-icons/<?=$icono?>.svg" alt="Icono del tiempo" width="50%">
</div>

   
</div >
    
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if ($error): ?>
            document.getElementById('weatherInfo').style.display = 'none'; // Oculta la información del clima
            document.getElementById('DatosClima').style.display = 'none'; // Oculta la información del clima
            document.getElementById('Image').style.display = 'none'; // Oculta la información del clima
            document.getElementById('Image_2').style.display = 'none'; // Oculta la información del clima


            document.getElementById('errorMessage').style.display = 'block'; // Muestra el mensaje de error

        <?php else: ?>
            document.getElementById('weatherInfo').style.display = 'block'; // Muestra la información del clima
            document.getElementById('DatosClima').style.display = 'block'; // Oculta la información del clima
            document.getElementById('Image').style.display = 'inline-block'; // Oculta la información del clima
            document.getElementById('errorMessage').style.display = 'none'; // Asegúrate de que el mensaje de error esté oculto

            document.getElementById('Image_2').style.display = 'inline-block'; // Oculta la información del clima




        <?php endif; ?>
    });
</script>