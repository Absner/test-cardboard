
  $(document).ready(function(){

    $('ul.tabs').tabs();
    $('select').material_select();

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


    })
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

function selectVideo(){
    var url =   "https://www.youtube.com/embed/QMvgSZWpq-E?rel=0&amp;controls=0&amp;showinfo=0";
        $('#video-larg-tv').attr('src',url);
        //$('#video-larg-tv').load();
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
                //console.log(JSON.parse(item));
                res =   JSON.parse(item);
                $.each(res, function(key,res){
                    refresh +=  '<div class="col s5 m5 video-small" >';
                    refresh +=  '<div class="cubierta"></div>';
                    refresh +=  '<iframe  width="150" height="113" src="https://www.youtube.com/embed/'+res.url+'?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';
                    refresh +=  '</div>';
                    refresh +=  '<div class="col s5 m7">';
                    refresh +=  '<ul>';
                    refresh +=  '<li>Titulo</li>';
                    refresh +=  '<li>Descripción</li>';
                    refresh +=  '<li>Like</li>';
                    refresh +=  '<li>No like</li>';
                    refresh +=  '</ul>';
                    refresh +=  '</div>';

                });
                //console.log(res);
                $('#lista').html(refresh);
            },
            error: function(status, err){
                alert('error.');
                console.log(err);
            }

        });
}
