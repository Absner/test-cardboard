<?php
require_once ('classVideo.php');

$id =   $_GET['id'];
$classVideo =   new video();


echo json_encode($classVideo->getId($id));


?>
