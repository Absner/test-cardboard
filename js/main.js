
  $(document).ready(function(){

    $('ul.tabs').tabs();
    $('select').material_select();
    $('#id_video').hide();

    $('#btn-like').click(function(){
        var add =   parseInt($('#like').html()) + 1;
        $('#like').html(add)
        //alert(add);
    })

    $('#btn-nolike').click(function(){
        var addno =   parseInt($('#nolike').html()) + 1;
        $('#nolike').html(addno)
        //alert(add);
    })

    $('#form1').submit(function(e){
        e.preventDefault();

        $.ajax({
            data:   $('#form1').serialize(),
            type:   'post',
            url:    './php/addVideoUrl.php',
            success: function(res){
                console.log(res);
            },
            error:   function(err){
                console.log(err);
            }

        });
    });

    $('#form2').submit(function(e){
        e.preventDefault();

        if (!formatoVideo(fileExtension)){

            alert('Formato no soportado');
        }else{
            var formData    =   new FormData($('#form2')[0]);
            $.ajax({
                data:           formData,
                type:           'post',
                url:            './php/addVideoFile.php',
                cache:          false,
                contentType:    false,
                processData:    false,
                success:        function(res){
                    console.log(res);
                }
            });
        }


    });
    /* variable global para verificar el tipo de archivo que se va a cargar */
    var fileExtension = "";

    /* verificamos los cambios en el input tipo file */
    $(':file').change(function(){

        var file    =   $('#video2')[0].files[0];

        /* obteniendo el nombre*/
        var nombreFile  =   file.name;
        /* obteniendo la extension */
        fileExtension   =   nombreFile.substring(nombreFile.lastIndexOf('.')+1);

        console.log(fileExtension);
    });

    getPlayList();

    /*$('#lista').click(function(){
        var url =   "https://www.youtube.com/embed/QMvgSZWpq-E?rel=0&amp;controls=0&amp;showinfo=0";
        $('#video-larg-tv').attr('src',url);
        $('#video-larg-tv').reload();
    });*/
  });

function selectVideo(item,id){
    var url =   'https://www.youtube.com/embed/'+item+'?rel=0&amp;controls=0&amp;showinfo=0';
        $('#video-larg-tv').attr('src',url);
        //$('#video-larg-tv').load();
    getVideoId(id);
}

function formatoVideo(extension){
    switch (extension.toLowerCase())
    {
        case 'mkv': case 'ogg': case 'webm': case 'mp4':
            return true;
        default:
            return false;
    }
}

function getPlayList(){

    var refresh =   '';
    $.ajax({
            url:    './php/getPlayList.php',
            type:   'GET',
            success: function(item){
                res =   JSON.parse(item);
                /*$.each(res, function(key,res){
                    refresh =   "<div onclick="'selectVideo('"holaMundo"')'">hola</div>";
                });
                console.log(res);
                $('#lista').html(refresh);*/


            },
            error: function(status, err){
                alert('error.');
                //console.log(err);
            }

        });
}

var getVideoId  =   function(id){

    $.ajax({
        url:        './php/getVideoId.php?id='+id,
        type:       'GET',
        success:    function(item){
            res =   JSON.parse(item);
            $.each(res, function(key,res){
                console.log(res.id);
                $('#titulo_v').html(res.titulo);
                $('#descripcion_v').html(res.descripcion);
                $('#like').html(res.like);
                $('#nolike').html(res.nolike);
                $('#id_video').html(res.id);
            });
            //$('#titulo_v').html(res.)
        }
    })
}

