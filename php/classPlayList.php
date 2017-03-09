<?php
require_once ('conexion.php');

class playlist extends conexion{

    public function get(){

        $get    =   parent::prepare('SELECT
                        video.id,
                        video.url,
                        video.`like`,
                        video.nolike,
                        video.descripcion,
                        video.nombreArchivo,
                        video.categoria_id,
                        categoria.nombre,
                        playlist.posicion
                        FROM
                        video
                        INNER JOIN playlist ON playlist.video_id = video.id
                        INNER JOIN categoria ON video.categoria_id = categoria.id
                        order by playlist.posicion asc');

    }
}

?>
