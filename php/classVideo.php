<?php
include_once ('conexion.php');

class video extends conexion{


    public function get(){
        $get =  parent::query('select video.id,
        video.url,
        video.like,
        video.nolike,
        video.descripcion,
        video.nombreArchivo,
        video.usuario_id,
        video.categoria_id from video');


    }

    public function setUrl($url,$like,$nolike,$descripcion,$usuario,$categoria){
        $set =  parent::prepare('insert into video(
            video.url,
            video.like,
            video.nolike,
            video.descripcion,
            video.usuario_id,
            video.categoria_id) values (?,?,?,?,?,?);');
        $set->bind_param('siisii',$url,$like,$nolike,$descripcion,$usuario,$categoria);

        if ($set->execute()){
            return 1;
        }else{
            return 0;
        }
    }

    public function del($id){

        $del =  parent::prepare('delete from video where video.id = ?');
        $del->bidn_param('i',$id);
        if ($del->execute()){
            return true;
        }else{
            return false;
        }

    }
}


?>
