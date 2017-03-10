<?php
require_once('conexion.php');

class comentario extends conexion{

    public function getById($video_id){
        $get =  parent::prepare('select
        comentario.id,
        comentario.comentario,
        comentario.video_id
        WHERE
            comentario.video_id = ?');
        $get->bind_param('i',$video_id);
        $data   =   array();
        if ($get->execute()){
            $get->bind_result($id_com,$com,$id_video);
            while ($row = $get->fetch()){
                $data [] = array(
                    'id'            =>  $id_com,
                    'comentario'    =>  $com,
                    'id_video'      =>  $id_video
                );
            }

        }else{
            return false;
        }

        return $data;

    }


    public  function set($comentario,$video_id){
        $set =  parent::prepare('insert into comentario(
            comentario.comentario,
            comentario.video_id) values (?,?,?)');
        $set->bind_param('si',$comentario,$video_id);
        if ($set->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>
