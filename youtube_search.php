<?php

$api_youtube='AIzaSyBd9j4G5no2R2qXOBlWbPeamcJi_PqktN8';


$url_youtube='https://www.googleapis.com/youtube/v3/search';


$busqueda='Padel';

$regionCode='AR';

$type='video';

$part='id,snippet';

$url =$url_youtube;
$url.='?key='.$api_youtube;
$url.='&part='.$part;
$url.='&order=relevance';
$url.='&q='.$busqueda;
$url.='&regionCode='.$regionCode;
$url.='&type='.$type;

echo $url.'<br>';

$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

$phpObj = json_decode($result,true);
echo '-------<br>';



echo '-------<br>';

        echo'<h1> Buscando palabra Clave: '.$busqueda.'<h1>';

            foreach ($phpObj['items'] as $key => $value) 
            {
                echo'<h1>Titulo del Canal:'.$value['snippet']['channelTitle'].'<h1>';

                 echo'<h2>ID del Canal:'.$value['snippet']['channelId'].'<h2>';

                 $url_video='https://www.youtube.com/embed/'.$value['id']['videoId'];

                echo'<h3>Titulo del Video:'.$value['snippet']['title'].'<h3>';

                echo'<h3>Descripcion:'.$value['snippet']['description'].'<h3>';

                echo'<h3>Fecha de publicacion:'.$value['snippet']['publishedAt'].'<h3>';

                echo'<h3>Fecha de publicacion:'.$value['snippet']['thumbnails']['medium']['url'].'<h3>';
     
                echo'<iframe width="560" height="315" src="'.$url_video.'"></iframe>';
                echo '<br>';
                echo '<br>';
                echo '<br>';

                echo '<img src="'.$value['snippet']['thumbnails']['default']['url'].'"  width="560" height="300">';
            }
?>


