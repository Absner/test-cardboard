<?php
require_once ('classVideo.php');

$titulo         =   $_POST['titulo'];
$url            =   $_POST['url'];
$categoria      =   $_POST['categoria'];
$descripcion    =   $_POST['descripcion'];
$like           =   0;
$nolike         =   0;
$usuario        =   1234;

$add    =   new video();
$add->setUrl($url,$like,$nolike,$descripcion,$usuario,$categoria);
echo $add;


?>
