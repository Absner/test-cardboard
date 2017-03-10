<?php
include_once ('conexion.php');
include_once ('classPlayList.php');

class video extends conexion{


    public function getId($id){
        $get =  parent::prepare('select video.id,
                    video.url,
                    video.like,
                    video.nolike,
                    video.descripcion,
                    video.nombreArchivo,
                    video.usuario_id,
                    video.categoria_id,
                    video.titulo from video
                    where video.id  =   ?');
        $get->bind_param('i',$id);

        $data   =   array();

        if ($get->execute()){
            $get->bind_result($ide,$url,$like,$nolike,$descripcion,$nombreFile,
                              $usuario_id,$categoria_id,$titulo);
            while ($row =   $get->fetch()){
                $data []    =   array(
                    'id'            =>  $ide,
                    'url'           =>  $url,
                    'like'          =>  $like,
                    'nolike'        =>  $nolike,
                    'descripcion'   =>  $descripcion,
                    'nombreArchivo' =>  $nombreFile,
                    'usuario_id'    =>  $usuario_id,
                    'categoria_id'  =>  $categoria_id,
                    'titulo'        =>  $titulo
                );

            }
        }else{
            return false;
        }

        return $data;


    }

    public function setUrl($url,$like,$nolike,$descripcion,$usuario,$categoria,$titulo){
        $tipoVideo=1;
        $set =  parent::prepare('insert into video(
            video.url,
            video.like,
            video.nolike,
            video.descripcion,
            video.usuario_id,
            video.categoria_id,
            video.tipoVideo,
            video.titulo) values (?,?,?,?,?,?,?,?);');
        $set->bind_param('siisiiis',$url,$like,$nolike,$descripcion,$usuario,$categoria,$tipoVideo,$titulo);

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

    public function setFile($url,$like,$nolike,$descripcion,$fileName,$usuario,$categoria,$titulo){
        $tipoVideo=1;
        $set    =   parent::prepare('insert into video(
                video.url,
                video.like,
                video.nolike,
                video.descripcion,
                video.nombreArchivo,
                video.usuario_id,
                video.categoria_id,
                video.tipoVideo,
                video.titulo) values (?,?,?,?,?,?,?,?,?)');
        $set->bind_param('siissiiis',$url,$like,$nolike,$descripcion,$fileName,$usuario,$categoria,$tipoVideo,$titulo);

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

    public function putlike($id,$num){
        $set    =   parent::prepare('update video set video.like=? where video.id=?');

        $set->bind_param('ii',$id,$num);
        if ($set->execute()){
            return 1;
        }else{
            return 0;
        }
    }


    public function putnolike($id,$num){
        $set    =   parent::prepare('update video set video.nolike=? where video.id=?');

        $set->bind_param('ii',$id,$num);
        if ($set->execute()){
            return 1;
        }else{
            return 0;
        }
    }
}



?>
