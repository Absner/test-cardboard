<?php
include_once ('conexion.php');
include_once ('classPlayList.php');

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
        $tipoVideo=1;
        $set =  parent::prepare('insert into video(
            video.url,
            video.like,
            video.nolike,
            video.descripcion,
            video.usuario_id,
            video.categoria_id,
            video.tipoVideo) values (?,?,?,?,?,?,?);');
        $set->bind_param('siisiii',$url,$like,$nolike,$descripcion,$usuario,$categoria,$tipoVideo);

        if ($set->execute()){

            $id =   $set->insert_id;
            $playList   =   new playList();
            if ($playList->set($id,$usuario)){
                return 1;
            }

        }else{
            return 0;
        }
    }

    public function setFile($url,$like,$nolike,$descripcion,$fileName,$usuario,$categoria){
        $tipoVideo=1;
        $set    =   parent::prepare('insert into video(
                video.url,
                video.like,
                video.nolike,
                video.descripcion,
                video.nombreArchivo,
                video.usuario_id,
                video.categoria_id,
                video.tipoVideo) values (?,?,?,?,?,?,?,?)');
        $set->bind_param('siissiii',$url,$like,$nolike,$descripcion,$fileName,$usuario,$categoria,$tipoVideo);

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

    public function urlVideo($url){

        list($basura,$code)    =    explode('=',$url);
        unset($basura);
        return $code;
    }
}


?>
