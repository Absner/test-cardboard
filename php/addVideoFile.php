<?php

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    $file = $_FILES['videoFile']['name'];

    //comprobamos si existe un directorio para subir el archivo
    //si no es así, lo creamos
    if(!is_dir("../files/"))
        mkdir("../files/", 0777);

    //comprobamos si el archivo ha subido
    if ($file && move_uploaded_file($_FILES['videoFile']['tmp_name'],"../files/".$file))
    {
       //sleep(3);//retrasamos la petición 3 segundos
       echo $file;//devolvemos el nombre del archivo para pintar la imagen
    }
}


?>
