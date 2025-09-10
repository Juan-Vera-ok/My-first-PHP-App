<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesión de CURL; ch = CURL handle
$ch = curl_init(API_URL);
//Indiciar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*Ejecutar la petición y guardamos el resultado en una variable*/
$result = curl_exec($ch);


$data = json_decode($result, true); //Decodificamos el JSON a un objeto de PHP
/*Cerramos la petición*/

curl_close($ch);


?>

<head>
    <meta charset="UTF-8">
    <title>Películas de Marvel</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<main>
   <h2>
            La próxima película de Marvel
        </h2>
    <section>
        
        <img src="<?=$data["poster_url"];?>" width="140" alt="Poster de <?=$data["title"];?>" 
        style="border-radius: 16px;"/>
    </section>
    <hgroup>
        <h3><?=$data["title"]; ?> se estrena en <?=$data["days_until"]; ?> días</h3>
        <p>Fecha de estreno: <?=$data["release_date"]; ?></p>
        <p>La siguiente es: <?=$data["following_production"]["title"];?> y se estrena en <?=$data["following_production"]["days_until"];?> días</p>
        <img src="<?=$data["following_production"]["poster_url"];?>" width="140" alt="">
        <h3>Fecha de estreno:<?=$data["following_production"]["release_date"]; ?></h3>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: #000;
        background-image: url("https://images8.alphacoders.com/578/578182.jpg");
        background-size: cover;
        font-weight: bold;
    }


    body {
        display: grid;
        place-content: center;
    }

    h3{
        text-align: center;
        color: #000;
    }
    h2{
        text-align: center;
    }
    main{
        background-color: #fff5;
        border-radius: 16px;
        padding: 16px;
    }
    img {
    display: block;
    margin-inline: auto;
    border-radius: 16px;
}


   section {
    display: flex;
    justify-content: center; 
    text-align: center;
}

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

</style>