<?php
require_once ('conexion.php');

class playList extends conexion{

    public function get(){

        $get    =   parent::query('SELECT
                        video.id,
                        video.titulo,
                        video.url,
                        video.`like`,
                        video.nolike,
                        video.descripcion,
                        video.nombreArchivo,
                        video.tipoVideo,
                        video.categoria_id,
                        categoria.nombre,
                        playList.posicion
                        FROM
                        video
                        INNER JOIN playList ON playList.video_id = video.id
                        INNER JOIN categoria ON video.categoria_id = categoria.id
                        order by playList.posicion asc');

        $data   =   array();
        while ($row =   $get->fetch_array()){

            $data[] =   array('id'               =>  $row['id'],
                              'url'              =>  $row['url'],
                              'like'             =>  $row['like'],
                              'nolike'           =>  $row['nolike'],
                              'descripcion'      =>  $row['descripcion'],
                              'nombreArchivo'    =>  $row['nombreArchivo'],
                              'tipoVideo'        =>  $row['tipoVideo'],
                              'categoria_id'     =>  $row['categoria_id'],
                              'categoria_name'   =>  $row['nombre'],
                              'posicion'         =>  $row['posicion'],
                              'titulo'           =>  $row['titulo']);
        }

        return $data;


    }

    public function set($video_id,$usuario_id){
        $set    =   parent::prepare('
                        insert into playList(video_id,usuario_id)
                        values (?,?);
                    ');
        $set->bind_param('ii',$video_id,$usuario_id);
        if ($set->execute()){
            return 1;
        }else{
            return 0;
        }
    }
}

?>
