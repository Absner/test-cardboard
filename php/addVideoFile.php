<?php
require_once ('classVideo.php');

$titulo         =   $_POST['titulo'];
$url            =   null;
$categoria      =   $_POST['categoria'];
$descripcion    =   $_POST['descripcion'];
$like           =   0;
$nolike         =   0;
$usuario        =   1234;

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    $file = $_FILES['videoFile']['name'];

    //comprobamos si existe un directorio para subir el archivo
    //si no es así, lo creamos
    if(!is_dir("../files/"))
        mkdir("../files/", 0777);

    //comprobamos si el archivo ha subido
    if ($file && move_uploaded_file($_FILES['videoFile']['tmp_name'],"../files/".$file))
    {

        $add    =   new video();
        $resAdd =   $add->setFile($url,$like,$nolike,$descripcion,$file,$usuario,$categoria,$titulo);
        echo $resAdd;
    }
}


?>
