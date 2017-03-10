<?php
require_once ('classPlayList.php');
$playList   =   new playList();

echo json_encode($playList->get());

?>
